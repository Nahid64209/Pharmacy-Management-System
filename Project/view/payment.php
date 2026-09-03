<?php
require '../models/cart.php';
require '../models/payment.php';
session_start();

if (!isset($_SESSION['loggedIn'])) {
    header("Location: login.php");
    exit();
}

$customer = isset($_COOKIE['signup_name']) ? $_COOKIE['signup_name'] : "User";
$amount = getCartTotal($_SESSION['rememberUser']);
$invoice = getInvoice();
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">

    <title>Payment | Pharmacy Management System</title>

    <link rel="stylesheet" href="../css/payment.css">

</head>

<body>

    <div class="payment-box">

        <h1>💳 Payment</h1>

        <p>Complete your payment</p>


        <form action="../controllers/userPayment.php" method="POST" onsubmit="return validatePayment(this);" novalidate>

            <label>Customer Name</label>
            <input type="text" name="customer" value="<?php echo htmlspecialchars($customer); ?>" readonly>
<br><br>

            <label>Invoice Number</label>
            <input type="text" name="invoice" value="<?php echo $invoice; ?>" readonly>
            <br><br>


            <label>Total Amount</label>
            <input type="text" name="amount" value="<?php echo $amount; ?>" readonly>
            <br><br>


            <label>Payment Method</label>
            <br><br>

            <select name="method">

                <option value="">Select Payment Method</option>
                <option>Cash</option>
                <option>bKash</option>
                <option>Nagad</option>
                <option>Card</option>

            </select>
            <br><br>


            <label>Phone Number</label>
            <input type="text" name="phone" placeholder="Enter phone number">
            <br><br>


            <button type="submit">
                💰 Pay Now
            </button>
            <br><br>

        </form>

        <?php echo isset($_SESSION['paymentErrMsg']) ? $_SESSION['paymentErrMsg'] : ""; ?>
        <?php echo isset($_SESSION['paymentSuccessMsg']) ? $_SESSION['paymentSuccessMsg'] : ""; ?>


        <a href="user.php">
            ← Back to Dashboard
        </a>

    </div>

<script src="../js/payment.js"></script>

</body>

</html>