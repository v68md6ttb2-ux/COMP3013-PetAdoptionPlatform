<?php
require_once ('../inc/conn.php');
error_reporting(1);
if(!isset($_SESSION['user']['id'])||empty($_SESSION['user']['id'])){
	echo "<script type='text/javascript'>alert('Please log in to check it out!');window.location.href='login.php';</script>";	
}
?>