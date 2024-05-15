<?php $this->extend('template'); ?>
<?php $this->section('content'); ?>
<div class="container">
    <div class="col-md-8 offset-md-2">
        <h3 class="text-center mb-4">Form Ubah Data Bahan Jadi</h3>
        <hr>

        <form action="/Bahan_Jadi/update/<?= $bahan_jadi['kode_bahanjadi']; ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field(); ?>

            <div class="mb-3 row">
                <label for="kode_bahanjadi" class="col-sm-2 col-form-label">kode_bahan_jadi</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control <?= array_key_exists('kode_bahanjadi', $error) ? 'is-invalid' : ''; ?>" id="kode_bahanjadi" name="kode_bahanjadi" autofocus value="<?= $bahan_jadi['kode_bahanjadi']; ?>">
                    <div id="kode_bahan_jadiFeedback" class="invalid-feedback">
                        <?= array_key_exists('kode_bahanjadi', $error) ? $error['kode_bahanjadi'] : ''; ?>
                    </div>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="nama_produksi" class="col-sm-2 col-form-label">nama_produksi</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama_produksi" name="nama_produksi" value="<?= $bahan_jadi['nama_produksi']; ?>">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="tanggal_produksi" class="col-sm-2 col-form-label">tanggal_produksi</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" id="tanggal_produksi" name="tanggal_produksi" value="<?= $bahan_jadi['tanggal_produksi']; ?>">
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