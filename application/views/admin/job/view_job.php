<div class="container-fluid text-center my-5">
<h2><?= $title; ?></h2>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="pb-3">
                <?= $job->job_description; ?>
            </div>
            <hr/>
            <div class="pb-3">
                <p><strong>Job Location: </strong><?= $job->work_location; ?></p>
            </div>
        </div>
        <div class="col-md-3">
            <p><strong>Job Category: </strong><?= $job->category_name; ?></p>
            <hr/>
            <p><strong>Job Experience: </strong><?= $job->job_experience; ?></p>
            <hr/>
            <p><strong>Job Salary: </strong><?= $job->job_salary; ?></p>
            <hr/>
            <p><strong>Employment Type: </strong><?= $job->employment_type; ?></p>
            <hr/>
            <p><strong>Company: </strong><?= $job->company_name; ?></p>
        </div>
    </div>
    <div class="py-2">
        <?= anchor('job/update-job/'.$job->id, 'Edit', 'class="btn btn-warning"'); ?>
        <?= anchor('job/delete/'.$job->id, 'Disable', 'class="btn btn-danger"'); ?>
    </div>
</div>