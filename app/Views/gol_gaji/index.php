<?php $this->extend('pemilik'); ?>
<?php $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <center>
                <h3>Daftar Gaji</h3>
            </center>
            <hr>
            <a href="/gaji/tambah" class="btn btn-primary">Tambah Golongan Gaji</a>
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
                        <th scope="col">Golongan</th>
                        <th scope="col">Gaji</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($gaji as $g) :
                    ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>

                            <td><?= $g['golongan']; ?></td>
                            <td><?= $g['gaji']; ?></td>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $this->endSection(); ?>