<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cart;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();

class CheckoutController extends Controller
{
    //checkout login function................
    public function login_check(){
    	return view('pages.login');
    }

     //checkout function................
    public function checkout(){
    	return view('pages.checkout');

    }

     //checkout bill submit function................
    public function bill_submit(Request $request){
    	$data = array();
    	$data ['f_name'] = $request->f_name;
    	$data ['l_name'] = $request->l_name;
    	$data ['email'] = $request->email;
    	$data ['m_number'] = $request->m_number;
    	$data ['address'] = $request->address;
    	$data ['city'] = $request->city;

    	$id = DB::table('tbl_bill')
    						->insertGetId($data);
    	session::put('id', $id);					
    	// session::put('message', 'Submit Successfully!!');					

    	return Redirect::to('/payment1');
    }
}
