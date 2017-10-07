<?php

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "arty_store";

// Connection to mysql
$conn = mysqli_connect($servername, $username, $password);
echo "<br/>";
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
echo "<br/>";

// Connection to DB
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "<br/>";

/*********************************/
/*           ResetDB             */
/*********************************/

$sql = "DROP TABLE IF EXISTS Users, Products, Categories, Cart";
echo "<br  />";
if (mysqli_query($conn, $sql)) {
    echo "Tables deleted successfully";
} else {
    echo "Error deleting tables : " . mysqli_error($conn);
}
echo "<br  />";
?>
