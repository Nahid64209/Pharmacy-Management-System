<?php
require '../models/User.php';

$username = isset($_POST['username']) ? $_POST['username'] : "";

if ($username === "")
    exit();

if (usernameExists($username))
    echo "Username already exists";
else
    echo "Username available";
?>