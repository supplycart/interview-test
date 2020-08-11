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

    public function viewOrder(Request $request){
        $user = auth()->user();
        $boxes = $request->checkbox;

        $products = array();
        foreach ($boxes as $prod_id => $qty) {
            $prod_details = Product::find($prod_id);
            array_push($products, array($prod_details, $qty));
        }
        foreach ($products as $prod){
            print_r($prod[0]->name);
        }
        // print_r($products);
        // return view("order", compact("products"));
    }

    public function addOrder(Request $request){
        // store into order and line_quantity tables
        // cart update checked_out as 1
        // need to store in an array as well
    }
}
