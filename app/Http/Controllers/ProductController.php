<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
class ProductController extends Controller
{
    
    public function index($product_id)
    {
        $product = Admin::where('product_id', $product_id)->first();

        return view('productdetail', compact('product'));
    }

    
}
