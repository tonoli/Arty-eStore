<?php
include("../includes/db.php");
	$old = "";
	$get_pan = "SELECT * FROM Panier";
	$run_pan = mysqli_query($conn, $get_pan);
	if ($run_pan){
		while ($elem = mysqli_fetch_array($run_pan)){
			$art =mysqli_query($conn, "SELECT * FROM Products WHERE id='".$elem['product_id']."'");

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
    <td><b>Edit</td>
    <td><b>Delete</td>
  </tr>
  <?php
    $i = 0;
    while ($row_pro = mysqli_fetch_array($run_pro))
    {
      $pro_id = $art['id'];
      $pro_title = $art['name'];
      $pro_cat = $art['categories'];
      $pro_image = $art['img_path'];
      $pro_price = $art['price'];
      $i++;
  ?>
  <tr bgcolor = "D0FFB4" align = "center">
    <td><?php echo $i;?></td>
    <td><b><?php echo $pro_title;?></b></td>
    <td><?php echo $pro_cat;?></td>
    <td><img src = "../product_images/<?php echo $pro_image;?>"width= "60" height = "70"/></td>
    <td><?php echo $pro_price;?></td>
  </tr>
<?php } ?>
</table>
<?php
	}
}
?>
