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
						echo '<a href="user.php"> Personal center </a>';
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
		$sql="update fosters set title='".$_POST['title']."'
		,comefrom= '".$_POST['comefrom']."'
		,pubdate='".$_POST['pubdate']."'
		,thumbnail= '".$_POST['thumbnail']."'
		,keywords='".$_POST['keywords']."'
		,description='".$_POST['description']."'
		,content= '".$_POST['content']."'
		
		where id='".$_GET['id']."'";
		$result=mysqli_query($mysqli,$sql);
					if($result){
						echo"<script>alert('Modification successful!');window.location.href='fosters_list.php'</script>";//Jump back to the backend list page
						exit;
					}else{
						echo"<script>alert('Modification failed!');window.location.href='fosters_list.php'</script>";//Jump back to the backend list page
						exit;
					}
					mysqli_free_result($result);
					mysqli_close($mysqli);
	 }
	$id=$_GET['id'];
	$sqlstr="select * from fosters where id=".$id;
	$result=mysqli_query($mysqli,$sqlstr);
	$rs=mysqli_fetch_array($result);
	?>
    <div class="inner-banner has-base-color-overlay text-center" style="background: url(images/<?php echo $bimg[0];?>);">
        <div class="container">
            <div class="box">
                <h3>Foster Care Modifications</h3>
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
                            Foster Care Modifications
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
                        <h2><span>Foster Care Modifications</span></h2>
                    </div>
                    <div class="default-form-area">
                       
<form id="form1" name="form1" method="post" action="fosters_modify.php?id=<?php echo $rs['id']?>">
  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="tb01">
  
    
    <tr>
      <td width="12%" height="35"><span style="color:#F30">*</span>Title:</td>
      <td width="88%"><input name="title" type="text" id="title" value="<?php echo $rs['title']?>" size="50" /></td>
    </tr>
    <tr>
      <td height="31">Source:</td>
      <td><input name="comefrom" type="text" id="comefrom" value="<?php echo $rs['comefrom']?>" /></td>
    </tr>
    <tr>
      <td height="29">Release date:</td>
      <td><input name="pubdate" type="text" id="pubdate" value="<?php echo $rs['pubdate']?>" /></td>
    </tr>
    <tr>
      <td height="31"><span style="color:#F30">*</span>Thumbnail:</td>
      <td><input name="thumbnail" type="text" id="url3" value="<?php echo $rs['thumbnail']?>" /> 
      <input type="button" id="image3" value="Select an image" /></td>
    </tr>
    <tr>
      <td height="60">Keyword:</td>
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
      <td><textarea name="content" style="width:800px;height:300px;visibility:hidden;"><?php echo $rs['content']?>
      </textarea></td>
    </tr>
   
    <tr>
      <td height="43" colspan="2"><input type="submit" name="Submit" value="提交" class="btn-style-one" /></td>
    </tr>
  </table>
</form>
                    </div>
                </div>

               
            </div>
        </div>
    </section>

   

 <?php include './foot.php';?>