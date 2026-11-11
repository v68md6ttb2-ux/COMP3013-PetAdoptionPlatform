<?php 
require_once"session.php";  // Include the session file.
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link rel="stylesheet" href="kindeditor/themes/default/default.css" />
<link href="css/table.css" rel="stylesheet" type="text/css" />
<script charset="utf-8" src="kindeditor/kindeditor-min.js"></script>
<script charset="utf-8" src="kindeditor/lang/zh_CN.js"></script>
<script>
	var editor;
	KindEditor.ready(function(K) 
	{
		editor = K.create('textarea[name="content"]', {
					allowFileManager : true  // Allow file manager for KindEditor.
				});
	
			});
</script>
</head>

<body>
<form id="form1" name="form1" method="post" action="single_add_pass.php">
  <table width="100%" border="1" cellspacing="0" cellpadding="0">
    <tr>
      <td  colspan="2" class="tt">Add Single Page</td>  <!-- Title: Add Single Page -->
    </tr>
    <tr>
      <td width="15%" height="35"><span style="color:#F30">*</span>Title:</td> <!-- Title -->
      <td width="85%"><input name="title" type="text" id="title" size="50" /></td>
    </tr>
    <tr>
      <td height="31">Source:</td> <!-- Source -->
      <td><input name="comefrom" type="text" id="comefrom" value="This site" /></td>
    </tr>
    <tr>
      <td height="29">Publication Date:</td> <!-- Publication Date -->
      <td><input name="pubdate" type="text" id="pubdate" value="<?php date_default_timezone_set('utc');?><?php echo date('Y年m月d日')?>" /></td>
    </tr>
    <tr>
      <td height="68">Keywords:</td> <!-- Keywords -->
      <td><label for="keywords"></label>
      <textarea name="keywords" cols="60" rows="3" id="keywords"></textarea></td>
    </tr>
    <tr>
      <td height="69">Description:</td> <!-- Description -->
      <td><textarea name="description" cols="60" rows="3" id="url3"></textarea></td>
    </tr>
    <tr>
      <td height="353"><span style="color:#F30">*</span>Content:</td> <!-- Content -->
      <td><textarea name="content" style="width:800px;height:300px;visibility:hidden;"></textarea></td>
    </tr>
    <tr>
      <td height="35" colspan="2"><input type="submit" name="Submit" value="Submit" /></td> <!-- Submit button -->
    </tr>
  </table>
</form>
</body>
</html>
