<?php 
include './header.php';
include './nav.php';
require_once './inc/function.php';
?>

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
<?php 

$sql ="select * from donation where user_id='{$_SESSION['user']['id']}'";
 				//求记录的总条数
 				$total_num=mysqli_num_rows(mysqli_query($mysqli,$sql));
 				//设置每页显示记录条数
 				$pagesize=10;
 				//计算总页数
 				$page_num=ceil($total_num/$pagesize);
 				//设置页数
 				$page=$_GET['page'];
 				if($page<1||$page==""){
 					$page=1;
 				}
 				if($page>$page_num){
 					$page=$page_num;
 				}
 				//设置偏移量
 				$offset=$pagesize*($page-1);
 				//求上一页和下一页
 				$prepage=($page<>1)?$page-1:$page;
 				$nextpage=($page<>$page_num)?$page+1:$page;
 				//读取指定记录数
 				$sqlstr=$sql." order by id desc limit ".$offset." ,".$pagesize;
				//echo $sqlstr;
 				$result=mysqli_query($mysqli,$sqlstr);
	
	?>
    <div class="inner-banner has-base-color-overlay text-center" style="background: url(images/<?php echo $bimg[0];?>);">
        <div class="container">
            <div class="box">
                <h3>My donation</h3>
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
                        My donation
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
                        <h2><span>My donation</span></h2>
                    </div>
                    <div class="default-form-area">
                       
 <table width="100%" border="1" cellspacing="0" cellpadding="0" class="tb01">
   
    <tr>
      <th>Release date</th> 
      <th>Title</th>
      <th>Image</th>
      <th colspan="2">Operation</th>
    </tr>
<?php
 
if($total_num>0){
      while($row=mysqli_fetch_array($result)){
        ?>
    <tr>
     <td><?php echo $row['pubdate']?></td>
      <td><?php echo $row['title']?></td>
      <td><img src="<?php echo $row['thumbnail']?>" width="80"/></td>
      
      <td width="12%"><input type="submit" name="button" id="button"    class="btn-style-one" value="修改" onclick="window.location.href='donation_modify.php?id=<?php echo $row['id']?>'" /></td>
      <td width="11%"><input type="submit" name="button2" id="button2"  class="btn-style-one" value="删除" onclick="window.location.href='donation_delete.php?id=<?php echo $row['id']?>'" /></td>
    </tr>
<?php
    }
} else {
    ?>
 <tr>
      <td height="35" colspan="7">No record yet!</td>
    </tr>
<?php
}
mysqli_close($mysqli);
if($total_num>0){
?>
    <tr>
      <td height="43" colspan="7" align="center"> <?php echo $page?>/<?php echo $page_num?>&nbsp;&nbsp;<a href="?page=1">Home</a>&nbsp;&nbsp;	<a href="?page=<?php echo $prepage?>">Previous</a>&nbsp;&nbsp;<a href="?page=<?php echo $nextpage?>">Next</a>&nbsp;&nbsp;<a href="?page=<?php echo $page_num?>"> Last</a> </td>
    </tr><?php
}
?>
  </table>
                    </div>
                </div>

               
            </div>
        </div>
    </section>

   

 <?php include './foot.php';?>