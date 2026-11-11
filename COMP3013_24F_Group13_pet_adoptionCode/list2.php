<?php include './header.php';?>
<?php include './nav.php';?>
<?php $c_id=$_GET['c_id'];

?>
<div class="inner-banner has-base-color-overlay text-center" style="background: url(images/<?php echo $bimg[0];?>);background-size:100%;">
    <div class="container">
        <div class="box">
            <h3>Activity</h3>
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
                   Activity
                </li>
            </ul><!-- /.list-line -->
        </div><!-- /.pull-left -->
      
    </div><!-- /.container -->
</div>


<div class="sidebar-page-container">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <section class="blog-section padd-2">
				
<?php 
$sql = "select activities.* from activities 
	
	WHERE 1=1";
//Find the total number of records
$total_num=mysqli_num_rows(mysqli_query($mysqli,$sql));
//Set the number of records to be displayed on each page
$pagesize=4;
//Calculate the total number of pages
$page_num=ceil($total_num/$pagesize);
//Set the number of pages
$page=$_GET['page'];
if($page<1||$page==""){
	$page=1;
}
if($page>$page_num){
	$page=$page_num;
}
//Set the offset
$offset=$pagesize*($page-1);
// Find the previous and next pages
$prepage=($page<>1)?$page-1:$page;
$nextpage=($page<>$page_num)?$page+1:$page;
//The specified number of records is read
$sqlstr=$sql."  order by id desc limit $offset,$pagesize";
$result=mysqli_query($mysqli,$sqlstr);
		

if($total_num>0){
      while($v=mysqli_fetch_array($result)){
        ?>
                    <div class="large-blog-news wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">
                        <div class="img-box">
                            <a href="detail.php?id=<?php echo $v['id'];?>"><img src="<?php echo $v['thumbnail'];?>" alt="News"></a>
                        </div>
                        <div class="lower-content">
                            <div class="post-meta">By <?php echo $v['comefrom'];?>  /  <?php echo $v['pubdate'];?></div>
                            <h4><a href="detail.php?id=<?php echo $v['id'];?>"><?php echo $v['title'];?></a></h4>
                            
                            <div class="text">
                                <?php echo $v['description'];?>                          
                            </div>
                            <div class="link-btn">
                                <a href="detail.php?id=<?php echo $v['id'];?>" class="btn-style-eight hvr-icon-wobble-horizontal">Detail</a>
                            </div>
                        </div>
                    </div>
					<?php }
}else{
	echo 'There is no suitable data!';
	
}
			?>
                  
                    

                    <ul class="page_pagination center">
                        <li><?php echo $page?>/<?php echo $page_num?></li>
						<li><a href="list2.php?c_id=<?php echo $c_id;?>&?page=1">Home</a></li>
						<li><a href="list2.php?c_id=<?php echo $c_id;?>&?page=<?php echo $prepage?>">Previous</a></li>
						<li><a href="list2.php?c_id=<?php echo $c_id;?>&?page=<?php echo $nextpage?>">Next</a></li>
						<li><a href="list2.php?c_id=<?php echo $c_id;?>&?page=<?php echo $page_num?>"> Trailer page</a> </li>
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