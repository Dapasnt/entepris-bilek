<?php $this->extend('pemilik'); ?>
<?php $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <center>
                <h3>Daftar Karyawan</h3>
            </center>
            <hr>
            <a href="/karyawan/tambah" class="btn btn-primary">Tambah karyawan</a>
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
                        <th scope="col">ID Karyawan</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Jabatan</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Alamat</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($karyawan as $b) :
                    ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>

                            <td><?= $b['id_karyawan']; ?></td>
                            <td><?= $b['nama']; ?></td>
                            <td><?= $b['jabatan']; ?></td>
                            <td><?= $b['jenis_kelamin']; ?></td>
                            <td><?= $b['alamat']; ?></td>
                            <td>
                                <a href="/karyawan/detail/<?= $b['id_karyawan']; ?>" class="btn btn-primary">Detail</a>
                                <a href="/karyawan/ubah/<?= $b['id_karyawan']; ?>" class="btn btn-warning">Ubah</a>
                                <form action="/karyawan/hapus/<?= $b['id_karyawan']; ?>" method="post" class="d-inline">
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