@extends('layouts.master')

@section('title')
    Laravel Shopping Cart
@endsection

@section('content')
    @if(Session::has('cart'))
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <table class="table table-dark">
                    
                    @foreach($products as $product)
                    <tr>
                    <td><strong>{{ $product['item']['title'] }}</strong></td>
                    <td><span class="label label-success">{{ $product['price'] }}</span></td>
                    {{-- <td><button type="button" class="btn btn-warning"><a class="dropdown-item" href="{{ route('product.reduceByOne', ['id' => $product['item']['id']]) }}">Reduce by 1</a></button></td>     --}}
                    <td><button type="button" class="btn btn-danger"><a class="dropdown-item" href="{{ route('product.remove', ['id' => $product['item']['id']]) }}">Remove</a></button></td>
                    <td><span class="badge">{{ $product['qty'] }}</span></td>      
                    </tr>          
                              
                    @endforeach
                    </table>
                
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <strong>Total: RM {{ $totalPrice }}</strong>
            </div>
        </div>
        <hr>
        <div class="row">
            
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3" >
                <a href="{{ route('placeorder') }}" type="button" class="btn btn-success">place Order</a>
                {{-- <a href="{{ route('placeorder') }}" type="button" class="btn btn-success">Plcae order</a> --}}
            </div>
        </div>
    @else
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <h2>No Items in Cart!</h2>
            </div>
        </div>
    @endif
@endsection