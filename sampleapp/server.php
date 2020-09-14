<?php 
session_start();

$username = "";
$password = "";
$errors = [];

// Connect to the DB
$db = pg_connect("host=localhost dbname=supplycart user=PuvanRaj");

// Test Connections
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
  }

// User Registration

// User Log In


?>