<?php $this->extend('template'); ?>
<?php $this->section('content'); ?>
<div class="container">
    <div class="col-md-8 offset-md-2">
        <h3 class="text-center mb-4">Detail Bahan Jadi</h3>
        <hr>

        <form action="/bahan_jadi/index" method="post" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <div class="mb-3 row">
                <label for="nama_barang" class="col-sm-3 col-form-label">Kode Bahan Jadi</label>
                <label for="nama_barang" class="col-sm-1 col-form-label"> : </label>
                <label for="nama_barang" class="col-sm-8 col-form-label"><?= $bahan_jadi['kode_bahanjadi']; ?></label>
            </div>
            <div class="mb-3 row">
                <label for="nama_barang" class="col-sm-3 col-form-label">Nama Produksi</label>
                <label for="nama_barang" class="col-sm-1 col-form-label"> : </label>
                <label for="nama_barang" class="col-sm-8 col-form-label"><?= $bahan_jadi['nama_produksi']; ?></label>
            </div>

            <div class="mb-3 row">
                <label for="alamat" class="col-sm-3 col-form-label">Tanggal Produksi</label>
                <label for="nama_barang" class="col-sm-1 col-form-label"> : </label>
                <label for="nama_barang" class="col-sm-8 col-form-label"><?= $bahan_jadi['tanggal_produksi']; ?></label>
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