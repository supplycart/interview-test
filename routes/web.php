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
})->name('welcome');

Auth::routes(['verify' => true]);

Route::get('/home', function() {
    return redirect()->route('ProductIndex');
});

Route::group([
    'middleware' => ['auth', 'verified']
], function(){
    Route::group([
        'prefix' => 'product'
    ], function () {
        Route::get('/{attribute_id?}', [ProductController::class, 'index'])->name('ProductIndex');
    });

    Route::group([
        'prefix' => 'cart'
    ], function () {
        Route::get('/', [CartController::class, 'index'])->name('CartIndex');
        Route::post('/add-to-cart', [CartController::class, 'store'])->name('CartStore');
    });

    Route::group([
        'prefix' => 'order'
    ], function() {
        Route::get('/', [OrderController::class, 'index'])->name('OrderIndex');
        Route::post('/placed-order', [OrderController::class, 'store'])->name('OrderStore');
    });
});

Route::fallback(function() {
    return redirect()->route('welcome');
});
