<div class="container-fluid text-center py-5">
    <h2>List of Companies</h2>
</div>
<div class="container-fluid">
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
                    <?= anchor('company/update_company/'.$company->id, 'Update', 'class="btn btn-warning"'); ?>
                    <?= anchor('company/update_company_status/'.$company->id, 'Disable', 'class="btn btn-danger"'); ?>
                </td>
            </tbody>
        </tr>
        <?php endforeach; ?>
    </table>
</div>