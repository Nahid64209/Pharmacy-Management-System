<?php
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

    if ($flag) {
        $_SESSION['registeredEmail'] = $username;
        $_SESSION['registeredPassword'] = $password;
        $_SESSION['email'] = $username;
        setcookie("signup_name", $fullname, time() + (86400 * 30), "/");
        header("Location: login.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="css/signup.css">
</head>

<body>

<div class="container">

    <div class="left">
        <h1>Create Account</h1>
        <p>Join Pharmacy Management System to manage your pharmacy easily.</p>
    </div>

    <div class="right">

        <form action="" method="POST" onsubmit="return validateSignup(this);" novalidate>

            <h2>Sign Up</h2>

            <div class="input-box">
                <span>👤</span>
                <input type="text" name="fullname" placeholder="Full Name" required>
            </div>

            <div class="input-box">
                <span>✉</span>
                <input type="email" name="email" placeholder="Email" required>
            </div>

            <div class="input-box">
                <span>👤</span>
                <input type="text" name="username" placeholder="Username" required>
            </div>

            <div class="input-box">
                <span>🔒</span>
                <input type="password" name="password" placeholder="Password" required>
            </div>

            <div class="input-box">
                <span>🔒</span>
                <input type="password" name="confirm" placeholder="Confirm Password" required>
            </div>

            <button type="submit">Create Account</button>

            <p>
                Already have an account?
                <a href="login.php">Login</a>
            </p>

            <?php echo isset($_SESSION['signupErrMsg']) ? $_SESSION['signupErrMsg'] : ""; ?>

        </form>

    </div>

</div>

<script src="js/signup.js"></script>

</body>
</html>