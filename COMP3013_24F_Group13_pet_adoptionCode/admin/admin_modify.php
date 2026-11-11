
<?php
	require_once"session.php";
	require_once"../inc/conn.php";
	$id=$_GET['id'];
	$sqlstr="select * from admin where id=".$id;
	$result=mysqli_query($mysqli,$sqlstr);
	$row=mysqli_fetch_array($result);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Administrator list</title>
<link href="css/table.css" rel="stylesheet" type="text/css" />
</head>
<body>
<form name="form_add" id="form_add" action="admin_modify_pass.php?id=<?php echo $row['id']?>" method="post" >
  <table width="100%" border="1" cellspacing="0" cellpadding="0">
    <tr>
      <td height="35" colspan="6" class="tt"> Modify administrator</td>
    </tr>
    <tr>
      <td width="6%" height="35">Account</td>
      <td width="30%"><input name="admin_name" type="text" id="admin_name" value="<?php echo $row['admin_name']?>" disabled='disabled' /></td>
      <td width="8%">Password</td>
      <td width="47%"><input name="admin_pass" type="password" id="admin_pass" size="25" />
        <span style="color:#F30;font-size:12px;">
        (Note: If modified, please enter a new password!)</span></td>
      <td width="9%" colspan="2"><input type="submit" name="button" id="button" value="Modify" /></td>
    </tr>
  </table>
</form>
</body>
</html>