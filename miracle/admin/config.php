<?php
$servername = "127.0.0.1";
$username = "root";  // default XAMPP username
$password = "";      // default XAMPP password is empty
$port = 3307;        // your MySQL port
$dbname = "miraclesports_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
