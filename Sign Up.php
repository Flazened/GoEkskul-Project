<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="Sign Up.css">
</head>
<body>
<div class="posisi-1">
<h1 style="color: #1AA0D9;">Udah Punya Akun?</h1>
<p style="margin-top: -20px;">Selamat Datang Kembali! <a style="color: black;" href="Sign In.php">Masuk</a></p>
</div>

<div class="kotak-biru">    
    <div class="sigma2">
<h1 style="color: white;">Gabung Sekarang!</h1>
</div>

<div class="posisi-2">
    <p>Mulai perjalanan ekskulmu dengan membuat akun di <b>GoEkskul</b> sekarang.</p>
    </div>
    
<form>
<label>
   <input type="text" id="fullname" placeholder="Nama Lengkap" required>
    
    <input type="text" id="kelas" placeholder="Kelas" required>

    <input type="text" id="email2" placeholder="Email" required>

    <input type="password" id="password2" placeholder="Kata Sandi" required>

    <input type="password" id="confirmPassword" placeholder="Konfirmasi Kata Sandi" required>
<span id="passwordError" style="color: red;"></span>
<div class="checkbox2">
  <label>
        <input type="checkbox" required>Saya Setuju dengan <a href="#"> <u style="font-weight: lighter; color: white;">Syarat & Ketentuan</u></a>
    </label>
</div>
 <button>Masuk Sekarang</button>
</form>
</div>
<img src="image (3).png" alt="">
<script src="Confirm.js"></script>
</body>
</html>