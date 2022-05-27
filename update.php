<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Property</title>
    <link href="styles/styles.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <?php
    include 'db/connect_db.php';

    $propId = $_GET["propId"];
    $isValid = true;
    $errors = [];

    if (isset($_POST['Submit'])) {
        $city_state = isset($_POST['city_state']) ? $_POST['city_state'] : '';
        $street = isset($_POST['street']) ? $_POST['street'] : '';
        $zip = isset($_POST['zip']) ? $_POST['zip'] : '';
        $price = isset($_POST['price']) ?  str_replace(',', '', $_POST['price']) : '';
        $type = isset($_POST['type']) ? $_POST['type'] : '';
        $squareFt = isset($_POST['squareFt']) ? str_replace(',', '', $_POST['squareFt']) : '';
        $bed = isset($_POST['bed']) ? $_POST['bed'] : '';
        $bath = isset($_POST['bath']) ? $_POST['bath'] : '';
        $imgURL = isset($_POST['imgURL']) ? $_POST['imgURL'] : '';
    }

    if ($city_state == "") {
        $isValid = false;
        $errors[] = "City and State field is empty.";
    }

    if ($street == "") {
        $isValid = false;
        $errors[] = "Street Address field is empty.";
    }

    if ($zip == "") {
        $isValid = false;
        $errors[] = "Zip Code field is empty.";
    }

    if ($price == "") {
        $isValid = false;
        $errors[] = "Listing Price field is empty.";
    }

    if ($squareFt == "") {
        $isValid = false;
        $errors[] = "Total squareFt field is empty.";
    }

    if ($bed == "") {
        $isValid = false;
        $errors[] = "Total bedrooms field is empty.";
    }

    if ($bath == "") {
        $isValid = false;
        $errors[] = "Total bathrooms field is empty.";
    }
    if ($imgURL == "") {
        $isValid = false;
        $errors[] = "No image uploaded.";
    }

    if (!$isValid) {
        echo "<div class='error'><p>Please fix the following errors:<ul>";
        foreach ($errors as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul><input type='button' value='Go Back' onClick='history.back()'></p></div>";
        exit;
    } else {
        $sql = "UPDATE Property SET city_state='$city_state', street='$street', zip='$zip', 
                squareFt='$squareFt', type='$type', bed='$bed', bath='$bath', price='$price', imgURL='$imgURL' 
                WHERE propId='$propId'";

        if (mysqli_query($conn, $sql)) {
            header("location:property.php?propId=$propId");
            exit;
        } else {
            echo "Error: " . $sql . "<br>" .  mysqli_error($conn);
        }
    }
    mysqli_close($conn);
    ?>
</body>

</html>