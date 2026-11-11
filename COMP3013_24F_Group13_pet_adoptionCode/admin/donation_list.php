<?php 
 require_once 'session.php';
 require_once '../inc/conn.php';
 require_once '../inc/function.php';
 				// Get the total number of records
				$sql = "select donation.*,users.name from donation 
				left join users
				on users.id=donation.user_id";
 				$total_num=mysqli_num_rows(mysqli_query($mysqli,$sql));
 				// Set the number of records per page
 				$pagesize=10;
 				// Calculate total number of pages
 				$page_num=ceil($total_num/$pagesize);
 				// Set the current page
 				$page=$_GET['page'];
 				if($page<1||$page==""){
 					$page=1;
 				}
 				if($page>$page_num){
 					$page=$page_num;
 				}
 				// Set the offset
 				$offset=$pagesize*($page-1);
 				// Determine the previous and next page
 				$prepage=($page<>1)?$page-1:$page;
 				$nextpage=($page<>$page_num)?$page+1:$page;
 				// Read the specified number of records
 				$sqlstr=$sql." order by donation.id desc limit $offset,$pagesize";
 				$result=mysqli_query($mysqli,$sqlstr);
				?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="css/table.css" rel="stylesheet" type="text/css" />
</head>

<body>
  <table width="100%" border="1" cellspacing="0" cellpadding="0">
    <tr>
      <td class="tt" colspan="7">Donation List</td>
    </tr>
    <tr>
      <td style="white-space:nowrap">Publish Date</td>
      <td width="6%" height="35">Publisher</td>
      <td style="white-space:nowrap">Title</td>
      <td style="white-space:nowrap">Image</td>
      <td style="white-space:nowrap" colspan="2">Actions</td>
    </tr>
<?php
 
if($total_num>0){
      while($row=mysqli_fetch_array($result)){
        ?>
    <tr>
      <td><?php echo $row['pubdate']?></td>
      <td height="31"><?php echo $row['name']?></td>
      <td><?php echo $row['title']?></td>
      <td><img src="<?php echo $row['thumbnail']?>" width="80"/></td>
      <td width="12%"><input type="submit" name="button" id="button" value="Edit" onclick="window.location.href='donation_modify.php?id=<?php echo $row['id']?>'" /></td>
      <td width="11%"><input type="submit" name="button2" id="button2" value="Delete" onclick="window.location.href='donation_delete.php?id=<?php echo $row['id']?>'" /></td>
    </tr>
<?php
    }
} else {
    ?>
 <tr>
      <td height="35" colspan="7">No records available!</td>
    </tr>
<?php
}
mysqli_close($mysqli);
?>
    <tr>
      <td height="43" colspan="7" align="center"> <?php echo $page?>/<?php echo $page_num?>&nbsp;&nbsp;<a href="?page=1">First</a>&nbsp;&nbsp;	<a href="?page=<?php echo $prepage?>">Previous</a>&nbsp;&nbsp;<a href="?page=<?php echo $nextpage?>">Next</a>&nbsp;&nbsp;<a href="?page=<?php echo $page_num?>">Last</a> </td>
    </tr>
  </table>
</body>
</html>
