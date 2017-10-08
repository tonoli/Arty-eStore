<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "arty_store";
global $conn;
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (mysqli_connect_errno()){
  header("../../Front/error_db.php");
  echo "Failed to connect to MySQL: " . mysql_connect_error();
}

?>
