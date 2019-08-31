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
        </div>
        <div class="form-group">
            <label for="job_description">Job Description</label>
            <textarea class="form-control" rows="5" name="job_description" title="Job Description" placeholder="Job Description"></textarea>
        </div>
        <div class="form-group">
            <label for="job_category_id">Job Category</label>
            <select name="job_category_id" class="form-control form-control-lg">
                <option value="">---</option>
                <?php foreach($job_category->result() as $category) : ?>
                <option value="<?= $category->id ?>"><?= $category->category_name ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="form-group">
            <label for="job_experience_id">Job Experience</label>
            <select name="job_experience_id" class="form-control form-control-lg">
                <option value="">---</option>
                <?php foreach($job_experience->result() as $experience) : ?>
                <option value="<?= $experience->id ?>"><?= $experience->job_experience ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="form-group">
            <label for="work_location">Work Location</label>
            <input class="form-control form-control-lg" type="text" name="work_location" title="Work Location" placeholder="Work Location" />
        </div>
        <div class="form-group">
            <label for="employment_type_id">Employment Type</label>
            <select name="employment_type_id" class="form-control form-control-lg">
                <option value="">---</option>
                <?php foreach($employment_type->result() as $employment) : ?>
                <option value="<?= $employment->id ?>"><?= $employment->employment_type ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="form-group">
            <label for="employer_id">Company Name</label>
            <select name="employer_id" class="form-control form-control-lg">
                <option value="">---</option>
                <?php foreach($company_name->result() as $company) : ?>
                <option value="<?= $company->id ?>"><?= $company->company_name ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="form-group">
            <label for="job_status_id">Job Status</label>
            <select name="job_status_id" class="form-control form-control-lg">
                <option value="">---</option>
                <?php foreach($job_status->result() as $status) : ?>
                <option value="<?= $status->id ?>"><?= $status->job_status ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="form-group">
            <label for="job_salary">Job Salary</label>
            <select name="job_salary" class="form-control form-control-lg">
                <option value="">---</option>
                <?php foreach($job_salary->result() as $salary) : ?>
                <option value="<?= $salary->id ?>"><?= $salary->job_salary ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="form-group">
            <input class="btn btn-primary" type="submit" name="add_job" value="Add Job" />
        </div>
        
    <?= form_close(); ?>
</div>