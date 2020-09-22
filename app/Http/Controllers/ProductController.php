<?php

namespace App\Http\Controllers;

use App\Product;

class ProductController extends Controller
{
    /**
     * Display availble products
     *
     */
    public function index()
    {
        $products = Product::all();

        return view('product.index', [
            'products' => $products
        ]);
    }
}
