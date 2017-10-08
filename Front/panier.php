<?php
	// Start the session
	session_start();
	// Includes functions and db
	include("functions/functions.php");

	if ($_GET['product_id'])
	{
		$_SESSION['commande'][$_GET['product_id']] -= 1;
		header('Location: panier.php');
	}

	$panier = "";
	$total = 0;
	$boo = false;
	if ($_SESSION['commande'])
	{
		foreach ($_SESSION['commande'] as $key => $value) {
			if ($value > 0)
			{
				$boo = true;
				$get_pro = "SELECT * FROM Products WHERE id='".$key."'";
		      	$run_pro = mysqli_query($conn, $get_pro);
		      	$product = mysqli_fetch_array($run_pro);
		        $total += $product['price'] * $value;
				$panier = $panier . "<div>".$value." ".$product['name']."-".$product['description']." : ".$product['price']."€ <a href=\"panier.php?product_id=".$key."\"> Enlever</a></div>";
			}
		}
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
							echo '		<li><a href="register.php">Join</a></li>';
							echo "<li><a href=\"login.php\">Sign in</a></li>";
						}

						?>
					</ul>
					</div>
					<div class="cart-bar">
					<ul>
						<li id="first">
							<ul id="drop">
								<li>
									<?php if($_SESSION['login']) {
									echo "Bonjour " . $_SESSION['login'];}
									else { echo "Not logged" ;} ?>
								</li>
								<li><a href="panier.php"><i class="fa fa-shopping-basket"></i></a></li>
							</ul>
						</li>
					</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="panier">
			<h3 style="text-align: center;">Panier</h3>
				<?php echo $panier;
				if ($boo == true)
				{
				?>
				<h4>Total de la commande : <?php echo $total; ?>€</h4>
				<br/><br/>
				<?php if($_SESSION['login']){ ?>
					<a href="archive.php" style="text-decoration: none; padding = 7px; display: inline-block;">Save</a>
				<?php }}?>
				<br/><br/>
		</div>
	<div class="footer">
	</div>
	</div>
</body>

</html>
