<?php
include '../../Config/db.php';

$message = "";

if (isset($_POST['register'])) {
    $nama = trim($_POST['nama_lengkap']);
    $kelas = trim($_POST['kelas']);
    $email = trim($_POST['email']);
    $kata_sandi = $_POST['kata_sandi'];
    $konfirm = $_POST['konfirm_kata_sandi'];

    if ($kata_sandi != $konfirm) {
        $message = "<div class='warning'>⚠️ Konfirmasi kata sandi tidak cocok!</div>";
    } else {
        // Cek apakah email sudah ada
        $check = mysqli_query($koneksi, "SELECT * FROM users WHERE email='$email'");
        if (mysqli_num_rows($check) > 0) {
            $message = "<div class='warning'>⚠️ Email sudah digunakan!</div>";
        } else {
            $password_hash = password_hash($kata_sandi, PASSWORD_DEFAULT);
            $query = "INSERT INTO users (nama_lengkap, kelas, email, kata_sandi)
                      VALUES ('$nama', '$kelas', '$email', '$password_hash')";
            if (mysqli_query($koneksi, $query)) {
                echo "<script>alert('Akun berhasil dibuat! Silakan login.'); 
                      window.location.href='Sign_In.php';</script>";
                exit;
            } else {
                $message = "<div class='warning'>⚠️ Gagal mendaftar. Coba lagi nanti.</div>";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Buat Akun - GoEkskul</title>
<link rel="stylesheet" href="../../Styles/Auth/sign_upse.css">
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
    <div class="to-sign-in">
        <button class="btn-back" onclick="history.back()">&#8592;</button>
        <h1>Udah punya akun?</h1>
        <p>Selamat datang kembali! <a href="Sign_In.php">Masuk</a></p>
    </div>

    <div class="form-box">
        <h1>Gabung sekarang!</h1>
        <p>Mulai perjalanan ekskulmu dengan membuat akun di <br><bold>GoEkskul</bold> sekarang.</p>

        <?php echo $message; ?>

        <form action="" method="POST">
            <input type="text" name="nama_lengkap" placeholder="Nama lengkap" required>
            <input type="text" name="kelas" placeholder="Kelas" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="kata_sandi" placeholder="Kata sandi" required>
            <input type="password" name="konfirm_kata_sandi" placeholder="Konfirmasi kata sandi" required>

            <div class="checkbox-lupasandi">
                <label><input type="checkbox" required> Saya setuju dengan <u>Syarat & Ketentuan</u></label>
            </div>
            <div class="masuk-sekarang">
                <button type="submit" name="register" class="masuk-sekarang">Buat akun</button>
            </div>
            
        </form>
    </div>
  </section>
  <div class="Image-Edit">
    <img src="../../Images/Primary_IMG.png">
  </div>
  
</section>
</body>
</html>
