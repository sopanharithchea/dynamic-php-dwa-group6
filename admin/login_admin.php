<?php
//Start session
session_start();

include("./templates/admin_header.php");
function function_alert($msg)
{
    echo "<script type='text/javascript'>alert('$msg');</script>";
}
?>
<div class="container" style="margin-top: -8rem  !important;">
    <div class="p-5 center">
        <div>
            <div class="col">
                <?php
                include '../db_conn.php';
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    // username and password sent from form
                    if ($db === false) {
                        die("ERROR: Could not connect. " . mysqli_connect_error());
                    }

                    $my_email = mysqli_real_escape_string($db, $_POST['email']);
                    $my_pass = mysqli_real_escape_string($db, $_POST['pass1']);

                    $sql = "SELECT * FROM `users` WHERE `email` = '$my_email' and `password` = '$my_pass' and `role_id` = 1";
                    $result = mysqli_query($db, $sql);
                    $row = mysqli_fetch_array($result);
                    $count = mysqli_num_rows($result);

                    // If result matched $myusername and $mypassword, table row must be 1 row

                    if ($count == 1) {
                        if($_SESSION['admin'] == null || $_SESSION['logged'] == 1){
                            $_SESSION = [];
                        }
                        $_SESSION['login_user'] = $my_email;
                        $_SESSION["logged"] = 1;
                        $_SESSION["user"] = $my_email;
                        $_SESSION["valid_user"] = 1;
                        $_SESSION["admin"] = 1;
                        $hour = time() + 3600 * 24 * 30;
                        setcookie($my_email, $hour);
                        setcookie("active", 1, $hour);
                        if (!headers_sent($filename)) { //checks whether the page has already received HTTP.
                            header("Location: ../admin/dashboard.php");
                            exit(); //exit this login.php page
                        } else {
                            echo "Headers already sent in $filename \n" .
                                "Cannot redirect, for now please click this <a " .
                                "href=\"/admin/dashboard.php\">link</a> instead\n";
                            exit; //exit this login.php page
                        }
                    } else {
                        $error = "Your Login Name or Password is invalid {$count}";
                        function_alert($error);
                    }
                }
                ?>
                <form action="" method="post" class="p-5 bg-white">
                    <br />
                    <div class="row form-group">
                        <div class="col-md-12 mb-3 mb-md-0">
                            <h3 class="font-weight-bold">Admin Login</h3>
                            <br>
                        </div>
                    </div>
                    <div class="row form-group mb-5">
                        <div class="col-md-12 mb-3 mb-md-0">
                            <label class="font-weight-bold" for="email">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="jeff.wood@jobfinder.com" required>
                        </div>
                        <div class="col-md-12 mb-3 mb-md-0">
                            <label class="font-weight-bold" for="password">Password</label>
                            <input type="password" name="pass1" class="form-control" required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12">
                            <input type="submit" value="Login" class="btn btn-primary  py-2 px-5">
                        </div>
                    </div>
                    <div class="row form-group h3"><a href="/login.php">Not an admin?</a></div>
                </form>
            </div>
        </div>
    </div>
</div>