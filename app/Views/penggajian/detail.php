<?php $this->extend('pemilik'); ?>
<?php $this->section('content'); ?>
<div class="container">
    <div class="col-md-8 offset-md-2">
        <h3 class="text-center mb-4">Detail Penggajian</h3>
        <hr>

        <form action="/penggajian/index" method="post" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <div class="mb-3 row">
                <label for="id_gaji" class="col-sm-3 col-form-label">Kode Penggajian</label>
                <label for="id_gaji" class="col-sm-1 col-form-label"> : </label>
                <label for="id_gaji" class="col-sm-8 col-form-label"><?= $Gaji['id_gaji']; ?></label>
            </div>

            <div class="mb-3 row">
                <label for="id_karyawan" class="col-sm-3 col-form-label">ID Karyawan</label>
                <label for="id_karyawan" class="col-sm-1 col-form-label"> : </label>
                <label for="id_karyawan" class="col-sm-8 col-form-label"><?= $Gaji['id_karyawan']; ?></label>
            </div>

            <div class="mb-3 row">
                <label for="golongan" class="col-sm-3 col-form-label">Golongan</label>
                <label for="golongan" class="col-sm-1 col-form-label"> : </label>
                <label for="golongan" class="col-sm-8 col-form-label"><?= $Gaji['golongan']; ?></label>
            </div>

            <div class="mb-3 row">
                <label for="tanggal" class="col-sm-3 col-form-label">Tanggal Penggajian</label>
                <label for="tanggal" class="col-sm-1 col-form-label"> : </label>
                <label for="tanggal" class="col-sm-8 col-form-label"><?= $Gaji['tanggal']; ?></label>
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