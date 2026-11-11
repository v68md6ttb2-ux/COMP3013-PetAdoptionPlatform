<?php
	require_once ('filter.php');
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>Back-office management</title>  
    <link rel="stylesheet" href="css/pintuer.css">
    <link rel="stylesheet" href="css/admin.css">
    <script src="js/jquery.js"></script>
</head>
<body style="background-color:#f2f9fd;">
<div class="header bg-main">
  <div class="logo margin-big-left fadein-top">
    <h1><img src="images/y.jpg" class="radius-circle rotate-hover" height="50" alt="" />Back-office management</h1>
  </div>
  <div class="head-l">  &nbsp;&nbsp;<a class="button button-little bg-red" href="login.php"><span class="icon-power-off"></span> Sign out</a> </div>
</div>
<div class="leftnav" style="height:500px;overflow-y:scroll;" >
  <div class="leftnav-title"><strong><span class="icon-list"></span>Menu list</strong></div>
  <h2><span class="icon-user"></span>Pet management</h2>
  <ul style="display:block">
    <li><a href="animals_list.php?type_id=1" target="right"><span class="icon-caret-right"></span>Pet list</a></li>
    <li><a href="animals_add.php?type_id=1" target="right"><span class="icon-caret-right"></span>Pet added</a></li>
  </ul>
  <h2><span class="icon-user"></span>Type management</h2>
  <ul style="display:block">
    <li><a href="type_list.php" target="right"><span class="icon-caret-right"></span>A list of types</a></li>
    <li><a href="type_add.php" target="right"><span class="icon-caret-right"></span>Added pet types</a></li>
  </ul>
  <h2><span class="icon-user"></span>Order management</h2>
  <ul style="display:block">
    <li><a href="order_list.php" target="right"><span class="icon-caret-right"></span>Order list</a></li>
  </ul>
  <h2><span class="icon-user"></span>User management</h2>
  <ul style="display:block">
    <li><a href="user_list.php" target="right"><span class="icon-caret-right"></span>User list</a></li>
    <li><a href="user_add.php" target="right"><span class="icon-caret-right"></span>User added</a></li>
  </ul>
  <h2><span class="icon-user"></span>Donation management</h2>
  <ul style="display:block">
    <li><a href="message_list.php" target="right"><span class="icon-caret-right"></span>Donation list/a></li>
  </ul>
  <h2><span class="icon-pencil-square-o"></span>Admin management/h2>
  <ul>
    <li><a href="admin_password.php" target="right"><span class="icon-caret-right"></span>Change password</a></li>     
  </ul>  

  <ul style="display:block">
    <li><a href="../index.php" target="target"><span class="icon-caret-right"></span>Return to reception desk</a></li>
  </ul> 
</div>
<script type="text/javascript">
$(function(){
  $(".leftnav h2").click(function(){
	  $(this).next().slideToggle(200);	
	  $(this).toggleClass("on"); 
  })
  $(".leftnav ul li a").click(function(){
	    $("#a_leader_txt").text($(this).text());
  		$(".leftnav ul li a").removeClass("on");
		$(this).addClass("on");
  })
});
</script>
<ul class="bread">
  <li><a href="animals_list.php" target="right" class="icon-home"> Home</a></li>
  <li><a href="##" id="a_leader_txt">Pet list</a></li>
  <li><b>Language:</b><span style="color:red;">English</span> </li>
</ul>
<div class="admin">
  <iframe scrolling="auto" rameborder="0" src="animals_list.php?type_id=1" name="right" width="100%" height="100%"></iframe>
</div>
<div style="text-align:center;">
</div>
</body>
</html>