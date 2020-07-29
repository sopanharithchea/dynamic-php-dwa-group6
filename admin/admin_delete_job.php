<?php
// Start the session
session_start();
function function_alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
require 'db_conn.php';
 
// Check connection
if($db === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
} elseif ($_SESSION["admin"] != 1){
    function_alert("You don't have permissions of this post");
    die();
}
$id = $_GET['job_id'];
// Attempt insert query execution
$sql = "DELETE jobs WHERE `id` = '$id'";
if(mysqli_query($db, $sql)){
    header("Location: dashboard.php");
    exit();
} else{
    function_alert("Error");
    header("Location: dashboard.php");
}
 
// Close connection
mysqli_close($db);
?>