<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <?php
    include 'db/connect_db.php';
    $propId = $_GET["propId"];

    $sql = "SELECT imgURL FROM Property WHERE propId=$propId";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $imgURL = $row["imgURL"];

    $sql = "DELETE FROM Property WHERE propId='$propId'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_query($conn, $sql)) {
        $path = "img";
        $filename =  $path . "/" .  $imgURL;

        if (file_exists($filename)) {
            unlink($filename);
        }

        header("location:seller.php");
        exit;
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
        echo "Property could not be deleted";
    }

    mysqli_close($conn);
    ?>

</body>

</html>