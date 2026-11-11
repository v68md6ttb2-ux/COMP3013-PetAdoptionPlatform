<!-- Start session, include connection file -->
<?php
    require_once "session.php";
    require_once "../inc/conn.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
<!-- Execute delete operation -->
<?php
    $id = $_GET['id'];
    $sqlstr = "delete from users where id=" . $id;
    $result = mysqli_query($mysqli, $sqlstr);
    if ($result) {
        echo "<script>alert('Deleted successfully!');window.location.href='users_list.php'</script>"; // Return to the user list page
        exit;
    } else {
        echo "<script>alert('Delete failed!');window.location.href='users_list.php'</script>"; // Return to the user list page
        exit;
    }
    mysqli_free_result($result);
    mysqli_close($mysqli);
?>
</body>
</html>

