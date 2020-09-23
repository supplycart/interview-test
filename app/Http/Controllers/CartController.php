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
     * Display carts, and option to place order
     *
     */
    public function index()
    {
        $user = Auth::user();

        $cart = Cart::where('user_id', '=', $user->id)
            ->whereIn('status_id', [
                Cart::STATUS_NEW,
            ])
            ->with([
                'cartProduct',
                'cartProduct.product'
            ])
            ->first();

        return view('cart.checkout', [
            'cart' => $cart
        ]);
    }

    /**
     * Add to cart
     *
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        $input = $request->all();

        $product = Product::where('product_id', '=', $input['product_id'])
            ->first();

        if (empty($product)) {
            return redirect()
                ->route('ProductIndex')
                ->with('error', 'Product ID not found!');
        }

        $cart = Cart::firstOrCreate([
            'user_id' => $user->id,
            'status_id' => Cart::STATUS_NEW,
        ]);
        CartProduct::create([
            'cart_id' => $cart->cart_id,
            'product_id' => $product->product_id,
        ]);

        $flashMessage = collect([
            'Successfully added',
            $product->name,
            'to cart!',
        ])
        ->implode(' ');

        return redirect()
            ->back()
            ->with('success', $flashMessage);
    }
}
