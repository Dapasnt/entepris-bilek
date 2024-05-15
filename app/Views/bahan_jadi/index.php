<?php $this->extend('template'); ?>
<?php $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <center>
                <h3>Daftar Bahan Jadi</h3>
            </center>
            <hr>
            <a href="/bahan_jadi/tambah" class="btn btn-primary">Tambah Bahan Jadi</a>

            <?php if (session()->getFlashdata('pesan')) :  ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            <?php endif; ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kode Bahan Jadi</th>
                        <th scope="col">Nama Produksi</th>
                        <th scope="col">Tanggal produksi</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($bahan_jadi as $b) :
                    ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>

                            <td><?= $b['kode_bahanjadi']; ?></td>
                            <td><?= $b['nama_produksi']; ?></td>
                            <td><?= $b['tanggal_produksi']; ?></td>
                            <td>
                                <a href="/bahan_jadi/detail/<?= $b['kode_bahanjadi']; ?>" class="btn btn-primary">Detail</a>
                                <a href="/bahan_jadi/ubah/<?= $b['kode_bahanjadi']; ?>" class="btn btn-warning">Ubah</a>
                                <form action="/bahan_jadi/hapus/<?= $b['kode_bahanjadi']; ?>" method="post" class="d-inline">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin Mau Menghapus Data Ini !!!')">Hapus</button>
                                </form>
                            </td>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $this->endSection(); ?>