<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><!--Determine whether the user is logged in-->
<?php
	session_start();
	if(empty($_SESSION['username'])&& !isset($_SESSION['isChecked'])){
		echo "<script>alert('Please do not access illegally!');window.location.href='login.php'</script>";		
		exit;
	}
?>