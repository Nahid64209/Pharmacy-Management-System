<?php
require '../models/User.php';
require '../models/Cart.php';

session_start();

if (!isset($_SESSION['loggedIn']) || $_SESSION['role'] !== "user") {
    header("Location: ../view/login.php");
    exit();
}

$medicine = isset($_POST['medicine']) ? $_POST['medicine'] : "";
$price = isset($_POST['price']) ? $_POST['price'] : 0;
$quantity = isset($_POST['quantity']) ? $_POST['quantity'] : 0;
$username = $_SESSION['rememberUser'];

if ($quantity > 0) {
    addToCart($username, $medicine, $price, $quantity);
}

header("Location: ../view/user.php#cart");
exit();
?>
