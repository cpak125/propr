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

    <!-- This is how you display HTML based on a condition -->
    <?php if (isset($_SESSION["uid"])) { ?>
        <div class="navbar">
            <h3>PropR</h3>
            <div>Welcome <?= $_SESSION["firstname"] ?>&nbsp;(<?= ($_SESSION["type"]) ?>)</div>
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


    <div id="about">
        <div>
            <h3>Project Description</h3>
            <p>Our Project is an E-commerce website where a seller
                can post their properties to sell while listing the characteristics of
                the property to sell like price, amount of beds and baths, and square footage.
                Our project also handles selling where users have a chance to buy the available
                posted houses and filter out there desired house choices. Finally our project will
                handle the website administration of the page where an admin can view specific data
                that is contained within the website from seller and buyers to better innovate the
                wesbite for future use.</p>
        </div>

        <div>
            <h3>What do we do?</h3>
            <p> Our company hosts desirable properties to be bought and sold by registered sellers
                and buyers who partake in our website's services.</p>
        </div>
        <div>
            <h3>What services do we provide?</h3>
            <p>Services provided by our company range from listing properties with a valid buyer
                account to also marketing the available properties for sale to buyers interested
                in the housing market. Another service we offer is independent website administration
                and advertisement. Meaning for buyers that create propeties for sale a website admin
                will pay attention to trends and curate the website as needed to better help both
                parties buy and sell.
            </p>
        </div>
        <div>
            <h3>Why choose us?</h3>
            <p>Both buyers and sellers should choose our website over competitors because of our easy
                to use user interface, timely updates, and independent website administration and
                advertisement. We also beat out our competition with the fact that properties listed
                on our website are required to meet a specific criteria so only the most desirable
                properites can be bought and sold.</p>
        </div>
        <div>
            <h3>Why you should choose us even more?</h3>
            <p>Some things that we do as business unit to attract customers is to allow buyers to
                filter out the characteristics that they would want in a property. For example,
                if a buyer wants at at least a 2 bath and 1 bed property, the buyer is able to quickly
                get to the propeties that they are interested in. Another attraction that our customers
                will love is the fact that they can have an account where they can save propeties that
                they have liked to view later or compile into one cohesive list.
            </p>
        </div>
    </div>

</body>

</html>