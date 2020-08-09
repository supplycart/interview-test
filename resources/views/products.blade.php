@extends("layouts.page")

@section("header")
<div class="title flex-center">
    All Products
</div>
@endsection

@section('content')
<table>
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
            <td><button>Add to cart</button></td>
        </tr>
        @endforeach
    </tbody>
  </table>
    
@endsection 
