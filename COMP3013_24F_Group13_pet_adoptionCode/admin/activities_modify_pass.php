
<?php 
require_once 'session.php';
require_once '../inc/conn.php';
?>
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
$sql="update activities set title='".$_POST['title']."'
,comefrom= '".$_POST['comefrom']."'
,pubdate='".$_POST['pubdate']."'
,thumbnail= '".$_POST['thumbnail']."'
,keywords='".$_POST['keywords']."'
,description='".$_POST['description']."'
,content= '".$_POST['content']."'

where id='".$_GET['id']."'";
$result=mysqli_query($mysqli,$sql);
			if($result){
				echo"<script>alert('Successful!');window.location.href='activities_list.php'</script>";//Jump back to the background list page
				exit;
			}else{
				echo"<script>alert('Failed！');window.location.href='activities_list.php'</script>";//Jump back to the background registration page
				exit;
			}
			mysqli_free_result($result);
			mysqli_close($mysqli);
		?>
</body>
</html>
