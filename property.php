<?php
session_start()
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property Details</title>
    <script src="https://kit.fontawesome.com/0016bfb6b4.js" crossorigin="anonymous"></script>
    <style>
        <?php include "styles.css" ?>
    </style>
</head>

<body>
    <div class='navbar'>
        <div>Welcome Seller, <?= $_SESSION["firstname"] ?></div>
        <div><a href="seller.php">Dashboard </a></div>
        <div><a href="about.php">About Us </a></div>
        <div><a href='logout.php'>Logout</a></div>
    </div>

    <?php
    include 'db/connect_db.php';

    $uid = $_SESSION["uid"];

    if (isset($_GET["propId"])) {

        $propId = $_GET["propId"];

        $sql = "SELECT * FROM Property WHERE propId='$propId'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
        } else {
            echo "Error: " . $sql . "<br>" .  mysqli_error($conn);
        }
    }

    ?>

    <div class="card">
        <img src="img/<?= $row["imgURL"] ?>" alt="property photo">
        <div class="card-container">
            <h3><span class="bold">Listing Price:</span> $<?= $row["price"] ?> </h3>
            <p><span class="bold">Address:</span><?= $row["street"] ?>, <?= $row["city_state"] ?>, <?= $row["zip"] ?> </p>
            <p><span class="bold">Bedrooms:</span><?= $row["bed"] ?> </p>
            <p><span class="bold">Bathrooms:</span><?= $row["bath"] ?> </p>
            <p><span class="bold">Total square ft:</span><?= $row["squareFt"] ?> </p>

            <!-- For buyer dashboard, put a conditional(if it's seller then show this)-->
            <input type="button" onclick="showModal('update-prop')" value="Edit"></input>
            <a id="delete" onclick="return  confirm('Delete this property?')" href="delete.php?propId=<?= $row['propId'] ?>">
                <button>Delete</button>
            </a>
        </div>

    </div>

    <!-- For buyer dashboard, put a conditional(if it's seller then show this)-->
    <div class="modal" id="update-prop">
        <div class="modal-content">
            <span><i class="close fa-solid fa-circle-xmark" onclick="closeModal('update-prop')"></i></span>

            <form class="prop-form" action="update.php?propId=<?= $propId ?>" method="post" enctype="multipart/form-data">
                <div>
                    <label for="street">Street Address</label>
                    <input type="text" id="street" name="street" id="location" value="<?= $row["street"] ?>">
                </div>
                <div>
                    <label for="city_state">City, State</label>
                    <input type="text" id="city_state" name="city_state" value="<?= $row["city_state"] ?>">
                </div>
                <div>
                    <label for="zip">Zip Code</label>
                    <input type="text" id="zip" name="zip" value="<?= $row["zip"] ?>">
                </div>
                <div>
                    <label for="price">Listing Price </label>
                    <span>$<input type="text" id="price" name="price" value="<?= $row["price"] ?>"><span>
                </div>
                <div>
                    <label for="type">Type (house, condo, etc) </label>
                    <input type="text" id="type" name="type" value="<?= $row["type"] ?>">
                </div>
                <div>
                    <label for="squareFt">Total square feet</label>
                    <input type="text" id="squareFt" name="squareFt" value="<?= $row["squareFt"] ?>">
                </div>
                <div>
                    <label for="bed">Total bedrooms</label>
                    <input type="text" id="bed" name="bed" value="<?= $row["bed"] ?>">
                </div>
                <div>
                    <label for="bath">Total bathrooms</label>
                    <input type="text" id="bath" name="bath" value="<?= $row["bath"] ?>">
                </div>
                <div>
                    <label for="imgURL">Upload image</label>
                    <input type="file" id="imgURL" name="imgURL">
                </div>

                <!--  -->

                <div class="center">
                    <input class="form-btns green" name="Submit" type="submit" value="Update">
                    <input class="form-btns red" type="button" value="Cancel" onclick="closeModal('update-prop')">
                </div>

            </form>

        </div>
    </div>

    <script>
        <?php include 'main.js' ?>
    </script>

    <?php mysqli_close($conn); ?>
</body>

</html>