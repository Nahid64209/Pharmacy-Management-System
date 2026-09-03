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
        if (makePayment($_SESSION['rememberUser'], $customer, $amount, $method, $phone)) {
            $_SESSION['paymentSuccessMsg'] = "Payment completed successfully";
        } else {
            $_SESSION['paymentErrMsg'] = "Payment failed";
        }
    }
}

header("Location: ../view/payment.php");
exit();
?>