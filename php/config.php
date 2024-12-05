<?php
$servername = "127.0.0.1"; // address for host
$username = "root";         //  MySQL username
$password = "password";      // MySQL password
$dbname = "UniversityDB";   //  database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
