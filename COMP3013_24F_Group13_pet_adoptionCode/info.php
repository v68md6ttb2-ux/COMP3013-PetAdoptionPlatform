<?php include './header.php';?>
<?php include './nav.php';
$sql = "select single.* from single 

	WHERE single.id='{$_GET['c_id']}'";

	$result=mysqli_query($mysqli,$sql);
	while($v=mysqli_fetch_array($result)){
	
?>

    <div class="inner-banner has-base-color-overlay text-center" style="background: url(images/<?php echo $bimg[0];?>);">
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
                    <li>
                        <a href="index.php">Login</a>
                    </li><!-- comment for inline hack
                    --><li>
                       <?php echo $v['title'];?>
                    </li>
                </ul><!-- /.list-line -->
            </div><!-- /.pull-left -->
          
        </div><!-- /.container -->
    </div>


     <section class="about-section padd-1">
        <div class="container">
        
            <div class="row clearfix">
              
                <!--Content Column-->
                <div class="about-content col-md-12 col-sm-12 col-xs-12">
                    <div class="sec-title style-2">
                        <h2><?php echo $v['title'];?></h2>
                    </div>

                    <div class="headding">
                        <div class="text">
                          Time: <?php echo $v['pubdate'];?> | Source:<?php echo $v['comefrom'];?>
                           
                        </div>
                    </div><br>  
					<div class="headding">
                        <div class="text">
                        
                        <?php echo $v['keywords'];?>
						<br>
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
 <?php }?>
    <!--End subscribe Box-->
 <?php include './foot.php';?>