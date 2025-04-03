<?php
$servername = "127.0.0.1"; // Change to your database host if needed
$username = "root"; // Change if using another username
$password = ""; // Change if you have a MySQL password
$database = "software_exhibition"; // Your database name

// Create database connection
$conn = new mysqli($servername, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}