<div class="products-nav">
	<ul>
  <?php
    $get_pro = "SELECT * FROM Categories";
    $run_pro = mysqli_query($conn, $get_pro);
	if ($run_pro){
	    while ($cate = mysqli_fetch_array($run_pro)){
		  echo "<li><a href=\"/Front/index.php?cate=".$cate['name']."\">".$cate['name']."</a></li>";
	  ?>
	<?php }
	}?>
</ul>
</div>
