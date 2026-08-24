<?php
session_start();

$errorMessage = "";

if ($_SERVER['REQUEST_METHOD'] === "POST") {
	$username = isset($_POST['username']) ? trim($_POST['username']) : "";
	$newPassword = isset($_POST['newPassword']) ? $_POST['newPassword'] : "";
	$confirmPassword = isset($_POST['confirmPassword']) ? $_POST['confirmPassword'] : "";

	if (empty($username) || empty($newPassword) || empty($confirmPassword)) {
		$errorMessage = "Please fill up all fields properly";
	}
	elseif (!isset($_SESSION['registeredEmail']) || $username !== $_SESSION['registeredEmail']) {
		$errorMessage = "Username does not match any registered account";
	}
	elseif ($newPassword !== $confirmPassword) {
		$errorMessage = "Passwords do not match";
	}
	else {
		$_SESSION['registeredPassword'] = $newPassword;
		$_SESSION['email'] = $username;
		header("Location: login.php");
		exit();
	}
}
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Forgot Password</title>
	<link rel="stylesheet" href="css/forgot.css">
</head>

<body>

<div class="container">

	<div class="left">
		<h1>Reset Password</h1>
		<p>Enter your username and create a new password.</p>
	</div>

	<div class="right">
		<form action="" method="POST" onsubmit="return validateForgot(this);" novalidate>
			<h2>Forgot Password</h2>

			<p class="description">Use the username from your registered account.</p>

			<div class="input-box">
				<span>👤</span>
				<input type="text" name="username" placeholder="Username" required>
			</div>

			<div class="input-box">
				<span>🔒</span>
				<input type="password" name="newPassword" placeholder="New Password" required>
			</div>

			<div class="input-box">
				<span>🔒</span>
				<input type="password" name="confirmPassword" placeholder="Confirm Password" required>
			</div>

			<button type="submit">Reset Password</button>

			<p class="back-login">
				Remember your password?
				<a href="login.php">Login</a>
			</p>

			<?php echo $errorMessage; ?>
		</form>
	</div>

</div>

<script src="js/forgot.js"></script>

</body>
</html>
