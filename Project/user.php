<?php
session_start();
if (!isset($_SESSION['loggedIn']) || !isset($_SESSION['role']) || $_SESSION['role'] !== "user") {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">

    <title>User Dashboard | Pharmacy</title>

    <link rel="stylesheet" href="css/user.css">

</head>

<body>


<!-- SIDEBAR -->

<div class="sidebar">

    <h2>💊 Pharmacy</h2>

    <a href="user.php">🏠 Dashboard</a>

    <a href="#medicines">💊 Medicines</a>

    <a href="#cart">🛒 My Cart</a>

    <a href="#profile">👤 Profile</a>

    <a href="logout.php">🚪 Logout</a>

</div>


<!-- MAIN -->

<div class="main">


    <!-- HEADER -->

    <div class="header">

        <h1>Welcome, User</h1>

        <p>Buy medicines easily from our pharmacy.</p>

    </div>


    <!-- MEDICINES -->

    <div class="section" id="medicines">

        <h2>Available Medicines</h2>


        <div class="medicine">

            <span>💊</span>

            <h3>Napa</h3>

            <p>Painkiller</p>

            <h4>৳2 per tablet</h4>

            <input type="number" value="1">

            <button>Add to Cart</button>

        </div>


        <div class="medicine">

            <span>💊</span>

            <h3>Seclo</h3>

            <p>Gastric Medicine</p>

            <h4>৳5 per tablet</h4>

            <input type="number" value="1">

            <button>Add to Cart</button>

        </div>


        <div class="medicine">

            <span>💊</span>

            <h3>DP</h3>

            <p>Vitamin</p>

            <h4>৳3 per tablet</h4>

            <input type="number" value="1">

            <button>Add to Cart</button>

        </div>


        <div class="medicine">

            <span>💊</span>

            <h3>Azithromycin</h3>

            <p>Antibiotic</p>

            <h4>৳10 per tablet</h4>

            <input type="number" value="1">

            <button>Add to Cart</button>

        </div>

    </div>


    <!-- CART -->

    <div class="section" id="cart">

        <h2>🛒 My Cart</h2>


        <table>

            <tr>

                <th>Medicine</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>

            </tr>


            <tr>

                <td>Napa</td>
                <td>৳2</td>
                <td>2</td>
                <td>৳4</td>

            </tr>


            <tr>

                <td>Seclo</td>
                <td>৳5</td>
                <td>2</td>
                <td>৳10</td>

            </tr>


            <tr>

                <td>DP</td>
                <td>৳3</td>
                <td>1</td>
                <td>৳3</td>

            </tr>

        </table>


        <h3 class="total">
            Total Amount: ৳17
        </h3>


        <a href="payment.php" class="pay-button">
            💳 Proceed to Payment
        </a>

    </div>


    <!-- PROFILE -->

    <div class="section" id="profile">

        <h2>👤 My Profile</h2>

        <p>Name: <?php echo isset($_COOKIE['signup_name']) ? htmlspecialchars($_COOKIE['signup_name']) : "User"; ?></p>

        <p>Email: <?php echo htmlspecialchars($_SESSION['email']); ?></p>

        <p>Phone: 01700000000</p>

    </div>


</div>

</body>

</html>