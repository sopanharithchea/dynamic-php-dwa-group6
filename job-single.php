<?php
ob_start();
// Start the session
session_start();
$title = $_GET['name'];
// Include the header:
include('layout/header.php');
include 'db_conn.php';
if ($db === false) {
  die("ERROR: Could not connect. " . mysqli_connect_error());
} elseif ($_GET['jobid'] == null || $_GET['jobid'] == 0) {
  die(header('location: index.php'));
  exit;
}
$sql = "SELECT * FROM `jobs` WHERE `id` = '{$_GET['jobid']}' LIMIT 1";
$result = mysqli_query($db, $sql);
$row = mysqli_fetch_array($result);
$shift = mysqli_fetch_array(mysqli_query($db, "SELECT * FROM `shifts` WHERE `id` = '{$row['shift']}'"));
$category = mysqli_fetch_array(mysqli_query($db, "SELECT * FROM `categories` WHERE `id` = '{$row['category']}'"));
// Leave the PHP section to display lots of HTML:
?>

<div class="unit-5 overlay" style="background-image: url('src/images/hero_2.jpg');">
  <div class="container text-center">
    <h2 class="mb-0"><?php echo $row['name'] ?></h2>
    <p class="mb-0 unit-6"><a href="index.php">Home</a> <span class="sep">></span> <span>Job Item</span></p>
  </div>
</div>

<div class="site-section bg-light">
  <div class="container">
    <div class="row">

      <div class="col-md-12 col-lg-8 mb-5">



        <div class="p-5 bg-white">

          <div class="mb-4 mb-md-5 mr-5">
            <div class="job-post-item-header d-flex align-items-center">
              <h2 class="mr-3 text-black h4"><?php echo $row['name'] ?></h2>
              <div class="badge-wrap">
              <?php echo '<span class="border border-' . $shift['val'] . ' text-' . $shift['val'] . ' py-2 px-4 rounded">' . $shift['name'] . '</span>'?>
              </div>
            </div>
            <div class="job-post-item-body d-block d-md-flex">
              <div class="mr-3"><span class="fl-bigmug-line-portfolio23"></span> <a href="#"><?php echo $row['company'] ?></a></div>
              <div><span class="fl-bigmug-line-big104"></span> <span><?php echo $row['location'] ?></span></div>
            </div>
          </div>

          <p><?php echo $row['job_desc'] ?></p>

          <p class="mt-5"><a href="#" class="btn btn-primary  py-2 px-4">Apply Job</a></p>
        </div>
      </div>
    </div>
  </div>
</div>
<?php // Return to PHP.
include('layout/footer.html'); // Include the footer.
?>