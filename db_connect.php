<?php
$servername = "db"; // Docker service name for MariaDB
$username = "root";
$password = "pass123";
$dbname = "Book_heaven"; // Ensure this matches the database name in Docker

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
