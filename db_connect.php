<?php
// Database configuration
$host = "localhost";
$user = "root";        // Default WAMP username
$password = "";         // Default WAMP password (empty)
$database = "bmi_calculator";

// Create connection
$conn = mysqli_connect($host, $user, $password, $database);

// Check connection
if (mysqli_connect_error()) {
    die("Connection failed: " . mysqli_connect_error());
}

// Set charset to UTF-8
mysqli_set_charset($conn, "utf8");
?>