
    <?php
    require("../db_conn.php");
    if ($db === false) {
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
    $sql = "SELECT * FROM users";
    if (mysqli_query($db, $sql)) {
        $result = mysqli_query($db, $sql);
        $row = mysqli_fetch_array($result);
        foreach ($result as $row) {
            echo '
            <a href="#" class="job-item d-block d-lg-flex align-items-center fulltime">
            <div class="job-details">
                <div class="p-3 align-self-center">
                    <h3>' . $row['first_name'] . '</h3>
                    <h3>' . $row['last_name'] . '</h3>
                    <div class="d-block d-lg-flex">
                        <div class="mr-3"><span class="icon-user mr-1"></span>' . $row['email'] .
                '</div>
                        <div class="mr-3"><span class="icon-balance-scale mr-1"></span>' . $row['role_id'] .
                '</div>
                </div>
            </div>
        </a>
        ';
        echo '
        <div class="job-details bg-dark">
            <div class="p-4">
                <span class="text-info p-2 rounded border border-warning "><a class="text-warning" href="admin_edit_user.php?edit=1&userid=' . urldecode($row['id']) . '">Edit</a></span>
                <span class="text-info p-2 rounded border border-danger text-danger"><a href="delete_user.php?userid=' . urldecode($row['id']) . '" class="text-danger">Delete</a></span>
            </div>
        </div>
        <div class="row">
            <br>
        </div>
        ';
        }
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
    }
    ?>