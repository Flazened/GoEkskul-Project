<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="Sign_Up.css">
</head>

<body>
    <section class="utama"> 
        <section class="kiri">
            <div class="to-sign-in">
                <h1>Udah punya akun?</h1>
                <p>Selamat datang kembali! <a href="Sign_In.php">Masuk</a></p>
            </div>

            <div class="form-box">
                <h1>Gabung sekarang!</h1>
                <p>Mulai perjalanan ekskulmu dengan membuat akun di <b>GoEkskul</b> sekarang.</p>

                <form>
                    <input type="nama_lengkap" id="nama_lengkap" placeholder="Nama lengkap" required>
                    <input type="kelas" id="kelas" placeholder="Kelas" required>
                    <input type="email" id="email" placeholder="Email" required>
                    <input type="kata_sandi" id="kata_sandi" placeholder="Kata sandi" required>
                    <input type="konfirm_kata_sandi" id="konfirm_kata_sandi" placeholder="Konfirmasi kata sandi" required>
                </form>
                                    
                <div class="checkbox-lupasandi">
                    <label><input type="checkbox">Saya setuju dengan <u>Syarat & Ketentuan</u></label>
                </div>

                <a href="#" class="masuk-sekarang">Buat akun</a>
            </div>
        </section>

        <img src="Gambar/Primary_IMG.png">
    </section>
</body>
</html>