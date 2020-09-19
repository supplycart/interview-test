<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index() {
        return 'List of ordered items here, perhaps History';
    }

    public function add(Request $request) {
        return response()->json([
            'order-added' => $request->all()
        ]);
    }

    public function placeOrder(Request $request) {
        return response()->json([
            'status' => 'Your order has been placed successfully, thank you!'
        ]);
    }
}
