@extends('layouts.app')

@section('content')
<div class="container">
  <div class="justify-content-center">
    @if(!empty($cart) ?? null)
        <div class="row mb-4">
          <div class="col-6"><strong>Product name</strong></div>
          <div class="col-6"><strong>Price</strong></div>
        </div>
    @foreach($cart->cartProduct as $cartProduct)
        <div class="row mb-4">
          <div class="col-6">{{ $cartProduct->product->name }}</div>
          <div class="col-6">{{ number_format($cartProduct->product->price, 2) }}</div>
        </div>

      @endforeach

      {{ Form::open(
        [
        'url' => route('OrderStore'),
        'method' => 'POST'
        ]
      ) }}

      <div class="row col-12">
        <button class="btn btn-success btn-block">
          Place Order
        </button>
      </div>

      {{ Form::close() }}
    @else
    <div class="col-12">
      <h1 class="text-center">
        You have not placed any product in your cart
      </h1>

      <p class="text-center">
        You can add your product 
        <a href="{{ route('ProductIndex') }}">here</a>
      </p>
    </div>
    @endif
  </div>
</div>
@endsection
