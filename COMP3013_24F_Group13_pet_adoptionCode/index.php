<?php include './header.php';?>
<?php include './nav.php';

?>
 <section class="our-news padd-1">
 
	<div style="padding: 0;width:100%" class="container"  >
			<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
					<li data-target="#carousel-example-generic" data-slide-to="1"></li>
					<li data-target="#carousel-example-generic" data-slide-to="2"></li>
				</ol>

				<div class="carousel-inner" role="listbox">
<?php 
$sql_slide="select * from slide order by id asc limit 1";
$result_slid=mysqli_query($mysqli,$sql_slide);
while($row_slide=mysqli_fetch_array($result_slid)){	
	?><div class="item active">
		<img src="<?php echo $row_slide['thumbnail']?>" alt="">
	</div>
	<?php 
}
?>	<?php 
	$sql="select * from slide order by id asc limit 1,2";
	$result=mysqli_query($mysqli,$sql);
	while($row=mysqli_fetch_array($result)){	
	?>
					<div class="item">
						<img src="<?php echo $row_slide['thumbnail']?>" alt="">
					</div><?php 
	}
	?>
				</div>
			</div>
		</div>
 </section>
    <section class="our-news padd-2">
        <div class="container" style="width:80%">

        

            <div class="row">
			 <div class="col-md-4 col-sm-6">
                    <div class="default-blog-style-two">
                        <div class="img-box">
                            <img src="./images/11.jpg" alt="Adoption"/>
                            <div class="overlay">
                                <div class="dt">
                                    <div class="dtc">
                                        <div class="date-box">
                                            <span>Adoption</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bottom-box">
                            <h3><a href="./shop/list.php">Adoption</a></h3>
                           
                            <div class="text">Adopt your little pet</div>
                        </div>
                    </div>
                </div> 
			 <div class="col-md-4 col-sm-6">
                    <div class="default-blog-style-two">
                        <div class="img-box">
                            <img src="./images/22.jpg" alt="Foster care"/>
                            <div class="overlay">
                                <div class="dt">
                                    <div class="dtc">
                                        <div class="date-box">
                                            <span>Foster care</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bottom-box">
                            <h3><a href="./fosters_add.php">Foster care</a></h3>
                           
                            <div class="text">Foster care your little pet</div>
                        </div>
                    </div>
                </div> 
			 <div class="col-md-4 col-sm-6">
                    <div class="default-blog-style-two">
                        <div class="img-box">
                            <img src="./images/33.jpg" alt="Donation"/>
                            <div class="overlay">
                                <div class="dt">
                                    <div class="dtc">
                                        <div class="date-box">
                                            <span>Donation</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bottom-box">
                            <h3><a href="donation_add.php">Donation</a></h3>
                           
                            <div class="text">Donate for pet</div>
                        </div>
                    </div>
                </div> 
              
              
            </div>
        </div>
    </section>

    <!--Gallery Section-->
    <section class="gallery-section fullwidth-gallery padd-2">
	 <div class="container" style="width:80%">
	 
	 <div class="auto-container">

            <div class="sec-title center">
                <h2> Hot <span>Activity</span></h2>
                <div class="separator small-separator"></div>
            </div>

           
        </div>
	
				<?php 

$list2=array();
$sql = "select * from activities order by id desc limit 6";
$total_num=mysqli_num_rows(mysqli_query($mysqli,$sql));
$result=mysqli_query($mysqli,$sql);
?><?php 
if($total_num>0){
	$i=0;
	  while($row=mysqli_fetch_array($result)){
		
		  ?><div class="col-md-4 col-sm-4">
                    <div class="default-blog-list">
                        <div class="img-box">
                            <img src="<?php echo $row['thumbnail']?>"/>
                            <div class="overlay">
                                <div class="dt">
                                    <div class="dtc">
                                        <div class="date-box">
                                            <span><?php echo $row['keywords']?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-box">
                            <h3><a href="detail.php?id=<?php echo $row['id'];?>"><?php echo $row['title'];?></a></h3>
                            <div class="text"><?php echo $row['description'];?></div>
                        </div>
                    </div> </div>
<?php $i++; }
}
			?>
                   
                   
               
                </div>
    </section>

    <!--Gallery Section-->
    <section class="gallery-section fullwidth-gallery padd-2">
        <div class="auto-container">

            <div class="sec-title center">
                <h2> Pet <span>Recommendation</span></h2>
                <div class="separator small-separator"></div>
            </div>

           
        </div>

        <div class="items-container filter-list clearfix" >
           <?php 
$sql_slide="select * from animals_table order by id desc";
$result_slid=mysqli_query($mysqli,$sql_slide);
while($v=mysqli_fetch_array($result_slid)){	
			?> 
            <!--Default Portfolio Item-->
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12  mix_all default-portfolio-item all luxury bath double" >
                <div class="inner-box">
                    <figure class="image-box"><img src="<?php echo $v['images'];?>" alt=""></figure>
                    <!--Overlay Box-->
                    <div class="overlay-box">
                        <div class="overlay-inner">
                            <div class="content">
                                <h3><a href="shop/detail.php?id=<?php echo $v['id'];?>"><?php echo $v['title'];?></a></h3>
                            </div>
                        </div>
                    </div>
                    <!--Gallery Popup Button-->
                    <a href="<?php echo $v['images'];?>" data-fancybox-group="example-gallery" class="image-link lightbox-image"><span class="icon fa fa-compress"></span></a>
                </div>
            </div>
            <?php }
			?>  
                
        </div>
    </section>



    <!--Main Footer-->
  <?php include './foot.php';?> 