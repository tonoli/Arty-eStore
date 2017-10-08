
<table width = "725" align = "center" bgcolor = "#FFFFFF">
  <tr align = "center">
    <td colspan = "6"><h2>View All Customers Here</h2></td>
  </tr>
  <tr align = "center" bgcolor = "#808080">
    <td><b>Id</</td>
    <td><b>Is Admin</td>
    <td><b>User email</td>
    <td><b>login</td>
    <td><b>is active</td>
  </tr>
  <?php
    //include("../includes/db.php");
    $get_pro = "select * from Users";
    $run_pro = mysqli_query($conn, $get_pro);
    $i = 0;
    while ($row_pro = mysqli_fetch_array($run_pro))
    {
      $pro_id = $row_pro['id'];
	   $pro_title = $row_pro['admin'];
      $pro_cat = $row_pro['email'];
      $pro_image = $row_pro['login'];
      $pro_price = $row_pro['is_active'];
      $i++;
  ?>
  <tr bgcolor = "#FFFFFF" align = "center">
    <td><?php echo $pro_id;?></td>
    <td><b><?php echo $pro_title;?></b></td>
    <td><?php echo $pro_cat;?></td>
    <td><?php echo $pro_image;?></td>
    <td><?php echo $pro_price;?></td>
    <td><a href = "functions/delete_user.php?delete_user=<?php echo $pro_id;?>">Delete</a></td>
  </tr>
<?php } ?>
</table>
