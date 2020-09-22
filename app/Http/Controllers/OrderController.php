<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $order = Order::where('user_id', '=', $user->id)
            ->whereIn('status_id', [
                Order::STATUS_PLACED_ORDER,
            ])
            ->get();

        return view('order.history', [
            'orders' => $order
        ]);
    }

    /**
     * Confirmed placed order
     *
     */
    public function store()
    {
        $user = Auth::user();

        $cart = Cart::where('status_id', '=', Cart::STATUS_NEW)
            ->first();

        if (empty($cart)) {
            return redirect()
                ->route('ProductIndex')
                ->with('error', 'You have empty cart, please add products into your cart');
        }

        DB::transaction(function () use (
            $user,
            $cart
        ) {
            $order = Order::firstOrNew([
                'cart_id' => $cart->cart_id,
                'user_id' => $user->id,
            ]);
            $order->status_id = Order::STATUS_PLACED_ORDER;
            $order->save();

            $cart->status_id = Cart::STATUS_PLACED_ORDER;
            $cart->save();
        });

        return redirect()
            ->route('ProductIndex')
            ->with('success', 'You have succesfully placed an order!');
    }
}
