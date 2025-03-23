<?php
$servername = "localhost";  // Change this if using a different server
$username = "root";         // Change to your database username
$password = "";             // Change to your database password
$dbname = "software_exhibition";  // Database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
