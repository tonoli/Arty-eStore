<!DOCTYPE HTML>
<html>
	<head>
		<meta charset = "utf-8"/>
		<title> Online Art Gallery </title>
		<link rel= "stylesheet" href= "styles/admin_styles.css" media = "all" />
	</head>
<body>
	<div class = "main_wrapper">
		<div id = "header"><h1>Manage your content</h1>
			<!-- <img src = "images/admin.png" style= "width:130px; margin-top:-150px;""> -->
	</div>
			<div id = "right">
			<h2 style = "text-align: center; color: white; font-family: Georgia"> Manage Content: </h2>
				<a href= "index.php?insert_product"> Insert New Product</a></br>
				<a href= "index.php?view_product"> View All Product</a></br>
				<a href= "index.php?insert_cats"> Insert New Category</a></br>
				<a href= "index.php?view_cats"> View All Categories</a></br>
				<a href= "index.php?view_customers"> View Customers</a></br>
				<a href= "index.php?view_orders"> View Orders</a></br>
				<a href= "logout.php"> Admin Logout</a> </div></div>
			<div id = "left">
				<?php
				if (isset($_GET['insert_product']))
					include("insert_product.php");
				if (isset($_GET['view_product']))
					include("view_product.php");
				?>
			</div>
</body>
</html>
