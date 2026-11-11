<?php
 require_once 'session.php';
 require_once '../inc/conn.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
</head>
<body>
<!-- Foster Add Processing -->
<?php

if($_POST['title']==""){
    echo "<script>alert('Title cannot be empty!');history.go(-1)</script>";
    exit;
}
if($_POST['thumbnail']==""){
    echo "<script>alert('Thumbnail cannot be empty!');history.go(-1)</script>";
    exit;
}
if($_POST['content']==""){
    echo "<script>alert('Content cannot be empty!');history.go(-1)</script>";
    exit;
}
$sql="insert into fosters(title,comefrom,pubdate,thumbnail,keywords,description,content) 
values ('".$_POST['title']."','".$_POST['comefrom']."','".$_POST['pubdate']."','".$_POST['thumbnail']."','".$_POST['keywords']."','".$_POST['description']."','".$_POST['content']."')";
$result=mysqli_query($mysqli,$sql);
		if($result){
			echo"<script>alert('Added successfully!');window.location.href='fosters_list.php'</script>"; // Redirect back to the list page
			exit;
		}else{
			echo"<script>alert('Add failed!');window.location.href='fosters_add.php'</script>"; // Redirect back to the add page
			exit;
		}
		mysqli_free_result($result);
		mysqli_close($mysqli);
	?>
</body>
</html>
