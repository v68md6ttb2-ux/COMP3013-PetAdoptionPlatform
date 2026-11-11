<?php
	
	require_once ('filter.php');
?>

<?php
		$id = $_GET['id'];
		$str = "DELETE FROM animals_table WHERE ID=".$id;

		$result=mysqli_query($mysqli,$str);
		if($result){
			echo "<script type='text/javascript'>alert('The operation was successful!');window.location.href='animals_list.php';</script>";
		}else{
			echo "<script type='text/javascript'>alert('The operation failed!');window.location.href='animals_list.php';</script>";
		}
?>