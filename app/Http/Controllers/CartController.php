<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Models\Product;
use App\Models\CartItem;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $user = auth()->user();

        $productsInCart = DB::table("cart_item")
                        ->where("user_id", "=", $user->id)
                        ->where("checked_out", "=", 0)
                        ->join("product", "cart_item.prod_id", "=", "product.id")
                        ->select("product.id", "product.name", "product.price_per_unit", "product.qty_in_stock")
                        ->get();

        // handle the case where cart is empty?
        return view("cart", compact("productsInCart"));
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

    public function removeFromCart($product_id){
        $user = auth()->user();
        // delete records from database
        CartItem::where("user_id", "=", $user->id)
                ->where("prod_id", "=", $product_id)
                ->where("checked_out", "=", 0)
                ->delete();
       
        return redirect("cart");
    }
}
