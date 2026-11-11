
<?php
	
	require_once"../inc/conn.php";
	$sqlstr="select * from config";
	$result=mysqli_query($mysqli,$sqlstr);
	$rs=mysqli_fetch_array($result);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled document</title>
<link href="css/table.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="kindeditor/themes/default/default.css" />
<script charset="utf-8" src="kindeditor/kindeditor-min.js"></script>
<script charset="utf-8" src="kindeditor/lang/zh_CN.js"></script>
<script>
	var editor;
	KindEditor.ready(function(K) 
	{
	var editor = K.editor({
					allowFileManager : true
				});
	//Upload website logo
	K('#image3').click(function() {
					editor.loadPlugin('image', function() {
						editor.plugin.imageDialog({
							showRemote : true,
							imageUrl : K('#site_logo').val(),
							clickFn : function(url, title, width, height, border, align) {
								K('#site_logo').val(url);
								editor.hideDialog();
							}
						});
					});
				});
	//Upload company QR code			
	K('#image4').click(function() {
					editor.loadPlugin('image', function() {
						editor.plugin.imageDialog({
							showRemote : true,
							imageUrl : K('#company_ewm').val(),
							clickFn : function(url, title, width, height, border, align) {
								K('#company_ewm').val(url);
								editor.hideDialog();
							}
						});
					});
				});			
			});
</script>
</head>

<body>
<form id="form1" name="form1" method="post" action="config.php?act=save">
  <table width="100%" border="1" cellspacing="0" cellpadding="0">
    <tr>
      <td height="35" colspan="3" class="tt">Website basic configuration</td>
    </tr>
    <tr>
      <td width="16%" height="33">Site title:</td>
      <td colspan="2"><label for="site_title"></label>
      <input name="site_title" type="text" id="site_title" value="<?php echo $rs['site_title']?>" size="40" /></td>
    </tr>
    <tr>
      <td height="33">Website logo</td>
      <td colspan="2"><input name="site_logo" type="text" id="site_logo" value="<?php echo $rs['site_logo']?>" size="40" />
      <input type="button" id="image3" value="Upload" /></td>
    </tr>
    <tr>
      <td height="33">Company QR code</td>
      <td colspan="2"><input name="company_ewm" type="text" id="company_ewm" value="<?php echo $rs['company_ewm']?>" size="40" />
      <input type="button" id="image4" value="Upload" /></td>
    </tr>
    <tr>
      <td height="32">Url of website:</td>
      <td width="53%"><input name="site_url" type="text" id="site_url" value="<?php echo $rs['site_url']?>" size="40" />
    </tr>
    <tr>
      <td height="64">Website keywords:</td>
      <td><textarea name="site_keywords" cols="60" rows="3" id="site_keywords"><?php echo $rs['site_keywords']?></textarea></td>
    </tr>
    <tr>
      <td height="61">Website Description:</td>
      <td><textarea name="site_description" cols="60" rows="3" id="site_description"><?php echo $rs['site_description']?></textarea></td>
    </tr>
    <tr>
      <td height="62">Copyright information at the bottom (html tags supported)：</td>
      <td colspan="2"><textarea name="site_copyright" cols="60" rows="3" id="site_copyright"><?php echo $rs['site_copyright']?></textarea></td>
    </tr>
    <tr>
      <td height="32">Company name</td>
      <td colspan="2"><label for="company_name"></label>
      <input name="company_name" type="text" id="company_name" value="<?php echo $rs['company_name']?>" size="40" /></td>
    </tr>
    <tr>
      <td height="31">Phone number</td>
      <td colspan="2"><input name="company_phone" type="text" id="company_phone" value="<?php echo $rs['company_phone']?>" size="40" /></td>
    </tr>
    <tr>
      <td height="31">Fax</td>
      <td colspan="2"><input name="company_fax" type="text" id="company_fax" value="<?php echo $rs['company_fax']?>" size="40" /></td>
    </tr>
    <tr>
      <td height="28">Email address</td>
      <td colspan="2"><input name="company_email" type="text" id="company_email" value="<?php echo $rs['company_email']?>" size="40" /></td>
    </tr>
    <tr>
      <td height="28">Wechat</td>
      <td colspan="2"><input name="company_weixin" type="text" id="company_weixin" value="<?php echo $rs['company_weixin']?>" size="40" /></td>
    </tr>
    <tr>
      <td height="33">Address</td>
      <td colspan="2"><label for="company_address"></label>
      <input name="company_address" type="text" id="company_address" value="<?php echo $rs['company_address']?>" size="80" /></td>
    </tr>
    <tr>
      <td height="32" colspan="3"><input type="submit" name="Submit" value="Modify" /></td>
    </tr>
  </table>
</form>
</body>
</html>
<!--Update save-->
<?php
	if($_GET['act']=="save"){
		//Build update statement
		$sqlstr="update config set site_title='".$_POST['site_title']."',site_url='".$_POST['site_url']
		."',site_logo='".$_POST['site_logo']."',company_ewm='".$_POST['company_ewm']."',site_keywords='"
		.$_POST['site_keywords']."',site_description='".$_POST['site_description']."',site_copyright='"
		.$_POST['site_copyright']."',company_name='".$_POST['company_name']."',company_phone='"
		.$_POST['company_phone']."',company_fax='".$_POST['company_fax']."',company_email='"
		.$_POST['company_email']."',company_weixin='".$_POST['company_weixin']."',company_address='"
		.$_POST['company_address']."'";
		//Execute update statement
		$result=mysqli_query($mysqli,$sqlstr);
		if($result){
			echo"<script>alert('Modify successfully!');window.location.href='config.php'</script>";//Jump back to the background login page
			exit;
		}
		mysqli_free_result($result);
		mysqli_close($mysqli);
	}
?>