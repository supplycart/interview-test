@extends("layouts.app")
<head>
    <title>My Order</title>
</head>

@section("header")
<div class="title flex-center">
    My Order
</div>
@endsection

@section("content")
<table id="orders">
    <thead>
      <tr>
        <th><strong>Product Name</strong></th>
        <th><strong>Quantity</strong></th>
        <th><strong>Total Price</strong></th>
      </tr>
    </thead>
    <tbody class=capitalize>
        @php
            $subtotal = 0;
            $order = array();
        @endphp
        @foreach ($products as $product)
        @php
            $details = $product[0];
            $qty = (integer)$product[1];
            $total_price = $qty*((float)$details->price_per_unit);
            $total_price = number_format((float)$total_price, 2, ".", "");

            $subtotal += $total_price;
            array_push($order, array($details->id, $qty));
        @endphp
        <tr>
            <td>{{$details->name}}</td>
            <td class=number>{{$qty}}</td>
            <td class=number>{{$total_price}}</td>
        </tr>
        @endforeach
        <tr>
            <td ><strong>Subtotal:</strong></td>
            <td></td>
            <td class=number>
                @php
                    $subtotal = number_format((float)$subtotal, 2, ".", "");
                @endphp
                {{$subtotal}}
            </td>
    </tbody>
</table>
<br>
<br>
{{-- payment form --}}
<div class="justify-content-center row">
    <div class=col-md-8>
        <div class=card>
            <div class=card-header>Payment</div>
            <div class="card-body">
                <form action="{{route("placeOrder")}}" method="POST">
                    {{csrf_field()}}
                    <div class="form-group row">
                        <label for="addr" class="col-md-2 col-form-label text-md-right">Shipping Address</label>
                        <div class="col-md-6">
                            <textarea id="addr" name="addr" cols=100></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="card" class="col-md-2 col-form-label text-md-right">Card Number</label>
                        <div class="col-md-6">
                            <input type="text" id="card" name="card"><br>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="expire" class="col-md-2 col-form-label text-md-right">Expiry Date</label>
                        <div class="col-md-6">
                            <input type="text" id="expire" name="expire"><br>
                        </div>
                    </div>

                    <input type="hidden" name="orders" value="{{json_encode($order, TRUE)}}">

                    <div class="col-md-4 offset-md-2">
                        <input type="submit" class="btn btn-primary" value="Confirm Order">  
                    </div>    
                </form>
            </div>
        </div>
    </div>
</div>
@endsection