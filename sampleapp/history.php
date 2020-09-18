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
    <title>History</title>
</head>
<body>
    <h2>Order History</h2>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Products Ordered</th>
                <th scope="col">Total Cost</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($_SESSION['history_order_items'] as $key=>$old_order) :?>
                <tr>
                    <th scope="row"><?php echo $key+1; ?></th>
                    <td>
                        <?php foreach ($old_order['products'] as $old_order_items) :?>
                            <p><?php echo $old_order_items['prod_name'] . " x".$old_order_items['quantity'] ?></p>
                        <?php 
                            unset($old_order_items);
                        endforeach ?>
                    </td>
                    <td>$<?php echo $old_order['total_cost']; ?></td>
                </tr>
            <?php 
                unset($old_order);
            endforeach ?>
        </tbody>
    </table>
    <p> <a href="index.php">Back</a> </p>
    <p> <a href="index.php?logout='1'" style="color: red;">Logout</a> </p>
    
</body>
</html>