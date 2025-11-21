<?php
session_start();
// 💡 PERBAIKAN: Mengubah jalur include menjadi tiga tingkat ke atas (../../../)
include '../../../Config/db.php'; 

// Jika user belum login, kembalikan ke halaman login
if (!isset($_SESSION['user'])) {
    header("Location: ../Auth/Sign_In.php");
    exit;
}

// 1. Ambil data dari Session
$nama_user = $_SESSION['user'] ?? 'SISWA';
$kelas_user = $_SESSION['kelas'] ?? 'SISWA'; 

// 2. Query untuk mengambil ID user dari tabel 'users' berdasarkan Nama Lengkap dari session
$query_user_id = "SELECT id FROM users WHERE nama_lengkap = '$nama_user'";
// Tambahkan pengecekan koneksi sebelum mysqli_query
if (isset($koneksi)) {
    $result_user_id = mysqli_query($koneksi, $query_user_id);
} else {
    // Jika koneksi gagal (walaupun path sudah benar), hentikan proses
    die("Koneksi database gagal dimuat. Pastikan file db.php ada dan berfungsi.");
}

if (mysqli_num_rows($result_user_id) > 0) {
    $user_data = mysqli_fetch_assoc($result_user_id);
    $user_id = $user_data['id']; // ID user yang sedang login
} else {
    // Jika user tidak ditemukan di database (pengamanan)
    header("Location: ../Auth/Sign_In.php");
    exit;
}

// 3. Query Ambil semua ID ekskul yang sudah didaftarkan user ini (untuk status tombol)
$query_reg = "SELECT extracurricular_id FROM extracurricular_registrations WHERE user_id = $user_id";
$result_reg = mysqli_query($koneksi, $query_reg);
$registered_ekskul_ids = [];
while ($reg_row = mysqli_fetch_assoc($result_reg)) {
    $registered_ekskul_ids[] = $reg_row['extracurricular_id'];
}

// 4. Query Ambil semua data ekskul KHUSUS KATEGORI BAHASA
$category_name = 'BAHASA';
$query_ekskul = "SELECT * FROM extracurriculars WHERE category = '$category_name' ORDER BY name";
$result_ekskul = mysqli_query($koneksi, $query_ekskul);

// 5. Hitung jumlah total ekskul di kategori ini
$total_ekskul_count = mysqli_num_rows($result_ekskul);

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
    <link rel="stylesheet" href="/Styles/Dashboard/daftar-ekskul.css">
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
    
                        <a href="../Dashboard-Guru/dashboard.php" class="menu-list">
                            <i class="material-icons-outlined">grid_view</i>
                            <h2>Dashboard</h2>
                        </a>

                        <a href="../Dashboard-Guru/pengumuman.php" class="menu-list">
                            <i class="material-icons-outlined">campaign</i>
                            <h2>Pengumuman</h2>
                        </a>

                        <a href="../Dashboard-Guru/daftar-ekskul.php" class="menu-list">
                            <i class="material-icons-outlined">description</i>
                            <h2 class="active">Daftar Ekskul</h2> 
                        </a>
        
                        <a href="../Dashboard-Guru/ekskul-saya.php" class="menu-list">
                            <i class="material-icons-outlined">star</i>
                            <h2>Ekskul Saya</h2>
                        </a>
        
                        <a href="../Dashboard-Guru/absensi.php" class="menu-list">
                            <i class="material-icons-outlined">edit_calendar</i>
                            <h2>Absensi</h2>
                        </a>
                    </section>
        
                    <section class="general">
                        <h1>GENERAL</h1>
    
                        <a href="#" class="general-list">
                            <i class="material-icons-outlined">settings</i>
                            <h2>Pengaturan</h2>
                        </a>
                    </section>
                </section>
            </section>

            <a href="#" class="profile">
                <img src="../../../Images/Person-Photo/Person-2.jpg"> 
                <div class="name-role">
                    <h1><?php echo htmlspecialchars($nama_user); ?></h1>
                    <p><?php echo htmlspecialchars($kelas_user); ?></p>
                </div>
            </a>
        </aside>
        <section class="dashboard">
            <section class="top">
                <h1>Daftar Ekskul | <?php echo htmlspecialchars($category_name); ?></h1>
                <div class="search-bar">
                    <input type="text" placeholder="Search">
                    <a href="#"><i class="material-icons-outlined">search</i></a>
                </div>
            </section>

            <section class="ekskul-list">
                <div class="judul-ekskul">
                    <h1><?php echo htmlspecialchars($category_name); ?></h1>
                    <h2>(<?php echo $total_ekskul_count; ?> Ekskul)</h2>
                </div>

                <section class="ekskul-categories">
                
                <?php 
                // Looping untuk menampilkan setiap ekskul kategori BAHASA
                if ($total_ekskul_count > 0) {
                    while ($ekskul = mysqli_fetch_assoc($result_ekskul)): 
                        // Tentukan status tombol "Daftar"
                        $is_registered = in_array($ekskul['id'], $registered_ekskul_ids);
                        $button_text = $is_registered ? 'Terdaftar' : 'Daftar';
                        $button_class = $is_registered ? 'btn-registered' : 'btn-daftar'; 
                        $disabled_attr = $is_registered ? 'disabled' : '';
                    ?>
                        
                        <div class="categories-card">
                            <img src="<?php echo htmlspecialchars($ekskul['activity_photo']); ?>">
                            <div class="categories-card-between">
                                <div class="categories-card-right">
                                    <h1><?php echo htmlspecialchars($ekskul['name']); ?></h1>
                                    <div class="categories-card-information">
                                        <div class="info-left">
                                            <h2>Hari</h2>
                                            <h2>Waktu</h2>
                                            <h2>Lokasi</h2>
                                        </div>
            
                                        <div class="info-right">
                                            <h2><?php echo htmlspecialchars($ekskul['day']); ?></h2>
                                            <h2><?php echo htmlspecialchars($ekskul['time']); ?></h2>
                                            <h2><?php echo htmlspecialchars($ekskul['location']); ?></h2>
                                        </div>
                                    </div>
                                    <div class="pembina-ekskul">
                                        <img src="<?php echo htmlspecialchars($ekskul['instructor_photo']); ?>">
                                        <h1><?php echo htmlspecialchars($ekskul['instructor_name']); ?></h1>
                                    </div>
                                </div>
                                
                                <form method="POST">
                                    <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                                    <input type="hidden" name="ekskul_id" value="<?php echo $ekskul['id']; ?>">
                                    <button type="submit" name="register" class="<?php echo $button_class; ?>" <?php echo $disabled_attr; ?>>
                                        <?php echo $button_text; ?>
                                    </button>
                                </form>
                            </div>
                        </div>

                    <?php endwhile; 
                } else {
                    echo "<p style='text-align: center; margin-top: 20px;'>Belum ada ekskul untuk kategori **BAHASA**.</p>";
                }
                ?>

                </section>
            </section>
        </section>
    </main>
</body>
</html>

<?php
// Tutup koneksi database
if (isset($koneksi)) {
    mysqli_close($koneksi);
}
?>
