<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buyer Dash</title>
    <link href="styles/styles.css" rel="stylesheet" type="text/css" />
    <link href="styles/all.css" rel="stylesheet" type="text/css" />
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
    <h2 class="center">Search</h2>
    <form id="search" method="get" action="">

        <div>
            <label for="minprice">&nbsp;&nbsp;Min. Price</label>
            <div>$<input type="text" name="minprice" id="minprice" value="<?= $_GET['minprice'] ?>" placeholder="200,000" required></div>
        </div>

        <div>
            <label for="maxprice">&nbsp;&nbsp;Max Price</label>
            <div> $<input type="text" name="maxprice" id="maxprice" value="<?= $_GET['maxprice'] ?>" placeholder="400,000" required></div>
        </div>

        <div>
            <label for="beds">Beds</label>
            <select id="beds" name="beds" required>
                <option value="" disabled selected>Bedrooms</option>
                <option <?php if ($_GET['beds'] == '1') { ?>selected="true" <?php }; ?> value="1">1+</option>
                <option <?php if ($_GET['beds'] == '2') { ?>selected="true" <?php }; ?> value="2">2+</option>
                <option <?php if ($_GET['beds'] == '3') { ?>selected="true" <?php }; ?> value="3">3+</option>
                <option <?php if ($_GET['beds'] == '4') { ?>selected="true" <?php }; ?> value="4">4+</option>
                <option <?php if ($_GET['beds'] == '5') { ?>selected="true" <?php }; ?> value="5">5+</option>
                <option <?php if ($_GET['beds'] == '6') { ?>selected="true" <?php }; ?>value="6">6+</option>
            </select>
        </div>
        <div>
            <label for="baths">Baths</label>
            <select id="baths" name="baths" required>
                <option value="" disabled selected>Bathrooms</option>
                <option <?php if ($_GET['beds'] == '1') { ?>selected="true" <?php }; ?> value="1">1+</option>
                <option <?php if ($_GET['beds'] == '2') { ?>selected="true" <?php }; ?> value="2">2+</option>
                <option <?php if ($_GET['beds'] == '3') { ?>selected="true" <?php }; ?> value="3">3+</option>
                <option <?php if ($_GET['beds'] == '4') { ?>selected="true" <?php }; ?> value="4">4+</option>
                <option <?php if ($_GET['beds'] == '5') { ?>selected="true" <?php }; ?> value="5">5+</option>
                <option <?php if ($_GET['beds'] == '6') { ?>selected="true" <?php }; ?> value="6">6+</option>
            </select>
        </div>
        <div>
            <input class="green" name="Submit" type="submit" value="Search">
        </div>
    </form>
    </div>

    <div id="prop-container">
        <?php
        include 'db/connect_db.php';

        if (isset($_GET['Submit'])) {
            $minprice = isset($_GET['minprice']) ? str_replace(',', '', $_GET['minprice']) : '';
            $maxprice = isset($_GET['maxprice']) ?  str_replace(',', '', $_GET['maxprice']) : '';
            $beds = isset($_GET['beds']) ? $_GET['beds'] : '';
            $baths = isset($_GET['baths']) ? $_GET['baths'] : '';

            $_SESSION["minprice"] = number_format($minprice);
            $_SESSION["maxprice"] = number_format($maxprice);
            $_SESSION["beds"] = $beds;
            $_SESSION["baths"] = $baths;
        }

        $sql = "SELECT * FROM Property WHERE price >= '$minprice' 
                AND price <= '$maxprice'
                AND bed >= '$beds'
                AND bath >= '$baths'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
        ?>
                <div class="cards">
                    <!-- attach  propID through URL -->
                    <a href="property.php?propId=<?= $row['propId'] ?>">
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
        }

        mysqli_close($conn);
        ?>

    </div>

    <script>
        <?php include 'main.js' ?>
    </script>
</body>

</html>