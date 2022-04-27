<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifying Registration</title>
</head>

<body>
    <?php
    include 'db/connect_db.php';

    if (isset($_POST['Submit'])) {
        $firstname = isset($_POST['firstname']) ? $_POST['firstname'] : '';
        $lastname = isset($_POST['lastname']) ? $_POST['lastname'] : '';
        $type = isset($_POST['type']) ? $_POST['type'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';
        $confirmPass = isset($_POST['confirm-pass']) ? $_POST['confirm-pass'] : '';
    }
    $isValid = true;
    $errors = [];

    function password_match($password1, $password2) {
        $str1 = strtolower($password1);
        $str2 = strtolower($password2);
        return (strcmp($str1, $str2) == 0) ? true : false;
    }

    if ($firstname == "") {
        $isValid = false;
        $errors[] = "First Name field is empty.";
    }

    if ($lastname == "") {
        $isValid = false;
        $errors[] = "Last Name field is empty.";
    }

    if ($type == "") {
        $isValid = false;
        $errors[] = "User type(Buyer or Seller) field is empty.";
    }

    if ($email == "") {
        $isValid = false;
        $errors[] = "Email field is empty.";
    }

    $sql = mysqli_query($conn, "SELECT * FROM User WHERE email = '$email' ");
    if (mysqli_num_rows($sql)) {
        $isValid = false;
        $errors[] = "The email: $email is already in use";
    }

    if ($password == "") {
        $isValid = false;
        $errors[] = "Password field is empty.";
    }

    if (!password_match($password, $confirmPass)) {
        $isValid = false;
        $errors[] = "Passwords do not match.";
    }

    if (!$isValid) {
        echo "<p>Please fix the following errors:<ul>";
        foreach ($errors as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul><input type='button' value='Go Back' onClick='history.back()'></p>";
    } else {
        $sql = "INSERT INTO User (firstname, lastname, type, email, password)
                VALUES('$firstname', '$lastname', '$type', '$email', md5('$password'))";
        if (mysqli_query($conn, $sql)) {
            // echo "<p>You have sucessfully registered! Thanks for signing up $firstname.</p>";
            header("location:login.php");
        } else {
            // echo "Error: " . $sql . "<br>" .  mysqli_error($conn);
            echo "<p>It seems that a user with the email: $email already exists.</p>";
            echo "<input type='button' value='Try again' onClick='history.back()'><br>";
        }
    }

    mysqli_close($conn);
    ?>
</body>

</html>