<?php

// Includes
include ("cart.php");

// ID USER

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "arty_store";
$table = "Products";

// Connect to the DB

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    header("../error_db.php");
    echo ("Connection failed: " . mysqli_connect_error());
}

// Other functions

function GetIP()
{
if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown"))
$ip = getenv("HTTP_CLIENT_IP");
else if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown"))
$ip = getenv("HTTP_X_FORWARDED_FOR");
else if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown"))
$ip = getenv("REMOTE_ADDR");
else if (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown"))
$ip = $_SERVER['REMOTE_ADDR'];
else
$ip = "unknown";
return($ip);
}

function isLogg(){
	if (isset($_SESSION['login']))
	{
		$querry = mysqli_query($conn, "SELECT * FROM Users WHERE login='".$_SESSION['login']."' ");
		$reponse = mysqli_fetch_assoc($querry);
		mysqli_close();
		$isLogg = ($reponse) ? 1 : 0;
	}
	else {
		$isLogg = 0;
	}
	return ($isLogg);
}

function auth($login, $passwd){
      $conn = mysqli_connect("localhost", "root", "root", "arty_store");
      if (!$conn) {
        header("../error_db.php");
        echo ("Connection failed: " . mysqli_connect_error());
      }
      $get_user = "SELECT * FROM Users WHERE login='" . $login . "'";
      $querry = mysqli_query($conn, $get_user);
      if ($querry){
        $reponse = mysqli_fetch_assoc($querry);
        if (hash('whirlpool', $passwd) == $reponse['password']){
          $_SESSION['status'] = $reponse['admin'];
          $_SESSION['login'] = $reponse['login'];
          return true;
        }
        else
          return false;
      }
      return false;
}

?>
