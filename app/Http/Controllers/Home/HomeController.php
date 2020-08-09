<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CartItem;
use App\Models\Product;
use App\User;

class HomeController extends Controller
{
    public function hello(){
        //return view("hello") -> with("id", $id);
        $data = config('app.name'); // from config folder
        $user = array("abc","cde","123");
        return view("hello", compact("data", "user"));
    }

    public function relationship(){
        // $id = 1;

        // $customer = User::find($id);
        // echo "<h3>Customer</h3>" . $customer->name;
        // echo "<br>Cart inventory: ";
        // echo $customer->cartItems;

        // $p = Product::find($id);
        // echo "<br>" . $p->cartItems;

        // echo "<br> from cart to customer";
        // echo CartItem::find(1)->customer;

        // echo "<br> from cart to product";
        // echo CartItem::find(2)->product;

        // try to get the details of logged in user, works!!
        echo count(auth()->user()->cartItems);
    

    }

    public function insert(){

    }

    public function edit(){
        
    }

    public function read(){
        
    }

    public function delete(){
        
    }
    
}
