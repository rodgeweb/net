<div class="container-fluid text-center">
    <h2>List of Employer</h2>
</div>
<div class="container">
    <form action="<?php echo base_url(); ?>employer/add_employer" method="POST">
        <?php 
        foreach($specific_employer->result() as $employer) :
        ?>
            <input type="hidden" name="employer_id"  value="<?php echo $employer->id; ?>" />
            <div class="form-group">
                <input class="form-control form-control-lg" type="text" name="employer_name" value="<?php echo $employer->employer_name ?>" />
            </div>
            <div class="form-group">
                <input class="form-control form-control-lg" type="text" name="employer_description" value="<?php echo $employer->employer_description ?>" />
            </div>
            <div class="form-group">
                <input class="form-control form-control-lg" type="number" name="employer_status" value="<?php echo $employer->emp_status ?>" />
            </div>
            <div class="form-group">
                <input class="form-control form-control-lg" type="number" name="agent_id" value="<?php echo $employer->agent_id ?>" />
            </div>
            <div class="form-group">
                <input class="btn btn-primary" type="submit" name="update_employer" value="Update Employer" />
            </div>
        <?php endforeach; ?>
    </form>    
</div>
</div>