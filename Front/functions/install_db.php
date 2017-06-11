<?php
$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "art_store";

// Check connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
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
// Set Products Table
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
    echo "Table Products created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}
echo "<br  />";

?>
