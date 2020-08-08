<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    public function displayAll(){
        $products = DB::table("product")->get();
        return view('products', compact("products"));
    }
}
