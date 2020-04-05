<?php

namespace App\Http\Controllers;
use App\Order;
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
        $order = Order::create([
        'order_number'      =>  'ORD-'.strtoupper(uniqid()),
        'user_id'           =>  auth()->user()->id,
        //'status'            =>  'pending',
        'grand_total'       =>  session()->get('total'),
        //'item_count'        =>  Cart::getTotalQuantity(),
        //'payment_status'    =>  0,
        //'payment_method'    =>  null,
        'first_name'        =>  $params['first_name'],
        'last_name'         =>  $params['last_name'],
        'address'           =>  $params['address'],
        'city'              =>  $params['city'],
        'country'           =>  $params['country'],
        'post_code'         =>  $params['post_code'],
        'phone_number'      =>  $params['phone_number'],
        'notes'             =>  $params['notes']
      ]);

      return redirect()->back()->with('success', 'Order completed!');
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
