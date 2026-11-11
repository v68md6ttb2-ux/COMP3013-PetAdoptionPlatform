<?php
	require_once ('filter.php');
	$id = "";
	if(isset($_GET["id"])){
		$id = $_GET["id"];
	}
			
	$str = "SELECT * from animals_table where id = ".$id ;
	$result=mysqli_query($mysqli,$str);
	if($row=mysqli_fetch_array($result)){}
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>Detail</title>  
    <link rel="stylesheet" href="css/pintuer.css">
    <link rel="stylesheet" href="css/admin.css">
    <script src="js/jquery.js"></script>
    <script src="js/pintuer.js"></script>  
	<link rel="stylesheet" href="kindeditor/themes/default/default.css" />
	<link rel="stylesheet" href="kindeditor/plugins/code/prettify.css" />
	<script charset="utf-8" src="kindeditor/kindeditor.js"></script>
	<script charset="utf-8" src="kindeditor/lang/zh_CN.js"></script>
	<script charset="utf-8" src="kindeditor/plugins/code/prettify.js"></script>
		<script>
			KindEditor.ready(function(K) {
				var editor = K.create("textarea[name='content']",{
					cssPath : 'kindeditor/plugins/code/prettify.css',
					uploadJson : 'kindeditor/php/upload_json.php',
					fileManagerJson : 'kindeditor/php/file_manager_json.php',
					allowFileManager : true
				});
				K('#image1').click(function() {
					editor.loadPlugin('image', function() {
						editor.plugin.imageDialog({
							imageUrl : K('#url1').val(),
							clickFn : function(url, title, width, height, border, align) {
								K('#url1').val(url);
								editor.hideDialog();
							}
						});
					});
				});
			
			});
		</script>
</head>
<body>
<div class="panel admin-panel">
  <div class="panel-head"><strong><span class="icon-pencil-square-o"></span> Increase</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="animals_updates.php">
      <div class="form-group">
        <div class="label">
          <label>Pet name:</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="animals_name" value="<?php echo $row["animals_name"]; ?>" />
          <input type="hidden" class="input" name="id" value="<?php echo $id; ?>" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>Title:</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="title" value="<?php echo $row["title"]; ?>" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>Premium:</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="price" value="<?php echo $row["price"]; ?>" />
          <div class="tips"></div>
        </div>
      </div>
      
      <div class="form-group">
        <div class="label">
          <label>Pet Type:</label>
        </div>
        <div class="field">
          <select  class="input" name="animals_type" >
          <?php
			
				$str2 = "SELECT * from animals_type";
				$result2=mysqli_query($mysqli,$str2);
			
				while($row2=mysqli_fetch_array($result2)){
			?>
          		<option value="<?php echo $row2["id"]; ?>"<?php 
          			if($row2["id"]==$row["animals_type_id"]){
          				?>
          				selected="selected" 
          				<?php 
          			}
          		
          		?>><?php echo $row2["type_name"]; ?></option>
          	<?php } ?>
          </select>
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>Image:</label>
        </div>
        <div class="field">
	        <input type="text" id="url1" class="inputTXT" name="pic_link" value="<?php echo $row["images"]; ?>" /> <input type="button" name="images" id="image1" value="Select" />
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>Content:</label>
        </div>
        <div class="field">
          <textarea name="content" class="inputTXT"><?php echo $row["info"]; ?></textarea>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label></label>
        </div>
        <div class="field">
          <button class="button01" type="submit"> Submit</button>
        </div>
      </div>
    </form>
  </div>
</div>
</body></html>