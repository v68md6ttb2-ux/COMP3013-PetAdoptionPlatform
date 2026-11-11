<?php
	require_once ('filter.php');
?>
<?php

	$animals_name = $_POST["animals_name"];
	$title = $_POST["title"];
	$price = $_POST["price"];
	$animals_type = $_POST["animals_type"];
	$content = $_POST["content"];
	$images = $_POST["pic_link"];     
	$str = "insert into animals_table 
			(animals_name,title,price,animals_type_id,info,images,create_time)
			values
			('".$animals_name."','".$title."','".$price."',
			".$animals_type.",'".$content."','".$images."',now())";
echo $str;exit();
	$result=mysqli_query($mysqli,$str);
	 
	if($result){
		echo "<script type='text/javascript'>alert('The operation was successful!');window.location.href='animals_list.php';</script>";
		
	}else{
		echo "<script type='text/javascript'>alert('The operation failed!');history.go(-1);</script>";
	}
	
	
?>