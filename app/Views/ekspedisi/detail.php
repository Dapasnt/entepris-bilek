<?php $this->extend('template'); ?>
<?php $this->section('content'); ?>
<div class="container">
    <div class="col-md-8 offset-md-2">
        <h3 class="text-center mb-4">Detail Ekspedisi</h3>
        <hr>

        <form action="/ekspedisi/index" method="post" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <div class="mb-3 row">
                <label for="nama_barang" class="col-sm-3 col-form-label">Kode Ekspedisi</label>
                <label for="nama_barang" class="col-sm-1 col-form-label"> : </label>
                <label for="nama_barang" class="col-sm-8 col-form-label"><?= $ekspedisi['kode_ekspedisi']; ?></label>
            </div>
            <div class="mb-3 row">
                <label for="nama_barang" class="col-sm-3 col-form-label">nama_barang</label>
                <label for="nama_barang" class="col-sm-1 col-form-label"> : </label>
                <label for="nama_barang" class="col-sm-8 col-form-label"><?= $ekspedisi['nama_barang']; ?></label>
            </div>

            <div class="mb-3 row">
                <label for="alamat" class="col-sm-3 col-form-label">alamat</label>
                <label for="nama_barang" class="col-sm-1 col-form-label"> : </label>
                <label for="nama_barang" class="col-sm-8 col-form-label"><?= $ekspedisi['alamat']; ?></label>
            </div>

            <div class="mb-3 row">
                <label for="no_hp" class="col-sm-3 col-form-label">no_hp</label>
                <label for="nama_barang" class="col-sm-1 col-form-label"> : </label>
                <label for="nama_barang" class="col-sm-8 col-form-label"><?= $ekspedisi['hp']; ?></label>
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