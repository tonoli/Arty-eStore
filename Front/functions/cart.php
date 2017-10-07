<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "arty_store";
$table = "Cart";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// funtion Add product to Cart

	function add_to_cart(){
		global $conn;
		$product_id = $_GET('product_id');
		$user_ip = getIp();
		$isLogg = isLogg();
		if ($isLogg)
		{
			$user_id = $_SESSION['email'];
			$is_active = 1;
		}
		$check  = "SELECT * FROM Cart WHERE user_id='$userip' AND product_id='$product_id'";
		$querry = mysqli_query($conn, $check);
		if (mysqli_num_rows($querry) > 0)
		{
			exit;
		}
		else {
			$instert = "INSERT INTO $table ('product_id', 'user_id', 'is_active') VALUES ($product_id, $user_id, $is_active)";
			$querry = mysqli_query($conn, $instert);
			echo "<script> window.open('index.php','_self')</script>";
		}
		mysqli_close($conn);
	}

// Function Remove product from Cart

	function remove_from_cart(){
		global $conn;
		$product_id = $_GET('remove_cart');
		$user_ip = getIp();
		$isLogg = isLogg();
		if ($isLogg)
		{
			$user_id = $_SESSION['email'];
			$is_active = 1;
		}


	}

 // function Check the total price of the Products in the check_cart

	function total_price(){
		$total = 0;
		global $conn;
		$ip = getIp();
		$sel_price = "SELECT * FROM Cart WHERE user_ip='$ip'";
		$querry = mysqli_query($conn, $sel_price);
		while($ret = mysqli_fetch_array($querry)){
			$product_id = $ret['product_id'];
			$product_price = "SELECT * FROM Products WHERE product_id='$product_id'";
			$querry_price = mysqli_query($conn, $product_price);
			while ($ret_price = mysqli_fetch_array($querry_price)){
				$price = array($ret_price['product_price']);
				$values = array_sum($price);
				$total +=$values;
			}
		}
		echo "$" . $total;
	}
?>
