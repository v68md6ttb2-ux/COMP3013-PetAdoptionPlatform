<?php 
require_once"inc/conn.php";
require_once"./inc/function.php";
$sql_config="select * from config";
$result_config=mysqli_query($mysqli,$sql_config);
$config=mysqli_fetch_array($result_config);
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $config['site_title']?></title> 
<meta name="keywords" content="<?php echo $config['site_keywords']?>">
<meta name="description" content="<?php echo $config['site_description']?>">
    <!-- mobile responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">

    <link rel="apple-touch-icon" sizes="180x180" href="images/favicon/apple-touch-icon.png">

</head>
<body>
<div class="boxed_wrapper">
    <header class="top-bar">
        <div class="container">
            <div class="clearfix">
                <ul class="top-bar-text float_left">
                    <li><?php echo $config['site_title']?><?php 
					if(isset($_SESSION['user'])&&!empty($_SESSION['user'])){
						echo '，&nbsp;&nbsp;&nbsp;['.$_SESSION['user']['name'].']&nbsp;&nbsp;&nbsp;';
						echo '<a href="user.php"> Personal Center </a> | ';
						echo '<a href="logout.php"> Exit safely </a>';
					}
					?></li>
                </ul>
				
                <ul class="social-style-one float_right">
                    <li><a href="reg.php"> Enroll </a></li>
                    <li><a href="login.php"> Login </a></li>
					
                   
                </ul>
            </div>
        </div>
    </header>