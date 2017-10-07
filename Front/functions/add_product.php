
<table width = "735" align = "center" bgcolor = "grey">
<tr align = "center">
  <?php
    $get_pro = "SELECT * FROM Products WHERE is_active = 1";
    $run_pro = mysqli_query($conn, $get_pro);
    $i = 0;
    while ($product = mysqli_fetch_array($run_pro)){
      $product_id = $product['id'];
      $pro_name = $product['name'];
      $pro_price = $product['price'];
      $pro_descr = $product['description'];
      $pro_image = $product['img_path'];
      $i++;
  ?>
  <tr bgcolor = "grey" align = "center">
  	 <article class='list-item'>
       <h3><?php echo $pro_name."\n"; ?> </h3>
    					<img src = "<?php echo $pro_image; ?>">
  			<div class='details'>
				  <h2 style = "font-style:italic; padding:2px"><?php echo $pro_descr."\n"; ?></h2>
  				<h2 style = "font-style:italic; padding:2px"><?php echo 'Price: '.$pro_price.'$'."\n"; ?></h2>
					<a href=" <?php "index.php?product_id=" . $product_id ?> "> <button>Add to Cart</button></a>
  			</div>
      </article>
  </tr>
<?php } ?>
</table>
