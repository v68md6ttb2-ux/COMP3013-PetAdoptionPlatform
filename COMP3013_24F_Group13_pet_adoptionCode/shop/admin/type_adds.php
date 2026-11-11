<?php
	require_once ('filter.php');
?>
<?php

	$type_name = $_POST["type_name"];
	$str = "insert into animals_type 
			(type_name,create_time)
			values
			('".$type_name."',now())";

	$result=mysqli_query($mysqli,$str);
	 
	if($result){
		echo "<script type='text/javascript'>alert('The operation was successful!');window.location.href='type_list.php';</script>";
		
	}else{
		echo "<script type='text/javascript'>alert('The operation failed!');history.go(-1);</script>";
	}
	
	
?>