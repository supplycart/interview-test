<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('login1');
});



Route::get('login1','AuthController@index');
Route::post('post-login','AuthController@postlogin');
Route::get('register1', 'AuthController@register');
Route::post('post-register', 'AuthController@postRegister');
Route::get('dashboard', 'AuthController@dashboard');
Route::get('login2', 'AuthController@logout');
Route::get('confirmation', 'AuthController@confirmation');
Route::get('admin', 'AdminController@index');
Route::post('addimage','AdminController@store')->name('addimage');
Route::get('dashboard','AdminController@display');
Route::get('cart','CartController@index');
Route::get('cart','CartController@display');

//Route::get('productdetail/{product_id}','ProductController@index');

Route::post('addtocart/{product_id}','CartController@cart');
Route::get('delete/{cartdetails_id}','CartController@delete');
Route::get('placeorder','CartController@placeorder');
Route::get('checkout','CartController@checkout');
Route::get('history','CartController@orderhistory');
Route::get('successorder','CartController@successorder');
Route::post('change/{id}','CartController@change');
//Route::get('checkout','CartController@check_out');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
