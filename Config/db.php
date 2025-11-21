<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "goekskul_database"; // ganti kalau nama DB kamu beda

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>

