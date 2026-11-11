<!--创建连接对象-->
<?php
error_reporting(0);
session_start();
$server="127.0.0.1";
$username="root";
$password="";
$dbname="pet_adoption";//同MYSQL里面的数据库名完全相同
$mysqli=new mysqli($server,$username,$password,$dbname);//创建数据库连接对象
$rs=mysqli_query($mysqli,"set names utf8");//设置数据库编码

?>