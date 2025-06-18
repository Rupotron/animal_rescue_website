<?php
// Database configuration
$host = "localhost";         // or 127.0.0.1
$db_name = "animal_rescue";  // Your database name
$username = "root";          // Your DB username (default for localhost is 'root')
$password = "";              // Your DB password (empty for localhost unless set)

// Create database connection
$conn = new mysqli($host, $username, $password, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
