
    <?php
    require("../db_conn.php");
    if ($db === false) {
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
    $sql = "SELECT * FROM jobs LIMIT 3";
    if (mysqli_query($db, $sql)) {
        $result = mysqli_query($db, $sql);
        $row = mysqli_fetch_array($result);
        $shift = mysqli_fetch_array(mysqli_query($db, "SELECT * FROM `shifts` WHERE `id` = '{$row['shift']}'"));
        $category = mysqli_fetch_array(mysqli_query($db, "SELECT * FROM `categories` WHERE `id` = '{$row['category']}'"));
        foreach ($result as $row) {
            echo '
            <a href="admin_job_single.php?jobid=' . urldecode($row['id']) . '&name=' . $row['name'] . '" class="job-item d-block d-lg-flex align-items-center fulltime">
            <div class="company-logo blank-logo text-center text-md-left pl-3">
                <img src="../src/images/company_logo_blank.png" alt="Image" class="img-fluid mx-auto">
            </div>
            <div class="job-details h-100">
                <div class="p-3 align-self-center">
                    <h3>' . $row['name'] . '</h3>
                    <div class="d-block d-lg-flex">
                        <div class="mr-3"><span class="icon-suitcase mr-1"></span>' . $row['company'] .
                '</div>
                        <div class="mr-3"><span class="icon-room mr-1"></span>' . $row['location'] .
                '</div>
                    <div><span class="icon-money mr-1"></span> $55000 to $70000 </div>
                    </div>
                </div>
            </div>
            <div class="job-category align-self-center">
                <div class="p-3">
                    <span class="text-info p-2 rounded border border-info">' . $shift['name'] .
                '</span>
                </div>
            </div>
        </a>
        ';
        echo '
        <div class="job-details mb-0 bg-dark">
            <div class="p-4">
                <span class="text-info p-2 rounded border border-warning "><a class="text-warning" href="admin_edit_post.php?edit=1&jobid=' . urldecode($row['id']) . '&name=' . urldecode($row['name']) . '">Edit</a></span>
                <span class="text-info p-2 rounded border border-danger text-danger"><a href="delete_job_single.php?jobid=' . urldecode($row['id']) . '&name=' . urldecode($row['name']) . '" class="text-danger">Delete</a></span>
            </div>
        </div>
        ';
        }
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
    }
    ?>