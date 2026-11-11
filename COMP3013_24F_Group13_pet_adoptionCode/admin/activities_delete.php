
<?php 
 require_once 'session.php';
 require_once '../inc/conn.php';
 $id=$_GET['id'];
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
</head>
<body>

<?php 
$sqlstr="delete from activities where id=".$id;
	$result=mysqli_query($mysqli,$sqlstr);
	if($result){
		echo"<script>alert('Successful！');window.location.href='activities_list.php'</script>";
		exit;
	}else{
		echo"<script>alert('Failed！');window.location.href='activities_list.php'</script>";
		exit;
	}
	mysqli_free_result($result);
	mysqli_close($mysqli);
?>
</body>
</html>