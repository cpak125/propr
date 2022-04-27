<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Property</title>
</head>

<body>
    <?php
    include 'db/connect_db.php';
    $propId = $_GET["propId"];

    $sql = "DELETE FROM Property WHERE propId='$propId'";

    if (mysqli_query($conn, $sql)) {
        header("location:seller.php");
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
        echo "Property could not be deleted";
    }

    mysqli_close($conn);
    ?>

</body>

</html>