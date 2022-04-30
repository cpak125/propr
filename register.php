<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="styles/styles.css" rel="stylesheet" type="text/css" />
    <link href="styles/all.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <div class='navbar'>
        <h3>PropR</h3>
        <div><a href="about.php">About Us </a></div>
    </div>

    <div>
        <form id="register-form" action="register_submit.php" method="post">
            <h3 class="center">Registration</h3>
            <div id="register-content">
                <div>
                    <label for="firstname">First Name</label>
                    <input type="text" name="firstname" id="firstname" placeholder="Enter your first name">
                </div>
                <div>
                    <label for="lastname">Last Name</label>
                    <input type="text" name="lastname" id="lastname" placeholder="Enter your last name">
                </div>
                <div>
                    <label>Please select if you're a Buyer or Seller</label><br>
                    <label class="inline" for="buyer">Buyer</label>
                    <input type="radio" id="buyer" name="type" value="buyer">&nbsp;&nbsp;

                    <label class="inline" for="seller">Seller</label>
                    <input type="radio" id="seller" name="type" value="seller">
                </div>
                <div>
                    <label for="email">Email </label>
                    <input type="text" id="email" name="email" placeholder="Enter your email">
                </div>
                <div>
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password">
                </div>
                <div>
                    <label for="confirmPass">Confirm Password</label>
                    <input type="password" id="confirmPass" name="confirmPass" placeholder="Re-enter password">
                </div>
            </div>
            <h3 class="center">Payment</h3>

            <div class="icon-container center">
                <h4>Accepted Cards</h4>
                <i class="fa-brands fa-3x fa-cc-visa" style="color:navy;"></i>
                <i class="fa-brands fa-3x fa-cc-amex" style="color:blue;"></i>
                <i class="fa-brands fa-3x fa-cc-mastercard" style="color:red;"></i>
                <i class="fa-brands fa-3x fa-cc-discover" style="color:orange;"></i>
            </div><br>

            <div id="register-content">
                <div>
                    <label for="name">Name On Card</label>
                    <input type="text" name="name" id="name" placeholder="John Doe" required>
                </div>
                <div>
                    <label for="card-num">Card Number</label>
                    <input type="text" name="card-num" id="card-num" oninput="checkType()" placeholder="1111-2222-3333-4444" required>
                </div>
                <div>
                    <label for="card-exp">Exp. Date</label>
                    <input type="text" name="card-exp" id="card-exp" placeholder="MM/YY" required>
                </div>
                <div>
                    <label for="address">Billing Address</label>
                    <input type="text" name="address" id="address" placeholder="123 West St., Atlanta, GA, 33333" required>
                </div>
                <div>
                    <label for="phone">Phone Number</label>
                    <input type="text" name="phone" id="phone" placeholder="999-999-9999" required>
                </div>

                <div id="card-logo">

                </div>

            </div>

            <div class="center">
                <input type="checkbox" id="terms" name="terms" required>
                <label class="inline" for="terms"> I accept the
                    <span><a class="linkify" href="#" onclick="return confirm('These are our terms')">Terms of Use</a>
                    </span>
                </label>
            </div><br>

            <div class="center">
                <input class="form-btns green" name="Submit" type="submit" value="Register">
                <a class="center" href="login.php"><input class="form-btns red" value="Cancel"></a>

            </div>
        </form>
    </div>
    <script>
        <?php include 'main.js' ?>
    </script>
</body>

</html>