<?php
session_start();
?>

<!DOCTYPE html>
<html lang='en'>
<head>
	<?php

	include ("functions/functions.php");
		if ($_GET['login'] != "" && $_GET['password'] != "" && $_GET['submit'] == "OK"){
			if (auth($_GET['login'], $_GET['password'])){
				echo '<meta http-equiv="refresh" content="0; URL=http://localhost:8080/">';
			}
		}
		?>
	<meta charset='utf-8'>
	<title>Arty | Login</title>

	<!-- Links -->
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<link type="text/javascript" href="js/script.js">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Kaushan+Script|Lato|Raleway|Roboto" rel="stylesheet">
</head>
<body>
	<div class="home">
		<p><a href="index.php">Home</a></p>
	</div>
	<div class="login-page">
	  <div class="form">
	    <form class="login-form" method="GET">
	      <input type="text" name="login" placeholder="Login"/>
	      <input type="password" name="password" placeholder="Password"/>
	      <button type="submit" name="submit" value="OK">login</button>
	      <p class="message">Not registered? <a href="register.php">Create an account</a></p>
	    </form>
	  </div>
	</div>
</body>
<?php


?>
