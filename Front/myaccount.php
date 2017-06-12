<!DOCTYPE html>
<?php
	// Start the session
	//session_start();

	// Includes functions and db
	include("functions/functions.php");

?>

<html lang='en'>

<head>
	<meta charset='utf-8'>
	<title>Arty | Browse the Art</title>

	<!-- Links -->
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link type="text/javascript" href="js/script.js">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Kaushan+Script|Lato|Raleway" rel="stylesheet">


</head>

<body>
	<div class="wrapper">
		<div class="header">
			<div class="nav">
				<a href="/Arty/Front/index.php"><img class="brand-logo" src="img/logo.png"></a>
				<div class = "nav-options">
					<div classs="account-log">
					<ul>
						<li class="search"><i class="fa fa-search" aria-hidden="true"></i>
						<form id="search-bar" method="get" action="result.php" enctype="multipart/form-data">
								<input type="text" name="user_query" placeholder="Search a product"/>
								<input type="submit" name="Search" value="Search" />
						</form>
						</li>
						<li><a href="/Arty/Front/register.php">Join</a></li>
						<li><a href="/Arty/Front/login.php">Sign in</a></li>
						<li><a href="#">About</a></li>
					</ul>
					</div>
					<div class="cart-bar">
					<ul>
						<li id="first"><a href="/cart">
							<ul id="drop">
								<li><a href="#">My account</a></li>
								<li><a href="#">Saved items</a></li>
								<li><a href="#"><i class="fa fa-shopping-basket"></i></a></li>
							</ul>
						</a></li>
					</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="sider">
			<div class="section-title">
				<h2>Creations</h2>
			</div>
			<div class="products-nav">
				<ul>
				<li><a href="/paintings">Paintings</a></li>
				<li><a href="/photography">Photography</a></li>
				<li><a href="/drawings">Drawings</a></li>
				<li><a href="/sculpture">Sculpture</a></li>
				<li><a href="/collage">Collage</a></li>
				<li><a href="/prints">Prints</a></li>
				</ul>
			</div>
			<div class="section-title">
				<h2>Artists</h2>
			</div>
			<div class="products-nav">
				<ul>
				<li><a href="/paintings">Picasso</a></li>
				<li><a href="/photography">Van Gogh</a></li>
				<li><a href="/drawings">Monet</a></li>
				<li><a href="/sculpture">Rambrandt</a></li>
				<li><a href="/collage">Matisse</a></li>
				<li><a href="/prints">Gauguin</a></li>
				</ul>
			</div>
		</div>

	<div class="content">
			<?php get_customer() ?>

	</div>

	<div class="footer">
		<h1> (c) Arty a 42 Company </h1>
	</div>

	</div>
</body>

</html>
