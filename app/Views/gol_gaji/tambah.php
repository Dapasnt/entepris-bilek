<?php $this->extend('pemilik'); ?>
<?php $this->section('content'); ?>
<div class="container">
    <div class="col-md-8 offset-md-2">
        <h3 class="text-center mb-4">Form Tambah Golongan Gaji</h3>
        <hr>

        <form action="/gaji/simpan" method="post" enctype="multipart/form-data">
            <?= csrf_field(); ?>

            <div class="mb-3 row">
                <label for="golongan" class="col-sm-2 col-form-label">Golongan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control <?= array_key_exists('golongan', $error) ? 'is-invalid' : ''; ?>" id="golongan" name="golongan" value="<?= set_value('golongan'); ?>">
                    <div id="golonganFeedback" class="invalid-feedback">
                        <?= array_key_exists('golongan', $error) ? $error['golongan'] : ''; ?>
                    </div>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="gaji" class="col-sm-2 col-form-label">Gaji</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="gaji" name="gaji" required>
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