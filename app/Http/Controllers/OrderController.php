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
    public function store(Request $request)
    {
        $user = Auth::user();

        $input = $request->all();

        $cart_id = $input['cart_id'];

        DB::transaction(function () use (
            $user,
            $cart_id
        ) {
            $cart = Cart::where('cart_id', '=', $cart_id)->first();

            $order = Order::firstOrNew([
                'cart_id' => $cart->cart_id,
                'user_id' => $user->id,
            ]);
            $order->status_id = Order::STATUS_PLACED_ORDER;
            $order->save();

            $cart->status_id = Cart::STATUS_PLACED_ORDER;
            $cart->save();
        });

        return route('ProductIndex')
            ->with('Your order has been placed successfully');
    }

    /* public function add(Request $request) { */
    /*     return response()->json([ */
    /*         'order-added' => $request->all() */
    /*     ]); */
    /* } */

    /* public function placeOrder(Request $request) { */
    /*     return response()->json([ */
    /*         'status' => 'Your order has been placed successfully, thank you!' */
    /*     ]); */
    /* } */
}
