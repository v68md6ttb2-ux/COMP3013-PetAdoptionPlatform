<!-- Start session, include connection file -->
<?php
    require_once "session.php";
    require_once "../inc/conn.php";
    $id = $_GET['id'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
<!-- Perform modification operation -->
<?php
    $username = $_POST['name'];
    $email = $_POST['email'];
    if ($username == "") {
        echo "<script>alert('Username cannot be empty!');history.go(-1)</script>"; // Go back to the registration page
        exit;
    }
    if ($_POST['password'] == "") {
        echo "<script>alert('Please enter a new password!');window.location.href='users_list.php'</script>"; // Go back to the user list page
        exit;
    }
    $sqlstr = "update users set name='" . $_POST['name'] . "'
    , password='" . $_POST['password'] . "'
    , email='" . $_POST['email'] . "' where id=" . $id;
    $result = mysqli_query($mysqli, $sqlstr);
    if ($result) {
        echo "<script>alert('Modification successful!');window.location.href='users_list.php'</script>"; // Go back to the user list page
        exit;
    } else {
        echo "<script>alert('Modification failed!');window.location.href='users_list.php'</script>"; // Go back to the user list page
        exit;
    }
    mysqli_free_result($result);
    mysqli_close($mysqli);
?>
</body>
</html>
