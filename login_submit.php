<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifying Login</title>
    <link href="styles/styles.css" rel="stylesheet" type="text/css" />
</head>

<body>

    <?php
    include 'db/connect_db.php';
    $isValid = true;
    $errors = [];

    function verify_password($input, $correct) {
        return (($input == $correct)) ? true : false;
    }

    if (isset($_POST['Submit'])) {
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $password = isset($_POST['password']) ?  $_POST['password'] : '';
    }

    if ($email == "") {
        $isValid = false;
        $errors[] = "Email Field is empty";
    }

    if ($password == "") {
        $isValid = false;
        $errors[] = "Password Field is empty.";
    }

    if (!$isValid) {

        echo "<div class='error'><p>Please fix the following errors:<ul>";
        foreach ($errors as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul><input type='button' value='Go Back' onClick='history.back()'></p></div>";
        exit;
    }

    $encrypt = md5($password);

    $sql = "SELECT * FROM User WHERE email = '$email' ";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $validPass = $row["password"];

        if (!verify_password($encrypt, $validPass)) {
            echo "<div class='error'><p>Wrong Password. Enter correct password.</p>";
            echo "<input type='button' value='Go Back' onclick='history.back()'></div>";
        }
        $_SESSION["uid"] = $row['uid'];
        $_SESSION["firstname"] = $row["firstname"];
        $_SESSION["email"] = $row["email"];
        $_SESSION["type"] = $row["type"];
    } else {
        echo "<div class='error'><p>$email could not be found.</p>";
        echo "<input type='button' value='Go Back' onclick='history.back()'></br>";
        echo "<a href='register.php'>Click here to register</a></div>";
    }

    switch ($_SESSION["type"]) {
        case "admin":
            header("location:admin.php");
            exit;
        case "buyer":
            header("location:buyer.php");
            exit;
        case "seller":
            header("location:seller.php");
            exit;
    }

    mysqli_close($con);
    ?> </body>

</html>