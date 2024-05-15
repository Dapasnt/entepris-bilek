<?php $this->extend('template'); ?>
<?php $this->section('content'); ?>
<div class="container">
    <div class="col-md-8 offset-md-2">
        <h3 class="text-center mb-4">Form Ubah Data </h3>
        <hr>

        <form action="/ekspedisi/update/<?= $ekspedisi['kode_ekspedisi']; ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field(); ?>

            <div class="mb-3 row">
                <label for="kode_ekspedisi" class="col-sm-3 col-form-label">kode_ekspedisi</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control <?= array_key_exists('kode_ekspedisi', $error) ? 'is-invalid' : ''; ?>" id="kode_ekspedisi" name="kode_ekspedisi" autofocus value="<?= $ekspedisi['kode_ekspedisi']; ?>">
                    <div id="kode_ekspedisiFeedback" class="invalid-feedback">
                        <?= array_key_exists('kode_ekspedisi', $error) ? $error['kode_ekspedisi'] : ''; ?>
                    </div>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="nama_barang" class="col-sm-3 col-form-label">nama_barang</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="<?= $ekspedisi['nama_barang']; ?>">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="alamat" class="col-sm-3 col-form-label">alamat</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $ekspedisi['alamat']; ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="hp" class="col-sm-3 col-form-label">Nomor Hp</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="hp" name="hp" value="<?= $ekspedisi['hp']; ?>">
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