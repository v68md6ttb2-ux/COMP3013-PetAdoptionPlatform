<?php  require 'top.php'; ?>
<!--------Content Start----->
 <div class="inner-banner has-base-color-overlay text-center" style="background: url(../images/<?php echo $bimg[0];?>);">
        <div class="container">
            <div class="box">
                <h3>Pet</h3>
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
                        Pet
                    </li>
                </ul><!-- /.list-line -->
            </div><!-- /.pull-left -->
          
        </div><!-- /.container -->
    </div>
<div class="content container row"> 
  <!--------Left Start----->
<?php  
//require '../left.php'; 
require_once ('../inc/conn.php');
?>
<link rel="stylesheet" href="css/index.css"/>

  <!--------Left End-----> 
  <!--------right Start----->
  <div class=" clearfix row" style="margin:0 auto;width:90%">
   <div class="right-top row" ><span class="l">Pet adoption </span><span class="r-dqwz"><a href="./index.php">Home</a> > Pet adoption</span></div>
  
    <div class="row clearfix">
	<ul class="select">
			<li class="select-list">
				<dl id="select1">
					<dt>Classify:</dt>
					<?php 
					$animals_type_id = 0;
					if(isset($_GET['animals_type_id'])){
						$animals_type_id = $_GET['animals_type_id'];
					}
					?>
					<dd class="<?php if($animals_type_id==0){echo 'select-all selected';}?>"><a href="list.php">All</a></dd>
				<?php
				$str = "SELECT * from animals_type ";
				$result_animals_type=mysqli_query($mysqli,$str);  
			
				while($row=mysqli_fetch_array($result_animals_type)){	
					$selec_class = '';
					if($animals_type_id == $row["id"]){
						$selec_class = 'select-all selected';
					}
					?>
					<dd class="<?php echo $selec_class;?>"><a href="list.php?animals_type_id=<?php echo $row["id"]; ?>">
					<?php echo $row["type_name"]; ?></a></dd>
				<?php $color_add_num ++ ;}?>	
				</dl>
			</li>
		</ul>
      <div class="jd-nr clearfix" style="width:1080px">
        <ul>
		
		<?php
				
				//id
	$animals_type_id = "";
	if(isset($_GET["animals_type_id"])){
		$animals_type_id = $_GET["animals_type_id"];
	}
	
	
	//Search
	$seach_value = "";
	if(isset($_GET["seach_value"])){
		$seach_value = $_GET["seach_value"];
	}
	if(isset($_POST["seach_value"])){
		$seach_value = $_POST["seach_value"];
	}
	
	
	
	$page = 1;
	if(isset($_GET["page"])){
		$page = $_GET["page"];
	}
	$animals_num = 20;
	if(isset($_GET["animals_num"])){
		$animals_num = $_GET["animals_num"];
	}
	$pagenum = 0;
	$str = "SELECT count(*) as pagenum from animals_table ";
	
	if($animals_type_id!=""){
		$str = "SELECT count(*) as pagenum from animals_table   where animals_type_id = ".$animals_type_id;
	}
	if($seach_value!=""){
		$str = "SELECT count(*) as pagenum from animals_table   where animals_name like '%".$seach_value."%' ";
	}
	$result=mysqli_query($mysqli,$str);
	if($row=mysqli_fetch_array($result)){}
		$pagenum = (int)($row["pagenum"]/$animals_num);
		if(($row["pagenum"]/$animals_num)>$pagenum){
			$pagenum+=1;
		}
	
				
				$str = "SELECT * from animals_table limit ".(($page-1)*$animals_num)." ,".$animals_num;
				if($animals_type_id!=""){
					$str = "SELECT * from animals_table where animals_type_id = ".$animals_type_id." limit ".(($page-1)*$animals_num)." ,".$animals_num;
				}
				
				if($seach_value!=""){
					$str = "SELECT * from animals_table where animals_name like '%".$seach_value."%'  limit ".(($page-1)*$animals_num)." ,".$animals_num;
				}
				$result=mysqli_query($mysqli,$str);
				while($row=mysqli_fetch_array($result)){	
			
					$animals_pd_num++;?>
		<li style="margin-right:3px;">
            <div class="jd-pic" style="height:205px;">
              <h3><a href="detail.php?id=<?php echo $row['id'];?>">
			  <img src="<?php echo $row["images"] ?>" alt="#"  width="220" height="180" /></a>
<span class="bm-pic-zi"><a href="detail.php?id=<?php echo $row['id'];?>"><?php echo mb_substr(strip_tags($row['animals_name']), 0, 20, 'utf-8');?></a></span></h3>
            </div>
            <div class="jd-price" style="color:#ff0000;height:30px;">premium:￥<?php echo $row["price"]; ?>yuan</div>
          </li>
		<?php }?>
        </ul>
      </div>
	  <div class="page clearfix">
				<a href="list.php?page=<?php 
				if($page<$pagenum){
					echo ($page+1);
				}else{
					echo $pagenum;
				}
			?>&animals_type_id=<?php echo $animals_type_id; ?>&seach_value=<?php echo $seach_value; ?>" style="margin-left:20px;">Next</a>    
					<a href="list.php?page=<?php 
				if($page>1){
					echo ($page-1);
				}else{
					echo 1;
				}
			?>&animals_type_id=<?php echo $animals_type_id; ?>&seach_value=<?php echo $seach_value; ?>" style="margin-left:20px;">Previous</a>
			 <a href="#" style="margin-left:20px;">Current Page:<?php echo $page; ?>  Total Pages:<?php echo $pagenum; ?> </a>
			</div>
    </div>
  </div>
  <!--------right End-----> 
  
</div>
<!--------Content End-----> 

</div>
<?php  require './foot.php'; ?>
<!--------Foot End----->
</body>
</html>