<?php

session_start();

if(!($_SESSION['login'])){


	echo "<!DOCTYPE HTML>
	<html>
		<h1> You are not Administrator  </h1>
		<a href=\"../\" > Click here to redirect </a>
	</html>
		";

}
else
{

	$conn = mysqli_connect("localhost", "root", "root", "arty_store");
	if (!$conn) {
		header("../error_db.php");
		echo ("Connection failed: " . mysqli_connect_error());
	}

	$get_user = "SELECT * FROM Users WHERE login='" . $_SESSION['login'] . "'";
	$run_users = mysqli_query($conn, $get_user);
	if ($run_users){
		$user = mysqli_fetch_array($run_users);
			if($user['admin'] != 1){
				echo "<!DOCTYPE HTML>
				<html>
					<h1> You are not Administrator  </h1>
					<a href=\"../\" > Click here to redirect </a>
				</html>
					";
			}
			else{
		?>
			<!DOCTYPE HTML>
			<html>
				<head>
					<meta charset = "utf-8"/>
					<title> Online Art Gallery </title>
					<link rel= "stylesheet" href= "../styles/admin_styles.css" media = "all" />
				</head>
			<body>
				<div class = "main_wrapper">
					<div id = "header"><h1>Manage your content:</h1>
						<!-- <img src = "images/admin.png" style= "width:130px; margin-top:-150px;""> -->
				</div>
						<div id = "right">
						<h2 style = "text-align: center; color: white; font-family: Georgia"> Manage Content: </h2>
							<a href= "index.php?insert_product"> Insert New Product</a></br>
							<a href= "index.php?view_product"> View All Product</a></br>
							<a href= "index.php?insert_cat"> Insert New Category</a></br>
							<a href= "index.php?view_cats"> View All Categories</a></br>
							<a href= "index.php?view_customers"> View Customers</a></br>
							<a href= "index.php?view_Panier"> View Panier</a></br>
							<a href= "../Front/logout.php"> Logout</a> </div></div>
						<div id = "left">
							<?php
							//if (isset($_GET['insert_product']))
								// include("functions/insert_product.php");
							if (isset($_GET['view_product']))
								include("functions/view_product.php");
							if (isset($_GET['edit_pro']))
								include ("functions/edit_pro.php");
							if (isset($_GET['insert_cat']))
								include ("functions/insert_cat.php");
							if (isset($_GET['view_cats']))
								include ("functions/view_cats.php");
							if (isset($_GET['view_Panier']))
								include ("functions/view_Panier.php");
							if (isset($_GET['view_customers']))
								include ("functions/view_customers.php");

							?>
						</div>
			</body>
			</html>

		<?php }}} ?>
