<?php
	require_once ('filter.php');
?>
<?php

	$id = $_POST["id"];
	$animals_name = $_POST["animals_name"];
	$title = $_POST["title"];
	$price = $_POST["price"];
	$animals_type = $_POST["animals_type"];
	$content = $_POST["content"];
	$images = $_POST["pic_link"];     
	
	
	$str = "UPDATE  animals_table
			set animals_name='".$animals_name."',
			title='".$title."',
			price='".$price."',
			
			animals_type_id='".$animals_type."',
			info='".$content."',
			images='".$images."',
			shop_price='".$shop_price."'
			where id = ".$id;

	$result=mysqli_query($mysqli,$str);
	
	if($result>0){
		echo "<script type='text/javascript'>alert('The operation was successful!');window.location.href='animals_list.php?id=".$id."';</script>";
	}else{
		echo "<script type='text/javascript'>alert('The operation failed!');history.go(-1);</script>";
	}
?>