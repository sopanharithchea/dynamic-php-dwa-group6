<?php
// Start the session
session_start();
$title = "Contact";
// Include the header:
include('./layout/header.php');
// Leave the PHP section to display lots of HTML:
?>

<div class="unit-5 overlay" style="background-image: url('images/hero_1.jpg');">
  <div class="container text-center">
    <h2 class="mb-0">Contact</h2>
    <p class="mb-0 unit-6"><a href="index.php">Home</a> <span class="sep">></span> <span>Contact</span></p>
  </div>
</div>


<div class="site-section bg-light">
  <div class="container">
    <div class="row">

      <div class="col-md-12 col-lg-8 mb-5">



        <form action="#" class="p-5 bg-white">

          <div class="row form-group">
            <div class="col-md-12 mb-3 mb-md-0">
              <label class="font-weight-bold" for="fullname">Full Name</label>
              <input type="text" id="fullname" class="form-control" placeholder="Full Name">
            </div>
          </div>
          <div class="row form-group">
            <div class="col-md-12">
              <label class="font-weight-bold" for="email">Email</label>
              <input type="email" id="email" class="form-control" placeholder="Email Address">
            </div>
          </div>


          <div class="row form-group">
            <div class="col-md-12 mb-3 mb-md-0">
              <label class="font-weight-bold" for="phone">Phone</label>
              <input type="text" id="phone" class="form-control" placeholder="Phone #">
            </div>
          </div>

          <div class="row form-group">
            <div class="col-md-12">
              <label class="font-weight-bold" for="message">Message</label>
              <textarea name="message" id="message" cols="30" rows="5" class="form-control" placeholder="Say hello to us"></textarea>
            </div>
          </div>

          <div class="row form-group">
            <div class="col-md-12">
              <input type="submit" value="Send Message" class="btn btn-primary pill px-4 py-2">
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

<div class="py-5 quick-contact-info">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <div>
          <h2><span class="icon-room"></span> Location</h2>
          <p class="mb-0">New York - 2398 <br> 10 Hadson Carl Street</p>
        </div>
      </div>
      <div class="col-md-4">
        <div>
          <h2><span class="icon-clock-o"></span> Service Times</h2>
          <p class="mb-0">Wednesdays at 6:30PM - 7:30PM <br>
            Fridays at Sunset - 7:30PM <br>
            Saturdays at 8:00AM - Sunset</p>
        </div>
      </div>
      <div class="col-md-4">
        <h2><span class="icon-comments"></span> Get In Touch</h2>
        <p class="mb-0">Email: info@yoursite.com <br>
          Phone: (123) 3240-345-9348 </p>
      </div>
    </div>
  </div>
</div>
<?php // Return to PHP.
include('./layout/footer.php'); // Include the footer.
?>