<!-- Pagination Handling -->
<?php 
 require_once 'session.php';
 require_once '../inc/conn.php';
 				// Get the total number of records
 				$total_num=mysqli_num_rows(mysqli_query($mysqli,"select * from slide"));
 				// Set the number of records per page
 				$pagesize=5;
 				// Calculate the total number of pages
 				$page_num=ceil($total_num/$pagesize);
 				// Set the current page
 				$page=$_GET['page'];
 				if($page<1||$page==""){
 					$page=1;
 				}
 				if($page>$page_num){
 					$page=$page_num;
 				}
 				// Set the offset for pagination
 				$offset=$pagesize*($page-1);
 				// Calculate the previous and next pages
 				$prepage=($page<>1)?$page-1:$page;
 				$nextpage=($page<>$page_num)?$page+1:$page;
 				// Retrieve the records for the current page
 				$sqlstr="select * from slide order by id desc limit $offset,$pagesize";
 				$result=mysqli_query($mysqli,$sqlstr);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="css/table.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
function AutoResizeImage(maxWidth,maxHeight,objImg){
var img = new Image();
img.src = objImg.src;
var hRatio;
var wRatio;
var Ratio = 1;
var w = img.width;
var h = img.height;
wRatio = maxWidth / w;
hRatio = maxHeight / h;
if (maxWidth ==0 && maxHeight==0){
Ratio = 1;
}else if (maxWidth==0){//
if (hRatio<1) Ratio = hRatio;
}else if (maxHeight==0){
if (wRatio<1) Ratio = wRatio;
}else if (wRatio<1 || hRatio<1){
Ratio = (wRatio<=hRatio?wRatio:hRatio);
}
if (Ratio<1){
w = w * Ratio;
h = h * Ratio;
}
objImg.height = h;
objImg.width = w;
}
</script>
</head>
<body>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
    <tr>
      <td height="41" colspan="5" class="tt">Focus Slide List</td>
    </tr>
     <tr>
   	   <td height="35">Title</td><td>Link</td><td width="26%">Thumbnail</td><td>Order</td><td width="15%">Actions</td>
  </tr>
    <tr>
	<?php
	if($total_num>0){
	      while($row=mysqli_fetch_array($result)){
	        ?>
      <td width="38%" height="70"><?php echo $row['title']?></td>
      <td width="13%"><a target="new" href=""><?php if($row['link']==''){ echo 'None';}else{?><a target="new" href="<?php echo $row['link']?>">View</a><?php }?></td>
      <td><img src="<?php echo $row['thumbnail']?>" width="0" height="0" onload="AutoResizeImage(0,60,this)"></td>
      <td width="8%"><?php echo $row['orderid']?></td>
      <td><input type="submit" name="button" id="button" value="Modify" onclick="window.location.href='slide_modify.php?id=<?php echo $row['id']?>'" />&nbsp;&nbsp;
      <input type="button" name="button2" id="button2" value="Delete" onclick="window.location.href='slide_delete.php?id=<?php echo $row['id']?>'" /></td>
      </tr>
    <?php
       }
   }else {
       ?>
    <tr><td height="41" colspan="5">No records found!</td></tr>
  <?php
  }
  ?>
    <tr>
      <td height="43" colspan="5" align="center"><?php echo $page?>/<?php echo $page_num?>&nbsp;&nbsp;<a href="?page=1">First Page</a>&nbsp;&nbsp;	<a href="?page=<?php echo $prepage?>">Previous</a>&nbsp;&nbsp;<a href="?page=<?php echo $nextpage?>">Next</a>&nbsp;&nbsp;<a href="?page=<?php echo $page_num?>"> Last Page</a> </td>
    </tr>
  </table>
</body>
</html>
<!-- Close connection -->
<?php 
mysqli_close($mysqli);
?>
