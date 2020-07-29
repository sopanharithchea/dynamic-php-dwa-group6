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
                <h2 class="mb-0 h1 text-success py-5">Browse</h2>
                <div class="rounded border jobs-wrap align-content-xl-center">
                    <?php
                    require 'browsedetails.php'
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php // Return to PHP.
include('templates/footer.php'); // Include the footer.
?>