<?php
session_start();
include '../../../Config/db.php';

// Jika user belum login, kembalikan ke halaman login
if (!isset($_SESSION['user'])) {
    header("Location: ../Auth/Sign_In.php");
    exit;
}

// Simpan nama user ke variabel agar mudah dipakai di HTML
$user  = $_SESSION['user'] ?? 'Belum diatur';
$kelas = $_SESSION['kelas'] ?? 'Belum diatur';

// Jika form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_lengkap = $_POST['nama_lengkap'] ?? '';
    $kelas_input = $_POST['kelas'] ?? '';
    $email = $_POST['email'] ?? '';
    $kata_sandi = $_POST['kata_sandi'] ?? '';

    if ($nama_lengkap && $kelas_input && $email && $kata_sandi) {
        // Hash password sebelum menyimpan
        $hashed_password = password_hash($kata_sandi, PASSWORD_DEFAULT);

        $stmt = $koneksi->prepare("INSERT INTO users (nama_lengkap, kelas, email, kata_sandi) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $nama_lengkap, $kelas_input, $email, $hashed_password);

        if ($stmt->execute()) {
            $success = "User berhasil dibuat.";
        } else {
            $error = "Gagal menyimpan user: " . $koneksi->error;
        }

        $stmt->close();
    } else {
        $error = "Semua field wajib diisi.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GoEkskul - Create User</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="/Styles/Dashboard/Dashboard-Admin/dashboardes.css">
    <link rel="stylesheet" href="/Styles/Dashboard/Dashboard-Admin/create-ekskul.css"> <!-- Gunakan CSS yang sama -->
</head>

<body>
    <main class="dashboard-main-content">
        <aside class="sidebar">
            <section class="sidebar-top">
                <div class="logo-name">
                    <img src="../../../Images/Ikon GoEkskul.png">
                    <h1>GoEkskul</h1>
                </div>

                <section class="menu-general">
                    <section class="menu">
                        <h1>MENU</h1>

                        <a href="dashboard.php" class="menu-list">
                            <i class="material-icons-outlined">grid_view</i>
                            <h2>Ekskul</h2>
                        </a>

                        <a href="Ekskul_Registrasi.php" class="menu-list">
                            <i class="material-icons-outlined">grid_view</i>
                            <h2>Peserta-Ekskul</h2>
                        </a>

                        <a href="users.php" class="menu-list active">
                            <i class="material-icons-outlined">description</i>
                            <h2 class="active">Users</h2>
                        </a>

                    </section>

                    <section class="general">
                        <h1>GENERAL</h1>

                        <a href="setting.php" class="general-list">
                            <i class="material-icons-outlined">settings</i>
                            <h2>Pengaturan</h2>
                        </a>
                    </section>
                </section>
            </section>

            <a href="#" class="profile">
                <img src="../../../Images/Person-Photo/Person-31.png">
                <div class="name-role">
                    <h1><?= htmlspecialchars($user, ENT_QUOTES, 'UTF-8') ?></h1>
                    <p>ADMIN</p>
                </div>
            </a>
        </aside>

        <section class="dashboard">
            <section class="bottom">
                <section class="banner">
                    <h1>Hai, <?= htmlspecialchars($user, ENT_QUOTES, 'UTF-8') ?>!</h1>
                    <p>Buat akun pengguna baru di sini.</p>
                </section>

                <div class="form-container">
                    <h2 class="form-title">Form Tambah Pengguna</h2>

                    <?php if (isset($success)) : ?>
                        <div class="alert alert-success">
                            <?= htmlspecialchars($success, ENT_QUOTES, 'UTF-8') ?>
                        </div>
                    <?php endif; ?>

                    <?php if (isset($error)) : ?>
                        <div class="alert alert-error">
                            <?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?>
                        </div>
                    <?php endif; ?>

                    <form method="POST">
                        <div class="form-group">
                            <label for="nama_lengkap">Nama Lengkap:</label>
                            <input type="text" id="nama_lengkap" name="nama_lengkap" required>
                        </div>

                        <div class="form-group">
                            <label for="kelas">Kelas:</label>
                            <input type="text" id="kelas" name="kelas" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" required>
                        </div>

                        <div class="form-group">
                            <label for="kata_sandi">Kata Sandi:</label>
                            <input type="password" id="kata_sandi" name="kata_sandi" required>
                        </div>

                        <div class="form-actions">
                            <button type="submit">Simpan User</button>
                            <a href="users.php"><button type="button" class="btn-cancel">Batal</button></a>
                        </div>
                    </form>
                </div>
            </section>
        </section>
    </main>
</body>
</html>