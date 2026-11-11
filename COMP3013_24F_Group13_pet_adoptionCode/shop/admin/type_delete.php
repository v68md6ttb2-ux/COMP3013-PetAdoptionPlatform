<?php
	require_once ('filter.php');
?>

<?php
		$id = $_GET['id'];
		$str = "DELETE FROM animals_type WHERE ID=".$id;

    $result=mysqli_query($mysqli,$str); 
		if($result){
			echo "<script type='text/javascript'>alert('The operation was successful!');window.location.href='type_list.php';</script>";
		}else{
			echo "<script type='text/javascript'>alert('The operation failed!');window.location.href='type_list.php';</script>";
		}
?>