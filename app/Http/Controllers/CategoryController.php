<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
// use App\Mytable;
use Session;
session_start();

class CategoryController extends Controller
{



//AUTHENTICATION.............................
  public function __construct(){
            // $this->adminAuthCheck();
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
    return view('admin.add_category');
  }



    //show category page with all data from database....................
  public function all_category(){
    $this->adminAuthCheck();
    $all_category_info = DB::table('tbl_category')->get();
    $manage_category = view('admin.all_category')->with('all_category_info', $all_category_info);
    return view('admin_layout')->with('admin.all_category', $manage_category);

    	// return view('admin.all_category');
  }



        //save category function......................................
  public function save_category(Request $request){
   $data = array();
   $data['category_name'] = $request->category_name;
   $data['category_discripton'] = $request->category_discripton;
   $data['publication_status'] = $request->publication_status;

   DB::table('tbl_category')->insert($data);
   session::put('message', 'Category Added Successfully!!');
   return Redirect::to('/add-category');
 }

        //unactive category function....................................
 public function unactive_category($category_id){
  DB::table('tbl_category')
  ->where('category_id', $category_id)
  ->update(['publication_status' => 0]);

  session::put('message', 'Category Unactive Successfully!!');
  return Redirect::to('/all-category');   
}

        //active category function....................................
public function active_category($category_id){
  DB::table('tbl_category')
  ->where('category_id', $category_id)
  ->update(['publication_status' => 1]);

  session::put('message', 'Category Active Successfully!!');
  return Redirect::to('/all-category');   
}



        //edit category function...........................................
public function edit_category($category_id){
  $this->adminAuthCheck();
  $category_info = DB::table('tbl_category')
  ->where('category_id', $category_id)
  ->first();

  $category_info = view('admin.edit_category')
  ->with('category_info', $category_info);

  return view('admin_layout')
  ->with('admin.edit_category', $category_info);

          // return view('admin.edit_category');
}



    //update category function...........................................
public function update_category(Request $request, $category_id){
  $data = array();
  $data['category_name'] = $request->category_name;
  $data['category_discripton'] = $request->category_discripton;

  DB::table('tbl_category')->where('category_id', $category_id)->update($data);
        // echo "<pre>";
        // print_r($data);
        // echo "<pre>";
  session::put('message', 'Update Successfully!!');
  return Redirect::to('/all-category');
}


public function delete_category($category_id){
 DB::table('tbl_category')->where('category_id', $category_id)->delete();
 session::put('message', 'Delete Successfully!!');
 return Redirect::to('/all-category');
}


}
