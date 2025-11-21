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
$kelas = $_SESSION['kelas'] ?? 'Belum diatur'; // jika belum ada, pakai string kosong

// Query untuk mengambil data dari tabel extracurriculars
$query = "SELECT id, name, category, instructor_name FROM extracurriculars";
$result = mysqli_query($koneksi, $query);

if (!$result) {
    die("Query gagal: " . mysqli_error($koneksi));
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GoEkskul</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="/Styles/Dashboard/Dashboard-Admin/dashboard.css">
    <script>
        function hapusEkskul(id) {
            if (confirm('Yakin ingin menghapus ekskul ini?')) {
                fetch('hapus_ekskul.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: 'id=' + encodeURIComponent(id)
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Hapus baris dari tabel
                        document.querySelector(`tr[data-id="${id}"]`).remove();
                        alert('Ekskul berhasil dihapus.');
                    } else {
                        alert('Gagal menghapus ekskul: ' + (data.message || 'Tidak diketahui.'));
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan saat menghapus ekskul.');
                });
            }
        }
    </script>
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

                        <a href="#" class="menu-list active">
                            <i class="material-icons-outlined">grid_view</i>
                            <h2 class="active">Ekskul</h2>
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

            <a href="setting.php" class="profile">
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
                    <p>Kelola Daftar Ekskul disini.</p>
                </section>

                <div class="table-container">
                    <div class="table-header">
                        <h2 class="table-title">Daftar Ekstrakurikuler</h2>
                        <a href="create-ekskul.php" class="btn-create">
                            <button type="button">+ Create Ekskul</button>
                        </a>
                    </div>

                    <table class="ekskul-table">
                        <thead class="ekskul-table-header">
                            <tr>
                                <th class="table-col-id">ID</th>
                                <th class="table-col-name">Nama Ekskul</th>
                                <th class="table-col-category">Kategori</th>
                                <th class="table-col-mentor">Pembina</th>
                                <th class="table-col-actions">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                                <tr class="ekskul-row" data-id="<?= $row['id'] ?>">
                                    <td class="table-data-id"><?= htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8') ?></td>
                                    <td class="table-data-name"><?= htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8') ?></td>
                                    <td class="table-data-category"><?= htmlspecialchars($row['category'], ENT_QUOTES, 'UTF-8') ?></td>
                                    <td class="table-data-mentor"><?= htmlspecialchars($row['instructor_name'], ENT_QUOTES, 'UTF-8') ?></td>
                                    <td class="table-data-actions">
                                        <a href="edit-ekskul.php?id=<?= $row['id'] ?>">
                                            <img src="../../../Images/edit.png" alt="Edit" class="action-icon">
                                        </a>
                                        <!-- Tombol hapus tanpa href -->
                                        <button type="button" onclick="hapusEkskul(<?= $row['id'] ?>)" style="background: none; border: none; cursor: pointer;">
                                            <img src="../../../Images/delete.png" alt="Hapus" class="action-icon">
                                        </button>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </section>
        </section>
    </main>
</body>
</html>