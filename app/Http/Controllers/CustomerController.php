<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Cart;
use Session;
session_start();

class CustomerController extends Controller
{
    public function customer_registration(Request $request){
    	$data = array();
    	$data ['customer_name'] = $request->customer_name;
    	$data ['customer_email'] = $request->customer_email;
    	$data ['password'] = md5($request->password);
    	$data ['customer_mobile'] = $request->customer_mobile;

    	$customer_id = DB::table('tbl_customers')
    						->insertGetId($data);

    	Session::put('customer_id', $customer_id);
    	Session::put('customer_name', $request->customer_name);

    	return Redirect::to('/checkout'); 					
    }

    public function customer_logout(){
        Session::flush();
        return Redirect::to('/');
    }


    public function customer_login(Request $request){

        $customer_email = $request->customer_email;
        $password = md5($request->password);

        $result = DB::table('tbl_customers')
                    ->where('customer_email', $customer_email)
                    ->where('password', $password)
                    ->first();

                    if ($result) {
                        session::put('customer_email', $result->customer_email);
                        session::put('customer_id', $result->customer_id);
                        // Session::flush();

                        return Redirect::to('/checkout');

                    }else{
                        session::put('message', 'Email or Password Invalid!!');
                        return Redirect::to('/login-check');
                    }
    }



    //payment function for customer................................

     public function payment1(){

         $customer_id = Session::get('customer_id');

         if ($customer_id != NULL) {
             return view('pages.payment1');
          }else{
            Redirect::to('/login-check');
          }   
                         

         // return view('pages.payment1');
    }

    public function order_place(Request $request){
        $payment_gateway = $request->payment_method;

        $pdata = array();
        $pdata['payment_method'] = $payment_gateway;
        $pdata['payment_status'] = 'pending';

        $payment_id = DB::table('tbl_payment')
                        ->insertGetId($pdata);

       $odata = array();

       $odata['customer_id'] = Session::get('customer_id');
       $odata['id'] = Session::get('id');
       $odata['payment_id'] = $payment_id; 
       $odata['order_total'] = Cart::total();
       $odata['order_status'] = 'pending';

       $order_id = DB::table('tbl_order')
            ->insertGetId($odata);
        
       $contents = Cart::Content();  

       $order_details_data = array();

       foreach ($contents as $v_content) {
           $order_details_data['order_id'] = $order_id;
           $order_details_data['product_id'] = $v_content->id;
           $order_details_data['product_name'] = $v_content->name;
           $order_details_data['product_price'] = $v_content->price;
           $order_details_data['product_sales_quantity'] = $v_content->qty;

           DB::table('tbl_order_details')
                ->insert($order_details_data);
           
       }

       if($payment_gateway=='handcash'){
            Cart::destroy();
            return view('pages.handcash');

       }elseif ($payment_gateway=='bkash') {
           // echo "Successfully done by Bkash. ";
        return view('pages.bkash');

       }elseif($payment_gateway=='rocket'){
            return view('pages.rocket');

       }else{
        echo "Not selected.";
       }
       

    }



public function wishlist(){
  return view('pages.wishlist');
}

}
