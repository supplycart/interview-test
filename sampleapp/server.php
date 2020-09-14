<?php 
session_start();

$errors = [];
$db_owner = "PuvanRaj";

// Connect to the DB
$db = pg_connect("host=localhost dbname=supplycart user=$db_owner");

// Test Connections
if (!$db) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}


// User Registration
if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $conf_password = $_POST['c_password'];

    

    $new_user = array(
        'username' => $username,
        'email' => $email,
        'pw' => $password
    );
    // $new_user = pg_convert($db, 'users', $vals);

    $new_user['pw'] = md5($new_user['pw']);
        
    $res = pg_insert($db, 'users', $new_user);
}
// User Log In


?>