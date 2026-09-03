<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="../css/signup.css">
</head>

<body>

<div class="container">

    <div class="left">
        <h1>Create Account</h1>
        <p>Join Pharmacy Management System to manage your pharmacy easily.</p>
    </div>

    <div class="right">

        <form action="../controllers/userSignup.php" method="POST" onsubmit="return validateSignup(this);" novalidate>

            <h2>Sign Up</h2>

            <div class="input-box">
                <span>👤</span>
                <input type="text" name="fullname" placeholder="Full Name" >
            </div>

            <div class="input-box">
                <span>✉</span>
                <input type="email" name="email" id="email" placeholder="Email" onblur="signup()">
            </div>

            <p id="emailError"></p>


            <div class="input-box">
                <span>👤</span>
                <input type="text" name="username" id="username" placeholder="Username" onblur="signupu()" >
            </div>

                        <p id="usernameError"></p>


            <div class="input-box">
                <span>🔒</span>
                <input type="password" name="password" placeholder="Password" >
            </div>

            <div class="input-box">
                <span>🔒</span>
                <input type="password" name="confirm" placeholder="Confirm Password" >
            </div>

            <button type="submit">Create Account</button>

            <p>
                Already have an account?
                <a href="login.php">Login</a>
            </p>

            <?php
            echo isset($_SESSION['signupErrMsg']) ? $_SESSION['signupErrMsg'] : "";
            unset($_SESSION['signupErrMsg']);
            ?>

        </form>

    </div>

</div>

<script src="../js/signup.js"></script>

</body>
</html>