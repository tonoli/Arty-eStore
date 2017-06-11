<!DOCTYPE>
<?php
include ("includes/db.php");
?>
<html>
<head>
<title> Inserting Product</title>
<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
</head>
<body bgcolor = "black">
	<form action = "insert_product.php" method = "post" enctype = "multipart/form-data">
	<table align = "center" width = "727" height = "650" border = "2" bgcolor = "skyblue">
	<tr align = "center">
		<td colspan = "7">
			<h2>Insert New Product Here</h2>
		</td>
	</tr>
	<tr>
		<td align = "right"><b>Product Title:</b> </td>
		<td><input type= "text" name = "product_title"  size = "40" required /<td>
	</tr>
	<tr>
		<td align = "right"><b>Product Category:</b> </td>
		<td><select name= "product_cat">
			<option>Select Category</option>
			<?php
				$get_cat = "select * from categories";
				$run_cat = mysqli_query($con, $get_cat);
				while($row_cat = mysqli_fetch_array($run_cat))
				{
					$cat_id = $row_cat['cat_id'];
					$cat_title = $row_act['cat_title'];
					echo"<option>$cat_title</option>";
				}
			 ?>
		</select></td>
	</tr>
	<tr>
		<td align = "right"><b>Product Year:</b> </td>
		<td><input type= "text" name = "product_year" size = "10" required/<td>
	</tr>
	<tr>
		<td align = "right"><b>Product Price:</b> </td>
		<td><input type= "text" name = "product_price" size = "10"required/<td>
	</tr>
	<tr>
		<td align = "right"><b>Product Image:</b> </td>
		<td><input type= "file" name = "product_image"/<td>
	</tr>
	<tr>
		<td align = "right"><b>Product Author:</b> </td>
		<td><input type= "text" name = "product_author" size = "40"required/<td>
	</tr>
	<tr>
		<td align = "right"><b>Product Description:</b> </td>
		<td><textarea name = "product_desc" colls = "20" rows = "8"></textarea><td>
	</tr>
	<tr align = "center">
		<td colspan = "8"><input type= "submit" name = "insert_post" value = "Insert Now" <td>
	</tr>
	</table>
</body>
</html>

<?php

	if (isset($_POST['insert_post']))
	{
		$product_title = $_POST['product_tile'];
		$product_cat = $_POST['product_cat'];
		$product_year = $_POST['product_year'];
		$product_price = $_POST['product_price'];
		$product_author = $_POST['product_author'];
		$product_desc = $_POST['product_desc'];

		$product_image = $_FILES['product_image']['name'];
		$product_image_tmp = $_FILES['product_image']['tmp_name'];
    move_uploaded_file($product_image_tmp, "product_images/$product_image");
		$insert_product = "insert into products(product_title, product_cat, product_year, product_price, product_image, product_author, product_desc)
		values('$product_title', '$product_cat', '$product_year','$product_price', '$product_image', '$product_author','$product_desc')";

    $insert_pro = mysqli_query($con, $insert_product);
    if ($insert_pro){
      echo "<script>alert('Product has been inserted!')</script>";
      echo "<script>window.open('index.php?insert_product.php', '_self')</script>";
    }
}
?>
