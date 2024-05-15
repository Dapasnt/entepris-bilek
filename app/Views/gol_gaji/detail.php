<?php $this->extend('pemilik'); ?>
<?php $this->section('content'); ?>
<div class="container">
    <div class="col-md-8 offset-md-2">
        <h3 class="text-center mb-4">Detail User</h3>
        <hr>

        <form action="/user/index" method="post" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <div class="mb-3 row">
                <label for="kode_user" class="col-sm-3 col-form-label">Kode User</label>
                <label for="kode_user" class="col-sm-1 col-form-label"> : </label>
                <label for="kode_user" class="col-sm-8 col-form-label"><?= $user['kode_user']; ?></label>
            </div>

            <div class="mb-3 row">
                <label for="username" class="col-sm-3 col-form-label">Username</label>
                <label for="username" class="col-sm-1 col-form-label"> : </label>
                <label for="username" class="col-sm-8 col-form-label"><?= $user['username']; ?></label>
            </div>

            <div class="mb-3 row">
                <label for="password" class="col-sm-3 col-form-label">Password</label>
                <label for="password" class="col-sm-1 col-form-label"> : </label>
                <label for="password" class="col-sm-8 col-form-label"><?= $user['password']; ?></label>
            </div>

            <div class="mb-3 row">
                <label for="role" class="col-sm-3 col-form-label">Role</label>
                <label for="role" class="col-sm-1 col-form-label"> : </label>
                <label for="role" class="col-sm-8 col-form-label"><?= $user['role']; ?></label>
            </div>

            <div class="mb-3 row">
                <div class="col-sm-8 offset-sm-4">
                    <button type="submit" class="btn btn-primary">Kembali</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php $this->endSection(); ?>