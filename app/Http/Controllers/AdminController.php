<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();

class AdminController extends Controller
{
   
     public function index(){
    	return view('admin_login');
    }


    public function dashboard(Request $request){

    	$admin_email = $request->admin_email;
    	$admin_password = md5($request->admin_password);

    	$result = DB::table('tbl_admin')
    				->where('admin_email', $admin_email)
    				->where('admin_pass', $admin_password)
    				->first();

    				if ($result) {
    					session::put('admin_name', $result->admin_name);
    					session::put('admin_id', $result->admin_id);
                        // Session::flush();
    					return Redirect::to('/dashboard');
    				}else{
    					session::put('message', 'Email or Password Invalid!!');
    					return Redirect::to('/admin_backend');
    				}
    }

    public function manage_order(){

        $all_order_info = DB::table('tbl_order')
                                ->join('tbl_customers','tbl_order.customer_id','=','tbl_customers.customer_id')
                                ->select('tbl_order.*', 'tbl_customers.customer_name')
                                ->get();

        $manage_order = view('admin.manage_order')->with('all_order_info', $all_order_info);
        return view('admin_layout')->with('admin.manage_order', $manage_order);
        
    }

     //show order function....................
    public function view_order($order_id){
      $order_by_id = DB::table('tbl_order')
                                ->join('tbl_customers','tbl_order.customer_id','=','tbl_customers.customer_id')
                                ->join('tbl_order_details','tbl_order.order_id','=','tbl_order_details.order_id')
                                ->join('tbl_bill', 'tbl_order.id','=', 'tbl_bill.id')
                                ->select('tbl_order.*', 'tbl_order_details.*', 'tbl_bill.*', 'tbl_customers.*')
                                ->get();                      

        $view_order = view('admin.view_order')->with('order_by_id', $order_by_id);
        return view('admin_layout')->with('admin.view_order', $view_order);
    }

     public function delete_order($order_id){
         DB::table('tbl_order')->where('order_id', $order_id)->delete();

         // DB::table('tbl_order')
         //           ->join('tbl_customers','tbl_order.customer_id','=','tbl_customers.customer_id')
         //           ->join('tbl_order_details','tbl_order.order_id','=','tbl_order_details.order_id')
         //           ->join('tbl_bill', 'tbl_order.id','=', 'tbl_bill.id')
         //           ->where('order_id', $order_id)
         //           ->delete(); 

        session::put('message', 'Delete Successfully!!');
        return Redirect::to('/manage-order');
    }


}
