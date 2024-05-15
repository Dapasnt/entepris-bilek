<?php $this->extend('pemilik'); ?>
<?php $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <center>
                <h3>Daftar Penggajian</h3>
            </center>
            <hr>
            <a href="/penggajian/tambah" class="btn btn-primary">Tambah Data Penggajian</a>
            <br>
            <br>
            <?php if (session()->getFlashdata('pesan')) :  ?>
                <br>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            <?php endif; ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">ID Gaji</th>
                        <th scope="col">ID Karyawan</th>
                        <th scope="col">Golongan</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($gaji as $b) :
                    ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>

                            <td><?= $b['id_gaji']; ?></td>
                            <td><?= $b['id_karyawan']; ?></td>
                            <td><?= $b['golongan']; ?></td>
                            <td><?= $b['tanggal']; ?></td>
                            <td><?= $b['status']; ?></td>
                            <td>
                                <a href="/penggajian/detail/<?= $b['id_gaji']; ?>" class="btn btn-primary">Detail</a>
                                <a href="/penggajian/ubah/<?= $b['id_gaji']; ?>" class="btn btn-warning">Ubah</a>
                                <form action="/penggajian/hapus/<?= $b['id_gaji']; ?>" method="post" class="d-inline">
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
            <a href="/Penggajian/cetak/" class="btn btn-success">Cetak Laporan Penggajian</a>
        </div>
    </div>
</div>
<?php $this->endSection(); ?>