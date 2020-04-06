<?php

namespace App\Http\Controllers;
use App\Order;
use App\OrderItem;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('checkout');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $cart = session()->get('cart');

        $order_number = 'ORD-'.strtoupper(uniqid());

        $order = Order::create([
        'order_number'      =>  $order_number,
        'user_id'           =>  auth()->user()->id,
        //'status'            =>  'pending',
        'grand_total'       =>  session()->get('total'),
        //'item_count'        =>  Cart::getTotalQuantity(),
        //'payment_status'    =>  0,
        //'payment_method'    =>  null,
        'name'              =>  auth()->user()->name,
        'address'           =>  $request['address'],
        'city'              =>  $request['city'],
        'country'           =>  $request['country'],
        'post_code'         =>  $request['post_code'],
        'phone_number'      =>  $request['phone_number'],
        'notes'             =>  $request['notes']
      ]);

      foreach ($cart as $itemID => $product) {

          $orderItem = OrderItem::create([
            'order_id'      =>  $order->id,
            'product_id'    =>  $product['id'],
            'quantity'      =>  $product['quantity'],
            'price'         =>  $product['price'],

          ]);
      }

      session()->forget('cart');
      return redirect('home')->with('success', 'Order completed!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
