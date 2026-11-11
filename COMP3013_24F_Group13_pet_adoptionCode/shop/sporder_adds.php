<?php
	require_once ('../inc/conn.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title> 
<?php

	$id = $_GET["id"];
	$back_url = $_GET["back_url"];
	$user_id = $_SESSION['user']['id'];
	$str = "insert into animals_order 
			(animals_id,user_id,animals_num,create_time,order_type)
			values
			('".$id."','".$user_id."',1,now(),1)";

	$result=mysqli_query($mysqli,$str);
	$last_id = $mysqli->insert_id;
	
	
	if($last_id!=null){
		if(isset($back_url)){
			echo "<script type='text/javascript'>alert('The adoption was successful');history.go(-1);</script>";
		}else{
			echo "<script type='text/javascript'>alert('The adoption was successful');window.location.href='order.php?id=".$id."';</script>";
		}
	}else{
		echo "<script type='text/javascript'>alert('The adoption failed');history.go(-1);</script>";
	}
	
	
?>