<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();

class ProductController extends Controller
{	

//AUTHENTICATION.............................
  public function __construct(){
            //$this->adminAuthCheck();
  }

  public function adminAuthCheck(){
    $admin_id = Session::get('admin_id');
    if ($admin_id) {
      return;
    }else{
      return Redirect::to('/admin_backend')->send();
    }   
  }

//..............................................	



  public function index(){

   $this->adminAuthCheck();
   return view('admin.add_product');
 }

    //save product function......................................
 public function save_product(Request $request){
   $data = array();

   $data['product_name'] = $request->product_name;
   $data['category_id'] = $request->category_id;
   $data['brand_id'] = $request->brand_id;
   $data['product_short_desc'] = $request->product_short_desc;
   $data['product_long_desc'] = $request->product_long_desc;
   $data['product_price'] = $request->product_price;
   $data['product_size'] = $request->product_size;
   $data['product_color'] = $request->product_color;
   $data['publication_status'] = $request->publication_status;

   $image = $request->file('product_image');
   if ($image) {
    $image_name = str_random(20);
    $ext = strtolower($image->getClientOriginalExtension());
    $image_full_name = $image_name.'.'.$ext;
    $upload_path = 'image/';
    $image_url = $upload_path.$image_full_name;
    $success = $image->move($upload_path, $image_full_name);

    if ($success) {
     $data['product_image'] = $image_url;

     DB::table('tbl_products')->insert($data);
     session::put('message', 'Product Added Successfully!!');
     return Redirect::to('/add-product');

   }
 }

 $data['product_image'] = '';
 DB::table('tbl_products')->insert($data);
 session::put('message', 'Product Added Successfully Without Image!!');
 return Redirect::to('/add-product');
}


    //All Product Show.................................

public function all_product(){

 $this->adminAuthCheck();

 $all_product_info = DB::table('tbl_products')
 ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
 ->join('tbl_brands', 'tbl_products.brand_id','=','tbl_brands.brand_id')
 ->select('tbl_products.*', 'tbl_category.category_name', 'tbl_brands.brand_name')
 ->get();

 $manage_product = view('admin.all_product')->with('all_product_info', $all_product_info);
 return view('admin_layout')->with('admin.all_product', $manage_product);
}


       //unactive product function....................................
public function unactive_product($product_id){
  DB::table('tbl_products')
  ->where('product_id', $product_id)
  ->update(['publication_status' => 0]);

  session::put('message', 'Product Unactive Successfully!!');
  return Redirect::to('/all-products');   
}

//active product function....................................
public function active_product($product_id){
  DB::table('tbl_products')
  ->where('product_id', $product_id)
  ->update(['publication_status' => 1]);

  session::put('message', 'Product Active Successfully!!');
  return Redirect::to('/all-products');   
}

//edit product function...........................................
public function edit_product($product_id){

  $this->adminAuthCheck();

  $product_info = DB::table('tbl_products')
  ->where('product_id', $product_id)
  ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
  ->join('tbl_brands', 'tbl_products.brand_id','=','tbl_brands.brand_id')
  ->select('tbl_products.*', 'tbl_category.category_name', 'tbl_brands.brand_name')
  ->first();

  $product_info = view('admin.edit_product')->with('product_info', $product_info);
  return view('admin_layout')->with('admin.edit_product', $product_info);
}



    //update product function...........................................
public function update_product(Request $request, $product_id){
  $data = array();
  $data['product_name'] = $request->product_name;
  $data['product_short_desc'] = $request->product_short_desc;
  $data['product_long_desc'] = $request->product_long_desc;
  $data['product_price'] = $request->product_price;
  $data['product_size'] = $request->product_size;
  $data['product_color'] = $request->product_color;
  $data['publication_status'] ='1';

  $image = $request->file('product_image');
  if ($image) {
    $image_name = str_random(20);
    $ext = strtolower($image->getClientOriginalExtension());
    $image_full_name = $image_name.'.'.$ext;
    $upload_path = 'image/';
    $image_url = $upload_path.$image_full_name;
    $success = $image->move($upload_path, $image_full_name);

    if ($success) {
     $data['product_image'] = $image_url;

           // DB::table('tbl_products')->insert($data);
     DB::table('tbl_products')
     ->where('product_id',$product_id)
     ->update($data);

     session::put('message', 'Update Successfully!!');
     return Redirect::to('/all-products');

   }
   DB::table('tbl_products')
   ->where('product_id',$product_id)
   ->update($data);

   session::put('message', 'Update Successfully!!');
   return Redirect::to('/all-products');
 }


 DB::table('tbl_products')->where('product_id',$product_id)->update($data);
 session::put('message', 'Update Successfully!!');
 return Redirect::to('/all-products');
}



public function delete_product($product_id){
 DB::table('tbl_products')->where('product_id', $product_id)->delete();
 session::put('message', 'Delete Successfully!!');
 return Redirect::to('/all-products');
}

}
