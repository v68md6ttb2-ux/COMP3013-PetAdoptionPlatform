<?php
	require_once ('filter.php');
?>

<?php
		$id = $_GET['id'];
		$str = "DELETE FROM animals_order WHERE ID=".$id;

		$result=mysqli_query($mysqli,$str);
		if($result){
			echo "<script type='text/javascript'>alert('The operation was success!');window.location.href='order_list.php';</script>";
		}else{
			echo "<script type='text/javascript'>alert('The operation failed!');window.location.href='order_list.php';</script>";
		}
?>