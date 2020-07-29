<?php 
ob_start();
// Start the session
session_start();
$status = $_SESSION['logged'];
if ($status == 1){
    $_SESSION = [];// Reset the session array:
    session_destroy();// Destroy the session data on the server:
    header('location: index.php');
} else {
    header('location: index.php');
}

?>