<?php
require '../models/User.php';

$email = isset($_POST['email']) ? $_POST['email'] : "";

if ($email === "")
    exit();

if (emailExists($email))
    echo "Email already exists";
else
    echo "Email available";
?>