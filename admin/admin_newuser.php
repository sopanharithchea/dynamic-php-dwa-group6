<?php
//Start session
session_start();
$title = "Add User";
include("templates/admin_header.php");
require('../db_conn.php');
if ($_SESSION['admin'] == null || $_SESSION['admin'] != 1) {
  die(header('location: /admin/index.php'));
  exit;
}
?>

<div class="unit-5 overlay" style="background-image: url('/src/images/hero_1.jpg');">
  <div class="container text-center">
    <h2 class="mb-0"><?= $title ?></h2>
    <p class="mb-0 unit-6"><a href="index.php">Home</a> <span class="sep">></span> <span><?= $title ?></span></p>
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
              echo '<h2 class="mb-0 text-success">User was created!</h2>';
              break;

            default:
              echo '<h2 class="mb-0 text-danger">There was an error, please try again later</h2>';
              break;
          }
        }
        ?>
        <form action="admin_user_add.php" method="POST" class="p-5 bg-white">
          <div class="row form-group">
            <div class="col-md-12 mb-3 mb-md-0">
              <h3 class="font-weight-bold"><?= $title ?></h3>
              <br>
              <label class="font-weight-bold" for="first_name">First Name</label>
              <input type="text" name="first_name" class="form-control"  required>
              <label class="font-weight-bold" for="last_name">Last Name</label>
              <input type="text" name="last_name" class="form-control"  required>
            </div>
          </div>
          <div class="row form-group mb-5">
            <div class="col-md-12 mb-3 mb-md-0">
              <label class="font-weight-bold" for="email">Email</label>
              <input type="email" name="email" class="form-control" placeholder="jeff.wood@jobfinder.com" required">
            </div>
            <div class="col-md-12 mb-3 mb-md-0">
              <label class="font-weight-bold" for="pass1">Password</label>
              <input type="password" name="pass1" class="form-control" required>
            </div>
            <div class="col-md-12 mb-3 mb-md-0">
              <label class="font-weight-bold" for="pass2">Confirm Password</label>
              <input type="password" name="pass2" class="form-control" required>
            </div>
            <div class="col-md-12 mb-3 mb-md-0">
              <label class="font-weight-bold" for="pass2">Select Role</label>
              <select type="text" name="role" class="form-control" required>
                <?php
                $sql = "SELECT * FROM `roles`";
                $result = mysqli_query($db, $sql);
                $row = mysqli_fetch_array($result);
                foreach ($result as $row) {
                  echo "<option value=\" {$row['id']} \">{$row['name']}</option>";
                }
                ?>
              </select>

            </div>
          </div>
          <div class="row form-group">
            <div class="col-md-12">
              <input type="submit" value="Create User" class="btn btn-primary  py-2 px-5">
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