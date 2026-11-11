<?php
	require_once ('filter.php');
	$id = "";
	if(isset($_GET["id"])){
		$id = $_GET["id"];
	}
			
	$str = "SELECT * from animals_type where id = ".$id ;
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
</head>
<body>
<div class="panel admin-panel">
  <div class="panel-head"><strong><span class="icon-pencil-square-o"></span> Increase</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="type_updates.php">
      <div class="form-group">
        <div class="label">
          <label>Type name:</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="type_name" value="<?php echo $row["type_name"]; ?>" />
          <input type="hidden" class="input" name="id" value="<?php echo $id; ?>" />
          <div class="tips"></div>
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