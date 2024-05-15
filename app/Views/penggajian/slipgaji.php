<center><h3>LAPORAN PENGGAJIAN</h3>
<h4>BERKAH TEKSTIL</h4>
<table border="1px" cellspacing="0" cellpadding="13" align="center">
    <tr text-align="center">
        <th>KODE GAJI</th>
        <th>KARYAWAN</th>
        <th>GOLONGAN</th>
        <th>GAJI POKOK</th>
        <th>Status</th>
        <th>TANGGAL PENGGAJIAN</th>
    </tr>
    <?php foreach ($gaji as $d) :?>
    <tr>
        <td align="center"><?= $d['id_gaji']?></td>
        <td><?=$d['id_karyawan'].' -- '.$d['nama']?></td>
        <td align="center"><?= $d['golongan']?></td>
        <td align="center"><?= $d['gaji']?></td>
        <td align="center"><?= $d['status']?></td>
        <td align="center"><?= $d['tanggal']?></td>
    </tr>
    <?php endforeach; ?>
</table>