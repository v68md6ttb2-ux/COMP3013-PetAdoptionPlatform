<!-- Start session, include session file and connection file -->
<?php 
require_once"session.php";
require_once"../inc/conn.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
<!-- Add processing -->
<?php
if($_POST['title']==""){
    echo "<script>alert('Title cannot be empty!');history.go(-1)</script>";  // Title cannot be empty
    exit;
}
if($_POST['thumbnail']==""){
    echo "<script>alert('Thumbnail cannot be empty!');history.go(-1)</script>";  // Thumbnail cannot be empty
    exit;
}
if(!is_numeric($_POST['orderid'])){
    echo "<script>alert('Order ID must be a number!');history.go(-1)</script>";  // Order ID must be a number
    exit;
}
$sql_add="insert into slide(title,link,thumbnail,orderid) values('".$_POST['title']."','".$_POST['link']."','".$_POST['thumbnail']."','".$_POST['orderid']."')";
$result=mysqli_query($mysqli,$sql_add);
		if($result){
			echo"<script>alert('Added successfully!');window.location.href='slide_list.php'</script>";  // Success message, redirect to slide list page
			exit;
		}else{
			echo"<script>alert('Addition failed!');window.location.href='slide_add.php'</script>";  // Failure message, redirect to add slide page
			exit;
		}
		mysqli_free_result($result);
		mysqli_close($mysqli);
	?>
</body>
</html>
