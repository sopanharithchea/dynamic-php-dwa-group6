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
    header("Location: admin_jobs.php?delete=303");
    exit();
}
$id = $_GET['jobid'];
// Attempt insert query execution
$sql = "DELETE FROM jobs WHERE `id` = '$id'";
if(mysqli_query($db, $sql)){
    header("Location: admin_jobs.php?delete=1");
    exit();
} else{    
    header("Location: admin_jobs.php?delete=404");
    exit();
}
 
// Close connection
mysqli_close($db);
?>