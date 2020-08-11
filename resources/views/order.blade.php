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
        {{-- $products is a list of lists --}}
        @foreach ($products as $product)
        @php
            $price = $product->price_per_unit;
            $price = number_format((float)$price, 2, ".", "");
        @endphp
        <tr>
            <td>{{$product->name}}</td>
            <td>{{$product->description}}</td>
            <td>{{$price}}</td>
            <td><a href={{url('add-to-cart/'.$product->id)}} class="btn text-center trigger-pop-up">Add to cart</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection