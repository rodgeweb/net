<div class="container">
    <div class="text-center my-5">
    <h1><?= $title; ?></h1>
    </div>
    <?= form_open('job_position/create_position') ?>
        <input type="hidden" name="position_id" value="<?= $position->id; ?>" />
        <div class="form-group">
            <input class="form-control form-control-lg" type="text" name="job_name" placeholder="Job Name" value="<?= $position->job_name; ?>" />
        </div>
        <div class="form-group">
            <textarea  class="form-control form-control-lg" name="job_description" placeholder="Job Description"><?= $position->job_description; ?></textarea>
        </div>
        <div class="form-group">
            <input class="btn btn-primary" type="submit" name="update_position" value="Update Position" />
        </div>
    <? form_close(); ?>
</div>
            