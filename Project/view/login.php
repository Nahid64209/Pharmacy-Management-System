<?php

session_start();

if (isset($_SESSION['rememberUser'])) {
    $username = $_SESSION['rememberUser'];
} elseif (isset($_COOKIE['remember_username'])) {
    $username = $_COOKIE['remember_username'];
} else {
    $username = "";
}

?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">

    <title>Login | Pharmacy Management System</title>

    <link rel="stylesheet" href="../css/login.css">

</head>

<body>

<div class="container">

    <div class="left">

        <h1>Welcome Back!</h1>

        <p>
            Login to manage medicines, inventory,
            suppliers, sales and reports.
        </p>

    </div>


    <div class="right">

        <form
            action="../controllers/userLogin.php"
            method="POST"
            onsubmit="return validate(this);"
            novalidate
        >

            <h2>Login</h2>


            <div class="input-box">

                <span>👤</span>

                <input
                    type="text"
                    name="username"
                    id="username"
                    value="<?php echo htmlspecialchars($username); ?>"
                    placeholder="Username" 
                    
                >

            </div>


            <div class="input-box">

                <span>🔒</span>

                <input
                    type="password"
                    name="password"
                    id="password"
                    placeholder="Password"
                  
                >

            </div>


            <button type="submit">
                Login
            </button>


            <p>
                <a href="forgot.php">
                    Forgot Password?
                </a>
            </p>


            <p>

                Don't have an account?

                <a href="signup.php">
                    Sign Up
                </a>

            </p>

        </form>


        <?php

        if (isset($_SESSION['emailErrMsg'])) {
            echo $_SESSION['emailErrMsg'];
        }

        if (isset($_SESSION['passwordErrMsg'])) {
            echo $_SESSION['passwordErrMsg'];
        }

        if (isset($_SESSION['globalErrMsg'])) {
            echo $_SESSION['globalErrMsg'];
        }

        ?>


        <script src="js/login.js"></script>

    </div>

</div>

</body>

</html>