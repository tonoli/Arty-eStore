<?php
	include('functions/functions.php')
?>
<!DOCTYPE html>
<html lang='en'>

<head>
	<meta charset='utf-8'>
	<title>Arty | Register</title>

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
	    <form class="login-form" method="POST" enctype="multipart/form-data">
	      <input type="text" placeholder="Login" name="login" />
	      <input type="password" placeholder="Password" name="password"/>
		  <input type="text" placeholder="Email address" name="email"/>
	      <button name="register" value="create_account">create</button>
	      <p class="message">Already registered? <a href="login.php">Sign In</a></p>
	    </form>
	  </div>
	</div>
</body>

<?php
	if(isset($_POST['register'])){
	$login = $_POST['login'];
	$email = $_POST['email'];
	$password = hash(whirpool , $_POST['password']);
	$phone = $_POST['phone'];
	$insert = "INSERT INTO Users (userip, login, password, phone) VALUES ('$ip','$login','$password','$phone')";
	$query = mysqli_query($conn, $insert);


	$sel_cart = "SELECT * FROM Cart WHERE userip='$ip'";
	$run_cart = mysqli_query($conn, $sel_cart);
	$check_cart = mysqli_num_rows($run_cart);
	if($check_cart==0){

	$_SESSION['email']=$email;
	$_SESSION['password']=$password;

	echo "<script>alert('Account has been created successfully, Thanks!')</script>";
	echo "<script>window.open('myaccount.php','_self')</script>";

	}
	else {

	$_SESSION['email']=$email;
	$_SESSION['password']=$password;

	echo "<script>alert('Account has been created successfully, Thanks!')</script>";

	echo "<script>window.open('checkout.php','_self')</script>";


	}
}
	?>
