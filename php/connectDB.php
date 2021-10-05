<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "id15267713_the_thai_red_cross_db";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully";
?>