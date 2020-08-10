@extends("layouts.app")
<head>
    <title>My Cart</title>
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
    My Cart
</div>
@endsection

@section("content")
{{-- if cart is empty --}}

{{-- if cart is not empty --}}
<table id="cart">
    <thead>
      <tr>
        <th></th>
        <th><strong>Product Name</strong></th>
        <th><strong>Unit Price</strong></th>
        <th><strong>Quantity</strong></th>
        <th><strong>Price</strong></th>
      </tr>
    </thead>
    <tbody class=capitalize>
        @foreach ($productsInCart as $product)
        @php
            $price = $product->price_per_unit;
            $price = number_format((float)$price, 2, ".", "");
        @endphp
        <tr>
            <td><a href={{url("remove-from-cart/".$product->id)}} class="btn text-center">Remove</a></td>
            <td>{{$product->name}}</td>
            <td>{{$price}}</td>
            <td>
                <div id="quantity">
                <input type=button value="-" id="plus{{$product->id}}" onclick="minus({{$product->id}}, {{$price}})">
                    <span id="qty{{$product->id}}">1</span>
                <input type=button value="+" id="minus{{$product->id}}" onclick="add({{$product->id}}, {{$product->qty_in_stock}}, {{$price}})">
                </div>
            </td>
        <td><p id="totalprice{{$product->id}}">{{$price}}</p></td> 
        </tr>
        @endforeach
    </tbody>
</table>

{{-- checkout button --}}

<script>
    function update_tot_price(qty, unit_price){
        return parseFloat(qty*unit_price).toFixed(2)
    }

    function minus(id, unit_price){
        var qty = document.getElementById("qty"+id)
        var qty_val = parseInt(qty.innerHTML)

        var tot_price = document.getElementById("totalprice"+id)

        if (qty_val-1 <= 1){
            qty.innerHTML = 1
            tot_price.innerHTML = parseFloat(unit_price).tofixed(2)
        }else{
            qty_val = qty_val - 1
            qty.innerHTML = qty_val
            tot_price.innerHTML = update_tot_price(qty_val, unit_price)
        }
    }

    function add(id, stock_qty, unit_price){
        var qty = document.getElementById("qty"+id)
        var qty_val = parseInt(qty.innerHTML)

        var tot_price = document.getElementById("totalprice"+id)
        
        if (qty_val+1 > stock_qty){
            qty.innerHTML = stock_qty
            tot_price.innerHTML = update_tot_price(stock_qty, unit_price)
            alert("Sorry, not enough stock!")
        }else{
            qty_val = qty_val + 1
            qty.innerHTML = qty_val
            tot_price.innerHTML = update_tot_price(qty_val, unit_price)
        }
    }
</script>


@endsection