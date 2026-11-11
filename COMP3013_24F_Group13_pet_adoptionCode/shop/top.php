<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>To adopt</title> 

    <!-- mobile responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    

    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/responsive.css">

    <link rel="apple-touch-icon" sizes="180x180" href="../images/favicon/apple-touch-icon.png">

</head>
<body>
<?php
	
	require_once"../inc/conn.php";
	require_once"../inc/function.php";
?>
<div class="boxed_wrapper">
    <header class="top-bar">
        <div class="container">
            <div class="clearfix">
                <ul class="top-bar-text float_left">
                    <li><?php 
					if(isset($_SESSION['user'])&&!empty($_SESSION['user'])){
						echo 'Pet adoption platform，&nbsp;&nbsp;&nbsp;['.$_SESSION['user']['name'].']&nbsp;&nbsp;&nbsp;';
						echo '<a href="../user.php"> Personal Center </a> | ';
						echo '<a href="../logout.php"> Exit safely </a>';
					}
					?></li>
                </ul>
				
                <ul class="social-style-one float_right">
                    <li><a href="../reg.php"> Enroll </a></li>
                    <li><a href="../login.php"> Login </a></li>
					
                   
                </ul>
            </div>
        </div>
    </header>
	<section class="mainmenu-area stricky">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="main-logo">
                        <a href="index.php"><img src="../images/logo.png" alt=""></a>
                    </div>
                </div>

                <div class="col-md-8 menu-column">
                    <nav class="main-menu">
                        <div class="navbar-header">     
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="navbar-collapse collapse clearfix">
                            <ul class="navigation1 clearfix">
<?php 
$url = $_SERVER['PHP_SELF']; 
$u = explode('/',$url);
$filename = end($u); 
$cid = isset($_GET['c_id'])?$_GET['c_id']:0;

?>                  
<nav class="horizontal-menu">
        <ul>
            <li><a href="../index.php">
                <div class="menu-item">
                    
                    <span class="english">Home</span>
                </div>
                </a>
            </li>
            <li><a href="../info.php?c_id=1">
                <div class="menu-item">
                    
                    <span class="english">About Us</span>
                </div>
                </a>
            </li>
            <li><a href="./list.php">
                <div class="menu-item">
                    
                    <span class="english">Dog & Cat</span>
                </div></a>
            </li>
            <li><a href="../list2.php?c_id=4">
                <div class="menu-item">
                    
                    <span class="english">Activity</span>
                </div></a>
            </li>
            <li><a href="../contact.php">
                <div class="menu-item">
                    
                    <span class="english">Donation</span>
                </div></a>
            </li>
        </ul>
    </nav>
								
                            </ul>

                            <ul class="mobile-menu clearfix">
                                <li><a href="../index.php">Home</a> </li>
                                <li><a href="../info.php?c_id=1">About us</a></li>
								<li class="current"><a href="./list.php" >Pet</a></li>
                                <li><a href="../list2.php?c_id=4">Activity</a></li>
                                <li><a href="../contact.php">Donation</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>

            </div>
        </div>
    </section>