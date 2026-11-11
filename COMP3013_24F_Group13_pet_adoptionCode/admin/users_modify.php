<!-- Query the modified object -->
<?php
    require_once "session.php";
    require_once "../inc/conn.php";
    $id = $_GET['id'];
    $sqlstr = "select * from users where id=" . $id;
    $result = mysqli_query($mysqli, $sqlstr);
    $row = mysqli_fetch_array($result);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>User List</title>
<link href="css/table.css" rel="stylesheet" type="text/css" />
</head>
<body>
<form name="form_add" id="form_add" action="users_modify_pass.php?id=<?php echo $row['id']?>" method="post" >
  <table width="100%" border="1" cellspacing="0" cellpadding="0">
    <tr>
      <td height="35" colspan="6" class="tt">Modify User</td>
    </tr>
    <tr>
      <td width="6%" height="35">Username</td>
      <td width="30%"><input name="name" type="text" id="name" value="<?php echo $row['name']?>" /></td>  
    </tr>
    <tr>
      <td width="6%" height="35">Email</td>
      <td width="30%"><input name="email" type="text" id="email" value="<?php echo $row['email']?>" /></td>  
    </tr>
    <tr>
      <td width="8%">Password</td>
      <td width="47%"><input name="password" type="password" id="password" size="25" />
        <span style="color:#F30;font-size:12px;">
        (Note: If modifying, please enter a new password!)</span></td>  
    </tr>
    <tr>
      <td width="9%" colspan="2"><input type="submit" name="button" id="button" value="Modify" /></td>
    </tr>
  </table>
</form>
</body>
</html>
