<?php
	$conn = mysqli_connect("localhost", "root", "root", "arty_store");
	if (!$conn) {
		header("../error_db.php");
		echo ("Connection failed: " . mysqli_connect_error());
	}
	$old = "";
	$get_pan = "SELECT * FROM Cart";
	$run_pan = mysqli_query($conn, $get_pan);
	if ($run_pan){
		while ($elem = mysqli_fetch_array($run_pan)){
			$art = mysqli_query($conn, "SELECT * FROM Products WHERE id='".$elem['product_id']."'");

?>
<table width = "725" align = "center" bgcolor = "D0FFB4">
	<?php if ($old != $elem['user_login']) {
		$old =  $elem['user_login'];?>
  <tr align = "center">
    <td colspan = "6"><h2>Commande de <?php echo $elem['user_login']; ?></h2></td>
  </tr>
  <?php } ?>
  <tr align = "center" bgcolor = "#A8C7D6">
    <td><b>Id</</td>
    <td><b>Title</td>
    <td><b>Category</td>
    <td><b>Image</td>
    <td><b>Price</td>
  </tr>
  <?php
    $i = 0;
    while ($row_pro = mysqli_fetch_array($art))
    {
      $pro_id = $row_pro['id'];
      $pro_title = $row_pro['name'];
      $pro_cat = $row_pro['categorie'];
      $pro_image = $row_pro['img_path'];
      $pro_price = $row_pro['price'];
      $i++;
  ?>
  <tr bgcolor = "D0FFB4" align = "center">
    <td><?php echo $i;?></td>
    <td><b><?php echo $pro_title;?></b></td>
    <td><?php echo $pro_cat;?></td>
    <td><img src = "<?php echo $pro_image;?>"width= "60" height = "70"/></td>
    <td><?php echo $pro_price;?></td>
  </tr>
<?php } ?>
</table>
<?php
	}
}
?>
