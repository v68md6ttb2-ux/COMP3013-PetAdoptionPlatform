<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>User List</title>
<link href="css/table.css" rel="stylesheet" type="text/css" />
<!-- Start session, include connection file -->
<?php
    require_once "session.php";
    require_once "../inc/conn.php";
?>
</head>
<body>
<form name="form_add" id="form_add" action="users_add_pass.php" method="post" >
  <table width="100%" border="1" cellspacing="0" cellpadding="0">
    <tr>
      <td class="tt" colspan="3">User List</td>
    </tr>
    <tr>
      <td height="35">Username</td>
      <td height="35">Email</td>
      <td width="25%">Actions</td>
    </tr>
      <!-- Pagination setup -->
      <?php
        // Get the total number of records
        $total_num = mysqli_num_rows(mysqli_query($mysqli, "select id from users "));
        // Set the number of records per page
        $pagesize = 10;
        // Calculate the total number of pages
        $page_num = ceil($total_num / $pagesize);
        // Set the current page
        $page = $_GET['page'];
        if ($page < 1 || $page == "") {
            $page = 1;
        }
        if ($page > $page_num) {
            $page = $page_num;
        }
        // Set the offset for the query
        $offset = $pagesize * ($page - 1);
        // Get the previous and next page numbers
        $prepage = ($page != 1) ? $page - 1 : $page;
        $nextpage = ($page != $page_num) ? $page + 1 : $page;
        // Read the specified number of records
        $sqlstr = "select * from users order by id desc limit $offset, $pagesize";
        $result = mysqli_query($mysqli, $sqlstr);
        while ($row = mysqli_fetch_array($result)) {
      ?>
        <tr>
          <td height="35"><?php echo $row['name'] ?></td>
          <td height="35"><?php echo $row['email'] ?></td>
          <td><input type="button" name="button" id="button" value="Edit" onclick="window.location.href='users_modify.php?id=<?php echo $row['id'] ?>'" />&nbsp;&nbsp;
          <input type="button" name="button2" id="button2" value="Delete" onclick="window.location.href='users_delete.php?id=<?php echo $row['id'] ?>'" <?php if ($row['name'] == 'users') { echo "disabled='disabled'"; } ?> /></td>
        </tr>
        <?php
            }
        ?>
    <tr>
      <td height="35" colspan="3" align="center"> <?php echo $page ?> / <?php echo $page_num ?>&nbsp;&nbsp;
      <a href="?page=1">First</a>&nbsp;&nbsp; <a href="?page=<?php echo $prepage ?>">Previous</a>&nbsp;&nbsp;
      <a href="?page=<?php echo $nextpage ?>">Next</a>&nbsp;&nbsp;<a href="?page=<?php echo $page_num ?>"> Last</a> </td>
    </tr>
  </table>
</form>
</body>
</html>
