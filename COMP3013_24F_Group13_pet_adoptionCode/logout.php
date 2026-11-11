<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
   
</head>
<body><?php

	session_start();
	
		unset($_SESSION['user']);
		
		session_destroy();
	
	echo "<script>alert('The logout was successful');window.location.href='./index.php';</script>";
?>
</body>
</html>

