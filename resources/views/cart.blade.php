@extends('layouts.app')

@section('title', 'Cart')

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
@section('content')

    <table id="cart" class="table table-hover table-condensed">
        <thead>
        <tr>
            <th style="width:50%">Product</th>
            <th style="width:10%">Price</th>
            <th style="width:8%">Quantity</th>
            <th style="width:22%" class="text-center">Subtotal</th>
            <th style="width:10%"></th>
        </tr>
        </thead>
        <tbody>
          <?php $total = 0 ?>
          @if(session('cart'))
              @foreach(session('cart') as $itemID => $product)

                  <?php $total += $product['price'] * $product['quantity'] ?>

                  <tr>
                      <td data-th="Product">
                          <div class="row">
                              <div class="col-sm-3 hidden-xs"><img src="{{ asset('/images/'.$product['image']) }}.png" width="100" height="100" class="img-responsive"/></div>
                              <div class="col-sm-9">
                                  <h4 class="nomargin">{{ $product['name'] }}</h4>
                              </div>
                          </div>
                      </td>
                      <td data-th="Price">${{ $product['price'] }}</td>
                      <td data-th="Quantity">
                          <input type="number" value="{{ $product['quantity'] }}" class="form-control quantity" />
                      </td>
                      <td data-th="Subtotal" class="text-center">${{ $product['price'] * $product['quantity'] }}</td>
                      <!--<td class="actions" data-th="">
                          <button class="btn btn-info btn-sm update-cart" data-id="{{ $itemID }}"><i class="fa fa-refresh"></i></button>
                          <button class="btn btn-danger btn-sm remove-from-cart" data-id="{{ $itemID }}"><i class="fa fa-trash-o">Delete</i></button>
                      </td>-->
                  </tr>
              @endforeach
          @endif

        </tbody>
        <tfoot>

        <tr>
            <td><a href="{{ route('home') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
            <td colspan="2" class="hidden-xs"></td>
            <td class="hidden-xs text-center"><strong>Total: RM {{ $total }}</strong></td>
        </tr>
        </tfoot>
    </table>
    <?php session(['total' => $total]);?>

    <a href="{{ route('checkout.index') }}" class="btn btn-success btn-lg btn-block">Proceed To Checkout</a>

@endsection
@section('scripts')

<!--
    <script type="text/javascript">

        public function update(Request $request)
        {
            if($request->id and $request->quantity)
            {
                $cart = session()->get('cart');

                $cart[$request->id]["quantity"] = $request->quantity;

                session()->put('cart', $cart);

                session()->flash('success', 'Cart updated successfully');
            }
        }


        $(".remove-from-cart").click(function (e) {
            e.preventDefault();

            var ele = $(this);

            if(confirm("Are you sure")) {
                $.ajax({
                    url: '{{ url('remove-from-cart') }}',
                    method: "DELETE",
                    data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                    success: function (response) {
                        window.location.reload();
                    }
                });
            }
        });

    </script>
-->
@endsection
