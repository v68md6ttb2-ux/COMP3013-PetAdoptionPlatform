<?php
	require_once ('filter.php');
	
	

	$page = 1;
	if(isset($_GET["page"])){
		$page = $_GET["page"];
	}
	$animals_num = 4;
	if(isset($_GET["animals_num"])){
		$animals_num = $_GET["animals_num"];
	}
	$pagenum = 0;
	$str = "SELECT count(*) as pagenum from animals_type ";
	$result=mysqli_query($mysqli,$str);
	if($row=mysqli_fetch_array($result)){}
	$pagenum = (int)($row["pagenum"]/$animals_num);
	if(($row["pagenum"]/$animals_num)>$pagenum){
	
		$pagenum+=1;
	}
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="renderer" content="webkit">
<title></title>
<link rel="stylesheet" href="css/pintuer.css">
<link rel="stylesheet" href="css/admin.css">
<script src="js/jquery.js"></script>
<script src="js/pintuer.js"></script>

<style>
  .button01{ align-items: flex-start;
    text-align: center;
    cursor: default;
    color: buttontext;
    background-color: buttonface;
    box-sizing: border-box;
    padding: 2px 6px 3px;
    border-width: 2px;
    border-style: outset;
    border-color: buttonface;
    border-image: initial;
	border:1px solid #666;
	margin:2px;text-rendering: auto;
    color: initial;
    letter-spacing: normal;
    word-spacing: normal;
    text-transform: none;
    text-indent: 0px;
    text-shadow: none;
    display: inline-block;
    text-align: start;
    margin: 0em;
    font: 400 13.3333px Arial;
  }
</style>
</head>
<body>
<div class="panel admin-panel">
  <div class="panel-head"><strong class="icon-reorder"> List</strong></div>
  <div class="padding border-bottom">
  </div>
  <table class="table table-hover text-center">
    <tr>
      <th >Type name</th>
      <th width="20%">Operation</th>
    </tr>
    <?php
				
				$str = "SELECT * from animals_type limit ".(($page-1)*$animals_num)." ,".$animals_num;
				$result=mysqli_query($mysqli,$str);   
				while($row=mysqli_fetch_array($result)){
			?>
	<tr>
      <td><?php echo $row["type_name"]; ?></td>
      <td>
      	<div class="button-group"> 
      		<a class="button01" href="type_update.php?id=<?php  echo $row["id"];  ?>  ">
			    Revise
      		</a> 
      		<a class="button01" href="javascript:void(0)" onclick="return del(<?php  echo $row["id"];  ?>)">
      			Delete
      		</a>
      	</div>
      </td>
    </tr>
			<?php } ?>
    
  </table>
  <div style="width:100%; height:50px; text-align:center; border-top:1px solid #ccc ; line-height:50px;">
	<a href="type_list.php?page=<?php 
		if($page>1){
			echo ($page-1);
		}else{
			echo 1;
		}
	?>">Previous</a>
	<a href="type_list.php?page=<?php 
		if($page<$pagenum){
			echo ($page+1);
		}else{
			echo $pagenum;
		}
	?>">Next</a>     Current Page:<?php echo $page; ?>  General page:<?php echo $pagenum; ?>
</div>
</div>
<script type="text/javascript">
function del(id){
	if(confirm("Need to be deleted?")){			
		window.location.href='type_delete.php?id='+id;
	}else{

	}
}
</script>

</body>
</html>