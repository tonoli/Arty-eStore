<?php
  include ("includes/db.php");
	// if (isset($_POST['insert_post']))
	// {
		// $product_title = $_POST['product_title'];
		// $product_cat = $_POST['product_cat'];
    // $product_author = $_POST['product_author'];
    // $product_image = $_FILES['product_image']['name'];
    // $product_image_tmp = $_FILES['product_image']['tmp_name'];
    // move_uploaded_file($product_image_tmp, "product_images/$product_image");
    // $product_price = $_POST['product_price'];
		// $product_desc = $_POST['product_desc'];
		// $insert_product = "insert into products(product_title, product_cat, product_author, product_image, product_price, product_desc)
		// values('$product_title', '$product_cat','$product_author', '$product_image', '$product_price','$product_desc')";
    $table = "Products";
    $insert_product = "INSERT INTO $table (product_id, product_title, product_cat, product_author, product_image, product_price, product_desc, product_active)
    VALUES ('8', 'Here', '', 'rare', 'images/img1.jpg', '240', 'askhd', '1')";
    $insert_pro = mysqli_query($conn, $insert_product);

    if ($insert_pro){
      echo "<script>alert('Product has been inserted!')</script>";
      echo "<script>window.open('index.php?insert_product.php', '_self')</script>";
    }
    if (mysqli_query($conn, $insert_product)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>
