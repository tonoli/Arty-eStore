<table width = "725" align = "center" bgcolor = "#FFFFFF">
  <tr align = "center">
    <td colspan = "6"><h2>View All Products Here</h2></td>
  </tr>
  <tr align = "center" bgcolor = "#808080">
    <td><b>Id</</td>
    <td><b>Title</td>
    <td><b>Category</td>
    <td><b>Image</td>
    <td><b>Price</td>
    <td><b>Delete</td>
  </tr>
  <?php
    $get_pro = "select * from products";
    $run_pro = mysqli_query($conn, $get_pro);
    $i = 0;
    while ($row_pro = mysqli_fetch_array($run_pro))
    {
      $pro_id = $row_pro['id'];
	  $pro_title = $row_pro['name'];
      $pro_cat = $row_pro['categorie'];
      $pro_image = $row_pro['img_path'];
      $pro_price = $row_pro['price'];
      $i++;
  ?>
  <tr bgcolor = "#FFFFFF" align = "center">
    <td><?php echo $i;?></td>
    <td><b><?php echo $pro_title;?></b></td>
    <td><?php echo $pro_cat;?></td>
    <td><img src = "<?php echo $pro_image;?>"width= "60" height = "70"/></td>
    <td><?php echo $pro_price;?></td>
    <td><a href = "functions/delete_pro.php?delete_pro=<?php echo $pro_id;?>">Delete</a></td>
  </tr>
<?php } ?>
</table>
