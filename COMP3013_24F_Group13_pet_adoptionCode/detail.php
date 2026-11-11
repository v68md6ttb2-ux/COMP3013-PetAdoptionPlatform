<?php include './header.php';?>
<?php include './nav.php'; 

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id']; 
    $sql = "SELECT activities.* FROM activities WHERE activities.id = '$id'";
    $result = mysqli_query($mysqli, $sql);
    
    if ($result && mysqli_num_rows($result) > 0) {
        while ($v = mysqli_fetch_array($result)){
?>

<div class="inner-banner has-base-color-overlay text-center" style="background: url(images/<?php echo $v['thumbnail'];?>);">
    <div class="container">
        <div class="box">
            <h3> <?php echo $v['title'];?></h3>
        </div><!-- /.box -->
    </div><!-- /.container -->
</div>

<div class="breadcumb-wrapper">
    <div class="container">
        <div class="pull-left">
            <ul class="list-inline link-list">
                <li><a href="index.php">Home</a></li>
                <li><?php echo $v['title'];?></li>
            </ul><!-- /.list-line -->
        </div><!-- /.pull-left -->
    </div><!-- /.container -->
</div>

<section class="about-section padd-1">
    <div class="container">
        <div class="row clearfix">
            <!--Image Column-->
            <div class="image-column col-md-5 col-sm-12 col-xs-12">
                <figure class="image"><img src="<?php echo $v['thumbnail'];?>" alt=""></figure>
            </div>
            <!--Content Column-->
            <div class="about-content col-md-7 col-sm-12 col-xs-12">
                <div class="sec-title style-2">
                    <h2><?php echo $v['title'];?></h2>
                </div>

                <div class="headding">
                    <div class="text">
                        Time: <?php echo $v['pubdate'];?> | Source: <?php echo $v['comefrom'];?>
                    </div>
                </div><br>  

                <div class="headding">
                    <div class="text">
                        <?php echo $v['keywords'];?><br>
                        <?php echo $v['description'];?>
                    </div>
                </div><br>

                <div class="text">
                    <?php echo $v['content'];?>
                </div>
            </div>   
        </div>
    </div>
</section>

<?php
        }
    } else {
        echo "Activity not found!";
    }
} else {
    echo "No activity ID provided!";
}
?>

<?php include './foot.php';?>