@extends('layouts.app')

@section('content')
<div class="container">
  <div class="justify-content-center">
    @if(!$orders->isEmpty() ?? null)
      @foreach($orders as $order)
        <div class="card">
          <div class="cart-body">
            <div class="row">
              <div class="col-6">Order number</div>
              <div class="col-6">{{ $order->order_id }}</div>
            </div>
            <div class="row">
              <div class="col-6">Ordered date</div>
              <div class="col-6">{{ $order->created_at->format('d/m/y') }}</div>
            </div>
          </div>
        </div>
        <div class="row mb-4">
        </div>
      @endforeach
    @else
    <div class="row col-12">
      <h1 class="text-center">
        You have not placed any order
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
