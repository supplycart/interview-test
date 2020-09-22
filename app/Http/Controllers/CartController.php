<?php

namespace App\Http\Controllers;

use App\Cart;
use App\CartProduct;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Add to cart
     *
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        $input = $request->all();

        $cart = Cart::firstOrCreate([
            'user_id' => $user->id,
            'status_id' => Cart::STATUS_NEW,
        ]);
        $product = Product::where('product_id', '=', $input['product_id'])->first();

        $CartProduct = CartProduct::create([
            'cart_id' => $cart->cart_id,
            'product_id' => $product->product_id,
        ]);


        return redirect()
            ->back()
            ->with('success', 'Successfully added to cart!');
    }
}
