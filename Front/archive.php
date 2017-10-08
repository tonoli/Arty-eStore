<?php
	session_start();

	$conn = mysqli_connect("localhost", "root", "root", "arty_store");
	if (!$conn) {
	  header("../error_db.php");
	  echo ("Connection failed: " . mysqli_connect_error());
	}
	if ($_SESSION['commande'])
	{
		$user = $_SESSION['login'];
		foreach ($_SESSION['commande'] as $key => $value) {
			if ($value > 0)
			{
				$new_pan = $_SESSION['commande'];
				$insert_pan = "INSERT INTO Cart (user_login, product_id, nbr) VALUES ('$user', '$key', '$value');";
		  	  $run_pan = mysqli_query($conn, $insert_pan);
		  	  if ($run_pan)
		  	  {
		  	    echo "<script>alert('New Panier has been inserted!')</script>";
		  	    echo "<script>window.open('index.php', '_self')</script>";
		  	  }
		  	  else {
		  	      echo "Error: " . $insert_pan . "<br>" . mysqli_error($conn);
		  	  }
			}
		}
	}
?>
