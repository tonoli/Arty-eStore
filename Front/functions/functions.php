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

Display fucntions

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
