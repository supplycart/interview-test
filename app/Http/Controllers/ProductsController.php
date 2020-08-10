<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Product;
use App\Models\CartItem;

class ProductsController extends Controller
{
    /**
     * Will only display products page if user has logged in.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $products = Product::orderby("name", "asc")->get();
        return view('products', compact("products"));
    }

    public function addToCart($product_id){
        // add the product into cartItem table

        $user = auth()->user();
        $product = Product::find($product_id);
        $currentCart = $user->cartItems->where("checked_out", "=", 0);

        // check whether the product already existed in user's cart 
        if (count($currentCart->where("prod_id", "=", $product_id)) == 0) {
            // does not exist, add product to cart normally
            $cartItem = CartItem::create([
                "user_id"=>$user->id,
                "prod_id"=>$product->id
            ]);
            $cartItem->save();
            return redirect()->back()->with("success", "Product added to cart successfully!");
    
        } else {
            // has already existed, does not add to user's cart
            return redirect()->back()->with("fail", "Product has already been added before!");
        }        
    }
}
