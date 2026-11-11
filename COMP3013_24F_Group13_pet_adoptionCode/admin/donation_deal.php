
<?php
require_once 'session.php';
require_once '../inc/conn.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled document</title>
<link href="css/table.css" rel="stylesheet" type="text/css" />
</head>
<body>
<!--Processed and unprocessed operations-->
<?php
if($_GET['deal']=="yes"){
    mysqli_query($mysqli,"update activities set deal='是' where id='".$_GET['id']."'");
    echo "<script>alert('Set to \" processed \"！');window.location.href='activities.php';</script>";
}
if($_GET['deal']=="no"){
    mysqli_query($mysqli,"update activities set deal='否' where id='".$_GET['id']."'");
    echo "<script>alert('Set to \" unprocessed \"！');window.location.href='activities.php';</script>";
}
mysqli_close($mysqli);
?>
</body>
</html>