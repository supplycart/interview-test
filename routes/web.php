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

Auth::routes();
Route::get("/", function(){
    return view("landing");
});
Route::get('/home', 'ProductsController@index');
Route::get("/cart", "CartController@index");
Route::get("/add-to-cart/{id}", "CartController@addToCart");
Route::get("/remove-from-cart/{id}", "CartController@removeFromCart");
Route::post("/order", "OrderController@index")->name("checkout");
Route::post("/thankyou", "OrderController@placeOrder")->name("placeOrder");



