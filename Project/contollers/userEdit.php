<?php
require '../models/User.php';
session_start();

$username = isset($_POST['oldUsername']) ? $_POST['oldUsername'] : $_GET['username'];

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $fullname = trim($_POST['fullname']);
    $email = trim($_POST['email']);
    $newUsername = trim($_POST['username']);
    $password = $_POST['password'];

    if (updateUser($username, $fullname, $email, $newUsername, $password)) {
        header("Location: ../view/dashboard.php");
        exit();
    }
}

$user = getUser($username);
?>
