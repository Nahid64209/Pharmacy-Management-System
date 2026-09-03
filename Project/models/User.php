<?php


require_once 'dbconn.php';


function registerUser($fullname, $email, $username, $password) {
    $conn = connect();
 

    $sql = "INSERT INTO users (fullname, email, username, password)
        VALUES ('$fullname', '$email', '$username', '$password')";
    $result = mysqli_query($conn, $sql);

    if ($result)
        return true;
    return false;
}

function userExists($email, $username) {
    $conn = connect();

    $sql = "SELECT id FROM users WHERE email = '$email' OR username = '$username'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0)
        return true;
    return false;
}

function emailExists($email) {
    $conn = connect();

    $sql = "SELECT id FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0)
        return true;
    return false;
}

function usernameExists($username) {
    $conn = connect();

    $sql = "SELECT id FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0)
        return true;
    return false;
}

function getUsers() {
    $conn = connect();

    $sql = "SELECT id, fullname, email, username ,password FROM users";
    $result = mysqli_query($conn, $sql);

    return $result;
}

function getUser($username) {
    $conn = connect();

    $sql = "SELECT id, fullname, email, username, password FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);

    return mysqli_fetch_assoc($result);
}

function updateUser($oldUsername, $fullname, $email, $username, $password ) {
    $conn = connect();

    $sql = "UPDATE users SET fullname = '$fullname', email = '$email',
        username = '$username', password = '$password'
        WHERE username = '$oldUsername'";
    $result = mysqli_query($conn, $sql);

    if ($result)
        return true;
    return false;
}

function loginUser($username, $password) {
    $conn = connect();

    $sql = "SELECT id FROM users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1)
        return true;

    return false;
}

function getUserEmail($username) {
    $conn = connect();

    $sql = "SELECT email FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    return $row['email'];
}

function updatePassword($username, $password) {
    $conn = connect();


    $sql = "UPDATE users SET password = '$password' WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);

    if ($result)
        return true;
    return false;
}

function deleteUser($username) {
    $conn = connect();

    $sql = "DELETE FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);

    if ($result)
        return true;
    return false;
}



?>
