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
        a, a:hover
        {
            color:#FFFFFF;
        }
    </style>
  </head>
  <body>
    <div class="navi">
    <h2><a href="dashboard" >Laravel</a></h2>
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
            <h1>Order History</h1>
            <br><br>
            @if(!empty($orderhistory))
            <table class="table table-stripped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Image</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Product Description</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price</th>
                        <th scope="col">Order Date & Time</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orderhistory as $oh)
                    <tr>
                        <th><img src="{{ asset('uploads/product/' . $oh->image )}}" width="100px;" height="100px;" alt="Image"></th>
                        <th>{{$oh->productname}}</th>
                        <th>{{$oh->productdesc}}</th>
                        <th>{{$oh->quantity}}</th>
                        <th>RM {{$oh->totalprice}}</th>
                        <th>{{$oh->created_at}}</th>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>
    </div>
    


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>