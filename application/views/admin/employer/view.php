<div class="container-fluid text-center py-5">
    <h2>List of Companies</h2>
</div>
<div class="container-fluid">
<div class="row">
    <div class="col-md-3">
        <?php if(validation_errors()) : ?>
         <?= validation_errors(); ?>
        <?php endif; ?>
        <form action="<?php echo base_url() ?>employer/add_employer" method="POST">
            <div class="form-group">
                <label>Company Name</label>
                <input class="form-control form-control-lg" type="text" name="company_name" placeholder="Company Name" />
            </div>
            <div class="form-group">
                <label>Company Overview</label>
                <input class="form-control form-control-lg" type="text" name="company_overview" placeholder="Company Overview" />
            </div>
            <div class="form-group">
                <label>Set Company Satus</label>
                <select name="company_status" class="form-control form-control-lg">
                    <option value="">---</option>
                    <?php foreach($status->result() as $status) : ?>
                    <option value="<?= $status->id ?>"><?= $status->status_name ?></option>
                    <?php endforeach; ?>
                </select>
                <!-- <input class="form-control form-control-lg" type="number" name="employer_status" placeholder="Employer Status" /> -->
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
                    <th>Company Name</th>
                    <th>Company Overview</th>
                    <th>Company Status</th>
                    <th>Action</th>
                </thead>
            </tr>
            <?php foreach ($companies->result() as $company) : ?>
            <tr>
                <tbody>
                    <td><?php echo $company->company_name; ?></td>
                    <td><?php echo $company->company_overview; ?></td>
                    <td><?php echo $company->status_name; ?></td>
                    <td>
                        <?= anchor('employer/update_employer/'.$company->id, 'Update', 'class="btn btn-warning"'); ?>
                        <?= anchor('employer/update_employer_status/'.$company->id, 'Disable', 'class="btn btn-danger"'); ?>
                    </td>
                </tbody>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
    
</div>
</div>