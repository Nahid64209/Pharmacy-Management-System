<?php
require '../models/User.php';
session_start();

$_SESSION['emailErrMsg'] = "";
$_SESSION['passwordErrMsg'] = "";
$_SESSION['globalErrMsg'] = "";

if ($_SERVER['REQUEST_METHOD'] === "POST") {

	$username = isset($_POST['username']) ? trim($_POST['username']) : "";
	$password = isset($_POST['password']) ? $_POST['password'] : "";

	$flag = true;

	if (empty($username)) {
		$flag = false;
		$_SESSION['emailErrMsg'] = "Please fill up the username properly";
	} else {
		$_SESSION['rememberUser'] = $username;
	}

	if (empty($password)) {
		$flag = false;
		$_SESSION['passwordErrMsg'] = "Please fill up the password properly";
	}

	if ($flag) {
		$isValid = false;

		if ($username === "admin" && $password === "admin") {
			$isValid = true;
		} else {
			$isValid = loginUser($username, $password);
		}

		if ($isValid) {
			$_SESSION['loggedIn'] = true;

			if ($username !== "admin") {
				$_SESSION['email'] = getUserEmail($username);
			}

			setcookie(
				"remember_username",
				$username,
				time() + (86400 * 30),
				"/"
			);

			if ($username === "admin" && $password === "admin") {
				$_SESSION['role'] = "admin";
				header("Location: ../view/dashboard.php");
			} else {
				$_SESSION['role'] = "user";
				header("Location: ../view/user.php");
			}

			exit();
		}

		$_SESSION['passwordErrMsg'] = "Username or password does not match";
	}
}

header("Location: ../view/login.php");
exit();
?>
