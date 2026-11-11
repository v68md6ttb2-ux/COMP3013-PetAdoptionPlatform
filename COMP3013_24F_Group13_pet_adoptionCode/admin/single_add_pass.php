<!-- Start session -->
<?php require_once"session.php";
	require_once"../inc/conn.php";?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
</head>
<body>
<!-- Add processing -->
<?php
		$title=$_POST['title'];
		if($title==""){
			echo"<script>alert('Title cannot be empty!');history.go(-1)</script>";// Go back to the previous page (backend registration page)
			exit;
		}
		$content=$_POST['content'];
		if($content==""){
			echo"<script>alert('Content cannot be empty!');history.go(-1)</script>";// Go back to the previous page (backend registration page)
			exit;
		}
		$sqlstr="insert into single(title,comefrom,pubdate,keywords,description,content) values('".$title."','".$_POST['comefrom']."','".$_POST['pubdate']."','".$_POST['keywords']."','".$_POST['description']."','".$content."')";
		$result=mysqli_query($mysqli,$sqlstr);
		if($result){
			echo"<script>alert('Added successfully!');window.location.href='single_list.php'</script>";// Go to the backend list page
			exit;
		}else{
			echo"<script>alert('Failed to add!');window.location.href='single_add.php'</script>";// Go back to the backend registration page
			exit;
		}
		mysqli_free_result($result);
		mysqli_close($mysqli);
	?>
</body>
</html>
