<?php
session_start();
// Path include disesuaikan (naik 2 level ke root, lalu masuk Config)
include '../../Config/db.php'; 

// Jika user belum login, kembalikan ke halaman login
if (!isset($_SESSION['user'])) {
    header("Location: ../Auth/Sign_In.php"); 
    exit;
}

// ==========================================================
// LOGIC UNTUK MENAMPILKAN NOTIFIKASI DARI SESSION
// ==========================================================
$alert_message = null;
$alert_type = null;

if (isset($_SESSION['alert'])) {
    $alert_message = $_SESSION['alert']['message'];
    $alert_type = $_SESSION['alert']['type'];
    
    // Hapus sesi alert agar tidak muncul lagi setelah refresh
    unset($_SESSION['alert']);
}
// ==========================================================


// 1. Ambil data dari Session
$nama_user = $_SESSION['user'] ?? 'SISWA';
$kelas_user = $_SESSION['kelas'] ?? 'SISWA'; 

// 2. Query untuk mengambil ID user dari tabel 'users'
$query_user_id = "SELECT id FROM users WHERE nama_lengkap = '$nama_user'";

// Pengecekan koneksi
if (isset($koneksi)) {
    $result_user_id = mysqli_query($koneksi, $query_user_id);
} else {
    die("Koneksi database gagal dimuat. Pastikan file db.php ada di /Config/db.php.");
}

if (mysqli_num_rows($result_user_id) > 0) {
    $user_data = mysqli_fetch_assoc($result_user_id);
    $user_id = $user_data['id']; // ID user yang sedang login
} else {
    // Jika user di session tidak ada di DB, paksa login ulang
    header("Location: ../Auth/Sign_In.php");
    exit;
}

// 3. Query Ambil semua data ekskul yang telah didaftarkan oleh user ini.
$query_registered_ekskul = "
    SELECT 
        e.*, 
        r.registration_date 
    FROM 
        extracurricular_registrations r
    JOIN 
        extracurriculars e ON r.extracurricular_id = e.id
    WHERE 
        r.user_id = $user_id
    ORDER BY 
        e.name
";
$result_registered_ekskul = mysqli_query($koneksi, $query_registered_ekskul);

// 4. Hitung jumlah total ekskul yang didaftarkan
$total_registered_count = mysqli_num_rows($result_registered_ekskul);

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
    <link rel="stylesheet" href="../../Styles/Dashboard/ekskul-saya31.css">
</head>

<body>
    <main class="dashboard-main-content">
        <aside class="sidebar">
            <section class="sidebar-top">
                <div class="logo-name">
                    <img src="../../Images/Ikon GoEkskul.png">
                    <h1>GoEkskul</h1>
                </div>
    
                <section class="menu-general">
                    <section class="menu">
                        <h1>MENU</h1>
    
                        <a href="dashboard.php" class="menu-list">
                            <i class="material-icons-outlined">grid_view</i>
                            <h2>Dashboard</h2>
                        </a>
        
                        <a href="pengumuman.php" class="menu-list">
                            <i class="material-icons-outlined">campaign</i>
                            <h2>Pengumuman</h2>
                        </a>
        
                        <a href="daftar-ekskul.php" class="menu-list">
                            <i class="material-icons-outlined">description</i>
                            <h2>Daftar Ekskul</h2>
                        </a>
        
                        <a href="ekskul-saya.php" class="menu-list">
                            <i class="material-icons-outlined">star</i>
                            <h2 class="active">Ekskul Saya</h2>
                        </a>
        
                        <a href="absensi.php" class="menu-list">
                            <i class="material-icons-outlined">edit_calendar</i>
                            <h2>Absensi</h2>
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
                <img src="../../Images/Person-Photo/Person-1.jpg">
                <div class="name-role">
                    <h1><?= Htmlspecialchars($nama_user);?></h1>
                    <p>SISWA</p>
                </div>
            </a>
        </aside>

        <section class="dashboard">
            <section class="top">
                <h1>  Ekskul Saya</h1>
                <div class="search-bar">
                    <input type="text" placeholder="Search">
                    <a href="#"><i class="material-icons-outlined">search</i></a>
                </div>
            </section>

            <?php while ($ekskul = mysqli_fetch_assoc($result_registered_ekskul)): ?>
            <section class="box">
                <section class="left-box">
                    <p><b><?php echo htmlspecialchars($ekskul['name']); ?></b></p>
                </section>

                <section class="middle-box">
                    <p><?php echo htmlspecialchars($ekskul['day']); ?></p>
                    <p><?php echo htmlspecialchars($ekskul['time']); ?></p>
                </section>

                <section class="kanan-box">
                    <img src="<?php echo htmlspecialchars($ekskul['instructor_photo']); ?>" alt="" class="picture">
                    <p><?php echo htmlspecialchars($ekskul['instructor_name']); ?></p>
                </section>
            </section>
            <?php endwhile; ?>

        <button class="addbutton" action=""><a href="categories-ekskul/proses_daftar.php">+</a></button>
        
    </main>
</body>
</html>