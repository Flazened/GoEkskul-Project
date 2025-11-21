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
    <link rel="stylesheet" href="/Styles/Dashboard/Dashboard-Admin/setting.css">
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
                            <h2 class="active">Pengaturan</h2>
                        </a>
                    </section>
                </section>
            </section>

            <a href="#" class="profile">
                <img src="../../../Images/Person-Photo/Person-31.png">
                <div class="name-role">
                    <h1><?=htmlspecialchars("$user")?></h1>
                    <p>ADMIN</p>
                </div>
            </a>
        </aside>

    <section class="dashboard">
            <section class="top">
                <h1>Pengaturan</h1>
            </section>
        <section class="Uni">
            <section class="bagian">
                <div class="Pengaturan">
                    <p>Pengaturan Profil</p>
                </div>

            </section>
        </section>
            <div class="Foto-Profil">
                <img src="../../../Images/Profil-2.png" alt="Foto Profil" class="profile-picture">
            </div>
                <!-- Form Profil -->
                <form class="profile-form">
                    <div class="form-row">
                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <div class="input-box">
                                <input type="text" value="<?=htmlspecialchars($user)?>" readonly>
                                <img src="/Images/Icon/Lock.png" alt="lock" class="lock-icon">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <div class="input-box">
                                <input type="text" value="21 April 1996" readonly>
                                <img src="/Images/Icon/Lock.png" alt="lock" class="lock-icon">
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label>Kelas</label>
                            <div class="input-box">
                                <input type="text" value="<?=htmlspecialchars($kelas)?>" readonly>
                                <img src="/Images/Icon/Lock.png" alt="lock" class="lock-icon">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Gender</label>
                            <div class="input-box">
                                <input type="text" value="Laki-laki" readonly>
                                <img src="/Images/Icon/Lock.png" alt="lock" class="lock-icon">
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label>Ekskul</label>
                            <div class="input-box">
                                <input type="text" value="Basket" readonly>
                                <img src="/Images/Icon/Lock.png" alt="lock" class="lock-icon">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <div class="input-box">
                                <input type="text" value="Jl. Purnama, Komp. Indah Permai No. 22B" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label>Nomor Telepon</label>
                            <div class="input-box1">
                                <input type="text" value="+62 897-4582-5290" readonly>
                            </div>
                        </div>
                    </div>
    

                    <!-- Tombol Simpan -->
                    <div class="btn-save">
                        <button type="button">Simpan Perubahan</button>
                    </div>
                </form>


                <!-- Tombol Keluar -->
                <div class="btn-logout">
                <button type="button" onclick="showLogoutPopup()">
                    <img src="../../../Images/Icon/logout.png" alt="">
                    Keluar
                </button>
                </div>
                
                <!-- Popup Konfirmasi -->
                <div id="logoutPopup" class="popup-overlay">
                <div class="popup-box">
                    <h2>Yakin ingin keluar?</h2>
                    <form action="/Pages/landing/beranda.php" method="post">
                    <div class="popup-buttons">
                        <button type="button" class="btn-no" onclick="hideLogoutPopup()">Tidak</button>
                        <button type="submit" class="btn-yes" name="logout">Ya</button>
                    </div>
                    </form>
                </div>
                </div>

                <!-- JS -->
                <script>
                function showLogoutPopup() {
                    document.getElementById('logoutPopup').style.display = 'flex';
                }

                function hideLogoutPopup() {
                    document.getElementById('logoutPopup').style.display = 'none';
                }
                </script>
            </div>
        </div>

    </main>
</body>
</html>