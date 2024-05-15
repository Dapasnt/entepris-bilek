<?php $this->extend('pemilik'); ?>
<?php $this->section('content'); ?>
<div class="container">
    <div class="col-md-8 offset-md-2">
        <h3 class="text-center mb-4">Form Tambah Karyawan</h3>
        <hr>

        <form action="/karyawan/simpan" method="post" enctype="multipart/form-data">
            <?= csrf_field(); ?>

            <div class="mb-3 row">
                <label for="id_karyawan" class="col-sm-2 col-form-label">ID Karyawan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control <?= array_key_exists('id_karyawan', $error) ? 'is-invalid' : ''; ?>" id="id_karyawan" name="id_karyawan" value="<?= set_value('id_karyawan'); ?>">
                    <div id="id_karyawanFeedback" class="invalid-feedback">
                        <?= array_key_exists('id_karyawan', $error) ? $error['id_karyawan'] : ''; ?>
                    </div>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama" name="nama" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="jabatan" name="jabatan" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="jenis_kelamin" class="col-sm-2 col-form-label mt-2">Jenis Kelamin</label>
                <select class="form-control" aria-label="Default select example" name="jenis_kelamin">
                    <option selected>-Pilih Jenis Kelamin--</option>
                    <option value="Laki - laki">Laki - Laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>

            <div class="mb-3 row">
                <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="alamat" name="alamat" required>
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