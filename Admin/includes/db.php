<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "art_store";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (mysqli_connect_errno())
  echo "Failed to connect to MySQL: " . mysql_connect_error();
?>
