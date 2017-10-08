<table width = "725" align = "center" bgcolor = "D0FFB4">
  <tr align = "center">
    <td colspan = "6"><h2>View All Categories Here</h2></td>
  </tr>
  <tr align = "center" bgcolor = "#A8C7D6">
    <td><b>Category Id</</td>
    <td><b>Category Title</td>
    <td><b>Delete</td>
  </tr>
  <?php
    $get_cat = "select * from Categories";
    $run_cat = mysqli_query($conn, $get_cat);
    $i = 0;
    while ($row_cat = mysqli_fetch_array($run_cat))
    {
      $cat_title = $row_cat['name'];
      $cat_id = $row_cat['id'];
      $i++;
  ?>
  <tr bgcolor = "D0FFB4" align = "center">
    <td><?php echo $cat_id;?></td>
    <td><b><?php echo $cat_title;?></b></td>
    <td><a href = "functions/delete_cat.php?delete_cat=<?php echo $cat_id;?>">Delete</a></td>
  </tr>
<?php } ?>
</table>
