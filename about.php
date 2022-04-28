<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <style>
        <?php include "styles.css" ?>
    </style>
</head>

<body>
    <?php
    $minprice = $_SESSION["minprice"];
    $maxprice = $_SESSION["maxprice"];
    $beds = $_SESSION["beds"];
    $baths = $_SESSION["baths"];
    ?>

    <!-- This is how you display HTML based on a condition -->
    <?php if (isset($_SESSION["uid"])) { ?>
        <div class="navbar">
            <div>Welcome <?= ucfirst($_SESSION["type"]) ?> <?= $_SESSION["firstname"] ?></div>
            <div><a href="about.php">About Us </a></div>
            <?php if ($_SESSION["type"] == "buyer") { ?>
                <div>
                    <a href='buyer.php?minprice=<?= $minprice ?>&maxprice=<?= $maxprice ?>&beds=<?= $beds ?>&baths=<?= $baths ?>&Submit=Search'>
                        Dashboard</a>
                </div>
            <?php } else { ?>
                <div><a href="<?= $_SESSION["type"] ?>.php">Dashboard </a></div>
            <?php } ?>
            <?php if ($_SESSION["type"] == "buyer") { ?>
                <div><a href="wishlist.php">Wishlist </a></div>
            <?php } ?>
            <div><a href='logout.php'>Logout</a></div>
        </div>

        <h2>Welcome to JCB Property</h2>
    <?php } else { ?>
        <h2>Welcome to JCB Property</h2>
    <?php } ?>


    <div>
        <ul>
            <li>Description of your project.</li>
            <li>What does your company do?</li>
            <li>What kind of services do you provide?</li>
            <li>Why do they have to choose you over your competitors?</li>
            <li>Anything that you do as a business unit to attract customers.</li>
        </ul>
    </div>


    <?php if (!isset($_SESSION["uid"])) { ?>
        <div id="login-register">
            <a href="login.php"><button>Login</button></a>
            <a href="register.php"><button>Register</button></a>
        </div>
    <?php } ?>

</body>

</html>