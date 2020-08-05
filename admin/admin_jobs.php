<?php
//Start session
session_start();
$title = "Dashboard";
include("templates/admin_header.php");
?>
<div class="site-section bg-light">
    <div class="container">
        <div class="row">
            <div class="col mb-0" data-aos="fade-up" data-aos-delay="100">
                <div class="mb-0 py-5">
                    <span class=" mb-0 h1 text-success py-5">
                        Browse
                        <?php
                    if (!empty($_GET['done'])) {
                        switch ($_GET['done']) {
                            case 1:
                                echo '<h2 class="mb-0 text-success">Posted!</h2><br/>';
                                break;

                            case 303:
                                echo '<h2 class="mb-0 text-danger">Please login to post</h2><br/>';
                                break;

                            default:
                                echo '<h2 class="mb-0 text-danger">There was an error, please try again later</h2><br/>';
                                print(mysqli_error($db));
                                break;
                        }
                    }
                    if (!empty($_GET['delete'])) {
                        switch ($_GET['delete']) {
                            case 1:
                                echo '<h2 class="mb-0 text-success">Post was deleted!</h2><br/>';
                                break;

                            case 303:
                                echo '<h2 class="mb-0 text-danger">Please login as admin</h2><br/>';
                                break;

                            default:
                                echo '<h2 class="mb-0 text-danger">There was an error, please try again later</h2><br/>';
                                print(mysqli_error($db));
                                break;
                        }
                    }
                    if (!empty($_GET['update'])) {
                        switch ($_GET['update']) {
                            case 1:
                                echo '<h2 class="mb-0 text-success">Updated post!</h2><br/>';
                                break;

                            case 303:
                                echo '<h2 class="mb-0 text-danger">Please login to post</h2><br/>';
                                break;

                            default:
                                echo '<h2 class="mb-0 text-danger">There was an error, please try again later</h2><br/>';
                                print(mysqli_error($db));
                                break;
                        }
                    }
                    ?>
                    </span>
                    <span>
                        <a href="/new-post.php"><span class="bg-primary text-white py-3 px-4 rounded"><span class="icon-plus mr-3"></span>Post New
                                Job</span></a>
                    </span>
                </div>
                <div class="rounded border jobs-wrap align-content-xl-center">
                    <?php
                    require './admin_browse_details.php'
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php // Return to PHP.
include('templates/footer.php'); // Include the footer.
?>