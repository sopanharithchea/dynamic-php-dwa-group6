<?php
ob_start();
// Start the session
session_start();
define('TITLE', 'Login');
// Include the header:
include './layout/header.html';
// Leave the PHP section to display lots of HTML:
?>

<div class="unit-5 overlay" style="background-image: url('images/hero_1.jpg');">
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
                include './db_conn.php';
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    // username and password sent from form

                    $my_email = mysqli_real_escape_string($db, $_POST['email']);
                    $my_pass = mysqli_real_escape_string($db, $_POST['password']);

                    $sql = "SELECT * FROM users WHERE `email` = '$my_email' and `password` = '$my_pass'";
                    $result = mysqli_query($db, $sql);
                    $row = mysqli_fetch_array($result);
                    $count = mysqli_num_rows($result);

                    // If result matched $myusername and $mypassword, table row must be 1 row

                    if ($count == 1) {
                        $_SESSION['login_user'] = $my_email;
                        $_SESSION["logged"] = 1;
                        $_SESSION["user"] = $my_email;
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
                        $error = "Your Login Name or Password is invalid";
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
                            <input type="password" name="password" class="form-control" required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12">
                            <input type="submit" value="Login" class="btn btn-primary  py-2 px-5">
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-lg-4">
                <div class="p-4 mb-3 bg-white">
                    <h3 class="h5 text-black mb-3">Contact Info</h3>
                    <p class="mb-0 font-weight-bold">Address</p>
                    <p class="mb-4">203 Fake St. Mountain View, San Francisco, California, USA</p>

                    <p class="mb-0 font-weight-bold">Phone</p>
                    <p class="mb-4"><a href="#">+1 232 3235 324</a></p>

                    <p class="mb-0 font-weight-bold">Email Address</p>
                    <p class="mb-0"><a href="#">youremail@domain.com</a></p>

                </div>

                <div class="p-4 mb-3 bg-white">
                    <h3 class="h5 text-black mb-3">More Info</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa ad iure porro mollitia architecto
                        hic consequuntur. Distinctio nisi perferendis dolore, ipsa consectetur</p>
                    <p><a href="#" class="btn btn-primary  py-2 px-4">Learn More</a></p>
                </div>
            </div>
        </div>
    </div>
</div>




<div class="site-section">
    <div class="container">
        <div class="row justify-content-center text-center mb-5">
            <div class="col-md-6" data-aos="fade">
                <h2>Frequently Ask Questions</h2>
            </div>
        </div>


        <div class="row justify-content-center" data-aos="fade" data-aos-delay="100">
            <div class="col-md-8">
                <div class="accordion unit-8" id="accordion">
                    <div class="accordion-item">
                        <h3 class="mb-0 heading">
                            <a class="btn-block" data-toggle="collapse" href="#collapseOne" role="button" aria-expanded="true" aria-controls="collapseOne">What is the name of your company<span class="icon"></span></a>
                        </h3>
                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="body-text">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur quae cumque
                                    perspiciatis aperiam accusantium facilis provident aspernatur nisi optio debitis
                                    dolorum, est eum eligendi vero aut ad necessitatibus nulla sit labore doloremque
                                    magnam! Ex molestiae, dolor tempora, ad fuga minima enim mollitia consequuntur,
                                    necessitatibus praesentium eligendi officia recusandae culpa tempore eaque quasi
                                    ullam magnam modi quidem in amet. Quod debitis error placeat, tempore quasi aliquid
                                    eaque vel facilis culpa voluptate.</p>
                            </div>
                        </div>
                    </div> <!-- .accordion-item -->

                    <div class="accordion-item">
                        <h3 class="mb-0 heading">
                            <a class="btn-block" data-toggle="collapse" href="#collapseTwo" role="button" aria-expanded="false" aria-controls="collapseTwo">How much pay for 3 months?<span class="icon"></span></a>
                        </h3>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="body-text">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel ad laborum expedita.
                                    Nostrum iure atque enim quisquam minima distinctio omnis, consequatur aliquam
                                    suscipit, quidem, esse aspernatur! Libero, excepturi animi repellendus porro impedit
                                    nihil in doloremque a quaerat enim voluptatum, perspiciatis, quas dignissimos maxime
                                    ut cum reiciendis eius dolorum voluptatem aliquam!</p>
                            </div>
                        </div>
                    </div> <!-- .accordion-item -->

                    <div class="accordion-item">
                        <h3 class="mb-0 heading">
                            <a class="btn-block" data-toggle="collapse" href="#collapseThree" role="button" aria-expanded="false" aria-controls="collapseThree">Do I need to register? <span class="icon"></span></a>
                        </h3>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="body-text">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel ad laborum expedita.
                                    Nostrum iure atque enim quisquam minima distinctio omnis, consequatur aliquam
                                    suscipit, quidem, esse aspernatur! Libero, excepturi animi repellendus porro impedit
                                    nihil in doloremque a quaerat enim voluptatum, perspiciatis, quas dignissimos maxime
                                    ut cum reiciendis eius dolorum voluptatem aliquam!</p>
                            </div>
                        </div>
                    </div> <!-- .accordion-item -->

                    <div class="accordion-item">
                        <h3 class="mb-0 heading">
                            <a class="btn-block" data-toggle="collapse" href="#collapseFour" role="button" aria-expanded="false" aria-controls="collapseFour">Who should I contact in case of
                                support.<span class="icon"></span></a>
                        </h3>
                        <div id="collapseFour" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="body-text">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel ad laborum expedita.
                                    Nostrum iure atque enim quisquam minima distinctio omnis, consequatur aliquam
                                    suscipit, quidem, esse aspernatur! Libero, excepturi animi repellendus porro impedit
                                    nihil in doloremque a quaerat enim voluptatum, perspiciatis, quas dignissimos maxime
                                    ut cum reiciendis eius dolorum voluptatem aliquam!</p>
                            </div>
                        </div>
                    </div> <!-- .accordion-item -->

                </div>
            </div>
        </div>

    </div>
</div>

<?php // Return to PHP.
include './layout/footer.html'; // Include the footer.
?>