
<?php 
require_once"session.php";  // Include session file
require_once"../inc/conn.php";  // Include database connection file
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Single Page Management</title>  <!-- Single Page Management -->
<link href="css/table.css" rel="stylesheet" type="text/css" />
</head>

<body>
  <table width="100%" border="1" cellspacing="0" cellpadding="0">
    <tr>
      <td class="tt" colspan="5">Single Page Management</td> <!-- Table header: Single Page Management -->
    </tr>
    <tr>
      <td width="6%" height="35">Page ID</td>  <!-- Column for Single Page ID -->
      <td width="19%">Title</td> <!-- Column for Title -->
      <td width="29%">Publish Date</td> <!-- Column for Publish Date -->
      <td colspan="2">Actions</td> <!-- Column for Operations -->
    </tr>
    
    <?php
    // Calculate the total number of records
    $total_num = mysqli_num_rows(mysqli_query($mysqli, "select * from single"));
    
    // Define how many records per page
    $pagesize = 3;
    
    // Calculate total number of pages
    $page_num = ceil($total_num / $pagesize);
    
    // Get the current page number from the URL, default to page 1 if not set
    $page = $_GET['page'];
    if ($page < 1 || $page == "") {
        $page = 1;
    }
    if ($page > $page_num) {
        $page = $page_num;
    }
    
    // Calculate the offset for the SQL query
    $offset = $pagesize * ($page - 1);
    
    // Calculate the previous and next page numbers
    $prepage = ($page != 1) ? $page - 1 : $page;
    $nextpage = ($page != $page_num) ? $page + 1 : $page;
    
    // Fetch records for the current page
    $sqlstr = "select * from single order by id desc limit $offset, $pagesize";
    $result = mysqli_query($mysqli, $sqlstr);
    while ($row = mysqli_fetch_array($result)) {
    ?>
    
    <tr>
      <td height="31"><?php echo $row['id']?></td> <!-- Display ID -->
      <td><?php echo $row['title']?></td> <!-- Display Title -->
      <td><?php echo $row['pubdate']?></td> <!-- Display Publish Date -->
      <td width="12%"><input type="button" name="button" id="button" value="Edit" onclick="window.location.href='single_modify.php?id=<?php echo $row['id']?>'" /></td> <!-- Edit Button -->
      <td width="11%"><input type="button" name="button2" id="button2" value="Delete" onclick="window.location.href='single_delete.php?id=<?php echo $row['id']?>'" /></td> <!-- Delete Button -->
    </tr>
<?php
}
?>
    <tr>
      <td height="43" colspan="5" align="center"><?php echo $page?>/<?php echo $page_num?>&nbsp;&nbsp;
      <a href="?page=1">First Page</a>&nbsp;&nbsp;	<a href="?page=<?php echo $prepage?>">Previous Page</a>&nbsp;&nbsp;
      <a href="?page=<?php echo $nextpage?>">Next Page</a>&nbsp;&nbsp;<a href="?page=<?php echo $page_num?>"> Last Page</a> </td>
    </tr>
  </table>
</body>
</html>
