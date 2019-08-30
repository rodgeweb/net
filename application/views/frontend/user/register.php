<div class="container-fluid text-center py-5">
<h1><?= $title; ?></h1>
</div>
<div class="container">
    <?php if(validation_errors() != FALSE) : ?>
    <div class="alert alert-danger">
        <?= validation_errors(); ?>
    </div>
    <?php endif; ?>
    <?= form_open_multipart('users/register'); ?>
    <div class="form-group">
        <label>Username</label>
        <input class="form-control" type="text" name="username" placeholder="Username" />
    </div>
    <div class="form-group">
        <label>Password</label>
        <input class="form-control" type="password" name="password" placeholder="Password" />
    </div>
    <div class="form-group">
        <label>Confirm Password</label>
        <input class="form-control" type="password" name="confirm-password" placeholder="Confirm Password" />
    </div>
    <div class="form-group">
        <label>First Name</label>
        <input class="form-control" type="text" name="first_name" placeholder="First Name" />
    </div>
    <div class="form-group">
        <label>Last Name</label>
        <input class="form-control" type="text" name="last_name" placeholder="Last Name" />
    </div>
    <div class="form-group">
        <label>Middle Name</label>
        <input class="form-control" type="text" name="middle_name" placeholder="Middle Name" />
    </div>
    <div class="form-group">
        <label>Email</label>
        <input class="form-control" type="email" name="email" placeholder="Email" />
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="register" value="Sign Up" />
    </div>
    <?= form_close(); ?>
</div>