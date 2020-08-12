<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Order;
use App\Models\LineQuantity;
use App\Models\CartItem;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){
        $user = auth()->user();
        $boxes = $request->checkbox;

        $products = array();
        foreach ($boxes as $prod_id => $qty) {
            $prod_details = Product::find($prod_id);
            array_push($products, array($prod_details, $qty));
        }
        return view("order", compact("products"));
    }

    public function placeOrder(Request $request){
        // store into order and line_quantity tables
        // cart update checked_out as 1
        // decrement qty_in_stock by qty amount 
        // display thank you for shopping with us page
    }
}
