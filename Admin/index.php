<?php

session_start();

if(!($_SESSION['login'])){


	echo "<!DOCTYPE HTML>
	<html>
		<head>
		<meta charset = \"utf-8\"/>
		<title> Online Art Gallery </title>

		<link rel= \"stylesheet\" href= \"styles/admin_styles.css\" media = \"all\" />
		<!-- Fonts -->
		<link href=\"https://fonts.googleapis.com/css?family=Kaushan+Script|Lato|Raleway\" rel=\"stylesheet\">
		</head>
		<body>
		<h1 class=\"titre\">Sorry but it seams that you are not Administrator</h1>
		<div class=\"btn\">
		<a class=\"admin-btn\" href=\"../\" > Home </a>
		<a class=\"admin-btn\" href=\"../Front/login.php\" > Login </a> </div>
		</body>
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
					<head>
					<meta charset = \"utf-8\"/>
					<title> Online Art Gallery </title>

					<link rel= \"stylesheet\" href= \"styles/admin_styles.css\" media = \"all\" />
					<!-- Fonts -->
					<link href=\"https://fonts.googleapis.com/css?family=Kaushan+Script|Lato|Raleway\" rel=\"stylesheet\">
					</head>
					<body>
					<h1 class=\"titre\">Sorry but it seams that you are not Administrator</h1>
					<div class=\"btn\">
					<a class=\"admin-btn\" href=\"../\" > Home </a>
					<a class=\"admin-btn\" href=\"../Front/login.php\" > Login </a> </div>
					</body>
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

					<link rel= "stylesheet" href= "styles/admin_styles.css" media = "all" />
					<!-- Fonts -->
					<link href="https://fonts.googleapis.com/css?family=Kaushan+Script|Lato|Raleway" rel="stylesheet">
				</head>
			<body>
				<div class = "main_wrapper">
					<div id = "header">
						<h1 id="adm-title">Administration Pannel</h1>
						<!-- <img src = "images/admin.png" style= "width:130px; margin-top:-150px;""> -->
					</div>
						<div class = "sider">
						<h2 id ="manage"> Manage Content </h2>
						<ul>
							<li><a href= "index.php?insert_product"> Insert Product</a></li>
							<li><a href= "index.php?view_product"> View Product</a></li>
							<li><a href= "index.php?insert_cat"> Insert Category</a></li>
							<li><a href= "index.php?view_cats"> View Categories</a></li>
							<li><a href= "index.php?insert_customers"> Insert Users</a></li>
							<li><a href= "index.php?view_customers"> View Users</a></li>
							<li><a href= "index.php?view_Panier"> View Panier</a></li>
							<li></li>
						</ul>
					</br></br></br>
						<a class="admin-btn" href= "../Front/logout.php"> Logout</a></br></br></br>
						<a class="admin-btn" href="../">Home</a>
						</div>

						<div class = "content">
							<?php
							if (isset($_GET['insert_product']))
								include("functions/insert_product.php");
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
							if (isset($_GET['insert_customers']))
								include ("functions/insert_customers.php");
							if (isset($_GET['view_customers']))
								include ("functions/view_customers.php");

							?>
						</div>
						</div>
			</body>
			</html>

		<?php }}} ?>
