<div class="container-fluid text-center py-5">
<h1><?= $title; ?></h1>
</div>
<div class="container">
    <?php if(validation_errors() != FALSE) : ?>
    <div class="alert alert-danger"><?= validation_errors(); ?></div>
    <?php endif; ?>
    <?= form_open('users/login'); ?>
        <div class="fom-group">
            <label>Username</label>
            <input class="form-control" type="text" name="username" placeholder="Username" />
        </div>
        <div class="fom-group">
            <label>Password</label>
            <input class="form-control" type="password" name="password" placeholder="Password " />
        </div>
        <div class="fom-group my-3 text-center">
            <input class="btn btn-primary" type="submit" name="login" value="Login" />
        </div>

    <?= form_close(); ?>
</div>