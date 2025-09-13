<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="Sign_In.css">
</head>

<body>
    <section class="utama"> 
        <section class="kiri">
            <div class="to-sign-up">
                <h1>Belum punya akun?</h1>
                <p>Ayo buat sekarang! <a href="Sign_Up.php">Daftar</a></p>
            </div>

            <div class="form-box">
                <h1>Selamat datang kembali!</h1>
                <p>Untuk tetap terhubung dengan kami, mohon masuk dengan informasi pribadi anda menggunakan email dan password.</p>

                <form>
                    <input type="text" id="email" placeholder="Email" required>
                    <input type="password" id="password" placeholder="Kata Sandi" required>
                </form>
                                    
                <div class="checkbox-lupasandi">
                    <label><input type="checkbox">Ingat saya</label>
                    <a href="#"><u>Lupa Kata Sandi?</u></a>
                </div>

                <a href="#" class="masuk-sekarang">Masuk Sekarang</a>
            </div>
        </section>

        <img src="Gambar/Primary_IMG.png">
    </section>
</body>
</html>