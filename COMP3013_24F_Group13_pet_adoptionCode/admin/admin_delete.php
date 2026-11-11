
<?php
	require_once"session.php";
	require_once"../inc/conn.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled document</title>
</head>
<body>
<!--Perform a delete operation-->
<?php
	$id=$_GET['id'];
	$sqlstr="delete from admin where id=".$id;
	$result=mysqli_query($mysqli,$sqlstr);
	if($result){
		echo"<script>alert('Successfully delete!');window.location.href='admin_list.php'</script>";//The background administrator list page is displayed
		exit;
	}else{
		echo"<script>alert('Failed delete');window.location.href='admin_list.php'</script>";//The background administrator list page is displayed
		exit;
	}
	mysqli_free_result($result);
	mysqli_close($mysqli);
?>
</body>
</html>
