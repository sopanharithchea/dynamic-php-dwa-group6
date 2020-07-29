<?php 
// Start the session
session_start();
$title = 'Admin';
// Include the header:
include('./layout/header.php');
// Leave the PHP section to display lots of HTML:
$status = $_SESSION['admin'];
if ($status != 1){
    header('location: ./login_admin.php');
} else {
    header('location: ./dashboard.php');
}

?>