<?php $this->extend('template'); ?>
<?php $this->section('content'); ?>
<div class="container">
    <div class="col-md-8 offset-md-2">
        <h3 class="text-center mb-4">Form Ubah Data Pemasok</h3>
        <hr>

        <form action="/pemasok/update/<?= $pemasok['kode_pemasok']; ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field(); ?>

            <div class="mb-3 row">
                <label for="kode_pemasok" class="col-sm-2 col-form-label">kode_pemasok</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control <?= array_key_exists('kode_pemasok', $error) ? 'is-invalid' : ''; ?>" id="kode_pemasok" name="kode_pemasok" autofocus value="<?= $pemasok['kode_pemasok']; ?>">
                    <div id="kode_pemasokFeedback" class="invalid-feedback">
                        <?= array_key_exists('kode_pemasok', $error) ? $error['kode_pemasok'] : ''; ?>
                    </div>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="nama_barang" class="col-sm-2 col-form-label">nama_barang</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="<?= $pemasok['nama_barang']; ?>">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="tanggal_masuk" class="col-sm-2 col-form-label">tanggal_masuk</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk" value="<?= $pemasok['tanggal_masuk']; ?>">
                </div>
            </div>


            <div class="mb-3 row">
                <div class="col-sm-10 offset-sm-2">
                    <button type="submit" class="btn btn-primary">Ubah Data</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php $this->endSection(); ?>
