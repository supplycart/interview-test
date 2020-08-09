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

Route::get('/', function () { // GET request, homepage link is /
    return view('Unused.welcome'); // will show a view as written in the welcome file
});

// new webpage
Route::get('/contact_us', function () { 
    return "my contact";
});

// callback function = function in another file
Route::get('/hello', 'Home\HomeController@hello');
Route::get('/insert', 'Home\HomeController@insert');
Route::get('/edit', 'Home\HomeController@edit');
Route::get('/read', 'Home\HomeController@read');
Route::get('/delete', 'Home\HomeController@delete');

// auto-generate appropriate HTTP request for CRUD operations
Route::resource('/user', 'Home\UserController');

// route depending on input
Route::get('/post/{id}', function ($id) { 
    return "Post id: " . $id;
});


Route::get("/relationship", "Home\HomeController@relationship");

Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/products', 'ProductsController@displayAll');
// Display all products --> should be moved to /home
Route::get('/home', 'ProductsController@displayAll');


/*
pages i need:
home (login) /
register /
products /
cart
order
orderdone
logout /
*/



