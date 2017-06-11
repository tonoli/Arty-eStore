<?php
$servername = "localhost";
$username = "itonoli";
$password = "password";
$dbname = "art_store";
$table = "Products";

// Connect to the DB

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

<<<<<<< HEAD
Display fucntions
=======
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

// Display fucntions
>>>>>>> 7e4c15b60f294725329ae3b6e29c60727422b5cc

	function get_product(){
		global $conn;
		$get_products = "SELECT * FROM Products WHERE id='1'";
		$querry = mysqli_query($conn, $get_products);
		if (!$querry) {
		echo (mysqli_error($conn));
    	exit();
		}
		while ($row_products = mysqli_fetch_array($querry)){
      $product_title = $row_products['product_title'];
      $product_cat = $row_products['product_cat'];
      $product_author = $row_products['product_author'];
      $product_image = $row_products['product_image'];
			$product_price = $row_products['product_price'];
			$product_desc = $row_products['product_desc'];
			echo "<img src='$product_img' title='$product_name'>";
			echo "<p> Price : $ $product_price</p>";
		}
	}


?>
