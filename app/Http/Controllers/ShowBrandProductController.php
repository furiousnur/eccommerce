<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();

class ShowBrandProductController extends Controller
{
    //Product Show by brand wise................
    public function index($brand_id){

    	$all_brand_product = DB::table('tbl_products')
    							->join('tbl_brands','tbl_products.brand_id','=','tbl_brands.brand_id')
    							->select('tbl_products.*', 'tbl_brands.brand_name')
    							->where('tbl_brands.brand_id', $brand_id)
    							->where('tbl_products.publication_status', 1)
    							->limit(18)
    							->get();

    	$manage_brand_product = view('pages.brandProduct')->with('all_brand_product', $all_brand_product);
    	return view('layout')->with('pages.brandProduct', $manage_brand_product);
    }}
