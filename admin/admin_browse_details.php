<?php
require("../db_conn.php");
if ($db === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$sql = "SELECT * FROM jobs";
if (mysqli_query($db, $sql)) :
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($result);
    foreach ($result as $row) : ?>
        <?php $shift = mysqli_fetch_array(mysqli_query($db, "SELECT * FROM `shifts` WHERE `id` = '{$row['shift']}'"));
        $category = mysqli_fetch_array(mysqli_query($db, "SELECT * FROM `categories` WHERE `id` = '{$row['category']}'")); ?>
        <?php require('./admin_job_details.php') ?>
        <div class="job-details mb-0 bg-dark">
            <div class="p-4">
                <span class="text-info p-2 rounded border border-warning "><a class="text-warning" href="admin_edit_post.php?edit=1&jobid=<?= urldecode($row['id']) ?>&name=<?= urldecode($row['name']) ?>">Edit</a></span>
                <span class="text-info p-2 rounded border border-danger text-danger"><a href="admin_delete_job.php?jobid=<?= urldecode($row['id'])?>" class="text-danger">Delete</a></span>
            </div>
        </div>
<?php
    endforeach;
else : echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
endif;
?>