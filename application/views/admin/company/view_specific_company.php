<div class="container pt-5">
    <div class="row">
        <div class="col-md-3">
            <div class="pb-3">
                <img class="img-fluid" src="<?= base_url().$company->company_logo_path; ?>" alt="<?= $company->company_name; ?>">
            </div>
            <div class="pb-3 text-center">
                <?= $company->company_name; ?>
            </div>
            <hr/>
        </div>
        <div class="col-md-9">
            <p><strong>Overview: </strong><?= $company->company_overview; ?></p>
            <hr/>
            <p><strong>Status: </strong><?= $company->status_name; ?></p>
        </div>
    </div>
    <div class="py-2">
        <?= anchor('company/update-company/'.$company->company_slug_name, 'Update', 'class="btn btn-warning"'); ?>
        <?= anchor('company/disable-company/'.$company->company_slug_name, 'Disable', 'class="btn btn-danger"'); ?>
    </div>
</div>