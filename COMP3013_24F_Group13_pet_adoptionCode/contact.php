<?php include './header.php';?>
<?php include './nav.php';?>
     
    <div class="inner-banner has-base-color-overlay text-center" style="background: url(images/<?php echo $bimg[0];?>);background-size:100%;">
        <div class="container">
            <div class="box">
                <h3>Donation</h3>
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
                        Donation
                    </li>
                </ul><!-- /.list-line -->
            </div><!-- /.pull-left -->
          
        </div><!-- /.container -->
    </div>



    <section class="contact_us padd-2">
        <div class="container">
            <div class="row">


                    <div class="popular_news sidebar-padd mar-1">
                        <div class="inner-title">
                            <h3>Donation list</h3>
                        </div>
                        <div class="popular-post">
<?php 


$sql = "select * from donation 
				left join users
				on users.id=donation.user_id";
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
$sql=$sql." order by donation.id  desc  limit $offset,$pagesize";
$result=mysqli_query($mysqli,$sql);

if($total_num>0){
	$i=0;
      while($row=mysqli_fetch_array($result)){
        ?>
	<div class="item">
		<div class="post-thumb"><a href="#">
		<img src="<?php echo $row['thumbnail']?>" alt=""></a></div>
		<h4><a href="#"><?php echo $row['title']?></a></h4>
		<div class="post-info"><?php echo $row['name']?>&nbsp;&nbsp; 
		<?php echo $row['pubdate']?></div>
		<div class="post-info"><?php echo $row['content']?>&nbsp;&nbsp; 
		<br><span style="color:#EF9812">Admin's reply:<?php echo $row['content2']?></span></div>
	</div>
<?php
$i++;
    }
	?>
	   <ul class="page_pagination style-2 center">
                        
						<li><?php echo $page?>/<?php echo $page_num?></li>
						<li><a href="contact.php?page=1">Home</a></li>
						<li><a href="contact.php?page=<?php echo $prepage?>">Previous</a></li>
						<li><a href="contact.php?page=<?php echo $nextpage?>">Next</a></li>
						<li><a href="contact.php?page=<?php echo $page_num?>"> Last</a> </li>
                    </ul>
	<?php 
} else {
    ?>
 <div class="item">
            There is no suitable data~!
 </div>
	<?php 
}
?>
                        </div>
                    </div>

              
                 
            </div>
        </div>
    </section>


 <?php include './foot.php';?>