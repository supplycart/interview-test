<?php

namespace App\Http\Controllers;

use App\Product;

class ProductController extends Controller
{
    public function index() {
        $products = Product::all();

        return view('product.index', [
            'products' => $products
        ]);
    }
}
