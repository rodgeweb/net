<div class="container-fluid text-center py-5">
    <h2>Update: <?php echo $company->company_name ?></h2>
</div>
<div class="container">
        <?php if(validation_errors()) : ?>
        <div class="alert alert-danger">
        <?= validation_errors(); ?>
        </div>
        <?php endif; ?>
        <?= form_open_multipart('employer/add_employer') ?>
            <input type="hidden" name="company_id"  value="<?php echo $company->id; ?>" />
            <div class="form-group">
                <label>Company Name</label>
                <input class="form-control form-control-lg" type="text" name="company_name" value="<?php echo $company->company_name ?>" />
            </div>
            <div class="form-group">
                <label>Company Overview</label>
                <input class="form-control form-control-lg" type="text" name="company_overview" value="<?php echo $company->company_overview ?>" />
            </div>
            <div class="form-group">
                <label>Set Company Satus</label>
                <select name="company_status" class="form-control form-control-lg">
                    <option value="<?= $company->company_status ?>"><?= $company->status_name ?></option>
                    <?php foreach($status->result() as $status) : ?>
                    <option value="<?= $status->id ?>"><?= $status->status_name ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <input class="btn btn-primary" type="submit" name="update_company" value="Update company" />
            </div>
        <?= form_close(); ?>
    </form>    
</div>
</div>