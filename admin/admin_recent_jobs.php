<?php
require("../db_conn.php");
if ($db === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$sql = "SELECT * FROM jobs LIMIT 3";
if (mysqli_query($db, $sql)) :
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($result);
    foreach ($result as $row) : ?>
    <?php $shift = mysqli_fetch_array(mysqli_query($db, "SELECT * FROM `shifts` WHERE `id` = '{$row['shift']}'"));
        $category = mysqli_fetch_array(mysqli_query($db, "SELECT * FROM `categories` WHERE `id` = '{$row['category']}'")); ?>
        <?php require('./admin_job_details.php') ?>
<?php
    endforeach;
else : echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
endif;
?>