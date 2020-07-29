<?php
ob_start();
// Start the session
session_start();
$title = "Login";
function function_alert($msg)
{
    echo "<script type='text/javascript'>alert('$msg');</script>";
}
// Include the header:
include 'layout/header.php';
// Leave the PHP section to display lots of HTML:
?>

<div class="unit-5 overlay" style="background-image: url('src/images/hero_1.jpg');">
    <div class="container text-center">
        <h2 class="mb-0">Sign Up or Login</h2>
        <p class="mb-0 unit-6"><a href="index.php">Home</a> <span class="sep">></span> <span>Login</span></p>
    </div>
</div>
<div class="site-section bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-8 mb-5">
                <?php
                include 'db_conn.php';
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    // username and password sent from form
                    if ($db === false) {
                        die("ERROR: Could not connect. " . mysqli_connect_error());
                    }

                    $my_email = mysqli_real_escape_string($db, $_POST['email']);
                    $my_pass = mysqli_real_escape_string($db, $_POST['pass1']);

                    $sql = "SELECT * FROM users WHERE email = '$my_email' and password = '$my_pass'";
                    $result = mysqli_query($db, $sql);
                    $row = mysqli_fetch_array($result);
                    $count = mysqli_num_rows($result);

                    // If result matched $myusername and $mypassword, table row must be 1 row

                    if ($count == 1) {
                        if($_SESSION['admin'] == 1 || $_SESSION['logged'] == 1){
                            $_SESSION = [];
                        }
                        if ($row['role_id'] == 1){
                            $_SESSION["admin"] = 1;
                        }
                        $_SESSION['login_user'] = $my_email;
                        $_SESSION["logged"] = 1;
                        $_SESSION["user"] = $my_email;
                        $_SESSION["user_id"] = $row['id'];
                        $_SESSION["valid_user"] = 1;
                        $hour = time() + 3600 * 24 * 30;
                        setcookie($my_email, $hour);
                        setcookie("active", 1, $hour);
                        if (!headers_sent($filename)) { //checks whether the page has already received HTTP.
                            header("Location: index.php");
                            exit(); //exit this login.php page
                        } else {
                            echo "Headers already sent in $filename \n" .
                                "Cannot redirect, for now please click this <a " .
                                "href=\"index.php\">link</a> instead\n";
                            exit; //exit this login.php page
                        }
                    } else {
                        $error = "Your Login Name or Password is invalid {$count}";
                        function_alert($error);
                    }
                }
                ?>
                <form action="" method="post" class="p-5 bg-white">
                    <div class="row font-weight-bold">
                        <p>Don't have an account? <a href="register.php">Click here</a></p>
                    </div>
                    <br />
                    <div class="row form-group">
                        <div class="col-md-12 mb-3 mb-md-0">
                            <h3 class="font-weight-bold">Login</h3>
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
                </form>
            </div>

            <?php
            include("./layout/sidebar.php");
            ?>
        </div>
    </div>
</div>

<?php // Return to PHP.
include 'layout/footer.html'; // Include the footer.
?>