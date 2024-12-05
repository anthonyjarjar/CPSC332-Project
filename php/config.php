<?php
$servername = "127.0.0.1"; // Use "127.0.0.1" instead of "localhost" for XAMPP
$username = "root";         // Your MySQL username
$password = "password";             // Your MySQL password
$dbname = "UniversityDB";   // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
