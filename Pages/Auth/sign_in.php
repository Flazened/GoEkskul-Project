<?php
session_start();
include '../../Config/db.php';

if (isset($_POST['login'])) {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    $query = mysqli_query($koneksi, "SELECT * FROM users WHERE email='$email'");
    if (mysqli_num_rows($query) > 0) {
        $data = mysqli_fetch_assoc($query);
        if (password_verify($password, $data['kata_sandi'])) {
            // Simpan data penting ke session
            $_SESSION['user'] = $data['nama_lengkap'];
            $_SESSION['kelas'] = $data['kelas'];
            $_SESSION['email'] = $data['email'];

            // 🔹 Logika pengarah berdasarkan kelas
            if (strtolower($data['kelas']) === 'guru') {
                header("Location: ../Dashboard/Dashboard-Guru/dashboard.php");
                exit;
            } elseif (strtolower($data['kelas']) === 'admin') {
                header("Location: ../Dashboard/Dashboard-Admin/dashboard.php");
                exit;
            } else {
                header("Location: ../Dashboard/dashboard.php");
                exit;
            }

        } else {
            $message = "<div class='warning'>⚠️ Kata sandi salah!</div>";
        }
    } else {
        $message = "<div class='warning'>⚠️ Email tidak ditemukan!</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sign In - GoEkskul</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link rel="stylesheet" href="../../Styles/Auth/sign_inse.css">
<style>
.warning {
  background-color: #ffcccc;
  color: #b30000;
  padding: 10px;
  border-radius: 6px;
  margin-bottom: 10px;
  text-align: center;
  font-weight: bold;
}
</style>
</head>
<body>
<section class="utama"> 
  <section class="kiri">
    <div class="to-sign-up">
        <button class="btn-back" onclick="history.back()">&#8592;</button>
        <h1>Belum punya akun?</h1>
        <p>Ayo buat sekarang! <a href="Sign_Up.php">Daftar</a></p>
    </div>

    <div class="form-box">
        <h1>Selamat datang kembali!</h1>
        <p>Untuk tetap terhubung dengan kami, mohon masuk dengan informasi pribadi anda menggunakan email dan<br> password.</p>


        <form id="loginForm" action="" method="POST">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Kata sandi" required>

            <div class="checkbox-lupasandi">
                <a href="#"><u>Lupa Kata Sandi?</u></a>
            </div>

            <div class="Masuk-Sekarang">
                <button type="submit" name="login" class="masuk-sekarang">Masuk Sekarang</button>
            </div>
        </form>
    </div>
  </section>

  <div class="Image-Edit">
    <img src="../../Images/Primary_IMG.png" alt="Gambar utama">
  </div>
</section>

</body>
</html>
