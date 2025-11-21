<?php
session_start();
include '../../../Config/db.php';

// Jika user belum login, kembalikan ke halaman login
if (!isset($_SESSION['user'])) {
    header("Location: ../Auth/Sign_In.php");
    exit;
}

// Ambil ID dari URL
$id = $_GET['id'] ?? null;

if (!$id || !is_numeric($id)) {
    header("Location: users.php"); // Ganti dengan halaman users
    exit;
}

// Ambil data pengguna berdasarkan ID
$query = "SELECT id, nama_lengkap, kelas, email FROM users WHERE id = ?";
$stmt = mysqli_prepare($koneksi, $query);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$user_data = mysqli_fetch_assoc($result);

if (!$user_data) {
    header("Location: users.php"); // Ganti dengan halaman users
    exit;
}

// Jika form disubmit, update data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_lengkap = $_POST['nama_lengkap'] ?? '';
    $kelas = $_POST['kelas'] ?? '';
    $email = $_POST['email'] ?? '';

    // Validasi sederhana (opsional, tambahkan sesuai kebutuhan)
    if (empty($nama_lengkap) || empty($kelas) || empty($email)) {
        $error = "Semua field harus diisi.";
    } else {
        // Query untuk update data (tanpa password)
        $update_query = "UPDATE users SET nama_lengkap = ?, kelas = ?, email = ? WHERE id = ?";
        $update_stmt = mysqli_prepare($koneksi, $update_query);
        mysqli_stmt_bind_param($update_stmt, "sssi", $nama_lengkap, $kelas, $email, $id);

        if (mysqli_stmt_execute($update_stmt)) {
            header("Location: users.php"); // Redirect ke halaman users setelah sukses
            exit;
        } else {
            $error = "Gagal menyimpan perubahan.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pengguna - GoEkskul</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="/Styles/Dashboard/Dashboard-Admin/dashboardes.css"> <!-- Gunakan CSS dashboard utama -->
    <link rel="stylesheet" href="/Styles/Dashboard/Dashboard-Admin/edit.css"> <!-- Gunakan CSS form edit -->
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

                        <a href="users.php" class="menu-list">
                            <i class="material-icons-outlined">description</i>
                            <h2>Users</h2>
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
                    <h1><?= htmlspecialchars($_SESSION['user'] ?? 'Belum diatur', ENT_QUOTES, 'UTF-8') ?></h1>
                    <p>ADMIN</p>
                </div>
            </a>
        </aside>

        <section class="dashboard">
            <section class="bottom">
                <div class="form-container">
                    <h2>Edit Pengguna</h2>
                    <?php if (isset($error)): ?>
                        <p class="error"><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></p>
                    <?php endif; ?>

                    <form method="POST">
                        <div class="form-group">
                            <label for="nama_lengkap">Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" id="nama_lengkap" value="<?= htmlspecialchars($user_data['nama_lengkap'], ENT_QUOTES, 'UTF-8') ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="kelas">Kelas</label>
                            <input type="text" name="kelas" id="kelas" value="<?= htmlspecialchars($user_data['kelas'], ENT_QUOTES, 'UTF-8') ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" value="<?= htmlspecialchars($user_data['email'], ENT_QUOTES, 'UTF-8') ?>" required>
                        </div>

                        <!-- Password tidak diedit di sini -->
                        <!-- <div class="form-group">
                            <label for="kata_sandi">Kata Sandi Baru (Opsional)</label>
                            <input type="password" name="kata_sandi" id="kata_sandi">
                        </div> -->

                        <button type="submit" class="btn">Simpan Perubahan</button>
                        <a href="users.php" class="btn btn-back">Kembali ke Daftar</a>
                    </form>
                </div>
            </section>
        </section>
    </main>
</body>
</html>