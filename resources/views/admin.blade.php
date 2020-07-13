<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="jumbotron">
            <h1>Hi, Admin</h1>
            <form action="{{ route('addimage')}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                    <label>Product Name</label>
                    <input type="text" name="productname" class="form-control" placeholder="Enter Product Name">
                </div>
                <div class="form-group">
                    <label>Product Description</label>
                    <input type="text" name="productdesc" class="form-control" placeholder="Enter Product Description">
                </div>
                <div class="form-group">
                    <label>Product Stock</label>
                    <input type="text" name="stock" class="form-control" placeholder="Enter Product Stock">
                </div>
                <div class="form-group">
                    <label>Product Price</label>
                    <input type="text" name="price" class="form-control" placeholder="Enter Product Price">
                </div>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" name="image" class="custom-file-input">
                        <label class="custom-file-label">Choose File</label>
                    </div>
                </div>
                <br><br>
                <button type="submit" name="submit" class="btn btn-primary">Add Product</button>
            </form>
        </div>
    </div>
</body>
</html>