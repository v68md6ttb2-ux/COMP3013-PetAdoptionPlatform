<!-- Start session, include file -->
<?php 
require_once"session.php";  // Include the session file
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>  <!-- Untitled Document -->
<link rel="stylesheet" href="kindeditor/themes/default/default.css" />
<link href="css/table.css" rel="stylesheet" type="text/css" />
<script charset="utf-8" src="kindeditor/kindeditor-min.js"></script>
<script charset="utf-8" src="kindeditor/lang/zh_CN.js"></script>
<script>
	KindEditor.ready(function(K) {
				var editor = K.editor({
					allowFileManager : true  // Allow file manager
				});
	K('#image3').click(function() {  // Click event for image button
					editor.loadPlugin('image', function() {
						editor.plugin.imageDialog({
							showRemote : false,  // Do not show remote images
							imageUrl : K('#url3').val(),  // Set image URL
							clickFn : function(url, title, width, height, border, align) {
								K('#url3').val(url);  // Set the image URL in the input field
								editor.hideDialog();  // Close the editor dialog
							}
						});
					});
				});
			});
</script>
</head>
<body>
<form name="form1" id="form1" action="slide_add_pass.php" method="post" >
  <table width="100%" border="1" cellspacing="0" cellpadding="0">
    <tr>
      <td height="41" colspan="2" class="tt">Add Slide</td>  <!-- Add Slide -->
    </tr>
    <tr>
      <td width="10%" height="35"><span style="color:#F60">*</span>Title:</td>  <!-- Title -->
      <td width="90%"><input type="text" name="title" id="title" /></td>
    </tr>
    <tr>
      <td height="35">Link:</td>  <!-- Link -->
      <td><input type="text" name="link" id="link" /></td>
    </tr>
    <tr>
      <td height="35"><span style="color:#F60">*</span>Thumbnail:</td>  <!-- Thumbnail -->
      <td><input name="thumbnail" type="text" id="url3" value="" size="20" />        <input type="button" id="image3" value="Upload" /></td>  <!-- Upload -->
    </tr>
    <tr>
      <td height="35"><span style="color:#F60">*</span>Sort Order:</td>  <!-- Sort Order -->
      <td><input name="orderid" type="text" id="orderid" size="10" /></td>
    </tr>
    <tr>
      <td height="35" colspan="2"><input type="submit" name="button" id="button" value="Submit" /></td>  <!-- Submit -->
    </tr>
  </table>
</form>
</body>
</html>
