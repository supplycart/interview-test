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

{{-- ??pop up notification that shows whether product is successfully added --}}
{{-- <div id="pop-up" class="popUpBox">
  <span class="helper"></span>
  <div>
    <div class="popupCloseButton">&times;</div>
    
  </div>
</div> --}}
{{-- 
@if(session("success"))
  <script>
    alert("Product added to cart successfully!");
  </script>
@else
  <script>
    alert("Product has already been added before!");
  </script>
@endif --}}

@endsection

{{-- .popUpBox {
  background:rgba(0,0,0,.4);
  cursor:pointer;
  display:none;
  height:100%;
  position:fixed;
  text-align:center;
  top:0;
  width:100%;
  z-index:10000;
}
.popUpBox .helper{
  display:inline-block;
  height:100%;
  vertical-align:middle;
}
.popUpBox > div{
  background-color: #fff;
  box-shadow: 10px 10px 60px #555;
  display: inline-block;
  height: auto;
  max-width: 551px;
  min-height: 100px;
  vertical-align: middle;
  width: 60%;
  position: relative;
  border-radius: 8px;
  padding: 15px 5%;
}
.popupCloseButton {
  background-color: #fff;
  border: 3px solid #999;
  border-radius: 50px;
  cursor: pointer;
  display: inline-block;
  font-weight: bold;
  position: absolute;
  top: -20px;
  right: -20px;
  font-size: 25px;
  line-height: 30px;
  width: 30px;
  height: 30px;
  text-align: center;
}
.popupCloseButton:hover {
  background-color: #ccc;
}
.trigger-pop-up{
cursor:pointer;
} --}}