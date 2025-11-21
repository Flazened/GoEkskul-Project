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
    header("Location: Ekskul_Registrasi.php"); // Ganti dengan halaman registrasi
    exit;
}

// Ambil data pendaftaran berdasarkan ID
$query = "
    SELECT 
        er.id,
        u.nama_lengkap AS nama_pengguna,
        e.name AS nama_ekskul,
        er.registration_date,
        er.status
    FROM 
        extracurricular_registrations er
    JOIN 
        users u ON er.user_id = u.id
    JOIN 
        extracurriculars e ON er.extracurricular_id = e.id
    WHERE 
        er.id = ?
";
$stmt = mysqli_prepare($koneksi, $query);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$registration_data = mysqli_fetch_assoc($result);

if (!$registration_data) {
    header("Location: Ekskul_Registrasi.php"); // Ganti dengan halaman registrasi
    exit;
}

// Jika form disubmit, update data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $status = $_POST['status'] ?? '';

    // Validasi status (opsional, tambahkan sesuai kebutuhan)
    $allowed_statuses = ['pending', 'approved', 'rejected'];
    if (!in_array($status, $allowed_statuses)) {
        $error = "Status tidak valid.";
    } else {
        // Query untuk update status
        $update_query = "UPDATE extracurricular_registrations SET status = ? WHERE id = ?";
        $update_stmt = mysqli_prepare($koneksi, $update_query);
        mysqli_stmt_bind_param($update_stmt, "si", $status, $id);

        if (mysqli_stmt_execute($update_stmt)) {
            header("Location: Ekskul_Registrasi.php"); // Redirect ke halaman registrasi setelah sukses
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
    <title>Edit Pendaftaran - GoEkskul</title>
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
                    <h2>Edit Pendaftaran</h2>
                    <?php if (isset($error)): ?>
                        <p class="error"><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></p>
                    <?php endif; ?>

                    <form method="POST">
                        <div class="form-group">
                            <label>ID Pendaftaran</label>
                            <input type="text" value="<?= htmlspecialchars($registration_data['id'], ENT_QUOTES, 'UTF-8') ?>" readonly>
                        </div>

                        <div class="form-group">
                            <label>Nama Pengguna</label>
                            <input type="text" value="<?= htmlspecialchars($registration_data['nama_pengguna'], ENT_QUOTES, 'UTF-8') ?>" readonly>
                        </div>

                        <div class="form-group">
                            <label>Nama Ekskul</label>
                            <input type="text" value="<?= htmlspecialchars($registration_data['nama_ekskul'], ENT_QUOTES, 'UTF-8') ?>" readonly>
                        </div>

                        <div class="form-group">
                            <label>Tanggal Daftar</label>
                            <input type="text" value="<?= htmlspecialchars($registration_data['registration_date'], ENT_QUOTES, 'UTF-8') ?>" readonly>
                        </div>

                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status" required>
                                <option value="pending" <?= $registration_data['status'] === 'pending' ? 'selected' : '' ?>>Pending</option>
                                <option value="approved" <?= $registration_data['status'] === 'approved' ? 'selected' : '' ?>>Approved</option>
                                <option value="rejected" <?= $registration_data['status'] === 'rejected' ? 'selected' : '' ?>>Rejected</option>
                            </select>
                        </div>

                        <button type="submit" class="btn">Simpan Perubahan</button>
                        <a href="Ekskul_Registrasi.php" class="btn btn-back">Kembali ke Daftar</a>
                    </form>
                </div>
            </section>
        </section>
    </main>
</body>
</html>