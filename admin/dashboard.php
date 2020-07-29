<?php
//Start session
session_start();
$title = "Dashboard";
include("./templates/admin_header.php");
?>

<!-- Main jumbotron for a primary marketing message or call to action -->
<div>
      <div class="container">
        <div class="row align-items-center">
          <div class="col-12 text-black">
            <h1>Admin Dashboard</h1>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section bg-light">
      <div class="container">
        <div class="row">
          <div class="col mb-5 mb-md-0" data-aos="fade-up" data-aos-delay="100">
            <h2 class="mb-5 h3">Recent Postings</h2>
            <div class="rounded border jobs-wrap">
              <?php
              include("../recentjobs.php"); 
              ?>
            </div>

            <div class="col-md-12 text-center mt-5">
              <a href="jobs_admin.php" class="btn btn-primary rounded py-3 px-5"><span class="icon-plus-circle"></span> Show More Jobs</a>
            </div>
          </div>
        </div>
      </div>
    </div>

<?php // Return to PHP.
include('./templates/footer.php'); // Include the footer.
?>