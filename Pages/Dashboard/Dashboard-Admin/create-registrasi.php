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

// Ambil daftar user untuk dropdown
$users_query = "SELECT id, nama_lengkap FROM users ORDER BY nama_lengkap ASC";
$users_result = mysqli_query($koneksi, $users_query);

// Ambil daftar ekskul untuk dropdown
$ekskul_query = "SELECT id, name FROM extracurriculars ORDER BY name ASC";
$ekskul_result = mysqli_query($koneksi, $ekskul_query);

// Jika form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_POST['user_id'] ?? null;
    $ekskul_id = $_POST['ekskul_id'] ?? null;

    if ($user_id && $ekskul_id) {
        $stmt = $koneksi->prepare("INSERT INTO extracurricular_registrations (user_id, extracurricular_id, status) VALUES (?, ?, 'pending')");
        $stmt->bind_param("ii", $user_id, $ekskul_id);

        if ($stmt->execute()) {
            $success = "Pendaftaran berhasil dibuat.";
        } else {
            $error = "Gagal menyimpan pendaftaran: " . $koneksi->error;
        }

        $stmt->close();
    } else {
        $error = "User dan Ekskul harus dipilih.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GoEkskul - Create Registrasi</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="/Styles/Dashboard/Dashboard-Admin/dashboardes.css">
    <link rel="stylesheet" href="/Styles/Dashboard/Dashboard-Admin/create-registrasi.css">
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

                        <a href="Ekskul_Registrasi.php" class="menu-list active">
                            <i class="material-icons-outlined">grid_view</i>
                            <h2 class="active">Peserta-Ekskul</h2>
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
                    <h1><?= htmlspecialchars($user, ENT_QUOTES, 'UTF-8') ?></h1>
                    <p>ADMIN</p>
                </div>
            </a>
        </aside>

        <section class="dashboard">
            <section class="bottom">
                <section class="banner">
                    <h1>Hai, <?= htmlspecialchars($user, ENT_QUOTES, 'UTF-8') ?>!</h1>
                    <p>Buat pendaftaran ekskul baru untuk pengguna.</p>
                </section>

                <div class="form-container">
                    <h2 class="form-title">Form Tambah Pendaftaran</h2>

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
                            <label for="user_id">Pilih Pengguna:</label>
                            <select id="user_id" name="user_id" required>
                                <option value="">-- Pilih User --</option>
                                <?php while ($usr = mysqli_fetch_assoc($users_result)) : ?>
                                    <option value="<?= $usr['id'] ?>"><?= htmlspecialchars($usr['nama_lengkap'], ENT_QUOTES, 'UTF-8') ?></option>
                                <?php endwhile; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="ekskul_id">Pilih Ekskul:</label>
                            <select id="ekskul_id" name="ekskul_id" required>
                                <option value="">-- Pilih Ekskul --</option>
                                <?php while ($eks = mysqli_fetch_assoc($ekskul_result)) : ?>
                                    <option value="<?= $eks['id'] ?>"><?= htmlspecialchars($eks['name'], ENT_QUOTES, 'UTF-8') ?></option>
                                <?php endwhile; ?>
                            </select>
                        </div>

                        <div class="form-actions">
                            <button type="submit">Simpan Pendaftaran</button>
                            <a href="Ekskul_Registrasi.php"><button type="button" class="btn-cancel">Batal</button></a>
                        </div>
                    </form>
                </div>
            </section>
        </section>
    </main>
</body>
</html>