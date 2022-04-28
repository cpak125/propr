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
    <div class='navbar'>
        <div>Welcome Admin, <?= $_SESSION["firstname"] ?></div>
        <div><a href="admin.php">Dashboard </a></div>
        <div><a href="about.php">About Us </a></div>
        <div><a href='logout.php'>Logout</a></div>
    </div>

    <?php
    include 'db/connect_db.php';

    // Find out total number of houses currently in DB
    $sql = "SELECT  (SELECT COUNT(*) FROM User) AS total_users,
                    (SELECT COUNT(*) FROM User WHERE type='buyer') AS total_buyers,
                    (SELECT COUNT(*) FROM User where type='seller') AS total_sellers,
                    (SELECT COUNT(*) FROM Wishlist) AS total_wishes,
                    (SELECT MAX(price) FROM Property) AS highest_price,
                    (SELECT MIN(price) FROM Property) AS lowest_price,
                    (SELECT SUM(price) FROM Property) AS total_value;";

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    mysqli_close($conn);
    ?>
    <p><?= $row["total_users"] ?></p>
    <p><?= $row["total_sellers"] ?></p>
    <p><?= $row["total_buyers"] ?></p>
    <p><?= $row["total_wishes"] ?></p>

</body>

</html>