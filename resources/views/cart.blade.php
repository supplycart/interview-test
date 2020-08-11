@extends("layouts.app")
<head>
    <title>My Cart</title>
</head>

@section("header")
<div class="title flex-center">
    My Cart
</div>
@endsection

@section("content")
{{-- if cart is empty --}}

{{-- if cart is not empty --}}
<form action="{{route('checkout')}}" name="order" method="post">
    {{ csrf_field() }}
    <table id="cart">
        <thead>
        <tr>
            <th></th>
            <th><strong>Product Name</strong></th>
            <th><strong>Unit Price</strong></th>
            <th><strong>Quantity</strong></th>
            <th><strong>Price</strong></th>
            <th></th>
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
            <td>
                <input type=checkbox id="checkbox{{$product->id}}" name="checkbox[{{$product->id}}]" value=1>
            </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{-- checkout button --}}
    <input type="submit" value="Check Out">
</form>

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
        // change the value of checkout checkbox
        var chkbox = document.getElementById("checkbox"+id)
        chkbox.value = qty_val

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
        // change the value of checkout checkbox
        var chkbox = document.getElementById("checkbox"+id)
        chkbox.value = qty_val
    }
</script>


@endsection