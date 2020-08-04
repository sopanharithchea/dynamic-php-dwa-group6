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
    function_alert("You don't have permissions for this user");
    die();
}
 
// Escape user inputs for security
$first_name = mysqli_real_escape_string($db, $_REQUEST['first_name']);
$last_name = mysqli_real_escape_string($db, $_REQUEST['last_name']);
$email = mysqli_real_escape_string($db, $_REQUEST['email']);
$pass1 = mysqli_real_escape_string($db, $_REQUEST['pass1']);
$pass2 = mysqli_real_escape_string($db, $_REQUEST['pass2']);
$role = mysqli_real_escape_string($db, $_REQUEST['role']);
$id = $_SESSION['x_userid'];
// Attempt insert query execution
$sql = "UPDATE `users` set `first_name`='$first_name', `last_name`='$last_name', `email`='$email', `password`='$pass2', `role_id`='$role' WHERE `id` = '$id'";
if(mysqli_query($db, $sql)){
    header("location: /admin/admin_users.php");
    $_SESSION['x_userid'] = null;
    exit();
} else{
    function_alert(mysqli_connect_error());
    print(mysqli_error($db));
    $_SESSION['x_userid'] = null;
    // header("location: dashboard.php");
}
 
// Close connection
mysqli_close($db);
?>