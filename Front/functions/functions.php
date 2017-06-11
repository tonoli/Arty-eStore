<?php
$servername = "localhost";
$username = "itonoli";
$password = "password";
$dbname = "Arty_shop";
$table = "Products";

// Connect to the DB

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Display fucntions

	function get_product(){
		global $conn;
		$get_products = "SELECT * FROM Products WHERE id='1'";
		$querry = mysqli_query($conn, $get_products);
		if (!$querry) {
		echo (mysqli_error($conn));
    	exit();
		}
		while ($row_products = mysqli_fetch_array($querry)){
			$product_price = $row_products['price'];
			$product_name = $row_products['name'];
			$product_description = $row_products['description'];
			$product_img = $row_products['img_path'];
			echo "<img src='$product_img' title='$product_name'>";
			echo "<p> Price : $ $product_price</p>";
		}
	}

?>
