<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="styles/styles.css" rel="stylesheet" type="text/css" />
    <link href="styles/all.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <div class='navbar'>
        <h3>PropR</h3>
        <div>Welcome <?= $_SESSION["firstname"] ?> &nbsp;(<?= ($_SESSION["type"]) ?>)</div>
        <div><a href="admin.php">Dashboard </a></div>
        <div><a href="about.php">About Us </a></div>
        <div><a href='logout.php'><i class="fa-solid fa-right-from-bracket"></i>Logout</a></div>
    </div>

    <?php
    include 'db/connect_db.php';

    $sql = "SELECT  (SELECT COUNT(*) FROM User) AS total_users,
                    (SELECT COUNT(*) FROM User WHERE type='buyer') AS total_buyers,
                    (SELECT COUNT(*) FROM User where type='seller') AS total_sellers,
                    (SELECT COUNT(*) FROM Property) AS total_props,
                    (SELECT COUNT(*) FROM Wishlist) AS total_wishes,
                    (SELECT MAX(price) FROM Property) AS highest_price,
                    (SELECT MIN(price) FROM Property) AS lowest_price,
                    (SELECT SUM(price) FROM Property) AS total_value;";

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    mysqli_close($conn);
    ?>

    <h2 class="center">Stats and Figures</h2>

    <div id="admin-container">
        <div class="admin-row">

            <div class="admin-card">
                <table>
                    <tr>
                        <td rowspan="3"><i class="fa-solid fa-users fa-2xl"></i></td>
                        <td>Users</td>
                    </tr>
                    <tr>
                        <th>Total</th>
                    </tr>
                    <tr>
                        <td class="stat"><?= $row["total_users"] - 1 ?></td>
                    </tr>
                </table>
            </div>

            <div class="admin-card">
                <table>
                    <tr>
                        <td rowspan="3"><i class="fa-solid fa-list fa-2xl"></i></td>
                        <td>Sellers</td>
                    </tr>
                    <tr>
                        <th>Total</th>
                    </tr>
                    <tr>
                        <td class="stat"><?= $row["total_sellers"] ?></td>
                    </tr>
                </table>
            </div>

            <div class="admin-card">
                <table>
                    <tr>
                        <td rowspan="3"><i class="fa-solid fa-cart-shopping fa-2xl"></i></i></td>
                        <td>Buyers</td>
                    </tr>
                    <tr>
                        <th>Total</th>
                    </tr>
                    <tr>
                        <td class="stat"><?= $row["total_buyers"] ?></td>
                    </tr>
                </table>
            </div>

        </div>

        <div class="admin-row">
            <div class="admin-card">
                <table>
                    <tr>
                        <td rowspan="3"><i class="fa-solid fa-dollar-sign fa-2xl"></i></td>
                        <td>Property Value</td>
                    </tr>
                    <tr>
                        <th>Total</th>
                    </tr>
                    <tr>
                        <td class="stat">$<?= number_format($row["total_value"]) ?></td>
                    </tr>
                </table>
            </div>

            <div class="admin-card">
                <table>
                    <tr>
                        <td rowspan="3"><i class="fa-solid fa-arrow-trend-up fa-2xl admin"></i></td>
                        <td>Price</td>
                    </tr>
                    <tr>
                        <th>Highest</th>
                    </tr>
                    <tr>
                        <td class="stat">$<?= number_format($row["highest_price"]) ?></td>
                    </tr>
                </table>
            </div>

            <div class="admin-card">
                <table>
                    <tr>
                        <td rowspan="3"><i class="fa-solid fa-arrow-trend-down fa-2xl admin"></i></td>
                        <td>Price</td>
                    </tr>
                    <tr>
                        <th>Lowest</th>
                    </tr>
                    <tr>
                        <td class="stat">$<?= number_format($row["lowest_price"]) ?></td>
                    </tr>
                </table>
            </div>

        </div>

        <div class="admin-row">
            <div class="admin-card">
                <table>
                    <tr>
                        <td rowspan="3"><i class="fa-solid fa-house fa-2xl"></i></td>
                        <td>Properties</td>
                    </tr>
                    <tr>
                        <th>Total</th>
                    </tr>
                    <tr>
                        <td class="stat"><?= $row["total_props"] ?></td>
                    </tr>
                </table>
            </div>

            <div class="admin-card">
                <table>
                    <tr>
                        <td rowspan="3"><i class="fa-solid fa-thumbs-up fa-2xl admin"></i></td>
                        <td>Wishlisted</td>
                    </tr>
                    <tr>
                        <th>Total</th>
                    </tr>
                    <tr>
                        <td class="stat"><?= $row["total_wishes"] ?></td>
                    </tr>
                </table>
            </div>

        </div>





    </div>

</body>

</html>