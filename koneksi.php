<?php
$server = "localhost";
$user = "root";
$passwor = "";
$database = "db_bukutamu";

$koneksi = mysqli_connect($server, $user, $passwor, $database) or die(mysqli_error($koneksi));
