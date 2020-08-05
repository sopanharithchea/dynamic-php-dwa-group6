<?php
//Start session
session_start();
$title = "Dashboard";
include("templates/admin_header.php");
require('../db_conn.php');
if ($db === false) {
  die("ERROR: Could not connect. " . mysqli_connect_error());
} elseif ($_GET['jobid'] == null || $_GET['jobid'] == 0) {
  die(header('location: /admin/index.php'));
  exit;
}
$sql = "SELECT * FROM `jobs` WHERE `id` = '{$_GET['jobid']}' LIMIT 1";
$result = mysqli_query($db, $sql);
$row = mysqli_fetch_array($result);
$shift = mysqli_fetch_array(mysqli_query($db, "SELECT * FROM `shifts` WHERE `id` = '{$row['shift']}'"));
$category = mysqli_fetch_array(mysqli_query($db, "SELECT * FROM `categories` WHERE `id` = '{$row['category']}'"));
?>
<div class="unit-5 overlay" style="background-image: url('../src/images/hero_2.jpg');">
  <div class="container text-center">
    <h2 class="mb-0"><?php echo $row['name'] ?></h2>
    <p class="mb-0 unit-6"><a href="/admin/index.php">Home</a> <span class="sep">></span> <span><?php echo $row['name'];?></span></p>
  </div>
</div>

<div class="site-section bg-light">
  <div class="container">
    <div class="row">

      <div class="col-md-12 col-lg-8 mb-5">
      <?php
        if (!empty($_GET['update'])) {
          switch ($_GET['update']) {
            case 1:
              echo '<h2 class="mb-0 text-success">Post was updated!</h2><br/>';
              break;
            
            case 303:
              echo '<h2 class="mb-0 text-danger">Please login to update</h2><br/>';
              break;

            default:
              echo '<h2 class="mb-0 text-danger">There was an error, please try again later</h2><br/>';
              print(mysqli_error($db));
              break;
          }
        }
        ?>
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
        </div>
        <?php 
        echo '
        <div class="job-details mb-0 bg-dark">
            <div class="p-4">
                <span class="text-info p-2 rounded border border-warning "><a class="text-warning" href="admin_edit_post.php?edit=1&jobid=' . urldecode($row['id']) . '&name=' . urldecode($row['name']) . '">Edit</a></span>
                <span class="text-info p-2 rounded border border-danger text-danger"><a href="admin_delete_job.php?jobid=' . urldecode($row['id']) . '" class="text-danger">Delete</a></span>
            </div>
        </div>
        ';
        ?>
      </div>
    </div>
  </div>
</div>
<?php // Return to PHP.
include('templates/footer.php'); // Include the footer.
?>