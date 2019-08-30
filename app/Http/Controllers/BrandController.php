<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
// use App\Mytable;
use Session;
session_start();

class BrandController extends Controller
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
    	return view('admin.add_brand');
    }


     //show category page with all data from database....................
    public function all_brand(){
        $this->adminAuthCheck();
    	$all_brands_info = DB::table('tbl_brands')->get();
    	$manage_brands = view('admin.all_brand')->with('all_brands_info', $all_brands_info);
    	return view('admin_layout')->with('admin.all_brand', $manage_brands);

    	// echo "string";
    }



        //save brand function......................................
    public function save_brand(Request $request){
    	$data = array();
    	$data['brand_name'] = $request->brand_name;
    	$data['brand_discripton'] = $request->brand_discripton;
    	$data['publication_status'] = $request->publication_status;

    	DB::table('tbl_brands')->insert($data);
    	session::put('message', 'Brand Added Successfully!!');
    	return Redirect::to('/add-brands');
    }

        //unactive brand function....................................
    public function unactive_brand($brand_id){
        DB::table('tbl_brands')
                 ->where('brand_id', $brand_id)
                 ->update(['publication_status' => 0]);

                 session::put('message', 'Brand Unactive Successfully!!');
                 return Redirect::to('/all-brands');   
    }

        //active brand function....................................
    public function active_brand($brand_id){
        DB::table('tbl_brands')
                 ->where('brand_id', $brand_id)
                 ->update(['publication_status' => 1]);

                 session::put('message', 'Brand Active Successfully!!');
                 return Redirect::to('/all-brands');   
    }



        //edit brand function...........................................
       public function edit_brand($brand_id){
        $this->adminAuthCheck();
        $brand_info = DB::table('tbl_brands')
                        ->where('brand_id', $brand_id)
                        ->first();

        $brand_info = view('admin.edit_brand')
                         ->with('brand_info', $brand_info);

        return view('admin_layout')
              ->with('admin.edit_brand', $brand_info);

          // return view('admin.edit_category');
    }



    //update brand function...........................................
     public function update_brand(Request $request, $brand_id){
        $data = array();
        $data['brand_name'] = $request->brand_name;
        $data['brand_discripton'] = $request->brand_discripton;

        DB::table('tbl_brands')->where('brand_id', $brand_id)->update($data);
        // echo "<pre>";
        // print_r($data);
        // echo "<pre>";
        session::put('message', 'Update Successfully!!');
        return Redirect::to('/all-brands');
    }


    public function delete_brand($brand_id){
         DB::table('tbl_brands')->where('brand_id', $brand_id)->delete();
        session::put('message', 'Delete Successfully!!');
        return Redirect::to('/all-brands');
    }


}