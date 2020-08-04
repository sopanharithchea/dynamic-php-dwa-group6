<?php
require("../db_conn.php");
if ($db === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$sql = "SELECT * FROM users";
if (mysqli_query($db, $sql)) :
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($result);
    foreach ($result as $row) : ?>

        <a href="admin_job_single.php?jobid=<?php echo (urldecode($row['id'])) ?>&name=<?php echo ($row['name']) ?>" class="job-item d-block d-md-flex align-items-center fulltime">
            <div class="company-logo blank-logo text-center text-md-left pl-3">
                <img src="/src/images/company_logo_blank.png" alt="Image" class="img-fluid mx-auto">
            </div>
            <div class="job-details">
                <div class="p-3 align-self-center">
                    <h3><?php echo ($row['first_name']) ?></h3>
                    <div class="d-block d-lg-flex">
                        <div class="mr-3"><span class="icon-envelope mr-1"></span><?php echo ($row['email']) ?></div>
                        <div class="mr-3"><span class="icon-announcement mr-1"></span>
                            <?php
                            $get_roles = "SELECT * FROM roles WHERE id = '" . $row['role_id'] . "'";
                            $roles = mysqli_query($db, $get_roles);
                            $role = mysqli_fetch_array($roles);
                            echo ($role['name'])
                            ?>
                        </div>
                        <!-- <div><span class="icon-money mr-1"></span> $55000 — 70000</div> -->
                    </div>
                </div>
            </div>
            <div class="job-category align-self-center">
                <div class="p-3">
                    <!-- <span class="text-<?= $shift['val'] ?> p-2 rounded border border-<?= $shift['val'] ?>"><?= $shift['name'] ?></span> -->
                </div>
            </div>
        </a>
        <div class="job-details mb-0 bg-dark">
            <div class="p-4">
                <span class="text-info p-2 rounded border border-warning "><a class="text-warning" href="admin_edit_user.php?edit=1&userid=<?= urldecode($row['id']) ?>">Edit</a></span>
                <span class="text-info p-2 rounded border border-danger text-danger"><a href="admin_user_delete.php?userid=<?= urldecode($row['id']) ?>" class="text-danger">Delete</a></span>
            </div>
        </div>
<?php
    endforeach;
else : echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
endif;
?>