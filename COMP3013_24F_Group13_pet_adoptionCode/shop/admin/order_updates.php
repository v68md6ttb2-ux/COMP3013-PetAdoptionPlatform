<?php
	require_once ('filter.php');
?>
<?php

	$id = $_GET["id"];
	
	
	$str = "UPDATE  animals_order
			set order_type=2
			where id = ".$id;

	$result=mysqli_query($mysqli,$str);
	
	if($result){
	$data = $_POST['data'];
	
	
	
			
	$str = "SELECT * from animals_order id=  ".$id;
	$result=mysqli_query($mysqli,$str);
	if($row=mysqli_fetch_array($result)){}
			
	$str_user = "SELECT * from c_user  where id = ".$row["user_id"];

	$result_user=mysqli_query($mysqli,$str_user);
	if($row_user=mysqli_fetch_array($result_user)){}
	
	$str_animals = "SELECT * from animals_table where id = ".$row["animals_id"];

	$result_animals=mysqli_query($mysqli,$str_animals);
	if($row_animals=mysqli_fetch_array($result_animals)){}
	

if ($result == 'ok') {
	echo "<script type='text/javascript'>alert('The operation was successful!');window.location.href='order_list.php';</script>";
}else{
		echo "<script type='text/javascript'>alert('The operation failed!');history.go(-1);</script>";
		
}
		
		
	}else{
		echo "<script type='text/javascript'>alert('The operation failed!');history.go(-1);</script>";
	}
	
	

?>