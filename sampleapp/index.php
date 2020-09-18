<?php 
  session_start(); 
  include('server.php');

  if (!isset($_SESSION['username'])) {
      $_SESSION['msg'] = "You must log in first";
  	  header('location: login.php');
  } 

  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Home</title>
</head>
<body>
    <h2>WELCOME <?php echo $_SESSION['username']; ?></h2>
    <div class="row">
        <?php foreach ($_SESSION['products'] as $product) :?>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $product['product_name']; ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted">$<?php echo $product['price']; ?></h6>
                        <p class="card-text"><?php echo $product['product_description']; ?></p>
                        <form action="index.php" method="POST">
                            <label for=<?php echo $product['id'];?> Example select</label>
                            <select class="form-control" id=<?php echo $product['id'];?> name="qty">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                            <input type="hidden" value=<?php echo $product['id']; ?> name='id'>
                            <input type="hidden" value=<?php echo $product['product_name']; ?> name='product_name'>
                            <input type="hidden" value=<?php echo $product['product_description']; ?> name='product_description'>
                            <input type="hidden" value=<?php echo $product['price']; ?> name='price'>
                            <button type="submit" class="btn btn-primary" name="add">Add To Cart</button>
                        </form>
                    </div>
                </div>
            </div>
        <?php 
            unset($product);
        endforeach ?>
    </div>

    <p> <a href="cart.php">View Cart</a> </p>
    <form action="cart.php" method="POST">
        <button type="submit" name="history">History</button>
    </form>
    <p> <a href="index.php?logout='1'" style="color: red;">Logout</a> </p>
    
</body>
</html>