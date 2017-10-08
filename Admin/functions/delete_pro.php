<?php

$conn = mysqli_connect("localhost", "root", "root", "arty_store");
if (!$conn) {
  header("../error_db.php");
  echo ("Connection failed: " . mysqli_connect_error());
}

if(isset($_GET['delete_pro'])){
  $delete_id = $_GET['delete_pro'];
  $delete_pro = "DELETE FROM Products WHERE id = '$delete_id'";
  $run_delete = mysqli_query($conn, $delete_pro);
  if ($run_delete)
  {
    echo"<script>alert('Your Products has been deleted!')</script>";
    echo "<script>window.open('../index.php?view_product', '_self')</script>";
  }
}
 ?>
