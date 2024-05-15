<?php $this->extend('template'); ?>
<?php $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <center>
                <h3>Daftar Ekspedisi</h3>
            </center>
            <hr>
            <a href="/ekspedisi/tambah" class="btn btn-primary">Tambah Ekspedisi</a>
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
                        <th scope="col">Kode Ekspedisi</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">No Hp</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($ekspedisi as $b) :
                    ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>

                            <td><?= $b['kode_ekspedisi']; ?></td>
                            <td><?= $b['nama_barang']; ?></td>
                            <td><?= $b['alamat']; ?></td>
                            <td><?= $b['hp']; ?></td>
                            <td>
                                <a href="/ekspedisi/detail/<?= $b['kode_ekspedisi']; ?>" class="btn btn-primary">Detail</a>
                                <a href="/ekspedisi/ubah/<?= $b['kode_ekspedisi']; ?>" class="btn btn-warning">Ubah</a>
                                <form action="/ekspedisi/hapus/<?= $b['kode_ekspedisi']; ?>" method="post" class="d-inline">
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