<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
//aktifkan sesioun
session_start();

//panggil koneksi datababase
include "koneksi.php";

@$pass = md5($_POST['password']);
@$username = mysqli_escape_string($koneksi, $_POST['username']);
@$password = mysqli_escape_string($koneksi, $pass);

$login = mysqli_query($koneksi, "SELECT * FROM tuser where username = '$username' and password = '$password' and status = 'Aktif'");

$data = mysqli_fetch_array($login);

//uji jika username dan password di temukan/sesuai
if ($data) {
    $_SESSION['id_user'] = $data['id_user'];
    $_SESSION['username'] = $data['username'];
    $_SESSION['password'] = $data['password'];
    $_SESSION['nama_pengguna'] = $data['nama_pengguna'];

    //arahkan ke halaman admin
    header('location:admin.php');
} else {
    echo "<script>alert('Maaf , login gagal, pastikan username dan password anda benar...!');
    document.location='index.php';</script>";
}
