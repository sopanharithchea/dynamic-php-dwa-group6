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
} elseif ($_SESSION["valid_user"] != 1){
    function_alert("You don't have permissions to post");
    die();
}
 
// Escape user inputs for security
$name = mysqli_real_escape_string($db, $_REQUEST['name']);
$company = mysqli_real_escape_string($db, $_REQUEST['company']);
$category = mysqli_real_escape_string($db, $_REQUEST['category']);
$location = mysqli_real_escape_string($db, $_REQUEST['location']);
$description = mysqli_real_escape_string($db, $_REQUEST['description']);
$shift = mysqli_real_escape_string($db, $_REQUEST['shift']);
$min_sal = mysqli_real_escape_string($db, $_REQUEST['min_sal']);
$max_sal = mysqli_real_escape_string($db, $_REQUEST['max_sal']);
// Attempt insert query execution
$sql = "INSERT INTO jobs (`name`, `company`, `category`, `location`, `job_desc`, `shift`,`mix_sal`,`max_sal`) VALUES ('$name', '$company', '$category','$location', '$description', '$shift')";
if(mysqli_query($db, $sql)){
    header("Location: new-post.php?done=1");
} else{
    header("Location: new-post.php?done=404");
}
 
// Close connection
mysqli_close($db);
?>