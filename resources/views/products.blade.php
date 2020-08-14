@extends("layouts.app")
<head>
  <title>Product Catalogue</title>
</head>

@section("header")
<div class="title flex-center">
    All Products
</div>
@endsection

@section('content')
<table id="products">
    <thead>
      <tr>
        <th><strong>Product Name</strong></th>
        <th><strong>Product Description</strong></th>
        <th><strong>Price</strong></th>
        <th></th>
      </tr>
    </thead>
    <tbody class=capitalize>
        @foreach ($products as $product)
        @php
            $price = $product->price_per_unit;
            $price = number_format((float)$price, 2, ".", "");
        @endphp
        <tr>
            <td>{{$product->name}}</td>
            <td>{{$product->description}}</td>
            <td>{{$price}}</td>
            <td>
              @if ($product->qty_in_stock <= 0)
                Out of Stock!
              @else
                <a href={{url('add-to-cart/'.$product->id)}} class="btn btn-primary text-center trigger-pop-up">Add to cart</a>
              @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection