
<?php

	require_once ('./top.php');
	require_once ('filter.php');
	
	
	$page = 1;
	if(isset($_GET["page"])){
		$page = $_GET["page"];
	}
	$animals_num = 10;
	if(isset($_GET["animals_num"])){
		$animals_num = $_GET["animals_num"];
	}
	$pagenum = 0;
	$str = "SELECT count(*) as pagenum from animals_order where user_id = ".$_SESSION['user']['id']." and order_type = 1 ";
	$result=mysqli_query($mysqli,$str);
	if($row=mysqli_fetch_array($result)){}
	
	$pagenum = (int)($row["pagenum"]/$animals_num);
	
	if(($row["pagenum"]/$animals_num)>$pagenum){
	
		$pagenum+=1;
	}
?>

<link rel="stylesheet" href="css/index.css"/>

<div class="content clearfix"> 
<div class="help-wrap">
	<div class="container clearfix row">
		<div class="bread">Current location
			<a href="../index.php">Home</a> >
			<a href="../user.php">Personal Center</a> >
			<a href="cart.php">My Adoption Order</a> 
		</div>
		<div class="col-md-3 col-sm-12 col-xs-12">
	<?php
	require_once ('left_menu.php');
	?>
		</div>
		<div class="col-md-9 col-sm-12 col-xs-12">
			<div class="help-item-title">My Adoption Order</div>
			<div class="help-main">
				<table class="s_list clearfix" align="center">
       		    <tr>
                	<th>Image</th>
                	<th>Name</th>
                	<th>premium</th>
                	<th>Price</th>
                	<th>quantity</th>
                	<th width="20%">operation</th>
                </tr>
           <?php
				
			$str = "SELECT * from animals_order where user_id=".$_SESSION['user']['id']."  and  (order_type = 1 or order_type = 2 ) limit ".(($page-1)*$animals_num)." ,".$animals_num;
			
			$result=mysqli_query($mysqli,$str);
		    while($row=mysqli_fetch_array($result)){
							
				$str_order = "SELECT * from animals_table where id = ".$row["animals_id"];
				$result_order = mysqli_query($mysqli,$str_order); 
				if($row_order=mysqli_fetch_array($result_order)){}
			?>
                
             	<tr>
                	<td><img src="<?php echo $row_order["images"] ?>" style="max-width:50px; max-height:50px;"></td>
                	<td><?php echo $row_order["animals_name"] ?></td>
                	<td>￥<?php echo $row_order["price"] ?></td>
                	<td>￥<?php echo $row_order["price"]*$row["animals_num"] ?></td>
                	<td><?php echo $row["animals_num"] ?></td>
                	
                	<td>
					<a href="sporder_delete.php?id=<?php echo $row["id"] ?>" style="background-color:#ddd;padding:3px 15px;">Delete</a></td>
                </tr>
                <?php } ?>
             	<tr>
                	<td colspan="7" style="text-align:center;">
                	
            			<a class="ym_a" href="order.php?page=<?php 
		if($page>1){
			echo ($page-1);
		}else{
			echo 1;
		}
	?>">Previous</a>
            			<a class="ym_a" href="#"><?php echo $page; ?>/<?php echo $pagenum; ?></a>
            			<a class="ym_a" href="order.php?page=<?php 
		if($page<$pagenum){
			echo ($page+1);
		}else{
			echo $pagenum;
		}
	?>">Next</a>
                    </td>
                </tr>
       		    
             </table>
				
			</div>
		</div>
	</div>
</div>
<?php  require './foot.php'; ?>
</body>
</html>