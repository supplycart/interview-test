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
        @endphp
        @foreach ($products as $product)
        @php
            $details = $product[0];
            $qty = (integer)$product[1];
            $total_price = $qty*((float)$details->price_per_unit);
            $total_price = number_format((float)$total_price, 2, ".", "");
            $subtotal += $total_price;
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

{{-- payment form --}}
<form action="{{route()}}" method="POST">

</form>
@endsection