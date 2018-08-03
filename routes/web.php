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

//FrontEnd Section
Route::get('/','HomeController@index');
Route::get('/product_by_category/{category_id}','HomeController@product_by_category');
Route::get('/product_by_manufacture/{manufacture_id}','HomeController@product_by_manufacture');
Route::get('/view_product/{product_id}','HomeController@product_details_by_id');
Route::post('/add_to_cart','CartController@add_to_cart');
Route::get('/show_cart','CartController@show_cart');
Route::get('/delete_to_cart/{rowId}','CartController@delete_to_cart');
Route::post('/update_cart','CartController@update_cart');

Route::get('/login_check','CheckoutController@login_check');
Route::post('/customer_registation','CheckoutController@customer_registation');
Route::get('/checkout','CheckoutController@checkout');
Route::post('/save_shipping_details','CheckoutController@save_shipping_details');
Route::get('/customer_logout','CheckoutController@customer_logout');
Route::post('/customer_login','CheckoutController@customer_login');
Route::get('/payment','CheckoutController@payment');
Route::post('/order_place','CheckoutController@order_place');


















//BackEnd Section Strat==========================================


// Start Admin==================================================
Route::get('/admin','AdminController@index');
Route::post('/admin_dashboard','AdminController@admin_dashboard');
Route::get('/dashboard','SuperAdminController@index');

//Admin logout
Route::get('/logout','SuperAdminController@logout');
// End Admin==================================================



// Start Category==================================================
 
Route::get('/add_category','CategoryController@index');
Route::post('/save_category','CategoryController@save_category');
Route::get('/all_category','CategoryController@all_category');

//Category Active/Unactive
Route::get('/unactive/{category_id}','CategoryController@unactive');
Route::get('/active/{category_id}','CategoryController@active');

//Category Edit/Update
Route::get('/edit_category/{category_id}','CategoryController@edit_category');
Route::post('/update_category/{category_id}','CategoryController@update_category');

//Category Delete 
Route::get('/delete_category/{category_id}','CategoryController@delete_category');

//End Category==================================================




//Manufacture Area Strart==================================================

//Add Manufacture route is here
Route::get('/add_manufacture','ManufactureController@index');
Route::post('/save_manufacture','ManufactureController@save_manufacture');

//All Manufacture route is here
Route::get('/all_manufacture','ManufactureController@all_manufacture');

//Active/Deactive menufacture item route is here
Route::get('/manufacture_unactive/{manufacture_id}','ManufactureController@manufacture_unactive');
Route::get('/manufacture_active/{manufacture_id}','ManufactureController@manufacture_active');

//Edit Manufacture function is here
Route::get('/edit_manufacture/{manufacture_id}','ManufactureController@edit_manufacture');
Route::post('/update_manufacture/{manufacture_id}','ManufactureController@update_manufacture');

//Delete Manufacture function is here
Route::get('/delete_manufacture/{manufacture_id}','ManufactureController@delete_manufacture');
//Manufacture Area End==================================================



//Product Area Strart==================================================

//Add product function is here
Route::get('/add_product','ProductController@add_product');
Route::post('/save_product','ProductController@save_product');

//All Product Function is here
Route::get('/all_product','ProductController@all_product');

//Active/Deactive menufacture item route is here
Route::get('/unactive_product/{product_id}','ProductController@unactive_product');
Route::get('/active_product/{product_id}','ProductController@active_product');

//Edit product Route is here
Route::get('/edit_product/{product_id}','ProductController@edit_product');
Route::post('/update_product/{product_id}','ProductController@update_product');

//Delete product Rotue is here
Route::get('/delete_product/{product_id}','ProductController@delete_product');
//Product Area Strart==================================================




//Slider Area Strart==================================================
Route::get('/add_slider','SliderController@add_slider');
Route::post('/save_slider','SliderController@save_slider');
Route::get('/all_slider','SliderController@all_slider');
Route::get('/unactive_slider/{slider_id}','SliderController@unactive_slider');
Route::get('/active_slider/{slider_id}','SliderController@active_slider');
Route::get('/delete_slider/{slider_id}','SliderController@delete_slider');

//Order Area Start
Route::get('/manage_order','OrderController@mange_order');
Route::get('/view_order/{order_id}','OrderController@view_order');
Route::get('/delete_order/{order_id}','OrderController@delete_order');
Route::get('/unactive_order/{order_id}','OrderController@unactive_order');
Route::get('/active_order/{order_id}','OrderController@active_order');







