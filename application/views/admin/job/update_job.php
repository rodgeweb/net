<div class="container">
	
    <div class="header--table-header"><h2>Update: <?= $job->job_name; ?></h2></div>
    <?php if ($job) : ?>		
	    <?= form_open_multipart('job/add_job'); ?>
		
            <div class="form-group">
                <label for="job_name">Job Name</label>
                <input class="form-control form-control-lg" type="text" name="job_name" title="Job Name" placeholder="Job Name" value="<?= $job->job_name; ?>" />
                <?= "<p>".form_error("job_name")."</p>"; ?>
            </div>
            <div class="form-group">
                <label for="job_description">Job Description</label>
                <textarea class="form-control" rows="5" name="job_description" title="Job Description" placeholder="Job Description" ><?= $job->job_description; ?></textarea>
                <?= "<p>".form_error("job_desc")."</p>"; ?>
            </div>
            <div class="form-group">
            <label for="job_category_id">Job Category</label>
                <select name="job_category_id" class="form-control form-control-lg">
                    <option value="<?= $job->job_category_id; ?>"><?= $job->category_name; ?></option>
                    <?php foreach($job_category->result() as $category) : ?>
                    <option value="<?= $category->id ?>"><?= $category->category_name ?></option>
                    <?php endforeach ?>
                </select>
                <?= "<p>".form_error("job_category_id")."</p>"; ?>
            </div>
            <div class="form-group">
                <label for="job_experience_id">Job Experience</label>
                <select name="job_experience_id" class="form-control form-control-lg">
                    <option value="<?= $job->job_experience_id; ?>"><?= $job->job_experience; ?></option>
                    <?php foreach($job_experience->result() as $experience) : ?>
                    <option value="<?= $experience->id ?>"><?= $experience->job_experience ?></option>
                    <?php endforeach ?>
                </select>
                <?= "<p>".form_error("job_experience_id")."</p>"; ?>
            </div>
            <div class="form-group">
                <label for="work_location">Work Location</label>
                <input class="form-control form-control-lg" type="text" name="work_location" title="Work Location" value="<?= $job->work_location; ?>" placeholder="Work Location" />
                <?= "<p>".form_error("work_location")."</p>"; ?>
            </div>
            <div class="form-group">
                <label for="employment_type_id">Employment Type</label>
                <select name="employment_type_id" class="form-control form-control-lg">
                    <option value="<?= $job->employment_type_id; ?>"><?= $job->employment_type; ?></option>
                    <?php foreach($employment_type->result() as $employment) : ?>
                    <option value="<?= $employment->id ?>"><?= $employment->employment_type ?></option>
                    <?php endforeach ?>
                </select>
                <?= "<p>".form_error("employment_type_id")."</p>"; ?>
            </div>
            <div class="form-group">
                <label for="employer_id">Company Name</label>
                <select name="employer_id" class="form-control form-control-lg">
                    <option value="<?= $job->employer_id; ?>"><?= $job->company_name; ?></option>
                    <?php foreach($company_name->result() as $company) : ?>
                    <option value="<?= $company->id ?>"><?= $company->company_name ?></option>
                    <?php endforeach ?>
                </select>
                <?= "<p>".form_error("employment_type_id")."</p>"; ?>
            </div>
            <div class="form-group">
                <label for="job_status_id">Job Status</label>
                <select name="job_status_id" class="form-control form-control-lg">
                    <option value="<?= $job->job_status_id; ?>"><?= $job->job_status; ?></option>
                    <?php foreach($job_status->result() as $status) : ?>
                    <option value="<?= $status->id ?>"><?= $status->job_status ?></option>
                    <?php endforeach ?>
                </select>
                <?= "<p>".form_error("job_status_id")."</p>"; ?>
            </div>
            <div class="form-group">
                <label for="job_salary">Job Salary</label>
                <select name="job_salary" class="form-control form-control-lg">
                    <option value="<?= $job->job_salary; ?>"><?= $job->job_salary; ?></option>
                    <?php foreach($job_salary->result() as $salary) : ?>
                    <option value="<?= $salary->id ?>"><?= $salary->job_salary ?></option>
                    <?php endforeach ?>
                </select>
                <?= "<p>".form_error("job_status_id")."</p>"; ?>
            </div>
            <div class="form-group">
                <input type="hidden" name="specific_job_id" value="<?= $job->id; ?>" />
                <input class="btn btn-primary" type="submit" name="update" value="Update Job" />
            </div>
		
        <?= form_close(); ?>
    <?php else: ?>
        <div class="warning">You don't have permission to access this page!</div>
    <?php endif; ?>
</div>