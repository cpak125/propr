<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        <?php include "styles.css" ?>
    </style>
</head>

<body>
    <div class="form">
        <form action="login_submit.php" method="get">
            <input type="text" name="email" placeholder="Enter your email"><br>
            <input type="password" name="password" placeholder="Enter your password"><br>
            <input class="green" name="Submit" type="submit" value="Login">
        </form>
        <p>Don't have an account? <a class="linkify" href="register.php">Click Here to Register.</a></p>
    </div>
</body>

</html>