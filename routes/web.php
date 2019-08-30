<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('layout');
// });

//Frontend Route List
Route::get('/', 'HomeController@index');



//Backend Route List
Route::get('/logout', 'SuperAdminController@logout');
Route::get('/admin_backend', 'AdminController@index');
Route::get('/dashboard', 'SuperAdminController@index');
Route::post('/admin-dashboard', 'AdminController@dashboard');
Route::get('/manage-order', 'AdminController@manage_order');
Route::get('/view-order/{order_id}', 'AdminController@view_order');
Route::get('/delete-order/{order_id}', 'AdminController@delete_order');


//Category Related Route
Route::get('/add-category', 'CategoryController@index');
Route::get('/all-category', 'CategoryController@all_category');
Route::post('/save-category', 'CategoryController@save_category');
Route::get('/edit-category/{category_id}', 'CategoryController@edit_category');
Route::get('/unactive_category/{category_id}', 'CategoryController@unactive_category');
Route::get('/active_category/{category_id}', 'CategoryController@active_category');
Route::post('/update-category/{category_id}', 'CategoryController@update_category');
Route::get('/delete-category/{category_id}', 'CategoryController@delete_category');


//Brand Related Route
Route::get('/add-brands', 'BrandController@index');
Route::get('/all-brands', 'BrandController@all_brand');
Route::post('/save-brand', 'BrandController@save_brand');
Route::get('/edit-brand/{brand_id}', 'BrandController@edit_brand');
Route::get('/unactive_brand/{brand_id}', 'BrandController@unactive_brand');
Route::get('/active_brand/{brand_id}', 'BrandController@active_brand');
Route::post('/update-brand/{brand_id}', 'BrandController@update_brand');
Route::get('/delete-brand/{brand_id}', 'BrandController@delete_brand');



//Product Routes...............................................................

Route::get('/add-product', 'ProductController@index');
Route::post('/save-product', 'ProductController@save_product');
Route::get('/all-products', 'ProductController@all_product');
Route::get('/edit-product/{product_id}', 'ProductController@edit_product');
Route::get('/unactive_product/{product_id}', 'ProductController@unactive_product');
Route::get('/active_product/{product_id}', 'ProductController@active_product');
Route::post('/update-product/{product_id}', 'ProductController@update_product');
Route::get('/delete-product/{product_id}', 'ProductController@delete_product');



//Slider Routes.....................................................................

Route::get('/add-slider', 'SliderController@index');
Route::get('/all-sliders', 'SliderController@all_sliders');
Route::post('/save-slider', 'SliderController@save_slider');
Route::get('/unactive_slider/{slider_id}', 'SliderController@unactive_slider');
Route::get('/active_slider/{slider_id}', 'SliderController@active_slider');
Route::get('/delete-slider/{slider_id}', 'SliderController@delete_slider');
Route::get('/edit-slider/{slider_id}', 'SliderController@edit_slider');
Route::post('/update-slider/{slider_id}', 'SliderController@update_slider');




//Show Category wise Product Routes..............................................
Route::get('/product_by_category/{category_id}', 'ShowCategoryProductController@index');

//Show Category wise Product Routes..............................................
Route::get('/product_by_brand/{brand_id}', 'ShowBrandProductController@index');

//View Product Routes..............................................
Route::get('/view_product/{product_id}', 'ViewProductController@index');

//Add to Cart Routes..............................................
Route::post('/add-to-cart/', 'AddToCart@index');
Route::get('/show-cart/', 'AddToCart@show_cart');
Route::get('/delete-cart/{rowId}', 'AddToCart@delete_cart');
Route::post('/update-cart/', 'AddToCart@update_cart');


//Checkout Routes..............................................
Route::get('/login-check', 'CheckoutController@login_check');
Route::get('/checkout', 'CheckoutController@checkout');
Route::post('/bill-submit', 'CheckoutController@bill_submit');

//Customer login registration Routes..............................................
Route::post('/customer-registration', 'CustomerController@customer_registration');
Route::get('/customer-logout', 'CustomerController@customer_logout');
Route::post('/customer-login', 'CustomerController@customer_login');

//Route for customer payment..............................................................

Route::get('/payment1', 'CustomerController@payment1');
Route::post('/order-place', 'CustomerController@order_place');



//Route for Payment method...........................................

Route::post('/bkash', 'PaymentController@bkash');

Route::post('/rocket', 'PaymentController@rocket');


Route::get('/wishlist', 'CustomerController@wishlist');