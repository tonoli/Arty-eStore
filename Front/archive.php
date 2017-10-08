<?php
	session_start();

	$user = $_SESSION['login'];
	include ("../Admin/includes/db.php");
	if (($_SESSION['commande'])
	{
		foreach ($_SESSION['commande'] as $key => $value) {
			if ($value > 0)
			{
				$new_pan = $_SESSION['commande'];
				$insert_pan = "INSERT INTO Panier values ('$user, $key, $value')";
		  	  $run_pan = mysqli_query($conn, $insert_pan);
		  	  if ($run_pan)
		  	  {
		  	    echo "<script>alert('New Panier has been inserted!')</script>";
		  	    echo "<script>window.open('index.php?view_cats', '_self')</script>";
		  	  }
		  	  else {
		  	      echo "Error: " . $insert_pan . "<br>" . mysqli_error($conn);
		  	  }
			}
		}
	}
?>
