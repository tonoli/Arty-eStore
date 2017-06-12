<?php
session_start();
if(!isset($_SESSION['admin_email']))
{
	echo "<script>window.open('log_in.php?not_admin=You are not an admin!', '_self') </script>";
}
else {
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
					include("insert_product.php");
				if (isset($_GET['view_product']))
					include("view_product.php");
				if (isset($_GET['edit_pro']))
					include ("edit_pro.php");
				if (isset($_GET['insert_cat']))
					include ("insert_cat.php");
				if (isset($_GET['view_cats']))
					include ("view_cats.php");
				?>
			</div>
</body>
</html>
<?php } ?>
