<?php
$servername = "localhost";
$username = "cpak8"; // change to your GSU username
$password = "cpak8"; // change to your GSU username
$dbname = "cpak8"; // change to your GSU username

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("<br>Connection failed: " . mysqli_connect_error());
}
// echo "<br>Connected successfully";
