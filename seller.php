<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Dash</title>
    <link href="styles.css" rel="stylesheet" type="text/css" />
    <script src="https://kit.fontawesome.com/0016bfb6b4.js" crossorigin="anonymous"></script>

</head>

<body>
    <?php
    $uid = $_SESSION["uid"];
    $firstname = $_SESSION["firstname"];
    ?>
    <div class='navbar'>
        <h3>PropR</h3>
        <div>Welcome Seller, <?= $_SESSION["firstname"] ?></div>
        <div><a href="about.php">About Us </a></div>
        <div><a href="seller.php">Dashboard </a></div>
        <div><a href='logout.php'><i class="fa-solid fa-right-from-bracket"></i>Logout</a></div>
    </div>

    <div id="prop-container">
        <?php
        include 'db/connect_db.php';

        $uid = $_SESSION["uid"];
        $sql = "SELECT * FROM Property WHERE sellerId='$uid'";
        $result = mysqli_query($conn, $sql);

        /* Fetch properties associated with this user */
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {

        ?>
                <div class="cards">
                    <!-- attach  propID through URL -->
                    <a href="property.php?propId=<?= $row['propId'] ?>">
                        <div class="cards-container">
                            <img src="img/<?= $row["imgURL"] ?>" alt="property photo">
                            <p><span class="bold">City, State: </span><?= $row["city_state"] ?></p>
                            <p><span class="bold">Price: </span>$<?= number_format($row["price"]) ?></p>
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


        <!-- Add Card -->
        <div class="add">
            <i class="fa-solid fa-circle-plus fa-3x fa-beat" style=" --fa-animation-duration: 2s;" onclick="showModal('add-prop')"></i>
        </div>
    </div>

    <div class="modal" id="add-prop">
        <div class="modal-content">
            <span><i class=" close fa-solid fa-circle-xmark" onclick="closeModal('add-prop')"></i></span>

            <form class="prop-form" action="add_property.php" method="post" enctype="multipart/form-data">
                <div class="prop-content">
                    <div>
                        <label for="street">Street Address</label>
                        <input type="text" id="street" name="street" id="location" placeholder="123 Miracle Lane"><br>
                    </div>
                    <div>
                        <label for="city_state">City, State</label>
                        <input type="text" id="city_state" name="city_state" placeholder="Atlanta, GA"><br>
                    </div>
                    <div>
                        <label for="zip">Zip Code</label>
                        <input type="text" id="zip" name="zip" placeholder="99999"><br>
                    </div>
                    <div>
                        <label for="price">Listing Price</label>
                        <div>$&nbsp;<input type="text" id="price" name="price" placeholder="200,000"></div>
                    </div>
                    <div>
                        <label for="type">Property Type</label>
                        <input type="text" id="type" name="type" placeholder="i.e. house, condo, apartment, town-house">
                    </div>
                    <div>
                        <label for="squareFt">Total square feet</label>
                        <div><input type="text" id="squareFt" name="squareFt" placeholder="2,000">&nbsp;sq. ft.</div>
                    </div>
                    <div>
                        <label for="bed">Total bedrooms</label>
                        <input type="text" id="bed" name="bed" placeholder="4">
                    </div>
                    <div>
                        <label for="bath">Total bathrooms</label>
                        <input type="text" id="bath" name="bath" placeholder="4">
                    </div>
                    <div>
                        <label for="imgURL">Upload image</label>
                        <input type="file" id="imgURL" name="imgURL">
                    </div><br>
                </div>

                <div class="center">
                    <input class="form-btns green" name="Submit" type="submit" value="Add">
                    <input class="form-btns red" type="reset" value="Cancel" onclick="closeModal('add-prop')">
                </div>

            </form>

        </div>
    </div>
    <script>
        <?php include 'main.js' ?>
    </script>
</body>

</html>