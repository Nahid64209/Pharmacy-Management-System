<?php

require '../models/User.php';

function updateUserPassword($username, $password, $confirm) {
    if (empty($username) || empty($password) || empty($confirm)) {
        return "Please fill up all fields properly";
    }

    if ($password !== $confirm) {
        return "Passwords do not match";
    }

    return updatePassword($username, $password) ? "" : "Could not update password";
}

?>
