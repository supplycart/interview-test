@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    @if($products ?? null)
      @foreach($products as $product)
        <div class="col-12 mb-4">
          {{ Form::open([
            'url' => route('CartStore'),
            'method' => 'POST'
            ]) }}

          <div class="form-row">
            <div class="form-group col-6">{{ $product['name'] }}</div>
            {{ Form::hidden('product_id', $product['product_id']) }}
            <div class="form-group col-6">
            {{ Form::submit('Add to cart', ['class' => 'btn btn-info btn-block']) }}
            </div>
          </div>

        {{ Form::close() }}
        </div>
      @endforeach
    @else
    <div class="col-12">
      <h1>
        There are no products. Kindly add them.
      </h1>
    </div>
    @endif
  </div>
</div>
@endsection
