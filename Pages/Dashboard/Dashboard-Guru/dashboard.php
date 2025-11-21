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
    <link rel="stylesheet" href="/Styles/Dashboard/Dashboard-Guru/dashboard.css">
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
        
                        <a href="Ekskul-Saya.php" class="menu-list">
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
                <h1>Dashboard</h1>
                <div class="search-bar">
                    <input type="text" placeholder="Search">
                    <a href="#"><i class="material-icons-outlined">search</i></a>
                </div>
            </section>

            <section class="bottom">
                <section class="banner">
                    <h1>Hai, <?=htmlspecialchars("$user")?>!</h1>
                    <p>Semoga harimu menyenangkan!</p>
                </section>

                <section class="full-data">
                    <div class="left">
                        <div class="ekskul-saya">
                            <h1>Ekskul Saya</h1>
                            <table class="styled-table">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Waktu</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td>IT Software</td>
                                        <td>17.00 WIB</td>
                                    </tr>

                                    <tr>
                                        <td>Web Technologies</td>
                                        <td>14.30 WIB</td>
                                    </tr>
                                </tbody>
                            </table>
                            <a href="Ekskul-Saya.php">Lihat lebih lengkap</a>
                        </div>

                        <div class="ekskul-terdekat">
                            <h1>Ekskul Terdekat</h1>
                            <table class="styled-table">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Hari</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td>IT Software</td>
                                        <td>Selasa</td>
                                    </tr>

                                    <tr>
                                        <td>Web Technologies</td>
                                        <td>Rabu</td>
                                    </tr>
                                </tbody>
                            </table>
                            <a href="Ekskul-saya.php">Lihat lebih lengkap</a>
                        </div>
                    </div>

                    <div class="daftar-ekskul">
                        <h1>Daftar Ekskul</h1>
                        <table class="styled-table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Jumlah Peserta</th>
                                    <th>Pembina</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Basket</td>
                                    <td>20 Orang</td>
                                    <td>Herman</td>
                                </tr>

                                <tr>
                                    <td>2</td>
                                    <td>Futsal</td>
                                    <td>25 Orang</td>
                                    <td>Lukas Schneider</td>
                                </tr>

                                <tr>
                                    <td>3</td>
                                    <td>Voli</td>
                                    <td>20 Orang</td>
                                    <td>Marco Rossi</td>
                                </tr>

                                <tr>
                                    <td>4</td>
                                    <td>Badminton</td>
                                    <td>30 Orang</td>
                                    <td>Julien Laurent</td>
                                </tr>

                                <tr>
                                    <td>5</td>
                                    <td>Band</td>
                                    <td>6 Orang</td>
                                    <td>David Muller</td>
                                </tr>

                                <tr>
                                    <td>6</td>
                                    <td>Modern Dance</td>
                                    <td>10 Orang</td>
                                    <td>Sofia Ivanova</td>
                                </tr>

                                <tr>
                                    <td>7</td>
                                    <td>Film Pendek</td>
                                    <td>12 Orang</td>
                                    <td>Lukas Moretti</td>
                                </tr>

                                <tr>
                                    <td>8</td>
                                    <td>Musik Tradisional Cina</td>
                                    <td>12 Orang</td>
                                    <td>Chen Wei</td>
                                </tr>
                            </tbody>
                        </table>
                        <a href="Daftar-ekskul.php">Lihat lainnya</a>
                    </div>
                </section>
            </section>
        </section>
    </main>
</body>
</html>