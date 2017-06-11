
<table width = "725" align = "center" bgcolor = "D0FFB4">
  <tr align = "center">
    <td colspan = "6"><h2>View All Products Here</h2></td>
  </tr>
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
    include("../includes/db.php");
    $get_pro = "select * from products";
    $run_pro = mysqli_query($conn, $get_pro);
    $i = 0;
    while ($row_pro = mysqli_fetch_array($run_pro))
    {
      $pro_id = $row_pro['product_id'];
      $pro_title = $row_pro['product_title'];
      $pro_cat = $row_pro['product_cat'];
      $pro_image = $row_pro['product_image'];
      $pro_price = $row_pro['product_price'];
      $i++;
  ?>
  <tr bgcolor = "D0FFB4" align = "center">
    <td><?php echo $i;?></td>
    <td><b><?php echo $pro_title;?></b></td>
    <td><?php echo $pro_cat;?></td>
    <td><img src = "../product_images/<?php echo $pro_image;?>"width= "50" height = "50"/></td>
    <td><?php echo $pro_price;?></td>
    <td><a href = "index.php?edit_pro=<?php echo $pro_id; ?>">Edit</a></td>
    <td><a href = "delete_pro.php?delete_pro=<?php $pro_id;?>">Delete</a></td>
  </tr>
<?php } ?>
</table>
