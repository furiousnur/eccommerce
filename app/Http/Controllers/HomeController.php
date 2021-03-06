<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();

class HomeController extends Controller
{
    public function index(){
    	// return view('pages.home_content');

    	$all_published_product = DB::table('tbl_products')
       ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
       ->join('tbl_brands', 'tbl_products.brand_id','=','tbl_brands.brand_id')
       ->select('tbl_products.*', 'tbl_category.category_name', 'tbl_brands.brand_name')
       ->where('tbl_products.publication_status', 1)
       ->limit(18)
       ->get();

       $manage_published_product = view('pages.home_content')->with('all_published_product', $all_published_product);
       return view('layout')->with('pages.home_content', $manage_published_product);
   }

}
