<div class="blog-sidebar padd-4">

                    <div class="sidebar_search sidebar-padd mar-1">
                        <form action="search.php" method="post">
                            <input type="text" name="key" placeholder="Enter a query keyword...">
                            <button class="tran3s color1_bg">Inquire</button>
                        </form>
                    </div>

<?php 
$sql = "select * from donation 
				left join users
				on users.id=donation.user_id limit 4";
$total_num=mysqli_num_rows(mysqli_query($mysqli,$sql));
$result=mysqli_query($mysqli,$sql);
?> 

                    <div class="popular_news sidebar-padd mar-1">
                        <div class="inner-title">
                            <h3>Latest donations</h3>
                        </div>

                        <div class="popular-post">
						
<?php 

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
	</div>
<?php
$i++;
    }
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

                   
                    <br><br>

                </div>