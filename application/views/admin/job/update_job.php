<div class="container">
	
    <div class="header--table-header"><h2>Update: <?= $job->job_name; ?></h2></div>
    <?php if ($job) : ?>		
	    <?= form_open_multipart('job/add_job'); ?>
		
            <div class="form-group">
                <label for="job_name">Job Name</label>
                <input class="form-control form-control-lg" type="text" name="job_name" title="Job Name" placeholder="Job Name" value="<?php echo $job->job_name; ?>" />
                <?php echo "<p>".form_error("job_name")."</p>"; ?>
            </div>
            <div class="form-group">
                <label for="job_description">Job Description</label>
                <textarea class="form-control" rows="5" name="job_description" title="Job Description" placeholder="Job Description" ><?php echo $job->job_description; ?></textarea>
                <?php echo "<p>".form_error("job_desc")."</p>"; ?>
            </div>
            <div class="form-group">
                <label for="job_position_id">Job Position ID</label>
                <input class="form-control form-control-lg" type="number" name="job_position_id" value="<?php echo $job->job_position_id; ?>" />
                <?php echo "<p>".form_error("job_position_id")."</p>"; ?>
            </div>
            <div class="form-group">
                <label for="job_salary">Job Salary</label>
                <input class="form-control form-control-lg" type="number" name="job_salary" value="<?php echo $job->job_salary; ?>"/>
                <?php echo "<p>".form_error("job_salary")."</p>"; ?>
            </div>
            <div class="form-group">
                <label for="job_tenure_id">Job Tenure ID</label>
                <input class="form-control form-control-lg" type="number" name="job_tenure_id" value="<?php echo $job->job_tenure_id; ?>" />
                <?php echo "<p>".form_error("job_tenure_id")."</p>"; ?>
            </div>
            <div class="form-group">
                <label for="employer_id">Employer ID</label>
                <input class="form-control form-control-lg" type="number" name="employer_id" value="<?php echo $job->employer_id; ?>"/>
                <?php echo "<p>".form_error("employer_id")."</p>"; ?>
            </div>
            <div class="form-group">
                <input type="hidden" name="specific_job_id" value="<?php echo $job->id; ?>" />
                <input class="btn btn-primary" type="submit" name="update" value="Update Job" />
            </div>
		
        <?= form_close(); ?>
    <?php else: ?>
        <div class="warning">You don't have permission to access this page!</div>
    <?php endif; ?>
</div>