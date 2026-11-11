<!--Paging processing-->
<?php 
require_once"session.php";
require_once"../inc/conn.php";
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
			$sqlstr="select * from activities limit $offset,$pagesize";
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
      <td class="tt" colspan="10">Donation list</td>
    </tr>
    <tr>
      <td width="13%" height="29"><strong>Title</strong></td>
      <td width="11%"><strong>Data</strong></td>
      <td width="11%"><strong>Donor</strong></td>
      <td width="8%"><strong>Phone</strong></td>
      <td width="8%"><strong>QQ</strong></td>
      <td width="8%"><strong>Email</strong></td>
      <td width="30%"><strong>Donation content</strong></td>
      <td width="15%"><strong>Reply</strong></td>
      <td width="15%"><strong>Whether to process</strong></td>
      <td width="12%"><strong>Operation</strong></td>
    </tr>
<?php 
  if($total_num>0){
	  while($row=mysqli_fetch_array($result)){
		  ?>
    <tr>
      <td><?php echo $row['title']?></td>
            <td><?php echo $row['pubdate']?></td>
            <td><?php echo $row['name']?></td>
            <td><?php echo $row['tel']?></td>
            <td><?php echo $row['qq']?></td>
            <td><?php echo $row['email']?></td>
            <td><?php echo $row['content']?></td>
            <td><?php echo $row['content2']?></td>
      <td><?php echo $row['deal']?>(<?php if ($row['deal']=='否'){?><a href="activities_deal.php?deal=yes&id=<?php echo $row['id']?>">Click Set to Processed”</a><?php }else {?><a href="activities_deal.php?deal=no&id=<?php echo $row['id']?>">Click Set to "Unprocessed"</a><?php }?>)
		  
	  </td>
      <td>
	  <input type="submit" name="button2" id="button2" value="Reply" onclick="window.location.href='activities_hf.php?id=<?php echo $row['id']?>'" />
	  <input type="submit" name="button2" id="button2" value="Delete" onclick="window.location.href='activities_delete.php?id=<?php echo $row['id']?>'" /></td>
    </tr>   
<?php
    }
} else {
    ?>
 <tr>
      <td height="35" colspan="10">No record!</td>
    </tr>
	<?php 
}
?>
    <tr>
      <td height="43" colspan="10" align="center"><?php echo $page ?>/<?php echo $page_num ?>&nbsp;&nbsp;<a href="?page=1">Home</a>&nbsp;&nbsp;	<a href="?page=<?php echo $prepage ?>">Last page</a>&nbsp;&nbsp;<a href="?page=<?php echo $nextpage ?>">Next page</a>&nbsp;&nbsp;<a href="?page=<?php echo $page_num ?>"> Trailer page</a> </td>
    </tr>
  </table>
</body>
</html>
<?php 
mysqli_close($mysqli);
?>
