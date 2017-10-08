<!DOCTYPE>

<html>
<head>

</head>
<body>
	<form action = "" method = "post" enctype = "multipart/form-data">
	<table align = "center" width = "727" height = "700" border = "5" bgcolor = "grey">
	<tr align = "center">
		<td colspan = "7">
			<h2>Insert New Product Here</h2>
		</td>
	</tr>
	<tr>
		<td align = "right"><b>Product Name:</b></td>
		<td><input type= "text" name = "product_name" size = "40" required/></td>
	</tr>
	<tr>
		<td align = "right"><b>Product Category:</b> </td>
		<td><select name= "product_cat">
			<option>Select a Category</option>
			<?php
				$get_cat = "SELECT * from Categories";
				$run_cat = mysqli_query($conn, $get_cat);
				while($row_cat = mysqli_fetch_array($run_cat))
				{
					$cat_id = $row_cat['id'];
					$cat_title = $row_cat['name'];
					echo "<option>$cat_title</option>";
				}
			 ?>
		</select></td>
	</tr>
  <tr>
    <td align = "right"><b>Product Image:</b> </td>
    <td><input type= "text" name = "product_image"required/></td>
    </tr>
	<tr>
		<td align = "right"><b>Product Price:</b> </td>
		<td><input type= "text" name = "product_price" size = "10"required/></td>
	</tr>
	<tr>
		<td align = "right"><b>Product Description:</b> </td>
		<td><textarea name = "product_desc" colls = "20" rows = "10"></textarea></td>
	</tr>
  <tr>
		<td align = "right"><b>Product Active:</b> </td>
		<td><select name ="is_active">
      <option value="0">Product non-actif</option>
     <option value="1">Product actif</option>
    </select></td>
	</tr>
	<tr align = "center">
		<td colspan = "8"><input type= "submit" name = "insert_post" value = "ok"/></td>
	</tr>
	</table>
</body>
</html>

<?php
	if (isset($_POST['insert_post']))
	{
    global $conn;
		$product_name = $_POST['product_name'];
		$product_cat = $_POST['product_cat'];
    $product_image = $_POST['product_image'];
    $product_price = $_POST['product_price'];
		$product_desc = $_POST['product_desc'];
    $product_active = $_POST['is_active'];
    $table = "Products";
		$insert_product = "INSERT INTO $table (price, name, categorie, description, img_path, is_active)
		values('$product_price','$product_name', '$product_cat','$product_desc', '$product_image', '$product_active')";
    $insert_pro = mysqli_query($conn, $insert_product);
    if ($insert_pro){
      echo "<script>alert('Product has been inserted!')</script>";
      echo "<script>window.open('index.php?view_product', '_self')</script>";
    }
    else {
        echo "Error: " . $insert_product . "<br>" . mysqli_error($conn);
    }
  }
?>
