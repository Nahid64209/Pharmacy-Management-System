<?php
$conn = mysqli_connect("localhost", "root", "", "pharmacy");

$sql = "CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
    
)";

if (mysqli_query($conn, $sql)) {
    echo "Users table created successfully!";
} else {
    echo "Error: " . mysqli_error($conn);
}

$sql = "CREATE TABLE cart (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    medicine VARCHAR(100) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    quantity INT NOT NULL
)";

if (mysqli_query($conn, $sql)) {
    echo "Cart table created successfully!";
} else {
    echo "Error: " . mysqli_error($conn);
}

$sql = "CREATE TABLE payment (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    customer VARCHAR(100) NOT NULL,
    amount DECIMAL(10, 2) NOT NULL,
    method VARCHAR(30) NOT NULL,
    phone VARCHAR(30) NOT NULL
   
)";

if (mysqli_query($conn, $sql)) {
    echo "Payment table created successfully!";
} else {
    echo "Error: " . mysqli_error($conn);
}

?>
