<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class CartController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function displayCart(){
        // from cart -> get a list of products that have not been checked out -> get a list of prod name
        // what if cart is empty?
        echo auth()->user()->cartItems;
        $user_cart = User::find(1)->cartItems;
        foreach ($user_cart as $key => $value) {
            echo "<br>" . $value->id;
        }
        
    }

}
