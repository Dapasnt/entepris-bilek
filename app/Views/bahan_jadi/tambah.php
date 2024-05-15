<?php $this->extend('template'); ?>
<?php $this->section('content'); ?>
<div class="container">
    <div class="col-md-8 offset-md-2">
        <h3 class="text-center mb-4">Form Tambah Bahan Jadi</h3>
        <hr>

        <form action="/Bahan_Jadi/simpan" method="post" enctype="multipart/form-data">
            <?= csrf_field(); ?>

            <div class="mb-3 row">
                <label for="kode_bahan_jadi" class="col-sm-2 col-form-label">kode_bahan_jadi</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control <?= array_key_exists('kode_bahan_jadi', $error) ? 'is-invalid' : ''; ?>" id="kode_bahan_jadi" name="kode_bahan_jadi" value="<?= set_value('kode_bahan_jadi'); ?>">
                    <div id="kode_bahan_jadiFeedback" class="invalid-feedback">
                        <?= array_key_exists('kode_bahan_jadi', $error) ? $error['kode_bahan_jadi'] : ''; ?>
                    </div>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="nama_produksi" class="col-sm-2 col-form-label">nama_produksi</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama_produksi" name="nama_produksi" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="tanggal_produksi" class="col-sm-2 col-form-label">tanggal_produksi</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" id="tanggal_produksi" name="tanggal_produksi" required>
                </div>
            </div>

            <div class="mb-3 row">
                <div class="col-sm-10 offset-sm-2">
                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php $this->endSection(); ?>