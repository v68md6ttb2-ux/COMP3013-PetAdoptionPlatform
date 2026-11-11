<?php 
require_once 'session.php';
require_once '../inc/conn.php';
require_once '../inc/function.php';
$id=$_GET['id'];
	$sqlstr="select * from donation where id=".$id;
	$result=mysqli_query($mysqli,$sqlstr);
	$rs=mysqli_fetch_array($result);
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
<form id="form1" name="form1" method="post" action="donation_modify_pass.php?id=<?php echo $rs['id']?>">
  <table width="100%" border="1" cellspacing="0" cellpadding="0">
    <tr>
      <td class="tt" colspan="2">Modify Donation</td>
    </tr> 
    <tr>
      <td width="12%" height="35"><span style="color:#F30">*</span>Title:</td>
      <td width="88%"><input name="title" type="text" id="title" value="<?php echo $rs['title']?>" size="50" /></td>
    </tr>
    <tr>
      <td height="31">Source:</td>
      <td><input name="comefrom" type="text" id="comefrom" value="<?php echo $rs['comefrom']?>" /></td>
    </tr>
    <tr>
      <td height="29">Publish Date:</td>
      <td><input name="pubdate" type="text" id="pubdate" value="<?php echo $rs['pubdate']?>" /></td>
    </tr>
    <tr>
      <td height="31"><span style="color:#F30">*</span>Thumbnail:</td>
      <td><input name="thumbnail" type="text" id="url3" value="<?php echo $rs['thumbnail']?>" /> 
      <input type="button" id="image3" value="Select Image" /></td>
    </tr>
    <tr>
      <td height="60">Keywords:</td>
      <td><label for="keywords"></label>
      <textarea name="keywords" cols="60" rows="3" id="keywords"><?php echo $rs['keywords']?></textarea></td>
    </tr>
    <tr>
      <td height="60">Description:</td>
      <td><label for="description"></label>
      <textarea name="description" id="description" cols="60" rows="3"><?php echo $rs['description']?></textarea></td>
    </tr>
    <tr>
      <td height="325"><span style="color:#F30">*</span>Content:</td>
      <td><textarea name="content" style="width:800px;height:300px;visibility:hidden;"><?php echo $rs['content']?></textarea></td>
    </tr>
    <tr>
      <td height="43" colspan="2"><input type="submit" name="Submit" value="Submit" /></td>
    </tr>
  </table>
</form>
</body>
</html>
