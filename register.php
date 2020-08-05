<?php
$title = 'Register';
ob_start();
// Start the session
session_start();
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
                <form action="register_user.php" method="POST" class="p-5 bg-white">
                    <div class="row font-weight-bold">
                        <p>Already have an account? <a href="login.php">Click here</a></p>
                    </div>
                    <br />
                    <div class="row form-group">
                        <div class="col-md-12 mb-3 mb-md-0">
                            <h3 class="font-weight-bold">Register</h3>
                            <br>
                            <label class="font-weight-bold" for="first_name">First Name</label>
                            <input type="text" name="first_name" class="form-control" required>
                            <label class="font-weight-bold" for="last_name">Last Name</label>
                            <input type="text" name="last_name" class="form-control" required>
                        </div>
                    </div>
                    <div class="row form-group mb-5">
                        <div class="col-md-12 mb-3 mb-md-0">
                            <label class="font-weight-bold" for="email">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="jeff.wood@jobfinder.com" required>
                        </div>
                        <div class="col-md-12 mb-3 mb-md-0">
                            <label class="font-weight-bold" for="pass1">Password</label>
                            <input type="password" name="pass1" class="form-control" required>
                        </div>
                        <div class="col-md-12 mb-3 mb-md-0">
                            <label class="font-weight-bold" for="pass2">Confirm Password</label>
                            <input type="password" name="pass2" class="form-control" required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12">
                            <input type="submit" value="Sign Up" class="btn btn-primary  py-2 px-5">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php // Return to PHP.
include 'layout/footer.php'; // Include the footer.
?>