
<table width = "725" align = "center" bgcolor = "pink">
  <tr align = "center">
    <td colspan = "6"><h2>View All Products Here</h2></td>
  </tr>
  <tr align = "center" bgcolor = "yellow">
    <td>Nb</td>
    <td>Title</td>
    <td>Image</td>
    <td>Price</td>
    <td>Edit</td>
    <td>Delete</td>
  </tr>
  <?php
    include("includes/db.php");
    $get_pro = "select * from products";
    $run_pro = mysqli_query($con, $get_pro);
    $i = 0;
    while ($row_pro = mysqli_fetch_array($run_pro))
    {
      $pro_title = $row_pro['product_title'];
      $pro_image = $row_pro['product_image'];
      $pro_price = $row_pro['product_price'];
      $i++;
  ?>
  <tr>
    <td><?php echo $i;?></td>
    <td><?php echo $pro_title;?></td>
    <td><img src = "product_image/<?php echo $pro_image;?>"width= "50" height = "50"</td>
    <td><?php echo $pro_price;?></td>
    <td><a href = "index.php?edit_pro">Edit</a></td>
    <td><a href = "delete.php">Delete</a></td>
  </tr>
</table>
<?php } ?>
