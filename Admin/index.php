<?php
session_start();
if(isset($_SESSION['login']))
{
	$get_users = "SELECT * FROM Users WHERE admin = 1";
	$run_users = mysqli_query($conn, $get_users);
	$i = 0;
	while ($user = mysqli_fetch_array($run_users)){
		if($_SESSION['login'] == $user['login']){
			break ;
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
							<a href= "logout.php"> Admin Logout</a> </div></div>
						<div id = "left">
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
							?>
						</div>
			</body>
			</html>
		<?php }
		$i++;
	}
	header('Location: ../Front/login.php'); 
}
else{

	header('Location: ../Front/login.php');
}
 ?>
