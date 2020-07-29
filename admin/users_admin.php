<?php
//Start session
session_start();
$title = "Dashboard";
include("templates/admin_header.php");
?>

<!-- Main jumbotron for a primary marketing message or call to action -->
<div>
  <div class="container">
    <div class="row align-items-center">
      <div class="col-12 text-black">
        <h1>User management</h1>
      </div>
    </div>
  </div>
</div>

<div class="site-section bg-light">
  <div class="container">
    <div class="row">
      <div class="col mb-5 mb-md-0" data-aos="fade-up" data-aos-delay="100">
        <h2 class="mb-5 h3">Users</h2>
        <div class="rounded border jobs-wrap">
          <?php
          include("get_users.php");
          ?>
        </div>
      </div>
    </div>
  </div>
</div>

<?php // Return to PHP.
include('templates/footer.php'); // Include the footer.
?>