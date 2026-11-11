<html>
	<head>
		<title></title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
	session_start(); // Start session mechanism
	require_once "../inc/conn.php"; // Include database connection file
	$username = $_POST['admin_name']; // Get the username and password input from the login form
	//$password = md5($_POST['admin_pass']);
	$password = $_POST['admin_pass'];

	// Construct SQL query to check login credentials
	$sqlstr = "select * from admin where admin_name='" . $username . "' and admin_pass='" . $password . "'";

	// Execute query
	$result = mysqli_query($mysqli, $sqlstr);
	// Get the number of rows from the query result
	$nums = mysqli_num_rows($result);
	if ($nums > 0) {
		$_SESSION['isChecked'] = "ok";
		$_SESSION['username'] = $username; // Store user information in session
		echo "<script>alert('Login successful!'); window.location.href='index.php'</script>"; // Redirect to backend homepage
		exit;
	} else {
		echo "<script>alert('Login failed!'); window.location.href='login.php'</script>"; // Redirect back to login page
		exit;
	}
	mysqli_free_result($result); // Free the result set
	mysqli_close($mysqli); // Close the database connection
?>
