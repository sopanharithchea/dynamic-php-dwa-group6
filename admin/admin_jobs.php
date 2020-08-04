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