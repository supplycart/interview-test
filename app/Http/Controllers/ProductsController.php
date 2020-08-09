<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductsController extends Controller
{
    public function displayAll(){
        $products = Product::orderby("name", "asc")->get();
        return view('products', compact("products"));
    }
}
