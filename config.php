<?php
// Establishes a connection to a MySQL database using the mysqli extension.
$servername = "localhost";
$username = "root";
$password = "dealerswarehouse";
$dbname = "customer_manager";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>