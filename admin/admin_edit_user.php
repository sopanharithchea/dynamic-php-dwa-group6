<?php
//Start session
session_start();
$title = "Edit User";
include("templates/admin_header.php");
require('../db_conn.php');
if ($db === false) {
  die("ERROR: Could not connect. " . mysqli_connect_error());
} elseif ($_GET['userid'] == null || $_GET['userid'] == 0) {
  die(header('location: /admin/index.php'));
  exit;
}
$sql = "SELECT * FROM `users` WHERE `id` = '{$_GET['userid']}' LIMIT 1";
$result = mysqli_query($db, $sql);
$row = mysqli_fetch_array($result);
$role_sql = "SELECT * FROM `roles`";
$get_roles = mysqli_query($db, $role_sql);
$roles = mysqli_fetch_array($get_roles);
$role_id = $row['role_id'];
echo($role_id);
$_SESSION['x_userid'] = $_GET['userid'];
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
              echo '<h2 class="mb-0 text-success">User was updated!</h2>';
              break;

            default:
              echo '<h2 class="mb-0 text-danger">There was an error, please try again later</h2>';
              break;
          }
        }
        ?>
        <form action="admin_user_update.php" method="POST" class="p-5 bg-white">
          <div class="row form-group">
            <div class="col-md-12 mb-3 mb-md-0">
              <h3 class="font-weight-bold"><?= $title ?></h3>
              <br>
              <label class="font-weight-bold" for="first_name">First Name</label>
              <input type="text" name="first_name" class="form-control" value="<?= $row['first_name'] ?>" required>
              <label class="font-weight-bold" for="last_name">Last Name</label>
              <input type="text" name="last_name" class="form-control" value="<?= $row['last_name'] ?>" required>
            </div>
          </div>
          <div class="row form-group mb-5">
            <div class="col-md-12 mb-3 mb-md-0">
              <label class="font-weight-bold" for="email">Email</label>
              <input type="email" name="email" class="form-control" placeholder="jeff.wood@jobfinder.com" required value="<?= $row['email'] ?>">
            </div>
            <div class="col-md-12 mb-3 mb-md-0">
              <label class="font-weight-bold" for="pass1">Password</label>
              <input type="text" name="pass1" class="form-control" value="<?= $row['password'] ?>" required>
            </div>
            <div class="col-md-12 mb-3 mb-md-0">
              <label class="font-weight-bold" for="pass2">New Password</label>
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
                  if ($row['id'] == $role_id) {
                    echo "<option value=\" {$row['id']} \" selected>{$row['name']}</option>";
                  }
                  echo "<option value=\" {$row['id']} \">{$row['name']}</option>";
                }
                ?>
              </select>

            </div>
          </div>
          <div class="row form-group">
            <div class="col-md-12">
              <input type="submit" value="Update User" class="btn btn-primary  py-2 px-5">
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