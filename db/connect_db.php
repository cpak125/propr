<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "project_4";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("<br>Connection failed: " . mysqli_connect_error());
}
// echo "<br>Connected successfully";
