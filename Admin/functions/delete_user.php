<?php

$conn = mysqli_connect("localhost", "root", "root", "arty_store");
if (!$conn) {
  header("../error_db.php");
  echo ("Connection failed: " . mysqli_connect_error());
}

if(isset($_GET['delete_user'])){
  $delete_id = $_GET['delete_user'];
  $delete_user = "DELETE FROM Users WHERE id = '$delete_id'";
  $run_delete = mysqli_query($conn, $delete_user);
  if ($run_delete)
  {
    echo"<script>alert('Your user has been deleted!')</script>";
    echo "<script>window.open('../index.php?view_customers', '_self')</script>";
  }
}
 ?>
