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
        $user = auth()->user();
        $orders = json_decode($request->orders);

        foreach ($orders as $order => $details) {
            $prod_id = $details[0];
            // update checked_out status of products in user's cart
            DB::table("cart_item")->where("user_id", "=", $user->id)
                                ->where("checked_out", "=", 0)
                                ->where("prod_id", "=", $prod_id)
                                ->update(["checked_out" => 1]);  
        }

        // store order record into order table
        $newOrder = Order::create([
            "user_id" => $user->id,
            "subtotal" => $this->calculateSubtotal($orders)
        ]);
        $newOrder->save();   

        // record the order details (product ordered & quantity) in line_quantity table
        $this->recordLineQuantity($orders, $newOrder);

        return view("thankyou");
    }

    protected function calculateSubtotal($orders){
        $subtotal = 0;
        foreach ($orders as $order => $details) {
            $prod_id = $details[0];
            $unit_price = Product::find($prod_id)->price_per_unit;
            $qty = (integer) $details[1];
            $subtotal += ($unit_price*$qty);
        }
        return $subtotal;
    }

    protected function recordLineQuantity($orders, $newOrder){
        foreach ($orders as $order => $details) {
            $prod_id = $details[0];
            $qty = (integer) $details[1];

            $newOrderLine = LineQuantity::create([
                "order_id" => $newOrder->id,
                "prod_id" => $prod_id,
                "quantity" => $qty
            ]);
            $newOrderLine->save();

            // decrement product's qty_in_stock by qty amount 
            $product = Product::find($prod_id)->decrement("qty_in_stock", $qty);
        }
    }

    
}
