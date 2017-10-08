
<form action="" method="post" style = "padding:100px;" >
<h2 style = "color: white; margin-bottom:10px;"> Insert New User: </h2>
<input type= "text" name = "login" placeholder="Login"  font-size = "80%" required/></br></br>
<input type= "password" name = "password" placeholder="Password"  font-size = "80%" required/></br></br>
<input type= "email" name = "email" placeholder="Email" font-size = "80%" required/></br></br>
<select name = "admin">
  <option value="0">Regular user</option>
 <option value="1">Admin</option>
</select></br>
<input id="addusr" type = "submit" name = "add_user" value = "ok"/>
</form>


<?php

if (isset($_POST['add_user']))
{
  $conn = mysqli_connect("localhost", "root", "root", "arty_store");
  if (!$conn) {
    header("../error_db.php");
    echo ("Connection failed: " . mysqli_connect_error());
  }
  $admin = $_POST['admin'];
  $login = $_POST['login'];
  $password = hash(whirlpool , $_POST['password']);
  $email = $_POST['email'];
  $insert_user = "INSERT INTO Users (`admin`, `email`, `login`, `password`, `is_active`)
	VALUES ('$admin', '$email','$login','$password', 1)";
  $run_user = mysqli_query($conn, $insert_user);
  if ($run_user)
  {
    echo "<script>alert('New user has been inserted!')</script>";
    echo "<script>window.open('index.php?view_users', '_self')</script>";
  }
  else {
      echo "Error: " . $insert_user . "<br>" . mysqli_error($conn);
  }
}
?>
