<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wishlist</title>
    <link href="styles/styles.css" rel="stylesheet" type="text/css" />
    <link href="styles/all.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <?php
    include 'navbar.php'
    ?>

    <div id="prop-container">
        <?php
        include 'db/connect_db.php';

        $buyerId = $_SESSION["uid"];

        $sql = "SELECT Property.*, Wishlist.* FROM User 
                INNER JOIN Wishlist ON User.uid = Wishlist.buyerId 
                INNER JOIN Property ON Wishlist.propId = Property.propId
                WHERE Wishlist.buyerId='$buyerId'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
        ?>
                <div class="cards">
                    <!-- attach  propID through URL -->
                    <a href="property.php?propId=<?= $row['propId'] ?>&wishable=false">
                        <img src="img/<?= $row["imgURL"] ?>" alt="property photo">
                        <div class="cards-container">
                            <p><span class="bold">City, State: </span><?= $row["city_state"] ?></p>
                            <p><span class="bold">Price: </span>$ <?= number_format($row["price"]) ?></p>
                            <p><span class="bold">Bedrooms: </span><?= $row["bed"] ?></p>
                            <p><span class="bold">Bathrooms:</span> <?= $row["bath"] ?></p>
                        </div>
                    </a>
                </div>
            <?php
            }
        } else { ?>
            <p>Nothing in your Wishlist</p>

        <?php
        }
        mysqli_close($conn);
        ?>
    </div>

</body>

</html>