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
$shift_id = $row['shift'];
$category_id = $row['category'];
$location = $row['location'];
$jd = $row['job_desc'];
$_SESSION['job_id'] = $_GET['jobid'];
?>

<div class="unit-5 overlay" style="background-image: url('src/images/hero_1.jpg');">
  <div class="container text-center">
    <h2 class="mb-0">Post a Job</h2>
    <p class="mb-0 unit-6"><a href="index.php">Home</a> <span class="sep">></span> <span>Post a Job</span></p>
  </div>
</div>

<div class="site-section bg-light">
  <div class="container">
    <div class="row">

      <div class="col-md-12 col-lg-8 mb-5">

        <?php
        if (!empty($_GET['done'])) {
          switch ($_GET['done']) {
            case 1:
              echo '<h2 class="mb-0 text-success">Your job was updated!</h2>';
              break;

            default:
              echo '<h2 class="mb-0 text-danger">There was an error, please try again later</h2>';
              break;
          }
        }
        ?>
        <form action="admin_job_update.php" class="p-5 bg-white" method="POST">

          <div class="row form-group">
            <div class="col-md-12 mb-3 mb-md-0">
              <label class="font-weight-bold" for="name">Job Title</label>
              <input type="text" id="name" name="name" class="form-control" value="<?php echo $row['name'] ?>" required>
            </div>
          </div>

          <div class="row form-group mb-5">
            <div class="col-md-12 mb-3 mb-md-0">
              <label class="font-weight-bold" for="company">Company</label>
              <input type="text" id="company" name="company" class="form-control" value="<?php echo $row['company'] ?>" required>
            </div>
          </div>


          <div class="row form-group">
            <div class="col-md-12">
              <label class="font-weight-bold" for="category">Shift</label>
              <select id="category" name="shift" class="form-control" required>
                <?php
                include 'db_conn.php';
                if ($db === false) {
                  die("ERROR: Could not connect. " . mysqli_connect_error());
                }
                $sql = "SELECT * FROM `shifts`";
                $result = mysqli_query($db, $sql);
                $row = mysqli_fetch_array($result);
                foreach ($result as $row) {
                  if ($row['id'] == $shift_id){
                    echo "<option value=\" {$row['id']} \" selected>{$row['name']}</option>";
                  }
                  echo "<option value=\" {$row['id']} \">{$row['name']}</option>";
                }
                ?>
              </select>
              <label class="font-weight-bold" for="category">Job Category</label>
              <select id="category" name="category" class="form-control" required>
                <?php
                include 'db_conn.php';
                if ($db === false) {
                  die("ERROR: Could not connect. " . mysqli_connect_error());
                }
                $sql = "SELECT * FROM `categories`";
                $result = mysqli_query($db, $sql);
                $row = mysqli_fetch_array($result);
                foreach ($result as $row) {
                  if ($row['id'] == $category_id){
                    echo "<option value=\" {$row['id']} \" selected>{$row['name']}</option>";
                  }
                  echo "<option value=\" {$row['id']} \">{$row['name']}</option>";
                }
                ?>
              </select>
            </div>
          </div>

          <div class="row form-group mb-4">
            <div class="col-md-12">
              <label class="font-weight-bold" for="location">Location</label>
            </div>
            <div class="col-md-12 mb-3 mb-md-0">
            <select id="category" name="location" class="form-control" required>
                <?php
                include 'db_conn.php';
                if ($db === false) {
                  die("ERROR: Could not connect. " . mysqli_connect_error());
                }
                $sql = "SELECT * FROM `locations`";
                $result = mysqli_query($db, $sql);
                $row = mysqli_fetch_array($result);
                foreach ($result as $row) {
                  if ($row['name'] == $location){
                    echo "<option value=\" {$row['id']} \" selected>{$row['name']}</option>";
                  }
                  echo "<option value=\" {$row['name']} \">{$row['name']}</option>";
                }
                ?>
              </select>
            </div>
          </div>

          <div class="row form-group">
            <div class="col-md-12">
              <label class="font-weight-bold" for="description">Description</label>
            </div>
            <div class="col-md-12 mb-3 mb-md-0">
              <textarea name="description" class="form-control" id="description" cols="30" rows="5"  required><?php echo "{$jd}"; ?></textarea>
            </div>
          </div>

          <div class="row form-group">
            <div class="col-md-12">
              <input type="submit" value="Update" class="btn btn-primary  py-2 px-5">
            </div>
          </div>
          <div class="row  form-group">
              <div class="col-md-12">
                <a class="btn btn-danger py-2 px-5" href="/admin/dashboard.php">Cancel</a>
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

<?php // Return to PHP.
include('templates/footer.php'); // Include the footer.
?>