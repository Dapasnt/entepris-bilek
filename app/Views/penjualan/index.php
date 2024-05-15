<?php $this->extend('template'); ?>
<?php $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <center>
                <h3>Daftar Bahan Baku</h3>
            </center>
            <hr>
            <a href="/bahan_baku/tambah" class="btn btn-primary">Tambah Bahan Baku</a>
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
                        <th scope="col">Kode Bahan Baku</th>
                        <th scope="col">Nama Bahan</th>
                        <th scope="col">Tanggal Bahan</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($bahan_baku as $b) :
                    ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>

                            <td><?= $b['kode_bhnbaku']; ?></td>
                            <td><?= $b['nama_bahan']; ?></td>
                            <td><?= $b['tanggal_bahan']; ?></td>
                            <td>
                                <a href="/bahan_baku/detail/<?= $b['kode_bhnbaku']; ?>" class="btn btn-primary">Detail</a>
                                <a href="/bahan_baku/ubah/<?= $b['kode_bhnbaku']; ?>" class="btn btn-warning">Ubah</a>
                                <form action="/bahan_baku/hapus/<?= $b['kode_bhnbaku']; ?>" method="post" class="d-inline">
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