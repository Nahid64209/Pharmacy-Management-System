<?php


require_once 'dbconn.php';

function addToCart($username, $medicine, $price, $quantity) {
    $conn = connect();

    $sql = "INSERT INTO cart (username, medicine, price, quantity)
        VALUES ('$username', '$medicine', '$price', '$quantity')";
    $result = mysqli_query($conn, $sql);

    if ($result)
        return true;
    return false;
}

function getCart($username) {
    $conn = connect();

    $sql = "SELECT medicine, price, quantity FROM cart WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);

    return $result;
}

function getCartTotal($username) {
    $conn = connect();

    $sql = "SELECT SUM(price * quantity) AS total FROM cart WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    return $row['total'] ? $row['total'] : 0;
}  

?>