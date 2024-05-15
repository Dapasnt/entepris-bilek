<?php $this->extend('pemilik'); ?>
<?php $this->section('content'); ?>
<div class="container">
    <div class="col-md-8 offset-md-2">
        <h3 class="text-center mb-4">Form Tambah Penggajian</h3>
        <hr>

        <form action="/penggajian/simpan" method="post" enctype="multipart/form-data">
            <?= csrf_field(); ?>

            <div class="mb-3 row">
                <label for="id_gaji" class="col-sm-3 col-form-label">ID Penggajian</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control <?= array_key_exists('id_gaji', $error) ? 'is-invalid' : ''; ?>" id="id_gaji" name="id_gaji" value="<?= set_value('id_gaji'); ?>">
                    <div id="id_gajiFeedback" class="invalid-feedback">
                        <?= array_key_exists('id_gaji', $error) ? $error['id_gaji'] : ''; ?>
                    </div>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="id_karyawan" class="col-sm-3 col-form-label">ID Karyawan</label>
                <div class="col-sm-10">
                    <select class="form-control <?= array_key_exists('id_karyawan', $error) ? 'is-invalid' : ''; ?>" name="id_karyawan" id="id_karyawan" value="<?= set_value('id_karyawan'); ?>">
                    <option selected value="">-- ID Karyawan --</option>
                        <?php foreach ($karyawan as $k) : ?>
                            <option value="<?= $k['id_karyawan'] ?>"><?= $k['nama'] ?> </option>
                        <?php endforeach; ?>
                </select>
                    <div id="id_karyawanFeedback" class="invalid-feedback">
                        <?= array_key_exists('id_karyawan', $error) ? $error['id_karyawan'] : ''; ?>
                    </div>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="golongan" class="col-sm-3 col-form-label">Golongan</label>
                <select class="form-control" name="golongan" id="golongan" aria-label="Default select example">
                    <option selected>Pilih Golongan Gaji</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                </select>
            </div>

            <div class="mb-3 row">
                <label for="tanggal" class="col-sm-12 col-form-label">Tanggal Penggajian</label>
                <div class="col-sm-3">
                    <input type="date" class="form-control" id="tanggal" name="tanggal" required> 
                </div>
            </div>

            <div class="mb-3 row">
                <label for="status" class="col-sm-3 col-form-label">Status</label>
                <select class="form-control" name="status" id="status" aria-label="Default select example">
                    <option selected>Pilih Status Gaji</option>
                    <option value="Pending">Pending</option>
                    <option value="Dibayar">Dibayar</option>
                </select>
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