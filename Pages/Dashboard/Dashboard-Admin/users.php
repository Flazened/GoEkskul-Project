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

// Query untuk mengambil data dari tabel users (tanpa kolom kata_sandi)
$query = "SELECT id, nama_lengkap, kelas, email, tanggal_daftar FROM users";
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
    <title>GoEkskul - Users</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="/Styles/Dashboard/Dashboard-Admin/userss.css">
    <script>
        function hapusUser(id, namaLengkap) {
            if (confirm('Yakin ingin menghapus pengguna ' + namaLengkap + '?')) {
                fetch('hapus_user.php', {
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
                        alert('Pengguna berhasil dihapus.');
                    } else {
                        alert('Gagal menghapus pengguna: ' + (data.message || 'Tidak diketahui.'));
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan saat menghapus pengguna.');
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
                    <p>Kelola akun pengguna di sini.</p>
                </section>

                

                <div class="table-container">
                <div class="table-header">
                  <h2 class="table-title"></h2>
                    <a href="create-users.php" class="btn-create">
                        <button type="button">+ Buat Akun</button>
                    </a>
                </div>
                    <h2 class="table-title">Tabel Pengguna</h2>

                    <table class="ekskul-table">
                        <thead class="ekskul-table-header">
                            <tr>
                                <th class="table-col-id">ID</th>
                                <th class="table-col-name">Nama Lengkap</th>
                                <th class="table-col-category">Kelas</th>
                                <th class="table-col-mentor">Email</th>
                                <th class="table-col-mentor">Tanggal Daftar</th>
                                <th class="table-col-actions">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                                <tr class="ekskul-row" data-id="<?= $row['id'] ?>">
                                    <td class="data-cell data-id"><?= htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8') ?></td>
                                    <td class="data-cell data-name"><?= htmlspecialchars($row['nama_lengkap'], ENT_QUOTES, 'UTF-8') ?></td>
                                    <td class="data-cell data-category"><?= htmlspecialchars($row['kelas'], ENT_QUOTES, 'UTF-8') ?></td>
                                    <td class="data-cell data-mentor"><?= htmlspecialchars($row['email'], ENT_QUOTES, 'UTF-8') ?></td>
                                    <td class="data-cell data-mentor"><?= htmlspecialchars($row['tanggal_daftar'], ENT_QUOTES, 'UTF-8') ?></td>
                                    <td class="data-cell data-actions">
                                        <div class="action-uni">
                                            <a href="edit-users.php?id=<?= $row['id'] ?>">
                                                <img src="../../../Images/edit.png" alt="Edit" class="action-icon">
                                            </a>
                                            
                                            <!-- Tombol hapus tanpa href -->
                                            <button type="button" onclick="hapusUser(<?= $row['id'] ?>, '<?= addslashes(htmlspecialchars($row['nama_lengkap'], ENT_QUOTES, 'UTF-8')) ?>')" style="background: none; border: none; cursor: pointer;">
                                                <img src="../../../Images/delete.png" alt="Hapus" class="action-icon" class="Ikan">
                                            </button>
                                        </div>
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