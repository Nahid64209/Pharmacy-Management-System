<?php
require '../models/User.php';
session_start();

$_SESSION['signupErrMsg'] = "";

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $fullname = isset($_POST['fullname']) ? trim($_POST['fullname']) : "";
    $email = isset($_POST['email']) ? trim($_POST['email']) : "";
    $username = isset($_POST['username']) ? trim($_POST['username']) : "";
    $password = isset($_POST['password']) ? $_POST['password'] : "";
    $confirm = isset($_POST['confirm']) ? $_POST['confirm'] : "";
    $flag = true;

    if (empty($fullname) || empty($email) || empty($username) || empty($password) || empty($confirm)) {
        $flag = false;
        $_SESSION['signupErrMsg'] = "Please fill up all fields properly";
    }
    elseif (!preg_match("/^[A-Za-z]+(\s+[A-Za-z]+)+$/", $fullname)) {
        $flag = false;
        $_SESSION['signupErrMsg'] = "Please enter a proper full name using letters and spaces";
    }
    elseif (!preg_match('/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/', $email)) {
        $flag = false;
        $_SESSION['signupErrMsg'] = "Please enter a valid email address";
    }
    elseif (strlen($username) < 3) {
        $flag = false;
        $_SESSION['signupErrMsg'] = "Username must contain at least 3 characters";
    }
    elseif (strlen($password) < 8 || !preg_match("/[A-Z]/", $password) || !preg_match("/[a-z]/", $password) || !preg_match("/[0-9]/", $password) || !preg_match("/[^A-Za-z0-9]/", $password)) {
        $flag = false;
        $_SESSION['signupErrMsg'] = "Password must be 8 characters with uppercase, lowercase, number and special character";
    }
    elseif ($password !== $confirm) {
        $flag = false;
        $_SESSION['signupErrMsg'] = "Passwords do not match";
    }

    

        if (registerUser($fullname, $email, $username, $password)) {
            $_SESSION['registeredUser'] = $username;           // Username store
            $_SESSION['registeredPassword'] = $password;       // Password store 
            $_SESSION['email'] = $email;
            $_SESSION['rememberUser'] = $username;             // remember username for login page
            setcookie("signup_name", $fullname, time() + (86400 * 30), "/");
            header("Location: ../view/login.php");
            exit();
        }

        $_SESSION['signupErrMsg'] = "Could not create account";
        header("Location: ../view/signup.php");
        exit();
    }

    header("Location: ../view/signup.php");
    exit();

?>
