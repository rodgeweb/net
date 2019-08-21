<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <form action="<?php base_url(); ?>create_position" method="POST" >
                <div class="form-group">
                    <input class="form-control form-control-lg" type="text" name="job_name" placeholder="Job Name" />
                </div>
                <div class="form-group">
                    <textarea  class="form-control form-control-lg" name="job_description" placeholder="Job Description"></textarea>
                </div>
                <div class="form-group">
                    <input class="btn btn-primary" type="submit" name="add_position" value="Add Position" />
                </div>
            </form>
        </div>
        <div class="col-md-9">

        <table class="table table-border">
            <tr>
                <thead>
                    <th>Job Name</th>
                    <th>Job Description</th>
                    <th>Action</th>
                </thead>
            </tr>
            <?php foreach($positions->result() as $position) : ?>
            <tr>
                <tbody>
                    <td><?php echo $position->job_name; ?></td>
                    <td><?php echo $position->job_description ?></td>
                    <td><a class="btn btn-warning" href="<?php base_url(); ?>edit_position/<?php echo $position->id; ?>">Update</a></td>
                </tbody>
            </tr>
            <?php endforeach; ?>
        </table>
        </div>
        
    </div>
</div>