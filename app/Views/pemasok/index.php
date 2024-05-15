<?php $this->extend('template'); ?>
<?php $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <center>
                <h3>Daftar Pemasok</h3>
            </center>
            <hr>
            <a href="/pemasok/tambah" class="btn btn-primary">Tambah Pemasok</a>

            <?php if (session()->getFlashdata('pesan')) :  ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            <?php endif; ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kode Pemasok</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Tanggal Masuk</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($pemasok as $b) :
                    ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>

                            <td><?= $b['kode_pemasok']; ?></td>
                            <td><?= $b['nama_barang']; ?></td>
                            <td><?= $b['tanggal_masuk']; ?></td>
                            <td>
                                <a href="pemasok/detail/<?= $b['kode_pemasok']; ?>" class="btn btn-primary">Detail</a>
                                <a href="/pemasok/ubah/<?= $b['kode_pemasok']; ?>" class="btn btn-warning">Ubah</a>
                                <form action="/pemasok/hapus/<?= $b['kode_pemasok']; ?>" method="post" class="d-inline">
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