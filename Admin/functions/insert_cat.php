<style>
input {
  font-size: 200%;
}
</style>
<form action="" method= "post" style = "padding:100px;" >
<b><h2 style = "color: orange"> Insert New Category: </h2></b>
<input type= "text" name = "new_cat" size="35" font-size = "80%"required/>
<input type = "submit" name = "add_cat" value = "Add category"/>
</form>


<?php
include ("../includes/db.php");
if (isset($_POST['add_cat']))
{
  $new_cat = $_POST['new_cat'];
  $insert_cat = "INSERT INTO Categories(cat_title) values ('$new_cat')";
  $run_cat = mysqli_query($conn, $insert_cat);
  if ($run_cat)
  {
    echo "<script>alert('New category has been inserted!')</script>";
    echo "<script>window.open('index.php?view_cats', '_self')</script>";
  }
  else {
      echo "Error: " . $insert_cat . "<br>" . mysqli_error($conn);
  }
}
?>
