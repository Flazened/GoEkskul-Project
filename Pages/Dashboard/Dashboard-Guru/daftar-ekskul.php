<?php
session_start();
include '../../../Config/db.php';

// Jika user belum login, kembalikan ke halaman login
if (!isset($_SESSION['user'])) {
    header("Location: ../Auth/Sign_In.php");
    exit;
}

// Simpan nama user ke variabel agar mudah dipakai di HTML
$user = $_SESSION['user'];
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
    <link rel="stylesheet" href="../../../Styles/Dashboard/daftar-ekskul.css">
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
                            <h2>Dashboard</h2>
                        </a>
        
                        <a href="pengumuman.php" class="menu-list">
                            <i class="material-icons-outlined">campaign</i>
                            <h2>Pengumuman</h2>
                        </a>
        
                        <a href="daftar-ekskul.php" class="menu-list">
                            <i class="material-icons-outlined">description</i>
                            <h2 class="active">Daftar Ekskul</h2>
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
                <img src="../../../Images/Person-Photo/Person-2.jpg">
                <div class="name-role">
                    <h1><?=htmlspecialchars("$user")?></h1>
                    <p>PEMBINA</p>
                </div>
            </a>
        </aside>

        <section class="dashboard">
            <section class="top">
                <h1>Daftar Ekskul</h1>
                <div class="search-bar">
                    <input type="text" placeholder="Search">
                    <a href="#"><i class="material-icons-outlined">search</i></a>
                </div>
            </section>

            <section class="ekskul-grid">
                <div class="ekskul-card">
                    <img src="../../../Images/Ekskul-Ikon/OLAHRAGA.png">
                    <a href="../categories-ekskul-guru/olahraga.php">OLAHRAGA</a>
                    <p>(6 Ekskul)</p>
                </div>
    
                <div class="ekskul-card">
                    <img src="../../../Images/Ekskul-Ikon/IT CLUB.png">
                    <a href="../categories-ekskul-guru/it_club.php">IT CLUB</a>
                    <p>(6 Ekskul)</p>
                </div>
    
                <div class="ekskul-card">
                    <img src="../../../Images/Ekskul-Ikon/Seni.png">
                    <a href="../categories-ekskul-guru/seni.php">SENI</a>
                    <p>(7 Ekskul)</p>
                </div>
    
                <div class="ekskul-card">
                    <img src="../../../Images/Ekskul-Ikon/MIND SPORTS.png">
                    <a href="../categories-ekskul-gurul/mind_sports.php">MIND SPORTS</a>
                    <p>(3 Ekskul)</p>
                </div>
    
                <div class="ekskul-card">
                    <img src="../../../Images/Ekskul-Ikon/Bahasa.png">
                    <a href="../categories-ekskul-guru/bahasa.php">BAHASA</a>
                    <p>(4 Ekskul)</p>
                </div>
    
                <div class="ekskul-card">
                    <img src="../../../Images/Ekskul-Ikon/BELA DIRI.png">
                    <a href="../categories-ekskul-guru/bela_diri.php">BELA DIRI</a>
                    <p>(2 Ekskul)</p>
                </div>
    
                <div class="ekskul-card">
                    <img src="../../../Images/Ekskul-Ikon/Esports.png">
                    <a href="../categories-ekskul-guru/esports.php">ESPORTS</a>
                    <p>(2 Ekskul)</p>
                </div>
    
                <div class="ekskul-card">
                    <img src="../../../Images/Ekskul-Ikon/ECONOMY BUSINESS.png">
                    <a href="../categories-ekskul-guru/economy_business.php">ECONOMY BUSINESS</a>
                    <p>(3 Ekskul)</p>
                </div>
    
                <div class="ekskul-card">
                    <img src="../../../Images/Ekskul-Ikon/Finance.png">
                    <a href="../categories-ekskul-guru/finance.php">FINANCE</a>
                    <p>(3 Ekskul)</p>
                </div>
    
                <div class="ekskul-card">
                    <img src="../../../Images/Ekskul-Ikon/MEDIA KREATIF.png">
                    <a href="../categories-ekskul-guru/media_kreatif.php">MEDIA KREATIF</a>
                    <p>(3 Ekskul)</p>
                </div>
    
                <div class="ekskul-card">
                    <img src="../../../Images/Ekskul-Ikon/Sains.png">
                    <a href="../categories-ekskul-guru/sains.php">SAINS</a>
                    <p>(2 Ekskul)</p>
                </div>
    
                <div class="ekskul-card">
                    <img src="../../../Images/Ekskul-Ikon/CULINARY CLUB.png">
                    <a href="../categories-ekskul-guru/culinary_club.php">CULINARY CLUB</a>
                    <p>(3 Ekskul)</p>
                </div>
            </section>
        </section>
    </main>
</body>
</html>