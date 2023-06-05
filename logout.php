<?php

//session start
session_start();

//hilangkan session yg sudah di save
unset($_SESSION['id_user']);
unset($_SESSION['username']);
unset($_SESSION['password']);
unset($_SESSION['nama_pengguna']);

session_destroy();
echo "<script>alert('Anda telah keluar dari halaman Administarator');
    document.location='index.php';</script>";
