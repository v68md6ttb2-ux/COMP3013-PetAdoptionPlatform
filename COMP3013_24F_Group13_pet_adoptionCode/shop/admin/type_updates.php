<?php
	require_once ('filter.php');
?>
<?php

	$id = $_POST["id"];
	$type_name = $_POST["type_name"];
	
	
	$str = "UPDATE  animals_type
			set type_name='".$type_name."'
			where id = ".$id;

	$result=mysqli_query($mysqli,$str);
	if($result){
		echo "<script type='text/javascript'>alert('The operation was successful!');window.location.href='type_list.php?id=".$id."';</script>";
	}else{
		echo "<script type='text/javascript'>alert('The operation failed!');history.go(-1);</script>";
	}
?>