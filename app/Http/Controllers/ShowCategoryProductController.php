<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();


class ShowCategoryProductController extends Controller
{
    //Product Show by category wise................
    public function index($category_id){

    	$all_category_product = DB::table('tbl_products')
    							->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
    							->select('tbl_products.*', 'tbl_category.category_name')
    							->where('tbl_category.category_id', $category_id)
    							->where('tbl_products.publication_status', 1)
    							->limit(18)
    							->get();

    	$manage_category_product = view('pages.categoryProduct')->with('all_category_product', $all_category_product);
    	return view('layout')->with('pages.categoryProduct', $manage_category_product);
    }
    
}
