
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Administrator list</title>
<link href="css/table.css" rel="stylesheet" type="text/css" />

<?php
	require_once"session.php";
	require_once"../inc/conn.php";
?>
</head>
<body>
<form name="form_add" id="form_add" action="admin_add_pass.php" method="post" >
  <table width="100%" border="1" cellspacing="0" cellpadding="0">
    <tr>
      <td class="tt" colspan="2">Administrator list</td>
    </tr>
    <tr>
      <td height="35">Account</td>
      <td width="25%">Operation</td>
    </tr>
      <!--Paging preparation-->
	  <?php
		//Find the total number of records
		$total_num=mysqli_num_rows(mysqli_query($mysqli,"select id from admin"));
		//Set the number of records to be displayed per page
		$pagesize=3;
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
		$sqlstr="select * from admin order by id desc limit $offset,$pagesize";
		$result=mysqli_query($mysqli,$sqlstr);
		while($row=mysqli_fetch_array($result)){
	  ?>
        <tr>
          <td height="35"><?php echo $row['admin_name']?></td>
          <td><input type="button" name="button" id="button" value="Modify" onclick="window.location.href='admin_modify.php?id=<?php echo $row['id']?>'" />&nbsp;&nbsp;
          <input type="button" name="button2" id="button2" value="Delete" onclick="window.location.href='admin_delete.php?id=<?php echo $row['id']?>'" <?php if($row['admin_name']=='admin'){echo "disabled='disabled'";}?> /></td>
        </tr>
		<?php
			}
		?>
    <tr>
      <td height="35" colspan="2" align="center"> <?php echo $page?>/<?php echo $page_num?>&nbsp;&nbsp;
	  <a href="?page=1">Home</a>&nbsp;&nbsp;	<a href="?page=<?php echo $prepage?>">Last page</a>&nbsp;&nbsp;
	  <a href="?page=<?php echo $nextpage?>">Next page</a>&nbsp;&nbsp;<a href="?page=<?php echo $page_num?>"> Trailer page</a> </td>
    </tr>
  </table>
</form>
</body>
</html>