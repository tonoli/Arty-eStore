<!DOCTYPE>
<?php
include ("../includes/db.php");
if (isset($_GET['edit_pro']))
{
  $get_id = $_GET['edit_pro'];

  $get_pro = "SELECT * FROM Products WHERE product_id = '$get_id'";
  $run_pro = mysqli_query($conn, $get_pro);
  $row_pro = mysqli_fetch_array($run_pro);
  $pro_id = $row_pro['product_id'];
  $pro_title = $row_pro['product_title'];
  $pro_cat = $row_pro['product_cat'];
  $pro_author = $row_pro['product_author'];
  $pro_image = $row_pro['product_image'];
  $pro_price = $row_pro['product_price'];
  $pro_desc = $row_pro['product_desc'];
  $pro_active = $row_pro['product_active'];
}
?>
<html>
<head>
<title> Update Product</title>
<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=7esowxa7k837avq333arkqa7eenq77kzuk2ubcuky5sklbtr"></script>
  <script> tinymce.init({ selector:'textarea' }); </script>
</head>
<body>
	<form action = "insert_product.php" method = "post" enctype = "multipart/form-data">
	<table align = "center" width = "727" height = "700" border = "5" bgcolor = "skyblue">
	<tr align = "center">
		<td colspan = "7">
			<h2>Update Product Here:</h2>
		</td>
	</tr>
	<tr>
		<td align = "right"><b>Product Title:</b></td>
		<td><input type= "text" name = "product_title" size = "40"  value = "<?php echo $pro_title;?>"required/></td>
	</tr>
	<tr>
		<td align = "right"><b>Product Category:</b> </td>
		<td><select name= "product_cat">
			<option><?php echo $pro_cat ?></option>
			<?php
				$get_cat = "SELECT * from Categories";
				$run_cat = mysqli_query($conn, $get_cat);
				while($row_cat = mysqli_fetch_array($run_cat))
				{
					$cat_id = $row_cat['cat_id'];
					$cat_title = $row_cat['cat_title'];
					echo "<option>$cat_title</option>";
				}
			 ?>
		</select></td>
	</tr>
  <tr>
    <td align = "right"><b>Product Author:</b> </td>
    <td><input type= "text" name = "product_author" size = "40"value = "<?php echo $pro_author;?>"required/></td>
  </tr>
  <tr>
    <td align = "right"><b>Product Image:</b> </td>
    <td><input type= "file" name = "product_image"/><img src "../product_images/<?php echo $pro_image; ?>" width = "50" height = "60"/></td>
    </tr>
	<tr>
		<td align = "right"><b>Product Price:</b> </td>
		<td><input type= "text" name = "product_price" size = "10"value = "<?php echo $pro_price;?>"required/></td>
	</tr>
	<tr>
		<td align = "right"><b>Product Description:</b> </td>
		<td><textarea name = "product_desc" colls = "20" rows = "8"> <?php echo $pro_desc;?> </textarea></td>
	</tr>
  <tr>
		<td align = "right"><b>Product Active:</b> </td>
		<td><input type = "text" name "product_active" size = "10"/> <?php echo $pro_active;?> </td>
	</tr>
	<tr align = "center">
		<td colspan = "8"><input type= "submit" name = "update_post" value = "Update Now"/></td>
	</tr>
	</table>
</body>
</html>

<?php
	if (isset($_POST['update_post']))
	{
    include ("../includes/db.php");
		$product_title = $_POST['product_title'];
		$product_cat = $_POST['product_cat'];
    $product_author = $_POST['product_author'];
    $product_image = $_FILES['product_image']['name'];
    $product_image_tmp = $_FILES['product_image']['tmp_name'];
    move_uploaded_file($product_image_tmp, "../product_images/$product_image");
    $product_price = $_POST['product_price'];
		$product_desc = $_POST['product_desc'];
    $product_active = $_POST['product_active'];
    $table = "Products";
		$update_product = "UPDATE Products SET product_cat = '$product_cat', product_title = 
    $update_pro = mysqli_query($conn, $update_product);
    if ($update_pro){
      echo "<script>alert('Product has been updated!')</script>";
      echo "<script>window.open('index.php?update_product.php', '_self')</script>";
    }
    else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
  }
?>
