@extends('layouts.app')
@section('content')
<!--this is the first page the user sees after logging in, it shows a list of available products as per instruction-->
@if (session('success'))
<div class="col-sm-12">
    <div class="alert  alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
    </div>
</div>
@endif

<div class="container">
    <div class="row">
        <div class = "col-3 p-5">
            <div><h1>Products</h1></div>
            <div class="products text-center">
        </div>

            @foreach ($products as $product)
              <div class="card">
                <img class="card-img-top" src="{{ asset('/images/'.$product->image) }}" alt="picture of {{$product->name}}">
                <div class="card-body">
                  <h5 class="card-title">{{ $product->name }}</h5>
                  <p class="card-text">{{ $product->description }}</p>
                  <a href="{{ url('add-to-cart/'.$product->id) }}" class="btn btn-primary">Add to cart</a>
                  <div class="price text-success">RM {{ $product->price }}</div>
                </div>
              </div>
            @endforeach

        </div>
    </div>
</div>
@endsection
