<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();

class SliderController extends Controller
{
    public function index(){
        $this->adminAuthCheck();
    	return view('admin.add_slider');
    }

    public function save_slider(Request $request){
    	$data = array();
    	$data['publication_status'] = $request->publication_status;

    	$image = $request->file('slider_image');
    	if ($image) {
    		$image_name = str_random(20);
    		$ext = strtolower($image->getClientOriginalExtension());
    		$image_full_name = $image_name.'.'.$ext;
    		$upload_path = 'slider/';
    		$image_url = $upload_path.$image_full_name;
    		$success = $image->move($upload_path, $image_full_name);
    		
    		if ($success) {
    			$data['slider_image'] = $image_url;

    			DB::table('tbl_sliders')->insert($data);
		    	session::put('message', 'Slider Added Successfully!!');
		    	return Redirect::to('/add-slider');

    		}
    	}
    }

    public function all_sliders(){
        $this->adminAuthCheck();
    	$all_slider_info = DB::table('tbl_sliders')->get();

    	$manage_slider = view('admin.all_slider')->with('all_slider_info', $all_slider_info);
    	return view('admin_layout')->with('admin.all_slider', $manage_slider);


    	// return view('admin.all_slider');
    }


       //unactive product function....................................
    public function unactive_slider($slider_id){
        DB::table('tbl_sliders')
                 ->where('slider_id', $slider_id)
                 ->update(['publication_status' => 0]);

                 session::put('message', 'Slider Unactive Successfully!!');
                 return Redirect::to('/all-sliders');   
    }

        //active product function....................................
    public function active_slider($slider_id){
        DB::table('tbl_sliders')
                 ->where('slider_id', $slider_id)
                 ->update(['publication_status' => 1]);

                 session::put('message', 'Slider Active Successfully!!');
                 return Redirect::to('/all-sliders');   
    }

            //edit product function...........................................
       public function edit_slider($slider_id){

       	$this->adminAuthCheck();

        $slider_info = DB::table('tbl_sliders')
                       ->where('slider_id', $slider_id)
                       ->first();

        $slider_info = view('admin.edit_slider')
        			   ->with('slider_info', $slider_info);

        return view('admin_layout')
        		->with('admin.edit_slider', $slider_info);

    }

    //update product function...........................................
     public function update_slider(Request $request, $slider_id){
        $data = array();

    	$image = $request->file('slider_image');
    	if ($image) {
    		$image_name = str_random(20);
    		$ext = strtolower($image->getClientOriginalExtension());
    		$image_full_name = $image_name.'.'.$ext;
    		$upload_path = 'slider/';
    		$image_url = $upload_path.$image_full_name;
    		$success = $image->move($upload_path, $image_full_name);
    		
    		if ($success) {
    			$data['slider_image'] = $image_url;


    			DB::table('tbl_sliders')
    					->where('slider_id', $slider_id)
    					->update($data);
    					
		    	session::put('message', 'Update Successfully!!');
		    	return Redirect::to('/all-sliders');

    		}
    	}
    }



//DElete function.............................................
    public function delete_slider($slider_id){
         DB::table('tbl_sliders')->where('slider_id', $slider_id)->delete();
        session::put('message', 'Delete Successfully!!');
        return Redirect::to('/all-sliders');
    }


     public function adminAuthCheck(){
        $admin_id = Session::get('admin_id');
        if ($admin_id) {
            return;
        }else{
            return Redirect::to('/admin_backend')->send();
        } 
    }
}
