<?php
$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "art_store";

// Check connection
$conn = mysqli_connect($servername, $username, $password);
echo "<br/>";
if (!$conn)
{
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

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn)
{
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
echo "<br/>";
echo "<br/>";

/* ******************* Set Products Table ***************** */

$sql = "CREATE TABLE IF NOT EXISTS Products (
product_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
product_title VARCHAR(50) NOT NULL,
product_cat VARCHAR(50) NOT NULL,
product_author VARCHAR(50) NOT NULL,
product_image CHAR(255) NOT NULL,
product_price INT(6) NOT NULL,
product_desc TEXT NOT NULL,
product_active INT(1)
)";
// Check table creation
echo "<br  />";
if (mysqli_query($conn, $sql)) {
    echo "Table PRODUCTS created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}
echo "<br  />";

/* ******************* Set Users Table ***************** */

$sql = "CREATE TABLE IF NOT EXISTS Users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
userip VARCHAR(50) NOT NULL,
first_name VARCHAR(50) NOT NULL,
last_name VARCHAR(50) NOT NULL,
email VARCHAR(100) NOT NULL,
password VARCHAR(100) NOT NULL,
phone VARCHAR(50) NOT NULL,
hash VARCHAR(32) NOT NULL,
is_active INT(1)
)";

// Check table creation
echo "<br  />";
if (mysqli_query($conn, $sql)) {
    echo "Table USERS created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}
echo "<br  />";

/* ******************* Categories Table ***************** */

$sql = "CREATE TABLE IF NOT EXISTS Categories(
Abstract CHAR(50) NOT NULL,
Seascapes CHAR(50) NOT NULL,
Landscapes CHAR(50) NOT NULL,
Nude CHAR(50) NOT NULL,
Minimalism CHAR(50) NOT NULL,
Surrealism CHAR(50) NOT NULL,
Cubism CHAR(50) NOT NULL
)";

// Check table creation
echo "<br  />";
if (mysqli_query($conn, $sql)) {
    echo "Table CAEGORIES created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}
echo "<br  />";

/* ******************* Cart Table ***************** */

$sql = "CREATE TABLE IF NOT EXISTS Cart(
product_id INT(10) NOT NULL,
user_ip CHAR(50) NOT NULL,
user_id CHAR(50)
is_active INT(1)
)";

// Check table creation
echo "<br  />";
if (mysqli_query($conn, $sql)) {
    echo "Table CART created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}
echo "<br  />";


?>
