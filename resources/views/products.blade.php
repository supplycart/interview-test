@extends("layouts.app")
<head>
  <title>Product Catalogue</title>
  <style>
    html, body {
            background-color: #fff;
            color: #2d3336;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }
    table, th, td {
        border:1px solid black;
        border-collapse: collapse;
        margin-left:auto;
        margin-right:auto;
    }
    th, td {
        padding:4px;
    }
    .title {
        font-size: 48px;
    }
    .capitalize {
        text-transform:capitalize;
    }
    .flex-center {
        align-items: center;
        display: flex;
        justify-content: center;
    }
  </style>
</head>


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
