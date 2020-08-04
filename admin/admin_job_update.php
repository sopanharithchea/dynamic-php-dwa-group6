<?php
// Start the session
session_start();
function function_alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
require '../db_conn.php';
 
// Check connection
if($db === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
} elseif ($_SESSION["admin"] != 1){
    function_alert("You don't have permissions for this post");
    die();
}
 
// Escape user inputs for security
$name = mysqli_real_escape_string($db, $_REQUEST['name']);
$company = mysqli_real_escape_string($db, $_REQUEST['company']);
$category = mysqli_real_escape_string($db, $_REQUEST['category']);
$location = mysqli_real_escape_string($db, $_REQUEST['location']);
$description = mysqli_real_escape_string($db, $_REQUEST['description']);
$shift = mysqli_real_escape_string($db, $_REQUEST['shift']);
$id = $_SESSION['job_id'];
// Attempt insert query execution
$sql = "UPDATE jobs set `name`='$name', `company`='$company', `category`='$category', `location`='$location', `job_desc`='$description', `shift`='$shift' WHERE `id` = '$id'";
if(mysqli_query($db, $sql)){
    header("Location: admin_job_single.php?jobid={$id}&name={$name}");
    $_SESSION['job_id'] = null;
    exit();
} else{
    function_alert("Error");
    header("Location: dashboard.php");
}
 
// Close connection
mysqli_close($db);
?>