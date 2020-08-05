<?php
// Start the session
session_start();
function function_alert($msg)
{
    echo "<script type='text/javascript'>alert('$msg');</script>";
}
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
require 'db_conn.php';

// Check connection
if ($db === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
if ($_SESSION["valid_user"] != 1 || $_SESSION["admin"] != 1) {
    header('location: new-post.php?done=303');
    function_alert("You don't have permissions to post");
    exit();
}

// Escape user inputs for security
$name = mysqli_real_escape_string($db, $_REQUEST['name']);
$company = mysqli_real_escape_string($db, $_REQUEST['company']);
$category = mysqli_real_escape_string($db, $_REQUEST['category']);
$location = mysqli_real_escape_string($db, $_REQUEST['location']);
$description = mysqli_real_escape_string($db, $_REQUEST['description']);
$shift = mysqli_real_escape_string($db, $_REQUEST['shift']);
$user_id = $_SESSION['user_id'];
// Attempt insert query execution
$sql = "INSERT INTO `jobs` (`name`, `company`, `category`, `location`, `job_desc`, `shift`, `create_by`) VALUES ('$name', '$company', '$category','$location', '$description', '$shift','$user_id')";
if (mysqli_query($db, $sql)) {
    if ($_SESSION['admin'] == 1) {
        header("Location: /admin/admin_jobs.php?done=1");
    } else {
        header("Location: new-post.php?done=1");
    }
} else {
    if ($_SESSION['admin'] == 1) {
        header("Location: /admin/admin_jobs.php?done=1");
    } else {
        header("Location: new-post.php?done=404");
    }
}

// Close connection
mysqli_close($db);
