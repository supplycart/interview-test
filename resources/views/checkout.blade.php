<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Check Out</title>

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
    </style>
  </head>
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
            <h1>Check Out</h1>
            <br><br>
            <table class="table table-stripped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Profile Details</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Full Name:</td>
                        <td>{{Auth::user()->name}}</td>
                    </tr>
                    <tr>
                        <td>Email Address:</td>
                        <td>{{Auth::user()->email}}</td>
                    </tr>
                    <tr>
                        <td>Phone Number:</td>
                        <td>{{Auth::user()->phone}}</td>
                    </tr>
                    <tr>
                        <td>Deliver To:</td>
                        <td>{{Auth::user()->homeaddress}}</td>
                    </tr>
                    <tr>
                        <td>Change Home Address:</td>
                        <td>
                            <form action="{{ url('change')}}/{{ $user->id }}" method="post">
                            @csrf
                                <input type="text" name="homeaddress" class="form-control" required="" autocomplete="off">
                                <br>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
            <table class="table table-stripped table-bordered">
                <h3>Item Details</h3>
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Image</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Product Description</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price</th>
                        <th></th>
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
                    </tr>
                    @endforeach
                    
                    <tr>
                        <td colspan="4" align="right"><strong>Total Price:</strong></td>
                        <td><strong>RM {{ $cart->totalprice}}</strong></td>
                        <td>
                            <a href="placeorder" class="btn btn-success">Place Order</a>
                        </td>
                    </tr>
                    
                </tbody>
            </table>
        </div>
    </div>
    


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>