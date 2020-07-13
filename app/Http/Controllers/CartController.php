<?php

namespace App\Http\Controllers;
use App\Admin;
use App\CartDetails;
use App\Cart;
use App\Order;
use App\User;
use Auth;
use Alert;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        return view('cart');
    }

    public function successorder()
    {
        return view('successorder');
    }

    public function cart(Request $request, $product_id)
    {
        $product = Admin::where('product_id', $product_id)->first();

        if($request->quantity > $product->stock || $request->quantity < 1 )
        {
            return redirect ('dashboard');
        }

        $checkcart = $new_cart = Cart::where('id', Auth::user()->id)->where('status',0)->first();

        if(empty($checkcart))
        {
            $cart = new Cart;
            $cart->id = Auth::user()->id;
            $cart->status = 0;
            $cart->totalprice = 0;
            $cart->save();
        }
        
        $new_cart = Cart::where('id', Auth::user()->id)->where('status',0)->first();
        $checkcartdetails = CartDetails::where('product_id', $product->product_id)->where('cart_id',
            $new_cart->cart_id)->first();
        if(empty($checkcartdetails))
        {
            $cartdetails = new CartDetails;
            $cartdetails->id = Auth::user()->id;
            $cartdetails->cart_id = $new_cart->cart_id;
            $cartdetails->product_id = $product->product_id;
            $cartdetails->image = $product->image;
            $cartdetails->productname = $product->productname;
            $cartdetails->productdesc = $product->productdesc;
            $cartdetails->quantity = $request->quantity;
            $cartdetails->totalprice = $product->price*$request->quantity;
            $cartdetails->save();
        } 
        else 
        {
                
                $cartdetails = CartDetails::where('cart_id', $new_cart->cart_id)->where('product_id', $product_id)->first();
                $cartdetails->quantity = $cartdetails->quantity+$request->quantity;
                $newcartdetailsprice = $product->price*$request->quantity;
                $cartdetails->totalprice =$cartdetails->totalprice+$newcartdetailsprice;
                
                $cartdetails->update();
            
        }

        
        

        
        
        $cart = Cart::where('id', Auth::user()->id)->where('status',0)->first();
        $cart->totalprice = $cart->totalprice+$product->price*$request->quantity;
        $cart->update();
        
        return redirect('cart');
    }

    public function display()
    {
        
        $user = Auth::user();

        
        $cart = Cart::where('id', Auth::user()->id)->where('status',0)->first();
        $cartdetails = CartDetails::where('id',$user->id)->orderBy('id','desc')->get();
        return view('cart', compact('user','cartdetails','cart'));
    }

    public function delete($cartdetails_id)
    {
        
        $cartdetails = CartDetails::where('cartdetails_id', $cartdetails_id)->first();
        $cart = Cart::where('cart_id', $cartdetails->cart_id)->first();
        $cart->totalprice = $cart->totalprice-$cartdetails->totalprice;
        $cart->update();

        $cartdetails = CartDetails::where('cartdetails_id', $cartdetails_id)->delete();

        

        return redirect ('cart');
    }
/*
    public function check_out()
    {
        $cart = Cart::where('id', Auth::user()->id)->where('status',0)->first();
        if(!empty($cart))
        {
            $cartdetails = CartDetails::where('cart_id', $cart->cart_id)->get();
        }
        
        return view('checkout', compact('cart','cartdetails'));
    }
*/
    
    public function checkout()
    {
        $user = Auth::user();

        $cart = Cart::where('id', Auth::user()->id)->where('status',0)->first();
        $cartdetails = CartDetails::where('id',$user->id)->orderBy('id','desc')->get();
        return view('checkout', compact('user','cartdetails','cart'));
    }
    
    public function placeorder()
    {
        $cart = Cart::where('id', Auth::user()->id)->where('status',0)->first();
        $cart_id = $cart->cart_id;
        $cart->status = 1;
        $cart->update();
        
        
        $cartdetails = CartDetails::where('cart_id', $cart_id)->get();
        foreach ($cartdetails as $cartdetail)
        {
            $product = Admin::where('product_id', $cartdetail->product_id)->first();
            $product->stock = $product->stock-$cartdetail->quantity;
            $product->update();
        }

        $cartdetails = CartDetails::where('id', Auth::user()->id)->first();
        $order = new Order;
        $order->id = Auth::user()->id;
        $order->cart_id = $cartdetails->cart_id;
        $order->cartdetails_id = $cartdetails->cartdetails_id;
        $order->product_id = $cartdetails->product_id;
        $order->image = $cartdetails->image;
        $order->productname = $cartdetails->productname;
        $order->productdesc = $cartdetails->productdesc;
        $order->quantity = $cartdetails->quantity;
        $order->totalprice = $cartdetails->totalprice;
        $order->save();

        $cart = CartDetails::where('id', Auth::user()->id)->delete();

        return redirect('successorder');
    }
    
    public function orderhistory()
    {
        
        $user = Auth::user();

        
        //$cart = Cart::where('id', Auth::user()->id)->where('status',0)->first();
        $orderhistory = Order::where('id',$user->id)->orderBy('id','desc')->get();
        return view('orderhistory', compact('user','orderhistory'));
    }

    public function change(Request $request, $id)
    {
        $user = Auth::user();

        $users = User::where('id', Auth::user()->id)->first();

        $changehome = User::where('id', Auth::user()->id)->where('homeaddress', $users->homeaddress)->first();
        $changehome->homeaddress = $request->homeaddress;
        $changehome->update();

        return redirect('checkout');
    }
    
}
