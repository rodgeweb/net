    <div class="container-fluid text-center">
    <h2>List of Employer</h2>
</div>
<div class="container-fluid">
<div class="row">
    <div class="col-md-3">
        <form action="<?php echo base_url() ?>employer/add_employer" method="POST">
            <input type="hidden" name="employer_id" />
            <div class="form-group">
                <input class="form-control form-control-lg" type="text" name="employer_name" placeholder="Employer Name" />
            </div>
            <div class="form-group">
                <input class="form-control form-control-lg" type="text" name="employer_description" placeholder="Employer Description" />
            </div>
            <div class="form-group">
                <input class="form-control form-control-lg" type="number" name="employer_status" placeholder="Employer Status" />
            </div>
            <div class="form-group">
                <input class="form-control form-control-lg" type="number" name="agent_id" placeholder="Agent ID" />
            </div>
            <div class="form-group">
                <input class="btn btn-primary" type="submit" name="add_employer" value="Add Employer" />
            </div>
        </form>
    </div>
    <div class="col-md-9">
        <table class="table table-border">
            <tr>
                <thead>
                    <th>Employer Name</th>
                    <th>Employer Description</th>
                    <th>Employer Status</th>
                    <th>Agent ID</th>
                    <th>Action</th>
                </thead>
            </tr>
            <?php foreach ($employers->result() as $employer) : ?>
            <tr>
                <tbody>
                    <td><?php echo $employer->employer_name; ?></td>
                    <td><?php echo $employer->employer_description; ?></td>
                    <td><?php echo $employer->emp_status; ?></td>
                    <td><?php echo $employer->agent_id; ?></td>
                    <td>
                        <a class="btn btn-warning" href="employer/update_employer/<?php echo $employer->id; ?>">Update</a>
                        <a class="btn btn-danger" href="employer/update_employer_status/<?php echo $employer->id; ?>">Disable</a>
                    </td>
                </tbody>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
    
</div>
</div>