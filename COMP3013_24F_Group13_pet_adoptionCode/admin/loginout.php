<!-- Start session -->
<?php
    session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Logout</title>
</head>
<body>
   <!-- Logout process -->
   <?php
        session_destroy(); // Destroy all session variables
        echo "<script>alert('Logout successful!'); window.location.href='login.php'</script>"; // Redirect to the login page
        exit;
   ?>
</body>
</html>
