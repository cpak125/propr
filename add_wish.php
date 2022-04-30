<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Wish</title>
    <link href="styles/styles.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <?php
    include 'db/connect_db.php';
    $propId = $_GET["propId"];
    $buyerId = $_SESSION["uid"];
    $minprice = $_SESSION["minprice"];
    $maxprice = $_SESSION["maxprice"];
    $beds =  $_SESSION["beds"];
    $baths = $_SESSION["baths"];

    $sql = mysqli_query($conn, "SELECT * FROM Wishlist WHERE buyerId = '$buyerId' AND propId = '$propId' ");

    if (mysqli_num_rows($sql)) {
        echo "<div class='error'><p>You already added this to your Wishlist</p>
                <a href='buyer.php?minprice=$minprice&maxprice=$maxprice&beds=$beds&baths=$baths&Submit=Search'>
                    <input type='button' value='Return'></input>
                </a>
            </div>";
        exit(-1);
    }

    $sql = "INSERT INTO Wishlist (buyerId, propId)
            VALUES('$buyerId', '$propId')";

    if (mysqli_query($conn, $sql)) {
        header("location:buyer.php?minprice=$minprice&maxprice=$maxprice&beds=$beds&baths=$baths&Submit=Search");
    } else {
        echo "$sql: " . mysqli_error($conn);
        echo "Property could not be added to your Wishlist";
    }

    mysqli_close($conn);
    ?>
</body>

</html>