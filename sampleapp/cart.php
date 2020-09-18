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

  $total_cost = 0;
  $product_list = [];
  $qty_list = [];
  $cost_list = [];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Cart</title>
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
                    <?php $product_list[] = $cart_item['id'];
                          $qty_list[] = $cart_item['qty'];
                          $cost_list[] = $cart_item['qty']*$cart_item['price'];
                    ?>
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
                <th scope="col">
                    $<?php echo $total_cost ?>
                    <div>
                        <form action="cart.php" method="POST">
                            <?php foreach ($product_list as $key => $item) {
                                echo '<input type="hidden" name="result[]" value="'. $item. '">';
                                echo '<input type="hidden" name="qty[]" value="'. $qty_list[$key]. '">';
                                echo '<input type="hidden" name="costs[]" value="'. $cost_list[$key]. '">';
                            } 
                                unset($item)
                            ?>
                            <input type="hidden" value=<?php echo $total_cost; ?> name='total_cost'>
                            <button type="submit" class="btn btn-primary" name="order">Check Out!</button>
                        </form> 
                    </div>
                </th>
            </tr>
        </tbody>
    </table>
    <p> <a href="index.php">Back</a> </p>
    <form action="cart.php" method="POST">
        <button type="submit" name="history">History</button>
    </form>
    <p> <a href="index.php?logout='1'" style="color: red;">Logout</a> </p>
    
</body>
</html>