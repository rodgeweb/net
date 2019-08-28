<div class="container-fluid text-center my-5">
    <h2><?= $title; ?></h2>
</div>
<div class="container">
<?php if(validation_errors() != FALSE) : ?>
<div class="alert alert-danger" role="alert"><?= validation_errors(); ?></div>
<?php endif; ?>
    <?= form_open_multipart('job/add_job'); ?>
        <div class="form-group">
            <label for="job_name">Job Name</label>
            <input class="form-control form-control-lg" type="text" name="job_name" title="Job Name" placeholder="Job Name" />
            <?php echo "<p>".form_error("job_name")."</p>"; ?>
        </div>
        <div class="form-group">
            <label for="job_description">Job Description</label>
            <textarea class="form-control" rows="5" name="job_description" title="Job Description" placeholder="Job Description"></textarea>
            <?php echo "<p>".form_error("job_desc")."</p>"; ?>
        </div>
        <div class="form-group">
            <label for="job_position_id">Job Position ID</label>
            <input class="form-control form-control-lg" type="number" name="job_position_id" />
            <?php echo "<p>".form_error("job_position_id")."</p>"; ?>
        </div>
        <div class="form-group">
            <label for="job_salary">Job Salary</label>
            <input class="form-control form-control-lg" type="number" name="job_salary"/>
            <?php echo "<p>".form_error("job_salary")."</p>"; ?>
        </div>
        <div class="form-group">
            <label for="job_tenure_id">Job Tenure ID</label>
            <input class="form-control form-control-lg" type="number" name="job_tenure_id" />
            <?php echo "<p>".form_error("job_tenure_id")."</p>"; ?>
        </div>
        <div class="form-group">
            <label for="employer_id">Employer ID</label>
            <input class="form-control form-control-lg" type="number" name="employer_id"/>
            <?php echo "<p>".form_error("employer_id")."</p>"; ?>
        </div>
        <div class="form-group">
            <input class="btn btn-primary" type="submit" name="add_job" value="Add Job" />
        </div>
        
    <?= form_close(); ?>
</div>