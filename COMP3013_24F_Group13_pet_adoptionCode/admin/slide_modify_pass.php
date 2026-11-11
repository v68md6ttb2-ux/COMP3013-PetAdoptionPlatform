<!-- Start session, include session file and connection file -->
<?php 
require_once 'session.php';
require_once '../inc/conn.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
<!-- Modification Processing -->
<?php
if($_POST['title']==""){
    echo "<script>alert('Title cannot be empty!');history.go(-1)</script>";
    exit;
}
if($_POST['thumbnail']==""){
    echo "<script>alert('Thumbnail cannot be empty!');history.go(-1)</script>";
    exit;
}
if(!is_numeric($_POST['orderid'])){
    echo "<script>alert('Order must be a number!');history.go(-1)</script>";
    exit;
}
$sql_modify="update slide set title='".$_POST['title']."',link='".$_POST['link']."',thumbnail='".$_POST['thumbnail']."',orderid='".$_POST['orderid']."' where id='".$_GET['id']."'";
$result=mysqli_query($mysqli,$sql_modify);
			if($result){
				echo"<script>alert('Modification successful!');window.location.href='slide_list.php'</script>";// Redirect to backend list page
				exit;
			}else{
				echo"<script>alert('Modification failed!');window.location.href='slide_list.php'</script>";// Redirect to backend registration page
				exit;
			}
			mysqli_free_result($result);
			mysqli_close($mysqli);
		?>
</body>
</html>
