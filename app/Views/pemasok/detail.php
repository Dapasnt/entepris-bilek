<?php $this->extend('template'); ?>
<?php $this->section('content'); ?>
<div class="container">
    <div class="col-md-8 offset-md-2">
        <h3 class="text-center mb-4">Detail Bahan Baku</h3>
        <hr>

        <form action="/bahan_baku/index" method="post" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <div class="mb-3 row">
                <label for="nama_bahan" class="col-sm-3 col-form-label">Kode Pemasok</label>
                <label for="nama_bahan" class="col-sm-1 col-form-label"> : </label>
                <label for="nama_bahan" class="col-sm-8 col-form-label"><?= $pemasok['kode_pemasok']; ?></label>
            </div>
            <div class="mb-3 row">
                <label for="nama_barang" class="col-sm-3 col-form-label">Nama Barang</label>
                <label for="nama_barang" class="col-sm-1 col-form-label"> : </label>
                <label for="nama_barang" class="col-sm-8 col-form-label"><?= $pemasok['nama_barang']; ?></label>
            </div>

            <div class="mb-3 row">
                <label for="alamat" class="col-sm-3 col-form-label">Tangal Masuk</label>
                <label for="nama_barang" class="col-sm-1 col-form-label"> : </label>
                <label for="nama_barang" class="col-sm-8 col-form-label"><?= $pemasok['tanggal_masuk']; ?></label>
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