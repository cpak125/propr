<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="styles/styles.css" rel="stylesheet" type="text/css" />
    <link href="styles/all.css" rel="stylesheet" type="text/css" />
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
    <br><br>
    <div class="center">
        <p>Sample Log in Credentials</p>
        <table id="sample" border="1" cellpadding="1">
            <tr>
                <th>User type</td>
                <th>email</td>
                <th>password</td>
            </tr>
            <tr>
                <td>admin</td>
                <td>Chris@admin.com</td>
                <td>admin</td>
            </tr>
            <tr>
                <td>seller</td>
                <td>John@seller.com</td>
                <td>seller</td>
            </tr>
            </tr>
            <tr>
                <td>buyer</td>
                <td>Jane@buyer.com</td>
                <td>buyer</td>
            </tr>

        </table>
    </div>
</body>

</html>