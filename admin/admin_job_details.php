<a href="admin_job_single.php?jobid=<?php echo (urldecode($row['id'])) ?>&name=<?php echo ($row['name']) ?>" class="job-item d-block d-md-flex align-items-center fulltime">
    <div class="company-logo blank-logo text-center text-md-left pl-3">
        <img src="/src/images/company_logo_blank.png" alt="Image" class="img-fluid mx-auto">
    </div>
    <div class="job-details">
        <div class="p-3 align-self-center">
            <h3><?php echo ($row['name']) ?></h3>
            <div class="d-block d-lg-flex">
                <div class="mr-3"><span class="icon-suitcase mr-1"></span><?php echo ($row['company']) ?></div>
                <div class="mr-3"><span class="icon-room mr-1"></span><?php echo ($row['location']) ?></div>
                <!-- <div><span class="icon-money mr-1"></span> $55000 — 70000</div> -->
            </div>
        </div>
    </div>
    <div class="job-category align-self-center">
        <div class="p-3">
            <span class="text-<?= $shift['val'] ?> p-2 rounded border border-<?= $shift['val'] ?>"><?= $shift['name'] ?></span>
        </div>
    </div>
</a>