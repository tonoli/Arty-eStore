<?php
	// Start the session
	session_start();
	// Includes functions and db
	include("functions/functions.php");
	if ($_GET['product_id'])
	{
		$_SESSION['commande'][$_GET['product_id']] += 1;
		header('Location: index.php');
	}
?>

<!DOCTYPE html>
<html lang='en'>

<head>
	<meta charset='utf-8'>
	<title>Arty | Browse the Art</title>

	<!-- Links -->
	<link rel="stylesheet" type="text/css" href="./css/style.css">
	<link type="text/javascript" href="js/script.js">
	<link rel="stylesheet" href="./css/font-awesome.min.css">
	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Kaushan+Script|Lato|Raleway" rel="stylesheet">


</head>

<body>
	<div class="wrapper">
		<div class="header">
			<div class="nav">
				<a href="index.php"><img class="brand-logo" src="img/logo.png"></a>
				<div class = "nav-options">
					<div classs="account-log">
					<ul>
						<li class="search"><i class="fa fa-search" aria-hidden="true"></i>
						</li>

						<?php

						if($_SESSION['login']){
							echo "<li><a href=\"logout.php\">Log Out</a></li>";
						}
						else{
							echo '<li><a href="register.php">Join</a></li>';
							echo "<li><a href=\"login.php\">Sign in</a></li>";
						}

						?>

							<?php if($_SESSION['login']) {
							echo ('<li class="hello"> Bonjour '.$_SESSION['login'] . '!</li>');}
							else { echo '<li class="hello"> Bonjour Visiteur </li>';} ?>

						<li><a href="panier.php"><i class="fa fa-shopping-basket"></i></a></li>
					</ul>
					</div>
					<!-- <div class="cart-bar">
					<ul>
						<li id="first">
							<ul id="drop">

							</ul>
						</li>
					</ul>
					</div> -->
				</div>
			</div>
		</div>
		<div class="sider">
			<div class="section-title">
				<h2>Categories</h2>
			</div>
			<?php include ("functions/add_cat.php"); ?>
			<div class="section-title">
				<h2>Artists</h2>
			</div>
			<div class="products-nav">
				<ul>
				<li><a href="/Front/index.php?cat=Picasso">Picasso</a></li>
				<li><a href="/Front/index.php?cat=Manet">Manet</a></li>
				<li><a href="/Front/index.php?cat=Banksy">Banksy</a></li>
				<li><a href="/Front/index.php?cat=itonoli">itonoli</a></li>
				<li><a href="/Front/index.php?cat=Courbet">Courbet</a></li>
				</ul>
			</div>
		</div>
	<div class="content">
			<div class="list">
				<?php include ("functions/add_product.php"); ?>
			</div>
	</div>
	<div class="footer">
	</div>
	</div>
</body>

</html>
