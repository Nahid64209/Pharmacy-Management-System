<?php

session_start();

$_SESSION['emailErrMsg'] = "";
$_SESSION['passwordErrMsg'] = "";
$_SESSION['globalErrMsg'] = "";

if ($_SERVER['REQUEST_METHOD'] === "POST") {

    $email = isset($_POST['email']) ? trim($_POST['email']) : "";
    $password = isset($_POST['password']) ? $_POST['password'] : "";

    $flag = true;

    if (empty($email)) {

        $flag = false;

        $_SESSION['emailErrMsg'] = "Please fill up the email properly";

    } else {

        $_SESSION['email'] = $email;

    }


    if (empty($password)) {

        $flag = false;

        $_SESSION['passwordErrMsg'] = "Please fill up the password properly";

    }


    if ($flag) {

        $isValid = false;


        if ($email === "admin" && $password === "admin") {

            $isValid = true;

        }


        elseif (
            isset($_SESSION['registeredEmail']) &&
            isset($_SESSION['registeredPassword'])
        ) {

            if (
                $email === $_SESSION['registeredEmail'] &&
                $password === $_SESSION['registeredPassword']
            ) {

                $isValid = true;

            }

        }


        if ($isValid) {

            $_SESSION['loggedIn'] = true;

            setcookie(
                "remember_email",
                $email,
                time() + (86400 * 30),
                "/"
            );


            if ($email === "admin" && $password === "admin") {

                $_SESSION['role'] = "admin";

                header("Location: dashboard.php");

            } else {

                $_SESSION['role'] = "user";

                header("Location: user.php");

            }

            exit();

        }


        $_SESSION['passwordErrMsg'] = "Email or password does not match";

    }

}


if (isset($_SESSION['email'])) {

    $email = $_SESSION['email'];

}

elseif (isset($_COOKIE['remember_email'])) {

    $email = $_COOKIE['remember_email'];

}

else {

    $email = "";

}

?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">

    <title>Login | Pharmacy Management System</title>

    <link rel="stylesheet" href="css/login.css">

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
            action="login.php"
            method="POST"
            onsubmit="return validate(this);"
            novalidate
        >

            <h2>Login</h2>


            <div class="input-box">

                <span>👤</span>

                <input
                    type="text"
                    name="email"
                    id="email"
                    value="<?php echo htmlspecialchars($email); ?>"
                    placeholder="Username"
                    required
                >

            </div>


            <div class="input-box">

                <span>🔒</span>

                <input
                    type="password"
                    name="password"
                    id="password"
                    placeholder="Password"
                    required
                >

            </div>


            <button type="submit">
                Login
            </button>


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