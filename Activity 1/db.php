<?php
$servername = "localhost";
$username = "root";
$password = ""; // default for XAMPP
$dbname = "registration_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
