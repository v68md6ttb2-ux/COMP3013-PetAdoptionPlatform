<head>
    <meta charset="UTF-8">
    <title>Welcome to the pet adoption platform</title> 

    <!-- mobile responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">

    <link rel="apple-touch-icon" sizes="180x180" href="images/favicon/apple-touch-icon.png">


<link rel="stylesheet" href="./admin/kindeditor/themes/default/default.css" />
<script charset="utf-8" src="./admin/kindeditor/kindeditor-min.js"></script>
<script charset="utf-8" src="./admin/kindeditor/lang/zh_CN.js"></script>
<link rel="stylesheet" href="./css/table.css" />

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
<?php
	
	require_once"./inc/conn.php";
	require_once"./inc/function.php";
?>
<div class="boxed_wrapper">
    <header class="top-bar">
        <div class="container">
            <div class="clearfix">
                <ul class="top-bar-text float_left">
                    <li>Welcome to the pet adoption platform<?php 
					if(isset($_SESSION['user'])&&!empty($_SESSION['user'])){
						echo '，&nbsp;&nbsp;&nbsp;['.$_SESSION['user']['name'].']&nbsp;&nbsp;&nbsp;';
						echo '<a href="user.php"> 个人中心 </a>';
					}
					?></li>
                </ul>
				
                <ul class="social-style-one float_right">
                    <li><a href="reg.php"> Enroll </a></li>
                    <li><a href="login.php"> Login </a></li>
					
                   
                </ul>
            </div>
        </div>
    </header>
<?php include './nav.php';
 require_once './inc/function.php';
?>
<?php 
if(!isset($_SESSION['user'])||empty($_SESSION['user'])){
	echo"<script>alert('Log in to view');window.location.href='index.php'</script>";//Jump back to the backend list page
	exit;
}
?>
     <?php
	 
	 if(!empty($_POST)){
		 	
		if($_POST['title']==""){
			echo "<script>alert('The title can't be empty!');history.go(-1)</script>";
			exit;
		}
		if($_POST['thumbnail']==""){
			echo "<script>alert('The thumbnail can't be empty!');history.go(-1)</script>";
			exit;
		}
		if($_POST['content']==""){
			echo "<script>alert('The content can't be empty!');history.go(-1)</script>";
			exit;
		}
		$sql="insert into fosters(title,user_id,comefrom,pubdate,thumbnail,keywords,description,content) 
		values ('".$_POST['title']."'
		,'".$_SESSION['user']['id']."'
		,'".$_POST['comefrom']."'
		,'".$_POST['pubdate']."'
		,'".$_POST['thumbnail']."'
		,'".$_POST['keywords']."'
		,'".$_POST['description']."'
		,'".$_POST['content']."'
		)";
		$result=mysqli_query($mysqli,$sql);
		if($result){
			echo"<script>alert('Added successfully!');window.location.href='fosters_list.php'</script>";//Jump back to the backend list page
			exit;
		}else{
			echo"<script>alert('Added failed!');window.location.href='fosters_add.php'</script>";//Jump back to the backend list page
			exit;
		}
		mysqli_free_result($result);
		mysqli_close($mysqli);
	 }
	
	?>
    <div class="inner-banner has-base-color-overlay text-center" style="background: url(images/<?php echo $bimg[0];?>);">
        <div class="container">
            <div class="box">
                <h3>Foster care releases</h3>
            </div><!-- /.box -->
        </div><!-- /.container -->
    </div>

    <div class="breadcumb-wrapper">
        <div class="container">
            <div class="pull-left">
                <ul class="list-inline link-list">
                    <li>
                        <a href="index.php">Home</a>
                    </li><!-- comment for inline hack
                    --><li>
                            Post foster care
                    </li>
                </ul><!-- /.list-line -->
            </div><!-- /.pull-left -->
           
        </div><!-- /.container -->
    </div>



    <section class="contact_us padd-2">
        <div class="container">
            <div class="row">
                 <?php include './right3.php';?>
                <div class="col-md-10 col-sm-12 col-xs-12">
                    <div class="sec-title">
                        <h2><span>Foster care releases</span></h2>
                    </div>
                    <div class="default-form-area">
                       
<form id="form1" name="form1" method="post" action="fosters_add.php">
  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="tb01">
  
    
    <tr>
      <td width="12%" height="35"><span style="color:#F30">*</span>Title:</td>
      <td width="88%"><input name="title" type="text" id="title" size="50" /></td>
    </tr>
    <tr>
      <td height="31">Source:</td>
      <td><input name="comefrom" type="text" id="comefrom" value="<?php echo $_SESSION['user']['name'];?>" /></td>
    </tr>
    <tr>
      <td height="29">Release date:</td>
      <td><input name="pubdate" type="text" id="pubdate" value="<?php 
	  date_default_timezone_set('UTC');
	  echo date('Y年m月d日');
	  ?>" /></td>
    </tr>
    <tr>
      <td height="31"><span style="color:#F30">*</span>Thumbnail:</td>
      <td><input name="thumbnail" type="text" id="url3" value="" /> 
      <input type="button" id="image3" value="Select an image" />
      (The recommended size is: 650*490)</td>
    </tr>
    <tr>
      <td height="60">Keyword:</td>
      <td><label for="keywords"></label>
      <textarea name="keywords" cols="60" rows="3" id="keywords"></textarea></td>
    </tr>
    <tr>
      <td height="60">Description:</td>
      <td><label for="description"></label>
      <textarea name="description" id="description" cols="60" rows="3"></textarea></td>
    </tr>
    <tr>
      <td height="333"><span style="color:#F30">*</span>Content:</td>
      <td><textarea name="content" style="width:800px;height:300px;visibility:hidden;"></textarea></td>
    </tr>
    <tr>
      <td height="43" colspan="2"><input type="submit" name="Submit" value="Submit" class="btn-style-one"/></td>
    </tr>
  </table>
</form>
                    </div>
                </div>

               
            </div>
        </div>
    </section>

   

 <?php include './foot.php';?>