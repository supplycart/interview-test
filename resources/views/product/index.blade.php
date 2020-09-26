@extends('layouts.app')
<style>
{{-- * { --}}
{{--   border: 1px red solid; --}}
{{-- } --}}
</style>
@section('content')
  <div class="container">
    {{ Form::open([
      'url' => route('ProductIndex'),
      'method' => 'GET',
    ]) }}

    <div class="row form-group">
      <div class="col-12 contol-label">
        {{ Form::label('attribute', 'Prouct filter') }}
      </div>
      <div class="col-12">
        <div class="input-group">
          {{ Form::select('attribute', 
            $attribute_filter->merge([
              '' => 'All'
            ]),
              '',
              [
                'class' => 'form-control form-control-lg'
              ]
            ) }}

            <div class="input-group-addon input-group-button">
              {{ Form::submit('filter', 
                [
                  'class' => 'btn btn-info btn-lg'
                ]) }}
            </div>
        </div>
      </div>
    </div>
    {{ Form::close() }}

    <div class="top-right"></div>

    @if($products ?? null)
      <?php 
        $productChunk = $products->chunk(3)
      ?>
      @foreach($productChunk as $products)
        <div class="row d-flex flex-row justify-content-start mb-4">
          @foreach($products as $product)
            <div class="card col-4">
              <img class="img-top" 
                   src="{{ $product['ImagePath'] }}"
                   alt="{{ $product['name'] }}"
                   height="150" 
                   width="150" >
                   <div class="card-body">
                     <h4 class="card-title">{{ $product['name'] }}</h4>
                     <p class="card-text">{{ $product['description'] }}</p>
                     {{ Form::open([
                       'url' => route('CartStore'),
                       'method' => 'POST'
                     ]) }}
                     {{ Form::hidden('product_id', $product['product_id']) }}
                     {{ Form::submit('Add to cart', ['class' => 'btn
                     btn-outline-primary btn-block']) }}
                     {{ Form::close() }}
                   </div>
            </div>
          @endforeach
        </div>
      @endforeach
    @else
      <div class="col-12">
        <h1>
          There are no products. At least one product is required.
        </h1>
      </div>
    @endif
  </div>

@if(Session::has('success'))
  <div class="toast"
       role="alert" 
       aria-live="assertive"
       aria-atomic="true"
       data-delay="2000" 
       style="position: absolute; top: 40; right: 0;" >
       <div class="toast-header">
         <strong class="mr-auto">Success</strong>
         <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="toast-body">
         {{ Session::get('success') }}
       </div>
  </div>

  <script>
    window.addEventListener('load', function() {
      console.log('hello');
      $('.toast').toast('show');
    });
  </script>
  <?php
    Session::forget('success');
  ?>
@endif

@endsection
