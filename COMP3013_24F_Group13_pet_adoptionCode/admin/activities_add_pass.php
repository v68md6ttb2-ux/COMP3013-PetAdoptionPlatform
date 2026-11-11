
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

<?php
		
if($_POST['title']==""){
    echo "<script>alert('No content！');history.go(-1)</script>";
    exit;
}
if($_POST['thumbnail']==""){
    echo "<script>alert('No content！');history.go(-1)</script>";
    exit;
}
if($_POST['content']==""){
    echo "<script>alert('No content！');history.go(-1)</script>";
    exit;
}
$sql="insert into activities(title,comefrom,pubdate,thumbnail,keywords,description,content) 
values ('".$_POST['title']."','".$_POST['comefrom']."','".$_POST['pubdate']."','".$_POST['thumbnail']."','".$_POST['keywords']."','".$_POST['description']."','".$_POST['content']."')";
$result=mysqli_query($mysqli,$sql);
		if($result){
			echo"<script>alert('Successful！');window.location.href='activities_list.php'</script>";
			exit;
		}else{
			echo"<script>alert('Failed！');window.location.href='activities_add.php'</script>";
			exit;
		}
		mysqli_free_result($result);
		mysqli_close($mysqli);
	?>
</body>
</html>