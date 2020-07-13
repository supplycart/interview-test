<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style>
        .navi
        {
            float:right;
            background:black;
            width:100%;
        }
        .nav
        {
            font-size: 20px;
        }
        .nav a
        {
            color:#FFFFFF;
        }
        .nav a:hover
        {
            color:#FFFFFF;
            font-weight:bold;
        }
        h2, h2:hover
        {
            color:#FFFFFF;
            font-weight:bold;
            margin:20px;
            cursor:pointer;
        }
        h2 a, h2 a:hover
        {
            color:#FFFFFF;
        }
        .btn1
        {
            background:red;
            border:none;
        }
        .link a:hover
        {
            background:red;
        }
    </style>
<body>
    <div class="navi">
        <h2><a href="dashboard">Laravel</a></h2>
        <ul class="nav justify-content-end">
            <li class="nav-item">
                <a class="nav-link active" href="dashboard">Hi, {{Auth::user()->name}}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="cart"><i class="fa fa-shopping-cart"> Cart</i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="history"><i class="fa fa-history"> Order History</i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="login2"><i class="fa fa-sign-out"> Logout</i></a>
            </li>
        </ul>
    </div>
    <div class="container">
        <div class="jumbotron">
            <h1>{{Auth::user()->name}}'s Cart</h1>
            <br><br>
            @if(!empty($cart))
            <table class="table table-stripped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Image</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Product Description</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total Price</th>
                        <th><th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cartdetails as $cd)
                    <tr>
                        <th><img src="{{ asset('uploads/product/' . $cd->image )}}" width="100px;" height="100px;" alt="Image"></th>
                        <th>{{$cd->productname}}</th>
                        <th>{{$cd->productdesc}}</th>
                        <th>{{$cd->quantity}}</th>
                        <th>RM {{$cd->totalprice}}</th>
                        <th>
                            <a href="{{ url('delete')}}/{{$cd->cartdetails_id}}" class="btn1 btn-danger btn-sm">Delete Item</a>
                        </th>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="4" align="right"><strong>Total Price:</strong></td>
                        <td><strong>RM {{ $cart->totalprice}}</strong></td>
                        <td>
                            <a href="checkout" class="btn btn-success">Check Out</a>
                        </td>
                    </tr>
                </tbody>
            </table>
            @endif
        </div>
    </div>
</body>
</html>