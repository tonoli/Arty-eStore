<?php

// Includes
include ("cart.php");

// ID USER

$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "art_store";
$table = "Products";

// Connect to the DB

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
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
	if (isset($_SESSION['email']) AND isset($_SESSION['password']))
	{
		$querry = mysql_query("SELECT * FROM Users WHERE email='".$_SESSION['email']."' ");
		$reponse = mysql_fetch_assoc($querry);
		mysqli_close();
		$isLogg = ($reponse && $reponse['password'] === $_SESSION['password']) ? 1 : 0;
	}
	else
	{
		$isLogg = 0;
	}
	return ($isLogg);
}


// Display fucntions


	function get_product(){
		global $conn;
		$get_products = "SELECT * FROM Products";
		$querry = mysqli_query($conn, $get_products);
		$i = 0;
		while ($ret_products = mysqli_fetch_array($querry) && $i < 16)
		{
		$product_id = $ret_products['product_id'];
		$product_title = $ret_products['product_title'];
      	$product_cat = $ret_products['product_cat'];
      	$product_author = $ret_products['product_author'];
      	$product_image = $ret_products['product_image'];
		$product_price = $ret_products['product_price'];
		$product_desc = $ret_products['product_desc'];
		$i++;
		echo ($product_id);
		echo "
			<article class='list-item'>
					<img src='$product_image' alt=''>
					<div class='details'>

						<h2>$product_title</h2>
						<p>$product_author</p>
						<p>$ $product_price</p>
						<a href='index.php?product_id=$product_id'> <button>Add</button></a>
					</div>
			</article>
			";
		}
	}

	function get_customer(){
		global $conn;
		$is_Logg= isLogg();
		if (!$isLogg)
		{
			echo "<h2> You are not registered yet!</h2>
			<a href='/register.php'><button>Please register</button></a>";
		}
		else
		{
			$get_user = "SELECT * FROM Users WHERE email='".$_SESSION['email']."' ";
			$querry = mysqli_query($conn, $get_user);
			$ret_user = mysqli_fetch_array($querry);
			$firstname = $ret_user['firstname'];
			$lastname = $ret_user['lastname'];
			$email = $ret_user['email'];
			$phone = $ret_user['phone'];

			echo "
				<h1> Hello $firstname, how are you doing?	</h1>
				</br></br>
				<p>Please find below your account informations:</p>
				<p>Name : $firstname</p>
				<p>Surname : $lastname</p>
				<p>eMail : $email</p>
				<p>Phone : $phone</p>
				<a href='/my_account?delete=$email'><button>Delete account</button></a>
			";
		}
	}

?>
