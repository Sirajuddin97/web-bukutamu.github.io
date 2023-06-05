<?php
include "koneksi.php";
//persiapan excel

header("content-type: application/vnd-ms-excel");
header("content-Disposition: attachment; filename=export Excel Data Pengunjung.xls");
header("pragma: no-cache");
header("expires:0");

?>

<table border="1">
    <thead>
        <tr>
            <th colspan="6"> Rekapitulasi Data Pengunjung></th>
        </tr>
        <tr>
            <th>No.</th>
            <th>Tanggal</th>
            <th>Nama Pengunjung</th>
            <th>Alamat</th>
            <th>Tujuan</th>
            <th>No.Hp</th>
        </tr>
    </thead>
    <tbody>
        <?php

        $tgl1 = $_POST['tanggala'];
        $tgl2 = $_POST['tanggalb'];

        $tampil = mysqli_query($koneksi, "SELECT * FROM tb_tamu where tanggal BETWEEN '$tgl1' and '$tgl2' order by tanggal asc");
        $no = 1;
        while ($data = mysqli_fetch_array($tampil)) {
        ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $data['tanggal'] ?></td>
                <td><?= $data['nama'] ?></td>
                <td><?= $data['alamat'] ?></td>
                <td><?= $data['tujuan'] ?></td>
                <td><?= $data['nope'] ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>