<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wishlist</title>
    <script src="https://kit.fontawesome.com/0016bfb6b4.js" crossorigin="anonymous"></script>
    <link href="styles.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <?php
    $minprice = $_SESSION["minprice"];
    $maxprice = $_SESSION["maxprice"];
    $beds = $_SESSION["beds"];
    $baths = $_SESSION["baths"];
    ?>

    <div class='navbar'>
        <h3>PropR</h3>
        <div>Welcome <?= $_SESSION["firstname"] ?> &nbsp;(<?= ($_SESSION["type"]) ?>)</div>
        <div><a href="about.php">About Us </a></div>
        <div>
            <a href='buyer.php?minprice=<?= $minprice ?>&maxprice=<?= $maxprice ?>&beds=<?= $beds ?>&baths=<?= $baths ?>&Submit=Search'>
                Dashboard</a>
        </div>
        <div><a href="wishlist.php">My Wishlist </a></div>
        <div><a href='logout.php'><i class="fa-solid fa-right-from-bracket"></i>Logout</a></div>
    </div>
    <h2 class="center">Wishlist</h2>
    <div id="prop-container">
        <?php
        include 'db/connect_db.php';

        $buyerId = $_SESSION["uid"];

        $sql = "SELECT property.*, wishlist.* FROM user 
                INNER JOIN wishlist ON user.uid = wishlist.buyerId 
                INNER JOIN property ON wishlist.propId = property.propId
                WHERE wishlist.buyerId='$buyerId'";

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