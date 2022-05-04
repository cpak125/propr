<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="styles/styles.css" rel="stylesheet" type="text/css" />
    <link href="styles/all.css" rel="stylesheet" type="text/css" />
</head>

<?php

$firstname = $_SESSION["firstname"];
$type = $_SESSION["type"];
$minprice = $_SESSION["minprice"];
$maxprice = $_SESSION["maxprice"];
$beds = $_SESSION["beds"];
$baths = $_SESSION["baths"];

if (isset($_SESSION["uid"])) { ?>
    <div class="navbar">
        <h3>PropR</h3>
        <div>Welcome <?= $firstname ?>&nbsp;(<?= ($type) ?>)</div>
        <div><a href="about.php">About Us </a></div>
        <?php if ($type == "buyer") { ?>
            <div>
                <a href='buyer.php?minprice=<?= $minprice ?>&maxprice=<?= $maxprice ?>&beds=<?= $beds ?>&baths=<?= $baths ?>&Submit=Search'>
                    Dashboard</a>
            </div>
        <?php } else { ?>
            <div><a href="<?= $type ?>.php">Dashboard </a></div>
        <?php } ?>
        <?php if ($type == "buyer") { ?>
            <div><a href="wishlist.php">Wishlist </a></div>
        <?php } ?>
        <div><a href='logout.php'><i class="fa-solid fa-right-from-bracket"></i>Logout</a></div>
    </div>

<?php } else { ?>
    <div class="navbar">
        <h3>PropR</h3>
        <div><a href="about.php">About Us </a></div>
        <div id="login-register">
            <a href="login.php"><button>Login</button></a>
            <a href="register.php"><button>Sign Up</button></a>
        </div>
    </div>
<?php } ?>

</html>