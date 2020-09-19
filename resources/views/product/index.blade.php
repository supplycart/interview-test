<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Product Page</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  </head>
  <body>

    This is the list of product

    <div class="container">
      <div class="row">
        <div class="col-6">This is 1</div>
        <div class="col-6">
          <div class="btn btn-info">View</div>
          <div class="btn btn-danger">Delete</div>
          <div class="btn btn-warning">Add to cart</div>
          <div class="btn btn-success">Buy</div>
        </div>
      </div>
    </div>
  </body>
</html>
