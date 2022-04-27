<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        <?php include "styles.css" ?>
    </style>
</head>

<body>

    <div>
        <form id="register-form" action="register_submit.php" method="post">
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
                    <div>Please select if you're a Buyer or Seller</div><br>
                    <label class="inline" for="buyer">Buyer</label>
                    <input type="radio" id="buyer" name="type" value="buyer">

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
                    <label for="confirm-pass">Confirm Password</label>
                    <input type="password" id="confirm-pass" name="confirm-pass" placeholder="Re-enter password">
                </div>
            </div>
            <h3 class="center">Payment</h3>
            <div id="register-content">
                <div>
                    <label for="firstname">Name on Card</label>
                    <input type="text" name="firstname" id="firstname" placeholder="John More Doe">
                </div>
                <div>
                    <label for="card-num">Card Number</label>
                    <input type="text" name="card-num" id="card-num" placeholder="1111-2222-3333-4444">
                </div>
                <div>
                    <label for="card-exp">Exp. Date</label>
                    <input type="text" name="card-exp" id="card-exp" placeholder="MM/YY">
                </div>
                <div>
                    <label for="address">Billing Address</label>
                    <input type="text" name="address" id="address" placeholder="123 West St., Atlanta, GA, 33333">
                </div>
                <div>
                    <label for="phone">Phone Number</label>
                    <input type="text" name="phone" id="phone" placeholder="999-999-9999">
                </div>

            </div>

            <div class="center">
                <input type="checkbox" id="terms" name="terms">
                <label class="inline" for="terms"> I accept the
                    <span><a class="linkify" href="#" onclick="return confirm('Insert terms here')">Terms of Use</a>
                    </span>
                </label>
            </div><br>

            <div class="center">
                <input class="form-btns green" name="Submit" type="submit" value="Register">
                <input class="form-btns red" type="reset" value="Cancel" onClick="history.back()">
            </div>
        </form>
    </div>

</body>

</html>