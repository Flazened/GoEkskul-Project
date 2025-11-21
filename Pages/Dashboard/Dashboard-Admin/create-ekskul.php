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
    $name = $_POST['name'] ?? '';
    $category = $_POST['category'] ?? '';
    $day = $_POST['day'] ?? '';
    $time = $_POST['time'] ?? '';
    $location = $_POST['location'] ?? '';
    $instructor_name = $_POST['instructor_name'] ?? '';
    $instructor_photo = $_POST['instructor_photo'] ?? '';
    $activity_photo = $_POST['activity_photo'] ?? '';

    if ($name && $category && $day && $time && $location && $instructor_name) {
        $stmt = $koneksi->prepare("INSERT INTO extracurriculars (name, category, day, time, location, instructor_name, instructor_photo, activity_photo) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssss", $name, $category, $day, $time, $location, $instructor_name, $instructor_photo, $activity_photo);

        if ($stmt->execute()) {
            $success = "Ekskul berhasil dibuat.";
        } else {
            $error = "Gagal menyimpan ekskul: " . $koneksi->error;
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
    <title>GoEkskul - Create Ekskul</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="/Styles/Dashboard/Dashboard-Admin/dashboardes.css">
    <link rel="stylesheet" href="/Styles/Dashboard/Dashboard-Admin/create-ekskul.css">
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
                    <h1><?= htmlspecialchars($user, ENT_QUOTES, 'UTF-8') ?></h1>
                    <p>ADMIN</p>
                </div>
            </a>
        </aside>

        <section class="dashboard">
            <section class="bottom">
                <section class="banner">
                    <h1>Hai, <?= htmlspecialchars($user, ENT_QUOTES, 'UTF-8') ?>!</h1>
                    <p>Buat ekstrakurikuler baru di sini.</p>
                </section>

                <div class="form-container">
                    <h2 class="form-title">Form Tambah Ekstrakurikuler</h2>

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
                            <label for="name">Nama Ekskul:</label>
                            <input type="text" id="name" name="name" required>
                        </div>

                        <div class="form-group">
                            <label for="category">Kategori:</label>
                            <input type="text" id="category" name="category" required>
                        </div>

                        <div class="form-group">
                            <label for="day">Hari:</label>
                            <input type="text" id="day" name="day" required>
                        </div>

                        <div class="form-group">
                            <label for="time">Waktu:</label>
                            <input type="text" id="time" name="time" required placeholder="contoh: 15.00 - 16.00 WIB">
                        </div>

                        <div class="form-group">
                            <label for="location">Lokasi:</label>
                            <input type="text" id="location" name="location" required>
                        </div>

                        <div class="form-group">
                            <label for="instructor_name">Nama Pembina:</label>
                            <input type="text" id="instructor_name" name="instructor_name" required>
                        </div>

                        <div class="form-group">
                            <label for="instructor_photo">URL Foto Pembina:</label>
                            <input type="text" id="instructor_photo" name="instructor_photo">
                        </div>

                        <div class="form-group">
                            <label for="activity_photo">URL Foto Kegiatan:</label>
                            <input type="text" id="activity_photo" name="activity_photo">
                        </div>

                        <div class="form-actions">
                            <button type="submit">Simpan Ekskul</button>
                            <a href="dashboard.php"><button type="button" class="btn-cancel">Batal</button></a>
                        </div>
                    </form>
                </div>
            </section>
        </section>
    </main>
</body>
</html>