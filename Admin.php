< <?php include "header.php"; ?> <?php

                                    //pengujian jika tombol simpan di klik
                                    if (isset($_POST['bsimpan'])) {
                                        $tgl = date('Y-m-d');

                                        $nama = htmlspecialchars($_POST['nama'], ENT_QUOTES);
                                        $alamat = htmlspecialchars($_POST['alamat'], ENT_QUOTES);
                                        $tujuan = htmlspecialchars($_POST['tujuan'], ENT_QUOTES);
                                        $nope = htmlspecialchars($_POST['nope'], ENT_QUOTES);
                                        //persiapan query simpan data

                                        $simpan = mysqli_query($koneksi, "INSERT INTO tb_tamu VALUES ('','$tgl', '$nama', '$alamat', '$tujuan', '$nope') ");

                                        //uji jika simpan data sukses
                                        if ($simpan) {
                                            echo "<script>alert('Simpan data sukses, terimakasih..!');
            document.location='?'</script>";
                                        } else {
                                            echo "<script>alert('Simpan data GAGAL..);
            document.location='?'</script>";
                                        }
                                    }
                                    ?> <div class="head text-center">
    <img src="assets/img/kominfo.png" style="width: 120px; height: 120px; border-radius:30%;">
    <h2 class="text-white">SYSTEM INFORMASI BUKU TAMU <br> Dinas Komunikasi Dan Informatika Kota Makassar <br> (KOMINFO MAKASSAR)</h2>
    </div>

    <div class="row mt-2">
        <div class="col-lg-7 mb-3">
            <div class="card shadow bg-gradient-success">
                <div class="card=body">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-white mb-4">Identitas Pengunjung</h1>
                        </div>
                        <form class="user" method="POST" action="">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" name="nama" placeholder="Nama" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control 
                                    form-control-user" name="alamat" placeholder="Alamat" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control 
                                    form-control-user" name="tujuan" placeholder="Tujuan" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control 
                                    form-control-user" name="nope" placeholder="No.Hp" required>
                            </div>
                            <button type="submit" name="bsimpan" class="btn btn-primary btn-user btn-block">Simpan Data</button>
                        </form>
                        <hr>
                        <div class="text-center text-white">
                            <a class="small text-white" href="#">By. Siraj, Taufik | 2021 - <?= date('Y') ?></a>
                        </div>
                        <div class="text-center">
                            <a class="small text-white" href="login.html">Already have an account? Login!</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-lg-5 mb-3">
            <div class="card shadow bg-gradient-success">
                <div class="card=body">
                    <div class="text-center">
                        <h1 class="h4 text-white mb-4"><br>Statistik Pengunjung</h1>
                    </div>
                    <?php
                    //deklarasi tanggal
                    $tgl_sekarang = date('Y-m-d');

                    //menampilkan tanggal kemaren
                    $kemarin = date('Y-m-d', strtotime('-1 day', strtotime(date('Y-m-d'))));

                    //mendapatkan 6 hari sebelum tanggal sekarang
                    $seminggu = date('Y-m-d h:i:s', strtotime('-1 week + 1 day', strtotime($tgl_sekarang)));

                    $sekarang = date('Y-m-d h:i:s');

                    // echo $seminggu;
                    //  die();

                    //persiapan query tampilan jumlah data pengungjung

                    $tgl_sekarang = mysqli_fetch_array(mysqli_query(
                        $koneksi,
                        "SELECT count(*) FROM tb_tamu where tanggal like '%$tgl_sekarang%'"
                    ));

                    $kemarin = mysqli_fetch_array(mysqli_query(
                        $koneksi,
                        "SELECT count(*) FROM tb_tamu where tanggal like '%$kemarin%'"
                    ));

                    $seminggu = mysqli_fetch_array(mysqli_query(
                        $koneksi,
                        "SELECT count(*) FROM tb_tamu where tanggal BETWEEN '$seminggu' and '$sekarang'"
                    ));

                    $bulan_ini = date('m');

                    $sebulan = mysqli_fetch_array(mysqli_query(
                        $koneksi,
                        "SELECT count(*) FROM tb_tamu where month(tanggal) = '$bulan_ini'"
                    ));

                    $keseluruhan = mysqli_fetch_array(mysqli_query(
                        $koneksi,
                        "SELECT count(*) FROM tb_tamu"
                    ));
                    ?>
                    <table class="table table-bordered">
                        <tr class="text-white">
                            <td><img src="assets/img/icon1.png" alt="icon" style="width: 20px; height: 20px;"></td>
                            <td>Hari ini</td>
                            <td>: <?= $tgl_sekarang[0] ?></td>
                        </tr>
                        <tr class="text-white">
                            <td><img src="assets/img/icon2.png" alt="icon" style="width: 20px; height: 20px;"></td>
                            <td>Kemarin</td>
                            <td>: <?= $kemarin[0] ?></td>

                        <tr class="text-white">
                            <td><img src="assets/img/icon3.png" alt="icon" style="width: 20px; height: 20px;"></td>
                            <td>minggu ini</td>
                            <td>: <?= $seminggu[0] ?></td>

                        </tr>
                        <tr class="text-white">
                            <td><img src="assets/img/icon4.png" alt="icon" style="width: 20px; height: 20px;"></td>
                            <td>Bulan ini</td>
                            <td>: <?= $sebulan[0] ?></td>
                        </tr>
                        <tr class="text-white">
                            <td><img src="assets/img/icon5.png" alt="icon" style="width: 20px; height: 20px;"></td>
                            <td>Keseluruhan</td>
                            <td>: <?= $keseluruhan[0] ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Pengunjung Hari Ini [<?= date('d-m-Y') ?>]</h6>
        </div>
        <div class="card-body">
            <a href="rekapitulasi.php" class="btn btn-success mb-3"><i class="fa fa-table"></i> Rekapitulasi Pengunjung </a>

            <a href="logout.php" class="btn btn-danger mb-3"><i class="fa fa-sign-out-alt"></i> Logout </a>



            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Tanggal</th>
                            <th>Nama Pengunjung</th>
                            <th>Alamat</th>
                            <th>Tujuan</th>
                            <th>No.Hp</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No.</th>
                            <th>Tanggal</th>
                            <th>Nama Pengunjung</th>
                            <th>Alamat</th>
                            <th>Tujuan</th>
                            <th>No.Hp</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        $tgl = date('Y-m-d'); //2021-07-16
                        $tampil = mysqli_query($koneksi, "SELECT * FROM tb_tamu where tanggal like '%$tgl%' order by id desc");
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
            </div>
        </div>
    </div>


    <?php include "footer.php"; ?>