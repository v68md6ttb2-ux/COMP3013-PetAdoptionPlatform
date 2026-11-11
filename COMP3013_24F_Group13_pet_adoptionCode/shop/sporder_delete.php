<?php
	require_once ('../inc/conn.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title> 

<?php
		$id = $_GET['id'];
		$sql = "DELETE FROM animals_order WHERE ID=".$id;

		$result=mysqli_query($mysqli,$sql);
		if($result){
			echo "<script type='text/javascript'>alert('Deleted successfully!');window.location.href='order.php';</script>";
		}else{
			echo "<script type='text/javascript'>alert('Delete failed!');window.location.href='order.php';</script>";
		}
?>