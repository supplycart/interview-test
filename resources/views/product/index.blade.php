@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    @if($products ?? null)
      @foreach($products as $product)
        <div class="row col-12 mb-4">
          <div class="col-6">{{ $product['name'] }}</div>
          {{ Form::open([
            'url' => route('ProductStore')
            ]) }}

          {{ Form::hidden('product_id', $product['product_id']) }}
          {{ Form::submit('Add to cart', ['class' => 'col-6 btn btn-info']) }}
        <!-- <div class="col-6 btn btn-info">Add to cart</div> -->
        {{ Form::close() }}
        </div>
      @endforeach
    @else
    <div class="col-12">
      'There are no products'
    </div>
    @endif
  </div>
</div>
@endsection
