<?php $this->extend('pemilik'); ?>
<?php $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <center>
                <h3>Daftar User</h3>
            </center>
            <hr>
            <a href="/user/tambah" class="btn btn-primary">Tambah User</a>
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
                        <th scope="col">Kode User</th>
                        <th scope="col">Username</th>
                        <th scope="col">Password</th>
                        <th scope="col">Role</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($user as $b) :
                    ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>

                            <td><?= $b['kode_user']; ?></td>
                            <td><?= $b['username']; ?></td>
                            <td><?= $b['password']; ?></td>
                            <td><?= $b['role']; ?></td>
                            <td>
                                <a href="/user/detail/<?= $b['kode_user']; ?>" class="btn btn-primary">Detail</a>
                                <a href="/user/ubah/<?= $b['kode_user']; ?>" class="btn btn-warning">Ubah</a>
                                <form action="/user/hapus/<?= $b['kode_user']; ?>" method="post" class="d-inline">
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