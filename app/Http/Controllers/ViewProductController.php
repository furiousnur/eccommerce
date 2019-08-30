<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();

class ViewProductController extends Controller
{
    //Product Show by category wise................
    public function index($product_id){

    	$product_details = DB::table('tbl_products')
    							->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
    							->join('tbl_brands', 'tbl_products.brand_id', '=', 'tbl_brands.brand_id')
    							->select('tbl_products.*', 'tbl_category.category_name', 'tbl_brands.brand_name')
    							->where('tbl_products.product_id', $product_id)
    							->where('tbl_products.publication_status', 1)
    							->first();

    	$manage_product_details = view('pages.product_details')->with('product_details', $product_details);
    	return view('layout')->with('pages.product_details', $manage_product_details);
    }


    public function slider(){
        return view('pages.slides');
    }

}
