<!--Modify query-->
<?php 
require_once 'session.php';
require_once '../inc/conn.php';
 require_once '../inc/function.php';
$id=$_GET['id'];
	$sqlstr="select * from activities where id=".$id;
	$result=mysqli_query($mysqli,$sqlstr);
	$rs=mysqli_fetch_array($result);
	
if(!empty($_POST)){
	if($_POST['content2']==""){
	echo "<script>alert('Reply cannot be empty!');history.go(-1)</script>";
	exit;
	}
	$sql="update activities set	content2= '".$_POST['content2']."'
	where id='".$_GET['id']."'";
	$result=mysqli_query($mysqli,$sql);
	if($result){
	echo"<script>alert('Modify successfully!');window.location.href='activities.php'</script>";//Jump back to the background list page
	exit;
	}else{
	echo"<script>alert('Modify failed'');window.location.href='activities.php'</script>";//Jump back to the background registration page
	exit;
	}
	mysqli_free_result($result);
	mysqli_close($mysqli);
		
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link rel="stylesheet" href="kindeditor/themes/default/default.css" />
<link href="css/table.css" rel="stylesheet" type="text/css" />

</head>

<body>
<form id="form1" name="form1" method="post" action="?id=<?php echo $rs['id']?>">
  <table width="100%" border="1" cellspacing="0" cellpadding="0">
    <tr>
      <td class="tt" colspan="2">RSVP</td>
    </tr> 
    <tr>
      <td ><span style="color:#F30">*</span>Content：</td>
      <td><?php echo $rs['content']?></td>
    </tr>
    <tr>
      <td ><span style="color:#F30">*</span>Reply：</td>
      <td><textarea name="content2" style="width:800px;height:100px;"><?php echo $rs['content2']?>
      </textarea></td>
    </tr>
    <tr>
      <td height="43" colspan="2"><input type="submit" name="Submit" value="Submit" /></td>
    </tr>
  </table>
</form>
</body>
</html>
