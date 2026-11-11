<?php  require 'top.php'; ?>
<!--------Content Start----->
 <div class="inner-banner has-base-color-overlay text-center" style="background: url(../images/<?php echo $bimg[0];?>);">
        <div class="container">
            <div class="box">
                <h3>Detail</h3>
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
                        Detail
                    </li>
                </ul><!-- /.list-line -->
            </div><!-- /.pull-left -->
          
        </div><!-- /.container -->
    </div>
<?php 
require_once ('../inc/conn.php');
$id = "";
if(isset($_GET["id"])){
	$id = $_GET["id"];
}
		
$sql = "SELECT * from animals_table where id = ".$id ;

$result=mysqli_query($mysqli,$sql);    
$row=mysqli_fetch_array($result);
?>

<style>
.attr p,.attr p span{
	font-size: 16px;
	line-height: 40px;
}
a.cart{float:left;
	height: 47px;
	line-height: 47px;
	width: 168px;
	display: block;
	margin: 5px;
	border-radius: 15px;
	background-color: #ff0000;
	text-align: center;
	color: white;
	font-size: 22px;
	font-weight: bold;
	font-family: "黑体";
}
a.pay{
	float:left;
	height: 47px;
	line-height: 47px;
	width: 168px;
	display: block;
	margin: 5px;
	border-radius: 15px;
	background-color: #F6AB11;
	text-align: center;
	color: white;
	font-size: 22px;
	font-weight: bold;
	font-family: "黑体";
}
.description{
	border-top: 1px solid #e5e6e6;
	margin-top: 40px;
}
.description h2{
	font-size: 16px;
	height: 50px;
	line-height: 50px;
	font-weight: bold;
}
.description p{
	font-size: 16px;
	text-indent: 2em;
	line-height: 1.7em;
}
 </style>
     <section class="about-section padd-1">
        <div class="container">
        
            <div class="row clearfix">
                <!--Image Column-->
                <div class="image-column col-md-5 col-sm-12 col-xs-12">
                    <figure class="image"><img src="<?php echo $row['images'];?>" width="205" style="right:220px;top:10px;position:absolute " /></figure>
                </div>
                <!--Content Column-->
                <div class="about-content col-md-7 col-sm-12 col-xs-12">
                    <div class="sec-title style-2">
                        <h2><?php echo $row['animals_name'];?> </h2>
                    </div>

                    <div class="headding">
                        <div class="text">
                        
					<p>Premium：￥<span><?php echo $row["price"]; ?></span></p>
                        </div>
                    </div><br>  
					<div class="headding">
                       <p class="right_p">
						 <?php
						if(isset($_SESSION["user"]['id'])){?>
						<a href="./sporder_adds.php?id=<?php echo $row["id"] ?>" class="cart">Adopt now</a>
						
						 <?php }else{?>
							<a href="#" onclick="alert('Please log in before adopting');" class="pay">Adopt now</a>
						<?php }?>
				</p>
                    </div>

                    <div class="text row clearfix" style="margin:10px;width:100%;float:left;">
                     <div class="sec-title style-2">
                        <h2>Pet details</h2>
                    </div>
					
				<?php echo $row['info'];?>
			
                    </div>
                </div>   
            </div>

            
            
        </div>
    </section>
</body>
</html>
