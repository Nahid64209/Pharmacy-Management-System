<?php
require_once 'dbconn.php';

function makePayment($username, $customer, $amount, $method, $phone) {
    $conn = connect();

    $sql = "INSERT INTO payment (username, customer, amount, method, phone)
        VALUES ('$username', '$customer', '$amount', '$method', '$phone')";
    $result = mysqli_query($conn, $sql);

    if ($result)
        return true;
    return false;
}

function getInvoice() {
    $conn = connect();

    $sql = "SELECT AUTO_INCREMENT FROM information_schema.TABLES
        WHERE TABLE_SCHEMA = 'pharmacy' AND TABLE_NAME = 'payment'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    return $row['AUTO_INCREMENT'];
}

?>
