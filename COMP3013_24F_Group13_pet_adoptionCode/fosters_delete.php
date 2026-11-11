<!-- start the session, reference the session file -->
<?php 
 require_once './inc/conn.php';

 $id=$_GET['id'];
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
</head>
<body>
<!-- Foster Care Deletion Processing - >
<?php 
$sqlstr="delete from fosters where id=".$id;
	$result=mysqli_query($mysqli,$sqlstr);
	if($result){
		echo"<script>alert('Delete successfully!');window.location.href='fosters_list.php'</script>";//Jump back to the Admins list page
		exit;
	}else{
		echo"<script>alert('Delete failed!');window.location.href='fosters_list.php'</script>";//Jump back to the Admins list page
		exit;
	}
	mysqli_free_result($result);
	mysqli_close($mysqli);
?>
</body>
</html>