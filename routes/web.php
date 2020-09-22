<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group([
    'prefix' => 'product'
], function () {
    Route::get('/', [ProductController::class, 'index'])->name('ProductIndex');
});

Route::group([
    'prefix' => 'cart'
], function () {
    Route::post('/add-to-cart', [CartController::class, 'store'])->name('CartStore');
});

Route::group([
    'prefix' => 'order'
], function() {
    Route::get('/', [OrderController::class, 'index'])->name('OrderIndex');
    Route::post('/placed-order', [OrderController::class, 'store'])->name('OrderStore');
});
