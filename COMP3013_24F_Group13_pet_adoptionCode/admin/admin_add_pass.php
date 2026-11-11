
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
    <!--Administrator adds processing operations-->
	<?php
		$username=$_POST['admin_name'];
		if($username==""){
			echo"<script>alert('The account cannot be empty!');history.go(-1)</script>";//Jump back to the background registration page
			exit;
		}elseif(mysqli_num_rows(mysqli_query($mysqli,"select admin_name from admin where admin_name='".$username."'"))>0){
			echo"<script>alert('The user name already exists, please change the account to register!');window.location.href='admin_add.php'</script>";//Jump back to the background registration page
			exit;
		}
		$password=$_POST['admin_pass'];
	//$password=md5($password);
		if($password==""){
			echo"<script>alert('The password cannot be empty!');history.go(-1)</script>";//The password cannot be empty! Jump back to the background registration page
			exit;
		}
		$sqlstr="insert into admin(admin_name,admin_pass) values('".$username."','".$password."')";
		$result=mysqli_query($mysqli,$sqlstr);
		if($result){
			echo"<script>alert('segistered successfully!');window.location.href='admin_list.php'</script>";//Jump back to the background list page
			exit;
		}else{
			echo"<script>alert('Registered failed!');window.location.href='admin_add.php'</script>";//Jump back to the background registration page
			exit;
		}
		mysqli_free_result($result);
		mysqli_close($mysqli);
	?>
</body>
</html>
