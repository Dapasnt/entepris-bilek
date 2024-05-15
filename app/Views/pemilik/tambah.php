<?php $this->extend('template'); ?>
<?php $this->section('content'); ?>
<div class="container">
    <div class="col-md-8 offset-md-2">
        <h3 class="text-center mb-4">Form Tambah Bahan Baku</h3>
        <hr>

        <form action="/bahan_baku/simpan" method="post" enctype="multipart/form-data">
            <?= csrf_field(); ?>

            <div class="mb-3 row">
                <label for="kode_bhnbaku" class="col-sm-2 col-form-label">kode_bhnbaku</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control <?= array_key_exists('kode_bhnbaku', $error) ? 'is-invalid' : ''; ?>" id="kode_bhnbaku" name="kode_bhnbaku" value="<?= set_value('kode_bhnbaku'); ?>">
                    <div id="kode_bhnbakuFeedback" class="invalid-feedback">
                        <?= array_key_exists('kode_bhnbaku', $error) ? $error['kode_bhnbaku'] : ''; ?>
                    </div>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="nama_bahan" class="col-sm-2 col-form-label">nama_bahan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama_bahan" name="nama_bahan" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="tanggal_bahan" class="col-sm-2 col-form-label">taggal_bahan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="tanggal_bahan" name="tanggal_bahan" required>
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