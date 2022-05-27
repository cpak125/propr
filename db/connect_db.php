<?php
/* For local connection */
// $servername = "localhost";
// $username = "root";
// $password = "root";
// $dbname = "project_4";

/* Create connection */
// $conn = mysqli_connect($servername, $username, $password, $dbname);

//Get Heroku ClearDB connection information
$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$cleardb_server = $cleardb_url["host"];
$cleardb_username = $cleardb_url["user"];
$cleardb_password = $cleardb_url["pass"];
$cleardb_db = substr($cleardb_url["path"], 1);
$active_group = 'default';
$query_builder = TRUE;

// Connect to DB
$conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);



// Check connection
if (!$conn) {
    die("<br>Connection failed: " . mysqli_connect_error());
}
// echo "<br>Connected successfully";
