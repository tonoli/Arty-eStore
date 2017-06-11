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
	<script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
	<div class="home">
		  <p><a href="/Arty/Front">Home</a></p>
	</div>
	<div class="login-page">
	  <div class="form">
	    <form class="login-form">
	      <input type="text" placeholder="First Name" name="firstname" />
		  <input type="text" placeholder="Last Name" name="lastname" />
	      <input type="password" placeholder="Password" name="password"/>
		  <input type="password" placeholder="Repeat password"/>
		  <input type="text" placeholder="Email address" name="email"/>
		  <input type="text" placeholder="Phone number" name="phone"/>
	      <button name="register">create</button>
	      <p class="message">Already registered? <a href="/Arty/Front/login.php">Sign In</a></p>
	    </form>
	  </div>
	</div>
</body>

<?php
	$ip = getIp();
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
	$hash = md5(rand (0, 1000));
	$phone = $_POST['phone'];

	$insert = "INSERT INTO Users (userip,first_name,last_name,email,password,phone,hash) VALUES ('$ip','$first_name','$last_name','$email','$password','$phone','$hash')";

	$query = mysqli_query($conn, $insert);
	//	QUERY CHECK
	if (mysqli_query($conn, $insert)) {
	    echo "New record created successfully";
	} else {
	    echo "Error: " . $insert . "<br>" . mysqli_error($conn);
	}
	echo $password.'</br>';
	echo $hash.'</br>';


/*
	$sel_cart = "SELECT * FROM Cart WHERE userip='$ip'";

	$run_cart = mysqli_query($conn, $sel_cart);

	$check_cart = mysqli_num_rows($run_cart);

	if($check_cart==0){

	$_SESSION['customer_email']=$email;

	echo "<script>alert('Account has been created successfully, Thanks!')</script>";
	echo "<script>window.open('customer/my_account.php','_self')</script>";

	}
	else {

	$_SESSION['customer_email']=$email;

	echo "<script>alert('Account has been created successfully, Thanks!')</script>";

	echo "<script>window.open('checkout.php','_self')</script>";


	}
*/
	?>
