<!-- Start session, include session file -->
<?php
    require_once"session.php";  // Include session file
    require_once"../inc/conn.php";  // Include database connection file
    $id = $_GET['id'];  // Get the page ID
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Modify Page</title>  <!-- Modify Page -->
</head>
<body>
<!-- Modification processing -->
<?php
    $title = $_POST['title'];  // Get the title from the form
    if ($title == "") {  // Check if the title is empty
        echo "<script>alert('Title cannot be empty!');history.go(-1)</script>";  // Alert and return to the previous page
        exit;
    }
    $content = $_POST['content'];  // Get the content from the form
    if ($content == "") {  // Check if the content is empty
        echo "<script>alert('Content cannot be empty!');history.go(-1)</script>";  // Alert and return to the previous page
        exit;
    }
    // SQL query to update the page in the database
    $sqlstr = "update single set title='" . $_POST['title'] . "', comefrom='" . $_POST['comefrom'] . "', pubdate='" . $_POST['pubdate'] . "', keywords='" . $_POST['keywords'] . "', description='" . $_POST['description'] . "', content='" . $_POST['content'] . "' where id=" . $id;
    $result = mysqli_query($mysqli, $sqlstr);  // Execute the query
    if ($result) {
        echo "<script>alert('Modification successful!');window.location.href='single_list.php'</script>";  // Success: Redirect to the list page
        exit;
    } else {
        echo "<script>alert('Modification failed!');window.location.href='single_list.php'</script>";  // Failure: Redirect to the list page
        exit;
    }
    mysqli_free_result($result);  // Free the result
    mysqli_close($mysqli);  // Close the database connection
?>
</body>
</html>
