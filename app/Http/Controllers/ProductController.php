<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
        $products = collect([
            [
                'name' => 'apple'
            ],
            [
                'name' => 'oranges'
            ],
            [
                'name' => 'banana'
            ],
            [
                'name' => 'pineapple'
            ],
            [
                'name' => 'watermelon'
            ],
            [
                'name' => 'keys'
            ],
            [
                'name' => 'padlock'
            ],
            [
                'name' => 'bucket'
            ],
            [
                'name' => 'papers'
            ],
            [
                'name' => 'shoes'
            ],
            [
                'name' => 'car'
            ],
            [
                'name' => 'house'
            ],
            [
                'name' => 'lamp'
            ],
        ]);
        return view('product.index', [
            'products' => $products
        ]);
    }
}
