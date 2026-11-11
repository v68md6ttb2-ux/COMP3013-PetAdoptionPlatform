<!-- Modification Query -->
<?php
	require_once"session.php";
	require_once"../inc/conn.php";
	$id=$_GET['id'];
	$sqlstr="select * from slide where id=".$id;
	$result=mysqli_query($mysqli,$sqlstr);
	$rs=mysqli_fetch_array($result);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" href="kindeditor/themes/default/default.css" />
<link href="css/table.css" rel="stylesheet" type="text/css" />
<script charset="utf-8" src="kindeditor/kindeditor-min.js"></script>
<script charset="utf-8" src="kindeditor/lang/zh_CN.js"></script>
<script>
	KindEditor.ready(function(K) {
				var editor = K.editor({
					allowFileManager : true
				});
	K('#image3').click(function() {
					editor.loadPlugin('image', function() {
						editor.plugin.imageDialog({
							showRemote : true,
							imageUrl : K('#url3').val(),
							clickFn : function(url, title, width, height, border, align) {
								K('#url3').val(url);
								editor.hideDialog();
							}
						});
					});
				});
			});
</script>
</head>
<body>
<form name="form1" id="form1" action="slide_modify_pass.php?id=<?php echo $rs['id']?>" method="post" >
  <table width="100%" border="1" cellspacing="0" cellpadding="0">
    <tr>
      <td height="41" colspan="2" class="tt">Modify Focus Slide</td>
    </tr>
    <tr>
      <td width="14%" height="35"><span style="color:#F60">*</span>Title:</td>
      <td width="86%"><input name="title" type="text" id="title" value="<?php echo $rs['title']?>" /></td>
    </tr>
    <tr>
      <td height="35">Link:</td>
      <td><input name="link" type="text" id="link" value="<?php echo $rs['link']?>" /></td>
    </tr>
    <tr>
      <td height="35"><span style="color:#F60">*</span>Thumbnail:</td>
      <td><input name="thumbnail" type="text" id="url3" value="<?php echo $rs['thumbnail']?>" size="20" />        <input type="button" id="image3" value="Upload" /></td>
    </tr>
    <tr>
      <td height="35"><span style="color:#F60">*</span>Order:</td>
      <td><input name="orderid" type="text" id="orderid" value="<?php echo $rs['orderid']?>" size="10" /></td>
    </tr>
    <tr>
      <td height="35" colspan="2"><input type="submit" name="button" id="button" value="Submit" /></td>
    </tr>
  </table>
</form>
</body>
</html>

