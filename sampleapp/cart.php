<?php 
  session_start();


  if (!isset($_SESSION['username'])) {
      $_SESSION['msg'] = "You must log in first";
  	  header('location: login.php');
  } 

  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }

  $total_cost = 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Login</title>
</head>
<body>
    <h2>WELCOME <?php echo $_SESSION['username']; ?></h2>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Product</th>
                <th scope="col">Unit Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Subtotal</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($_SESSION['cart'] as $key=>$cart_item) :?>
                <tr>
                    <th scope="row"><?php echo $key+1; ?></th>
                    <td><?php echo $cart_item['product_name']; ?></td>
                    <td>$<?php echo $cart_item['price']; ?></td>
                    <td><?php echo $cart_item['qty']; ?></td>
                    <td>$<?php  
                            $total_cost += $cart_item['qty']*$cart_item['price'];
                            echo $cart_item['qty']*$cart_item['price']; 
                         ?>
                    </td>
                </tr>
            <?php 
                unset($cart_item);
            endforeach ?>
            <tr>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col">Total:</th>
                <th scope="col">$<?php echo $total_cost ?></th>
            </tr>
        </tbody>

    <p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
    
</body>
</html>