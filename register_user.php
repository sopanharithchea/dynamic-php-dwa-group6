<?php
require 'db_conn.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form
    $first_name = mysqli_real_escape_string($db, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($db, $_POST['last_name']);
    $my_email = mysqli_real_escape_string($db, $_POST['email']);
    $pass1 = mysqli_real_escape_string($db, $_POST['pass1']);
    $pass2 = mysqli_real_escape_string($db, $_POST['pass2']);
    if ($pass1 == $pass2) {
        $sql = "INSERT INTO `users` (`first_name`, `last_name`, `email`, `password`, `created_at`, `role_id`) VALUES ('$first_name','$last_name','$my_email','$pass2',NOW(),'10')";
        $result = mysqli_query($db, $sql);
        if (mysqli_error($db)) {
            print(mysqli_error($db));
        }
        if (!headers_sent($filename)) { //checks whether the page has already received HTTP.
            if (mysqli_error($db)) {
                print(mysqli_error($db));
            }
            header("Location: login.php");
            exit(); //exit this login.php page
        } else {
            if (mysqli_error($db)) {
                print(mysqli_error($db));
            }
            echo "Headers already sent in $filename \n" .
                "Cannot redirect, for now please click this <a " .
                "href=\"login.php\">link</a> instead\n";
            exit; //exit this login.php page
        };
    } else {
        function_alert("Passwords do not match. Please try again");
    }
}
// Close connection
mysqli_close($db);