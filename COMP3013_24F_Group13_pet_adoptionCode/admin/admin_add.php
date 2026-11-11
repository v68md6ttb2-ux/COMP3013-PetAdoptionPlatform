
<?php
	require_once"session.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin list</title>
<link href="css/table.css" rel="stylesheet" type="text/css" />
</head>
<body>
<form name="form_add" id="form_add" action="admin_add_pass.php" method="post" >
  <table width="100%" border="1" cellspacing="0" cellpadding="0">
    <tr>
      <td class="tt" colspan="6">Add admin</td>
    </tr>
    <tr>
      <td width="6%" height="35"><span style="color:#F30">*</span>Account</td>
      <td width="30%"><input type="text" name="admin_name" id="admin_name" /></td>
      <td width="13%"><span style="color:#F30">*</span>Password</td>
      <td width="28%"><input name="admin_pass" type="password" id="admin_pass" size="30" /></td>
      <td width="23%" colspan="2"><input type="submit" name="button" id="button" value="Add" /></td>
    </tr>
  </table>
</form>
</body>
</html>