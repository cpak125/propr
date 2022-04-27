<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        <?php include "styles.css" ?>
    </style>
</head>

<body>
    <?php
    $uid = $_SESSION["uid"];
    $firstname = $_SESSION["firstname"];
    ?>

    <div class='navbar'>
        <div>Welcome Admin, <?= $_SESSION["firstname"] ?></div>
        <div><a href="admin.php">Dashboard </a></div>
        <div><a href="about.php">About Us </a></div>
        <div><a href='logout.php'>Logout</a></div>
    </div>

</body>

</html>