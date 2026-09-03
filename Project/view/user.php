<?php
session_start();
require '../models/cart.php';

if (!isset($_SESSION['loggedIn']) || !isset($_SESSION['role']) || $_SESSION['role'] !== "user") {
    header("Location: login.php");
    exit();
}

$userName = isset($_SESSION['name']) ? $_SESSION['name'] : "User";
$userEmail = isset($_SESSION['email']) ? $_SESSION['email'] : "Not available";

$cart = getCart($_SESSION['rememberUser']);
$cartTotal = getCartTotal($_SESSION['rememberUser']);
?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">

    <title>User Dashboard | Pharmacy</title>

    <link rel="stylesheet" href="../css/user.css">

</head>

<body>

<div class="sidebar">

    <h2>💊 Pharmacy</h2>

    <a href="user.php">🏠 Dashboard</a>

    <a href="#profile">👤 Profile</a>

    <a href="logout.php">🚪 Logout</a>

</div>

<div class="main">

    <div class="header">

        <h1>Welcome, <?php echo htmlspecialchars($userName); ?></h1>

        <p>Buy medicines easily from our pharmacy.</p>

    </div>

    <div class="section" id="medicines">

        <h2>Available Medicines</h2>

        <form class="medicine" action="../controllers/userCart.php" method="POST">

            <span>💊</span>

            <h3>Napa</h3>

            <p>Painkiller</p>

            <h4>৳2 per tablet</h4>

            <input type="hidden" name="medicine" value="Napa">
            <input type="hidden" name="price" value="2">

            <input type="number" name="quantity" value="1" min="1">

            <button type="submit">Add to Cart</button>

        </form>

        <form class="medicine" action="../controllers/userCart.php" method="POST">

            <span>💊</span>

            <h3>Seclo</h3>

            <p>Gastric Medicine</p>

            <h4>৳5 per tablet</h4>

            <input type="hidden" name="medicine" value="Seclo">
            <input type="hidden" name="price" value="5">

            <input type="number" name="quantity" value="1" min="1">

            <button type="submit">Add to Cart</button>

        </form>

        <form class="medicine" action="../controllers/userCart.php" method="POST">

            <span>💊</span>

            <h3>DP</h3>

            <p>Vitamin</p>

            <h4>৳3 per tablet</h4>

            <input type="hidden" name="medicine" value="DP">
            <input type="hidden" name="price" value="3">

            <input type="number" name="quantity" value="1" min="1">

            <button type="submit">Add to Cart</button>

        </form>

        <form class="medicine" action="../controllers/userCart.php" method="POST">

            <span>💊</span>

            <h3>Azithromycin</h3>

            <p>Antibiotic</p>

            <h4>৳10 per tablet</h4>

            <input type="hidden" name="medicine" value="Azithromycin">
            <input type="hidden" name="price" value="10">

            <input type="number" name="quantity" value="1" min="1">

            <button type="submit">Add to Cart</button>

        </form>

    </div>

    <div class="section" id="cart">

        <h2>🛒 My Cart</h2>

        <table>

            <tr>
                <th>Medicine</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>

            <?php while ($row = mysqli_fetch_assoc($cart)) { ?>

                <tr>

                    <td>
                        <?php echo htmlspecialchars($row['medicine']); ?>
                    </td>

                    <td>
                        ৳<?php echo number_format($row['price'], 2); ?>
                    </td>

                    <td>
                        <?php echo $row['quantity']; ?>
                    </td>

                    <td>
                        ৳<?php echo number_format($row['price'] * $row['quantity'], 2); ?>
                    </td>

                </tr>

            <?php } ?>

        </table>

        <h3 class="total">
            Total Amount: ৳<?php echo number_format($cartTotal, 2); ?>
        </h3>

        <a href="payment.php" class="pay-button">
            💳 Proceed to Payment
        </a>

    </div>

    <div class="section" id="profile">

        <h2>👤 My Profile</h2>

        <p>
            Name:
            <?php echo htmlspecialchars($userName); ?>
        </p>

        <p>
            Email:
            <?php echo htmlspecialchars($userEmail); ?>
        </p>

    </div>

</div>

</body>

</html>