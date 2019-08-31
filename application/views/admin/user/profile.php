<div class="container-fluid text-center py-5">
<h1><?= $title; ?></h1>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <p>Profile Image</p>
            <p><strong>Name: </strong><?= $user->first_name.' '.$user->middle_name.' '.$user->last_name; ?></p>
            <p><strong>Email: </strong><?= $user->email; ?></p>
        </div>
        <div class="col-md-9">
            <p>Job Role/ Position</p>
            <div class="py-5">
                <?= anchor('users/update-profile', 'Update Profile', 'class="btn btn-primary"'); ?>
            </div>
        </div>
    </div>
</div>