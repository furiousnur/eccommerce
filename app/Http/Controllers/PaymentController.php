<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cart;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();


class PaymentController extends Controller
{
    //bkash function.............

    public function bkash(Request $request){
    	$data = array();
    	$data ['customer_id'] = Session::get('customer_id');
    	$data ['txnid'] = $request->txnid;

    	$customer_id = DB::table('bkash')
    						->insertGetId($data);

    	Cart::destroy();
        
    	return Redirect::to('/show-cart');  
    }


      //rocket function.............

    public function rocket(Request $request){
        $data = array();
        $data ['customer_id'] = Session::get('customer_id');
        $data ['txnid'] = $request->txnid;

        $customer_id = DB::table('rocket')
                            ->insertGetId($data);

        Session::put('customer_id', $customer_id);
  
        Cart::destroy();
        return Redirect::to('/show-cart');
        
       
    }

    
}
