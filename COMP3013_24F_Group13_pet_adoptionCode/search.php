<?php include './header.php';?>
<?php include './nav.php';?>
<?php 
$key = $_POST['key'];
$where = '1=1';
if(!empty($key)){
    $where = " activities.title LIKE '%{$key}%'"; 
}

$sql = "SELECT activities.id, activities.thumbnail, activities.title, activities.comefrom, activities.description, activities.pubdate 
        FROM activities WHERE ".$where;

$total_num = mysqli_num_rows(mysqli_query($mysqli, $sql));

$sqlstr = $sql;
$result = mysqli_query($mysqli, $sqlstr);
?>

<div class="inner-banner has-base-color-overlay text-center" style="background: url(images/background/1.jpg);">
    <div class="container">
        <div class="box">
            <h3>Your search results (<?php echo $total_num;?>) records</h3>
        </div><!-- /.box -->
    </div><!-- /.container -->
</div>

<div class="sidebar-page-container">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <section class="news-section padd-2">
                    <div class="row">
<?php 
if($total_num > 0){
    while($v = mysqli_fetch_array($result)){
?>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="default-blog-news wow fadeInUp animated">
                                <figure class="img-box">
                                    <img src="<?php echo $v['thumbnail'];?>" alt="News">
                                </figure>
                                <div class="lower-content">
                                    <div class="post-meta">By <?php echo $v['comefrom'];?>  |  <?php echo $v['pubdate'];?></div>
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
<?php 
    }
} else {
    echo 'There is no suitable data!';
}
?>
                    </div>
                </section>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <?php include './right.php';?>
            </div>
        </div>
    </div>
</div>

<?php include './foot.php';?>