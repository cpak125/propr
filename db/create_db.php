<?php
include 'connect_db.php';

// Create database
// $sql = "CREATE DATABASE IF NOT EXISTS project_4";

// if (mysqli_query($conn, $sql)) {
//     echo "<br>Database created successfully";
// } else {
//     echo "<br>Error creating database: " . mysqli_error($conn);
// }

//



// Create User table
$sql = "CREATE TABLE IF NOT EXISTS User (
            uid INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
            email VARCHAR(50),
            password VARCHAR(40),
            firstname VARCHAR(30) NOT NULL,
            lastname VARCHAR(30) NOT NULL,
            type VARCHAR(10))";

if ($conn->query($sql) === TRUE) {
    echo "<br>Table Users created successfully";
} else {
    echo "<br>Error creating table: " . $conn->error;
}

// Create Property table
$sql = "CREATE TABLE IF NOT EXISTS Property (
            propId INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
            sellerId INT(6),
            city_state VARCHAR(30),
            street VARCHAR(30),
            zip VARCHAR(30),
            squareFt INT(11),
            type VARCHAR(30),
            bed INT(11),
            bath INT(11),
            price INT(11),
            imgURL VARCHAR(30))";

if (mysqli_query($conn, $sql)) {
    echo "<br>Table Property created successfully";
} else {
    echo "<br>Error creating table: " . mysqli_error($conn);
}

// Create Wishlist table
$sql = "CREATE TABLE IF NOT EXISTS Wishlist (
            wishId INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            buyerId INT(6),
            propId INT(6)
      )";

if (mysqli_query($conn, $sql)) {
    echo "<br>Table Wishlist created successfully";
} else {
    echo "<br>Error creating table: " . mysqli_error($conn);
}

// $sql = "INSERT INTO  User (firstname, lastname, type, email, password)
//         VALUES('Chris', 'Pak', 'admin', 'Chris@admin.com', md5('admin'))";

// if (mysqli_query($conn, $sql)) {
//     echo "<br>admin inserted";
// } else {
//     echo mysqli_error($conn);
// }


mysqli_close($conn);
