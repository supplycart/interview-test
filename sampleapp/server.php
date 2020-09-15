<?php 
session_start();

$errors = [];
$db_owner = "PuvanRaj";


// Connect to the DB
$db = pg_connect("host=localhost dbname=supplycart user=$db_owner");

// Test Connection
if (!$db) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}


// User Registration
if (isset($_POST['register'])) {
    // Create variables w user form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $conf_password = $_POST['c_password'];

    // Blank field error handling
    if (empty($username)) { array_push($errors, "Username cannot be blank"); }
    if (empty($email)) { array_push($errors, "Email cannot be blank"); }
    if (empty($password)) { array_push($errors, "Password cannot be blank"); }
    
    // Password confirmation failure
    if ($password != $conf_password) {
        array_push($errors, "Passwords do not match");
        // echo "Passwords do not match";
    }

    // Array for inserting data into database
    $new_user = array(
        'username' => $username,
        'email' => $email,
        'pw' => $password
    );
    // $new_user = pg_convert($db, 'users', $vals);

    // Existing User/Email error handling
    $check_user = pg_query($db, "SELECT * FROM users WHERE username='{$new_user['username']}' OR email='{$new_user['email']}' LIMIT 1");
    $check_user_result = pg_fetch_assoc($check_user);
    if ($check_user_result) { // if user exists
        if ($check_user_result['username'] === $new_user['username']) {
          array_push($errors, "Username already exists");
        //   echo "Username already exists";
        }
    
        if ($check_user_result['email'] === $new_user['email']) {
          array_push($errors, "email already exists");
        //   echo "Email already exists";
        }
    }

    // If no errors, insert data into database
    if (count($errors) == 0) {
        // Encrypt password prior to database entry
        $new_user['pw'] = md5($new_user['pw']);

        $res = pg_insert($db, 'users', $new_user);
        $_SESSION['username'] = $new_user['username'];
        $_SESSION['success'] = "You are now logged in";
        header('location: index.php');
        // if ($res) {
        //     echo "POST data is successfully logged\n";
        // } else {
        //     echo "User must have sent wrong inputs\n";
        // }
    }
}
// User Log In
if (isset($_POST['login'])) {
    echo $errors[0];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $password = md5($password);
    // Find user
    $find_user = pg_query($db, "SELECT * FROM users WHERE username='{$username}' AND pw='{$password}'");

    // Blank field error handling
    if (empty($username)) {
        array_push($errors, "Username is required");
        // echo "Username is required";
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
        // echo "Password is required";
    }

    /*
        If statement provides additional layer of checks
        in case of any errors in the database. Due to registration
        error handling, usernames should be unique
    */

    if (pg_num_rows($find_user) == 1) { 
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now logged in";
        $_SESSION['products'] = pg_fetch_all(pg_query($db, "SELECT * FROM products"));
  	    header('location: index.php');
    } else {
        array_push($errors, "Incorrect username/password");
        // echo "Incorrect username/password";
    }
}

// Filling the cart
if (isset($_POST['add'])) {
    $id = $_POST['id'];
    $product_name = $_POST['product_name'];
    $product_description = $_POST['product_description'];
    $price = $_POST['price'];
    $qty = $_POST['qty'];
    $new = true;

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    
    foreach ($_SESSION['cart'] as $key=>$cart_item) {
        if ($id == $cart_item['id']) {
            $qty += $cart_item['qty'];
            $new = false;
            $temp = $key;
        break;
        }
    }

    
    $new_cart_item = [
        'id' => $id,
        'product_name' => $product_name,
        'product_description' => $product_description,
        'price' => $price,
        'qty' => $qty
    ];
    
    if ($new) {
        array_push($_SESSION['cart'],$new_cart_item);
    } else {
        $_SESSION['cart'][$key] = $new_cart_item;
    }

    

}


?>