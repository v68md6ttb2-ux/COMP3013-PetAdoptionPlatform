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
    <!-- User add operation -->
    <?php
        $c_date = date('Y-m-d H:i:s');
        $name = $_POST['name'];
        $email = $_POST['email'];
        if ($username == "") {
            echo "<script>alert('Account cannot be empty!');history.go(-1)</script>"; // Return to the registration page
            exit;
        } elseif (mysqli_num_rows(mysqli_query($mysqli, "select name from users where name='".$name."'")) > 0) {
            echo "<script>alert('This username already exists, please choose another account for registration!');window.location.href='users_add.php'</script>"; // Return to the registration page
            exit;
        }
        $password = $_POST['password'];
        if ($password == "") {
            echo "<script>alert('Password cannot be empty!');history.go(-1)</script>"; // Return to the registration page
            exit;
        }
        $sqlstr = "insert into users(name, password, email, c_date) 
        values('".$name."','".$password."','".$email."','".$c_date."')";
        $result = mysqli_query($mysqli, $sqlstr);
        if ($result) {
            echo "<script>alert('Added successfully!');window.location.href='users_list.php'</script>"; // Return to the user list page
            exit;
        } else {
            echo "<script>alert('Failed to add!');window.location.href='users_add.php'</script>"; // Return to the registration page
            exit;
        }
        mysqli_free_result($result);
        mysqli_close($mysqli);
    ?>
</body>
</html>
