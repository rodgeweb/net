<div class="container">
    <div class="col-md-3">
        <form action="<?php base_url(); ?>job_position/create_position" method="POST" >
            <?php foreach($positions->result() as $position) : ?>
            <input type="hidden" name="position_id" value="<?php $position->id; ?>" />
            <div class="form-group">
                <input class="form-control form-control-lg" type="text" name="job_name" placeholder="Job Name" value="<?php $position->id; ?>" />
            </div>
            <div class="form-group">
                <textarea  class="form-control form-control-lg" name="job_description" placeholder="Job Description"><?php $position->id; ?></textarea>
            </div>
            <div class="form-group">
                <input class="btn btn-primary" type="submit" name="add_position" value="Add Position" />
            </div>
            <?php endforeach; ?>
        </form>
    </div>
</div>
            