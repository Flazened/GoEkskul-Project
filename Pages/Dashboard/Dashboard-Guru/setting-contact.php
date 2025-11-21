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
    <link rel="stylesheet" href="../../../Styles/Dashboard/Dashboard-Guru/setting-contact.css">
</head>

<body>
    <main class="dashboard-main-content">
        <aside class="sidebar">
            <section class="sidebar-top">
                <div class="logo-name">
                    <img src="/Images/Ikon GoEkskul.png">
                    <h1>GoEkskul</h1>
                </div>
    
                <section class="menu-general">
                    <section class="menu">
                        <h1>MENU</h1>
    
                        <a href="#" class="menu-list">
                            <i class="material-icons-outlined">grid_view</i>
                            <h2 class="active">Dashboard</h2>
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
                            <h2>Ekskul Saya</h2>
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
                <img src="/Images/Person-Photo/Person-2.jpg">
                <div class="name-role">
                    <h1><?=htmlspecialchars($user)?></h1>
                    <p>PEMBINA</p>
                </div>
            </a>
        </aside>

        <section class="dashboard">
            <section class="top">
                <h1>Pengaturan</h1>
            </section>
               <section class="bagian">
                <div class="Pengaturan">
                    <a href="setting.php">Pengaturan Profil</a>
                </div>
                <div class="apalaitu">
                    <p>Kontak & Bantuan</p>
                </div>
               </section>
            

            <section class="text">
                <h1>Pesan</h1>
            </section>
            <section class="container">
                <div class="text-box">
                    <textarea name="pesan" id="pesan"></textarea>
                </div>

              <section>
                <button>Kirim Pesan</button>
              </section>
            </section>
        </section>

