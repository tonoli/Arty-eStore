<table width = "735" align = "center" bgcolor = "grey">
<tr align = "center">
  <?php
    $get_pro = "select * from products";
    $run_pro = mysqli_query($conn, $get_pro);
    $i = 0;
    while ($row_pro = mysqli_fetch_array($run_pro))
    {
      $product_id = $row_pro['product_id'];
      $pro_title = $row_pro['product_title'];
      $pro_cat = $row_pro['product_cat'];
      $pro_author = $row_pro['product_author'];
      $pro_image = $row_pro['product_image'];
      $pro_price = $row_pro['product_price'];
      $i++;
  ?>
  <tr bgcolor = "grey" align = "center">
  	 <article class='list-item'>
       <h3><?php echo $pro_title."\n"; ?> </h3>
    					<img src = "../../Admin/product_images/<?php echo $pro_image; ?>">
  			<div class='details'>
				  <h2 style = "font-style:italic; padding:2px"><?php echo $pro_author."\n"; ?></h2>
  				<h2 style = "font-style:italic; padding:2px"><?php echo 'Price: '.$pro_price.'$'."\n"; ?></h2>
					<a href='index.php?product_id=$product_id'> <button>Add to Cart</button></a>
  			</div>
      </article>
  </tr>
<?php } ?>
</table>
