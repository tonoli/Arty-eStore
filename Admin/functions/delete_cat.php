<?php

$conn = mysqli_connect("localhost", "root", "root", "arty_store");
if (!$conn) {
  header("../error_db.php");
  echo ("Connection failed: " . mysqli_connect_error());
}

if(isset($_GET['delete_cat'])){
  $delete_id = $_GET['delete_cat'];
  $delete_cat = "DELETE FROM Categories WHERE id = '$delete_id'";
  $run_delete = mysqli_query($conn, $delete_cat);
  if ($run_delete)
  {
    echo"<script>alert('Your Categorie has been deleted!')</script>";
    echo "<script>window.open('../index.php?view_cats', '_self')</script>";
  }
}
 ?>
