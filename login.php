<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="styles.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <div class='navbar'>
        <h3>PropR</h3>
        <div><a href="about.php">About Us </a></div>
    </div>
    <div id="login-form">
        <h2>Login</h2>
        <form action="login_submit.php" method="post">
            <input type="text" name="email" placeholder="Enter your email"><br>
            <input type="password" name="password" placeholder="Enter your password"><br>
            <input name="Submit" type="submit" value="Login">
        </form>
        <p>Don't have an account? <a class="linkify" href="register.php">Click Here to Register.</a></p>
    </div>
</body>

</html>