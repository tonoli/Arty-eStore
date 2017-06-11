<?php
$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "Arty_shop";

// Check connection
$conn = mysqli_connect($servername, $username, $password);
echo "<br/>";
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
echo "<br/>";

// DataBase creation

$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
echo "<br/>";
if (mysqli_query($conn, $sql)) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . mysqli_error($conn);
}
echo "<br/>";

// Check connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "<br/>";

// Set Products Table
$sql = "CREATE TABLE IF NOT EXISTS Products (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
price INT(6) NOT NULL,
name VARCHAR(50) NOT NULL,
description TEXT NOT NULL,
img_path CHAR(255) NOT NULL,
is_active INT(1)
)";

// Check table creation
echo "<br  />";
if (mysqli_query($conn, $sql)) {
    echo "Table Products created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}
echo "<br  />";

?>
