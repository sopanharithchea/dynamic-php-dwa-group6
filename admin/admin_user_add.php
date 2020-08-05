<?php
// Start the session
session_start();
function function_alert($msg)
{
    echo "<script type='text/javascript'>alert('$msg');</script>";
}
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
require '../db_conn.php';

// Check connection
if ($db === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
} elseif ($_SESSION["admin"] != 1) {
    header("Location: /admin/admin_users.php?done=303");
    exit();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form
    $first_name = mysqli_real_escape_string($db, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($db, $_POST['last_name']);
    $my_email = mysqli_real_escape_string($db, $_POST['email']);
    $pass1 = mysqli_real_escape_string($db, $_POST['pass1']);
    $pass2 = mysqli_real_escape_string($db, $_POST['pass2']);
    $role = mysqli_real_escape_string($db, $_REQUEST['role']);
    if ($pass1 == $pass2) {
        $sql = "INSERT INTO `users` (`first_name`, `last_name`, `email`, `password`, `created_at`, `role_id`) VALUES ('$first_name','$last_name','$my_email','$pass2',NOW(),'$role')";
        $result = mysqli_query($db, $sql);
        if (mysqli_error($db)) {
            header("Location: /admin/admin_users.php?done=404");
            exit();
        } else {
            if (!headers_sent($filename)) { //checks whether the page has already received HTTP.
                header("Location: /admin/admin_users.php?done=1");
                exit(); //exit this login.php page
            } else {
                echo "Headers already sent in $filename \n" .
                    "Cannot redirect, for now please click this <a " .
                    "href=\"login.php\">link</a> instead\n";
                exit(); //exit this login.php page
            };
        }
    } else {
        function_alert("Passwords do not match. Please try again");
    }
}
// Close connection
mysqli_close($db);
