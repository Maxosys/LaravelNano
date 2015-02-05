<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	  $session_id=Session::getId();
	  $allUsers = Product::paginate(6);
	  $products['product'] = DB::table('laravel_products')->paginate(6);
	  $products['category'] = DB::table('laravel_product_category')->get();
	  $products['allproduct']=DB::table('laravel_products')->get();
	  
	  return View::make('index',$products);
});

Route::get('admin','AdminController@adminhome');
Route::post('admin','AdminController@adminhome');
Route::get('dashboard','AdminController@dashboard');
Route::get('login','HomeController@login');
Route::get('register','HomeController@register');
Route::get('logout','HomeController@logout');
Route::post('register','HomeController@register');
Route::get('allnewproducts','ProductController@allnewproducts');
Route::get('profile','HomeController@profile');
Route::post('login','HomeController@login');
Route::get('adminlogout','AdminController@logout');
Route::get('admin_changepwd','AdminController@changepwd');
Route::post('admin_changepwd','AdminController@changepwd');
Route::get('admin_category','AdminController@addcategory');
Route::post('admin_category','AdminController@addcategory');
Route::get('product/{id}','ProductController@product');
Route::get('catproducts/{id}','ProductController@catproducts');
Route::get('contact','HomeController@contact');
Route::get('created','HomeController@created');
Route::get('admin_product','AdminController@showproducts');
Route::get('catproducts/{id}','ProductController@catproducts');
Route::get('admin_addproduct','AdminController@insertproduct');
Route::post('admin_addproduct','AdminController@insertproduct');
Route::get('edit_product/{id}','AdminController@edit_product');
Route::post('edit_product/{id}','AdminController@edit_product');
Route::get('admindelete_product/{id}','AdminController@delete_product');
Route::get('adminpro_approve/{id}','AdminController@approve_product');
Route::get('adminpro_reject/{id}','AdminController@reject_product');
Route::get('admincate_edit/{id}','AdminController@edit_category');
Route::post('admincate_edit/{id}','AdminController@edit_category');

Route::get('admincate_delete/{id}','AdminController@delete_category');
Route::get('allspecialproducts','ProductController@allspecialproducts');
Route::get('forgot','HomeController@forgot');
Route::post('forgot','HomeController@forgot');
Route::get('reset_pwd','HomeController@reset_pwd');
Route::post('reset_pwd','HomeController@reset_pwd');

Route::get('cart','ProductController@cart');
Route::post('addtocart','ProductController@addtocart');
Route::post('success','HomeController@success');
Route::post('cancel','HomeController@cancel');


Route::get('adminapprove_user/{id}','AdminController@approve_user');
Route::get('adminreject_user/{id}','AdminController@reject_user');
Route::get('admindelete_user/{id}','AdminController@delete_user');
Route::get('adminusers','AdminController@users');
Route::post('group_action','AdminController@group_action');
Route::get('shipping/{id}','HomeController@shipping');
Route::post('updatecart/{id}','HomeController@updatecart');

Route::get('adminforgot_pwd','AdminController@forgot_pwd');
Route::post('adminforgot_pwd','AdminController@forgot_pwd');
Route::get('adminreset_password','AdminController@reset_password');
Route::post('adminreset_password','AdminController@reset_password');

Route::get('adminhavecolor','AdminController@havecolor');
Route::get('edit_productcolor/{pro_id}/{cate_id}','AdminController@edit_productcolor');
Route::post('edit_productcolor/{pro_id}/{cate_id}','AdminController@edit_productcolor');
Route::get('delete_productcolor/{clr_id}','AdminController@delete_productcolor');