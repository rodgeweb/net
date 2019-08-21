<div class="container">
	
    <div class="header--table-header"><h2>Update Job</h2></div>
	<form action="<?php echo base_url(); ?>job/add_job" method="POST">
		<?php
		if ($job_data->num_rows() > 0) : ?>		
		
		<?php foreach ($job_data->result() as $get_job) : ?>
            <div class="form-group">
                <label for="job_name">Job Name</label>
                <input class="form-control form-control-lg" type="text" name="job_name" title="Job Name" placeholder="Job Name" value="<?php echo $get_job->job_name; ?>" />
                <?php echo "<p>".form_error("job_name")."</p>"; ?>
            </div>
            <div class="form-group">
                <label for="job_description">Job Description</label>
                <textarea class="form-control" rows="5" name="job_description" title="Job Description" placeholder="Job Description" ><?php echo $get_job->job_description; ?></textarea>
                <?php echo "<p>".form_error("job_desc")."</p>"; ?>
            </div>
            <div class="form-group">
                <label for="job_position_id">Job Position ID</label>
                <input class="form-control form-control-lg" type="number" name="job_position_id" value="<?php echo $get_job->job_position_id; ?>" />
                <?php echo "<p>".form_error("job_position_id")."</p>"; ?>
            </div>
            <div class="form-group">
                <label for="job_salary">Job Salary</label>
                <input class="form-control form-control-lg" type="number" name="job_salary" value="<?php echo $get_job->job_salary; ?>"/>
                <?php echo "<p>".form_error("job_salary")."</p>"; ?>
            </div>
            <div class="form-group">
                <label for="job_tenure_id">Job Tenure ID</label>
                <input class="form-control form-control-lg" type="number" name="job_tenure_id" value="<?php echo $get_job->job_tenure_id; ?>" />
                <?php echo "<p>".form_error("job_tenure_id")."</p>"; ?>
            </div>
            <div class="form-group">
                <label for="employer_id">Employer ID</label>
                <input class="form-control form-control-lg" type="number" name="employer_id" value="<?php echo $get_job->employer_id; ?>"/>
                <?php echo "<p>".form_error("employer_id")."</p>"; ?>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <input class="form-control form-control-lg" type="number" name="status" value="<?php echo $get_job->status; ?>"/>
                <?php echo "<p>".form_error("status")."</p>"; ?>
            </div>
            <div class="form-group">
                <input type="hidden" name="specific_job_id" value="<?php echo $get_job->id; ?>" />
                <input class="btn btn-primary" type="submit" name="update" value="Update Job" />
            </div>
		<?php
			endforeach;
		?>
		
		<?php else: ?>
			<div class="warning">There are no records</div>
		<?php endif; ?>
    </form>
</div>