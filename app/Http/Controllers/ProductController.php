<?php

namespace App\Http\Controllers;

use App\Attribute;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display availble products
     *
     */
    public function index(Request $request)
    {
        $input = $request->all();

        $productQuery = new Product;
        if (array_key_exists('attribute', $input)) 
        {
            $attributeId = $input['attribute'];
            $attribute = Attribute::whereIn('name', [$attributeId])
                ->with([
                    'attributeProduct'
                ])
                ->get();

            $attributeProductIds = $attribute
                ->map(function ($attribute, $key) {
                    return $attribute->attributeProduct->pluck('product_id');
                })
                ->first();

            if (!empty($attributeProductIds)) {
                $productQuery = $productQuery->whereIn('product_id', $attributeProductIds);
            }
        }

        $products = $productQuery->get();

        return view('product.index', [
            'products' => $products
        ]);
    }
}
