<?php
// Database connection settings
$host = "localhost";
$user = "root";  // Default XAMPP MySQL user
$password = "";  // Default password is empty
$database = "drive"; // Change this to your actual database name

// Connect to MySQL
$conn = new mysqli($host, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set character encoding
$conn->set_charset("utf8");
?>
