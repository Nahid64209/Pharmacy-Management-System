<?php
session_start();
if (!isset($_SESSION['loggedIn'])) {
    header("Location: login.php");
    exit();
}

$_SESSION['paymentErrMsg'] = "";
$_SESSION['paymentSuccessMsg'] = "";

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $customer = isset($_POST['customer']) ? trim($_POST['customer']) : "";
    $invoice = isset($_POST['invoice']) ? trim($_POST['invoice']) : "";
    $amount = isset($_POST['amount']) ? trim($_POST['amount']) : "";
    $method = isset($_POST['method']) ? $_POST['method'] : "";
    $phone = isset($_POST['phone']) ? trim($_POST['phone']) : "";
    $flag = true;

    if (empty($customer) || empty($invoice) || empty($amount) || empty($phone)) {
        $flag = false;
        $_SESSION['paymentErrMsg'] = "Please fill up all fields properly";
    }
    elseif ($method === "") {
        $flag = false;
        $_SESSION['paymentErrMsg'] = "Please select a payment method";
    }

    if ($flag) {
        $_SESSION['paymentSuccessMsg'] = "Payment completed successfully";
    }
}
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">

    <title>Payment | Pharmacy Management System</title>

    <link rel="stylesheet" href="css/payment.css">

</head>

<body>

    <div class="payment-box">

        <h1>💳 Payment</h1>

        <p>Complete your payment</p>


        <form action="" method="POST" onsubmit="return validatePayment(this);" novalidate>

            <label>Customer Name</label>
            <input type="text" name="customer" placeholder="Enter customer name">
<br><br>

            <label>Invoice Number</label>
            <input type="text" name="invoice" placeholder="Enter invoice number">
            <br><br>


            <label>Total Amount</label>
            <input type="text" name="amount" placeholder="Enter amount">
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

<script src="js/payment.js"></script>

</body>

</html>