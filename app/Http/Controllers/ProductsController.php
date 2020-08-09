<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\ProductModel;

class ProductsController extends Controller
{
    public function displayAll(){
        $products = ProductModel::orderby("name", "asc")->get();
        return view('products', compact("products"));
    }
}
