<!-- Start session, include session file -->
<?php
    require_once"session.php";  // Include session file
    require_once"../inc/conn.php";  // Include database connection file
    $id = $_GET['id'];  // Get the page ID
    $sqlstr = "select * from single where id=" . $id;  // SQL query to select data for the specific page
    $result = mysqli_query($mysqli, $sqlstr);  // Execute the query
    $row = mysqli_fetch_array($result);  // Fetch the result into an array
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Modify Single Page</title>  <!-- Modify Single Page -->
<link rel="stylesheet" href="kindeditor/themes/default/default.css" />
<link href="css/table.css" rel="stylesheet" type="text/css" />
<script charset="utf-8" src="kindeditor/kindeditor-min.js"></script>
<script charset="utf-8" src="kindeditor/lang/zh_CN.js"></script>
<script>
    var editor;
    KindEditor.ready(function(K) {
        editor = K.create('textarea[name="content"]', {
            allowFileManager : true
        });
        K('#image3').click(function() {
            editor.loadPlugin('image', function() {
                editor.plugin.imageDialog({
                    showRemote : false,
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
<!-- Modify the content -->
<form id="form1" name="form1" method="post" action="single_modify_pass.php?id=<?php echo $row['id']?>">
  <table width="100%" border="1" cellspacing="0" cellpadding="0">
    <tr>
      <td colspan="2" class="tt">Modify Single Page</td>  <!-- Table header: Modify Single Page -->
    </tr>
    <tr>
      <td width="12%" height="35"><span style="color:#F30">*</span>Title:</td>  <!-- Title field -->
      <td width="88%"><input name="title" type="text" id="title" value="<?php echo $row['title']?>" size="50" /></td>  <!-- Title input -->
    </tr>
    <tr>
      <td height="31">Source:</td>  <!-- Source field -->
      <td><input name="comefrom" type="text" id="comefrom" value="<?php echo $row['comefrom']?>" /></td>  <!-- Source input -->
    </tr>
    <tr>
      <td height="29">Modification Date:</td>  <!-- Modification Date field -->
      <td><input name="pubdate" type="text" id="pubdate" value="<?php date_default_timezone_set('utc')?><?php echo $row['pubdate']?>" /></td>  <!-- Modification Date input -->
    </tr>
    <tr>
      <td height="68">Keywords:</td>  <!-- Keywords field -->
      <td><textarea name="keywords" cols="60" rows="3" id="keywords"><?php echo $row['keywords']?></textarea></td>  <!-- Keywords input -->
    </tr>
    <tr>
      <td height="69">Description:</td>  <!-- Description field -->
      <td><textarea name="description" cols="60" rows="3" id="url3"><?php echo $row['description']?></textarea></td>  <!-- Description input -->
    </tr>
    <tr>
      <td height="353"><span style="color:#F30">*</span>Content:</td>  <!-- Content field -->
      <td><textarea name="content" id="content" style="width:800px;height:300px;visibility:hidden;"><?php echo $row['content']?></textarea></td>  <!-- Content input -->
    </tr>
    <tr>
      <td height="35" colspan="2"><input type="submit" name="Submit" value="Submit" /></td>  <!-- Submit button -->
    </tr>
  </table>
</form>
</body>
</html>

<!-- Close the database connection -->
<?php 
mysqli_close($mysqli);  // Close the database connection
?>
