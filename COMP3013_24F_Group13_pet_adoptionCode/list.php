<?php include './header.php';?>
<?php include './nav.php';?>
<?php $c_id=$_GET['c_id'];


?>

<div class="inner-banner has-base-color-overlay text-center" style="background: url(images/<?php echo $bimg[0];?>);background-size:100%;">
    <div class="container">
        <div class="box">
            <h3><?php echo $clist[$c_id];?></h3>
        </div><!-- /.box -->
    </div><!-- /.container -->
</div>

<div class="breadcumb-wrapper">
    <div class="container">
        <div class="pull-left">
            <ul class="list-inline link-list">
                <li>
                    <a href="index.php">Home</a>
                </li>
                <li>
                   <?php echo $clist[$c_id];?>
                </li>
            </ul><!-- /.list-line -->
        </div><!-- /.pull-left -->
       
    </div><!-- /.container -->
</div>


<div class="sidebar-page-container">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <section class="news-section padd-2">
                    <div class="row">
<?php 
$sql = "select activities.* from activities 
	
	WHERE 1=1";
//求记录的总条数
$total_num=mysqli_num_rows(mysqli_query($mysqli,$sql));
//设置每页显示记录条数
$pagesize=4;
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
$sqlstr=$sql." limit $offset,$pagesize";
$result=mysqli_query($mysqli,$sqlstr);
		

if($total_num>0){
      while($v=mysqli_fetch_array($result)){
        ?>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="default-blog-news wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">
                                <figure class="img-box">
                                    <img src="<?php echo $v['thumbnail'];?>" alt="News">
                                </figure>
                                <div class="lower-content">
                                    <div class="post-meta">by <?php echo $v['comefrom'];?>  |  <?php echo $v['pubdate'];?></div>
                                    <h4><a href="detail.php?id=<?php echo $v['id'];?>"><?php echo $v['title'];?></a></h4>
                                    <div class="text">
                                        <?php echo $v['description'];?>
                                    </div> 
                                    <div class="link-btn5">
                                        <a href="detail.php?id=<?php echo $v['id'];?>" class="btn-style-eight hvr-icon-wobble-horizontal">Detail</a>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
<?php }
}else{
	echo 'There is no suitable data!';
	
}
			?>

                    </div>

                    <br>
                    <ul class="page_pagination style-2 center">
                        
						<li><?php echo $page?>/<?php echo $page_num?></li>
						<li><a href="list.php?c_id=<?php echo $c_id;?>&page=1">首页</a></li>
						<li><a href="list.php?c_id=<?php echo $c_id;?>&page=<?php echo $prepage?>">上一页</a></li>
						<li><a href="list.php?c_id=<?php echo $c_id;?>&page=<?php echo $nextpage?>">下一页</a></li>
						<li><a href="list.php?c_id=<?php echo $c_id;?>&page=<?php echo $page_num?>"> 尾页</a> </li>
                    </ul>

                </section>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                 <?php include './right.php';?>
            </div>
        </div>
    </div>
</div>
 <?php include './foot.php';?>