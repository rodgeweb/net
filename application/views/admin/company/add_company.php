<div class="container-fluid text-center py-5">
    <h2><?= $title; ?></h2>
</div>
<div class="container">
        <?php if(validation_errors()) : ?>
         <div class="alert alert-danger"><?= validation_errors(); ?></div>
        <?php endif; ?>
        <?= form_open_multipart('company/add-company') ?>
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
            </div>
            <div class="form-group">
                <input class="btn" type="file" name="company_logo" size="20" />
            </div>
            <!-- <div class="input-group mb-3">
                <div class="custom-file">
                    <input type="file" class="custom-file-input form-control-lg" id="upload-company-logo" name="company-logo">
                    <label class="custom-file-label form-control-lg" for="upload-company-logo">Upload Company Logo</label>
                </div>
            </div> -->
            <div class="form-group">
                <input class="btn btn-primary" type="submit" name="add_company" value="Add company" />
            </div>
        <?= form_close() ?>
    </div>