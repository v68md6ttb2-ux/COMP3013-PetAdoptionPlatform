<?php 
require_once 'session.php'; // Include session file
require_once '../inc/conn.php'; // Include database connection

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Input validation
    if ($_POST['title'] == "") {
        echo "<script>alert('Title cannot be empty!');history.go(-1)</script>";
        exit;
    }
    if ($_POST['thumbnail'] == "") {
        echo "<script>alert('Thumbnail cannot be empty!');history.go(-1)</script>";
        exit;
    }
    if ($_POST['content'] == "") {
        echo "<script>alert('Content cannot be empty!');history.go(-1)</script>";
        exit;
    }

    // Sanitize input to prevent SQL injection
    $title = mysqli_real_escape_string($mysqli, $_POST['title']);
    $comefrom = mysqli_real_escape_string($mysqli, $_POST['comefrom']);
    $pubdate = mysqli_real_escape_string($mysqli, $_POST['pubdate']);
    $thumbnail = mysqli_real_escape_string($mysqli, $_POST['thumbnail']);
    $keywords = mysqli_real_escape_string($mysqli, $_POST['keywords']);
    $description = mysqli_real_escape_string($mysqli, $_POST['description']);
    $content = mysqli_real_escape_string($mysqli, $_POST['content']);
    
    // Update the foster information in the database
    $sql = "UPDATE fosters SET 
            title='$title',
            comefrom='$comefrom',
            pubdate='$pubdate',
            thumbnail='$thumbnail',
            keywords='$keywords',
            description='$description',
            content='$content' 
            WHERE id='" . mysqli_real_escape_string($mysqli, $_GET['id']) . "'";

    // Execute the query
    $result = mysqli_query($mysqli, $sql);

    // Check if the query was successful
    if ($result) {
        echo "<script>alert('Update successful!');window.location.href='fosters_list.php'</script>";
        exit;
    } else {
        echo "<script>alert('Update failed!');window.location.href='fosters_list.php'</script>";
        exit;
    }

    // Close the database connection
    mysqli_free_result($result);
    mysqli_close($mysqli);
}
?>
