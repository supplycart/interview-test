@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    @if(!$orders->isEmpty() ?? null)
      @foreach($orders as $order)
        <div class="col-12 mb-4">
          <div class="col-6">Order number</div>
          <div class="col-6">{{ $order->order_id }}</div>
        </div>
      @endforeach
    @else
    <div class="col-12">
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
