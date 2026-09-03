<?php

require '../models/User.php';

if (isset($_GET['username'])) {
    $username = $_GET['username'];
    deleteUser($username);
}

header("Location: ../view/dashboard.php");
exit();

function deleteUserPost($username) {
    if (empty($username)) {
        return false;
    }

    return deleteUser($username);
}

?>
