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
</head>

<body>
    <?php
    include 'db/connect_db.php';
    $isValid = true;

    function verify_password($input, $correct) {
        return (($input == $correct)) ? true : false;
    }

    if (isset($_GET['Submit'])) {
        $email = isset($_GET['email']) ? $_GET['email'] : '';
        $password = isset($_GET['password']) ?  $_GET['password'] : '';
    }

    if ($email == "") {
        $isValid = false;
        echo "Error: Email Field is empty.";
    }

    if ($password == "") {
        $isValid = false;
        echo "Error: Password Field is empty.";
    }

    if (!$isValid) {
        echo "<p>Invalid login credentials. Please enter correct login.";
        echo "<input type='button' value='Go Back' onclick='history.back()'></p>";
    }

    $encrypt = md5($password);

    $sql = "SELECT * FROM User WHERE email = '$email' ";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $validPass = $row["password"];

        if (!verify_password($encrypt, $validPass)) {
            echo "<p>Wrong Password. Enter correct password.</p>";
            echo "<input type='button' value='Go Back' onclick='history.back()'>";
            exit(-1);
        }

        $_SESSION["uid"] = $row['uid'];
        $_SESSION["firstname"] = $row["firstname"];
        $_SESSION["lastname"] = $row["lastname"];
        $_SESSION["email"] = $row["email"];
        $_SESSION["type"] = $row["type"];
    } else {
        // echo "Error: " . $sql . "<br>" .  mysqli_error($conn);
        echo "<p>$email could not be found.</p>";
        echo "<input type='button' value='Go Back' onclick='history.back()'></br>";
        echo "<a href='register.php'>Click here to register</a>";
    }

    switch ($_SESSION["type"]) {
        case "admin":
            header("location:admin.php");
            break;
        case "buyer":
            header("location:buyer.php");
            break;
        case "seller":
            header("location:seller.php");
            break;
    }

    mysqli_close($con);
    ?>
</body>

</html>