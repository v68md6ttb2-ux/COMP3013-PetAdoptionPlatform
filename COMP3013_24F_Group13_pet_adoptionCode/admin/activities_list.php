
<?php 
 require_once 'session.php';
 require_once '../inc/conn.php';
 require_once '../inc/function.php';
 				//Find the total number of records
 				$total_num=mysqli_num_rows(mysqli_query($mysqli,"select * from activities"));
 				//Set the number of records to be displayed per page
 				$pagesize=10;
 				//Calculate total pages
 				$page_num=ceil($total_num/$pagesize);
 				//Set page count
 				$page=$_GET['page'];
 				if($page<1||$page==""){
 					$page=1;
 				}
 				if($page>$page_num){
 					$page=$page_num;
 				}
 				//Set offset
 				$offset=$pagesize*($page-1);
 				//Find previous page and next page
 				$prepage=($page<>1)?$page-1:$page;
 				$nextpage=($page<>$page_num)?$page+1:$page;
 				//Reads the specified number of records
 				$sqlstr="select * from activities order by id desc limit $offset,$pagesize";
 				$result=mysqli_query($mysqli,$sqlstr);
				?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled document</title>
<link href="css/table.css" rel="stylesheet" type="text/css" />
</head>

<body>
  <table width="100%" border="1" cellspacing="0" cellpadding="0">
    <tr>
      <td class="tt" colspan="7">Activity list</td>
    </tr>
    <tr>
      <td width="6%" height="35">ID</td>
      <td style="white-space:nowrap">Title</td>
      <td style="white-space:nowrap">Picture</td>
      <td style="white-space:nowrap">Data</td>
      <td style="white-space:nowrap" colspan="2">Operation</td>
    </tr>
<?php
  
if($total_num>0){
      while($row=mysqli_fetch_array($result)){
        ?>
    <tr>
      <td height="31"><?php echo $row['id']?></td>
      <td><?php echo $row['title']?></td>
      <td><img src="<?php echo $row['thumbnail']?>" width="80"/></td>
      <td><?php echo $row['pubdate']?></td>
      <td width="12%"><input type="submit" name="button" id="button" value="修改" onclick="window.location.href='activities_modify.php?id=<?php echo $row['id']?>'" /></td>
      <td width="11%"><input type="submit" name="button2" id="button2" value="删除" onclick="window.location.href='activities_delete.php?id=<?php echo $row['id']?>'" /></td>
    </tr>
<?php
    }
} else {
    ?>
 <tr>
      <td height="35" colspan="7">No record!</td>
    </tr>
<?php
}
mysqli_close($mysqli);
?>
    <tr>
      <td height="43" colspan="7" align="center"> <?php echo $page?>/<?php echo $page_num?>&nbsp;&nbsp;<a href="?page=1">Home</a>&nbsp;&nbsp;	<a href="?page=<?php echo $prepage?>">Last page</a>&nbsp;&nbsp;<a href="?page=<?php echo $nextpage?>">Next page</a>&nbsp;&nbsp;<a href="?page=<?php echo $page_num?>"> Trailer page</a> </td>
    </tr>
  </table>
</body>
</html>
