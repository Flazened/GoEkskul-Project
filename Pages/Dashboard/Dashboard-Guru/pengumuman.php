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
    <link rel="stylesheet" href="/Styles/Dashboard/Dashboard-Guru/pengumuman.css">
    <style>
        .information-card {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            cursor: pointer;
        }

        .information-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 12px rgba(0,0,0,0.15);
        }

        .information-card:active {
            transform: translateY(0);
        }
    </style>
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

                        <a href="#" class="menu-list">
                            <i class="material-icons-outlined">campaign</i>
                            <h2 class="active">Pengumuman</h2>
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
                <img src="../../../Images/Person-Photo/Person-2.jpg">
                <div class="name-role">
                    <h1><?=Htmlspecialchars($user)?></h1>
                    <p>PEMBINA</p>
                </div>
            </a>
        </aside>

        <section class="dashboard">
            <section class="top">
                <h1>Pengumuman</h1>
                <div class="search-bar">
                    <input type="text" placeholder="Search">
                    <a href="#"><i class="material-icons-outlined">search</i></a>
                </div>
            </section>

            <section class="pengumuman-konten">
                <section class="list-information">
                    <div class="information-card" onclick="showDetail('alex')">
                        <div class="sender">
                            <img src="../../../Images/Person-Photo/Person-2.jpg">
                            <div class="name-date">
                                <h1>Alex Fischer</h1>
                                <p>Senin 12:53</p>
                            </div>
                        </div>
                        <h2>BASKET CLUB</h2>
                    </div>

                    <div class="information-card" onclick="showDetail('clara')">
                        <div class="sender">
                            <img src="../../../Images/Person-Photo/Person-4.jpg">
                            <div class="name-date">
                                <h1>Clara Rossi</h1>
                                <p>Minggu 16:05</p>
                            </div>
                        </div>
                        <h2>TARI TRADISIONAL</h2>
                    </div>

                    <div class="information-card" onclick="showDetail('lukas')">
                        <div class="sender">
                            <img src="../../../Images/Person-Photo/Person-7.jpg">
                            <div class="name-date">
                                <h1>Lukas Moretti</h1>
                                <p>Jumat 13:23</p>
                            </div>
                        </div>
                        <h2>FILM PENDEK</h2>
                    </div>

                    <div class="information-card" onclick="showDetail('julien')">
                        <div class="sender">
                            <img src="../../../Images/Person-Photo/Person-10.jpg">
                            <div class="name-date">
                                <h1>Julien Laurent</h1>
                                <p>Jumat 14:03</p>
                            </div>
                        </div>
                        <h2>BADMINTON</h2>
                    </div>

                    <div class="information-card" onclick="showDetail('sophia')">
                        <div class="sender">
                            <img src="../../../Images/Person-Photo/Person-3.jpg">
                            <div class="name-date">
                                <h1>Sophia Andersson</h1>
                                <p>Kamis 10:42</p>
                            </div>
                        </div>
                        <h2>ENGLISH CLUB</h2>
                    </div>

                    <div class="information-card" onclick="showDetail('nora')">
                        <div class="sender">
                            <img src="../../../Images/Person-Photo/Person-6.jpg">
                            <div class="name-date">
                                <h1>Nora Schmidt</h1>
                                <p>Rabu 08:33</p>
                            </div>
                        </div>
                        <h2>WEB TECHNOLOGIES</h2>
                    </div>
                </section>

                <section class="detail-information-board" id="detail-board">
                    <div class="sender">
                        <img src="../../../Images/Person-Photo/Person-2.jpg" id="detail-sender-img">
                        <div class="name-date">
                            <h1 id="detail-sender-name">Alex Fischer</h1>
                            <p id="detail-sender-date">Rabu 08:33</p>
                        </div>
                    </div>

                    <div class="detail-information">
                        <h1 id="detail-title">PENGUMUMAN EKSKUL BASKET!</h1>
                        <p id="detail-content">Selamat siang anak-anak, mengingatkan kembali besok ekskul basket akan dimulai besok jam 15.00. Diharapkan semuanya istirahat yang cukup ya. <br> <br> <b>Berikut nama-nama hasil seleksi tim untuk mengikuti Liga Nasional Tahun 2025.</b> <br> <br> <b>Starting Five:</b> <br> 1. Alexander Muller (PG) [Kapten] <br> 2. Lucas Schneider (SG) <br> 3. Matteo Rossi (SF) <br> 4. Daniel Novak (PF) <br> 5. Stefan Ivanov (C) <br> <br> <b>Cadangan:</b> <br> 6. Markus Johansson (SG) <br> 7. Adrian Petrovic (PF) <br> 8. Leon Fischer (SF) <br> 9. Rafael Costa (PG) <br> 10. Viktor Hansen (C) <br> <br> Selamat mempersiapkan diri anak-anak selalu jaga kesehatan dan minum air yang banyak. Tuhan Yesus memberkati 😇</p>
                    </div>
                </section>

            </section>
        </section>
    </main>

    <script>
        const announcements = {
            alex: {
                img: '../../../Images/Person-Photo/Person-2.jpg',
                name: 'Alex Fischer',
                date: 'Senin 12:53',
                title: 'PENGUMUMAN EKSKUL BASKET!',
                content: 'Selamat siang anak-anak, mengingatkan kembali besok ekskul basket akan dimulai besok jam 15.00. Diharapkan semuanya istirahat yang cukup ya. <br> <br> <b>Berikut nama-nama hasil seleksi tim untuk mengikuti Liga Nasional Tahun 2025.</b> <br> <br> <b>Starting Five:</b> <br> 1. Alexander Muller (PG) [Kapten] <br> 2. Lucas Schneider (SG) <br> 3. Matteo Rossi (SF) <br> 4. Daniel Novak (PF) <br> 5. Stefan Ivanov (C) <br> <br> <b>Cadangan:</b> <br> 6. Markus Johansson (SG) <br> 7. Adrian Petrovic (PF) <br> 8. Leon Fischer (SF) <br> 9. Rafael Costa (PG) <br> 10. Viktor Hansen (C) <br> <br> Selamat mempersiapkan diri anak-anak selalu jaga kesehatan dan minum air yang banyak. Tuhan Yesus memberkati 😇'
            },
            clara: {
                img: '../../../Images/Person-Photo/Person-4.jpg',
                name: 'Clara Rossi',
                date: 'Minggu 16:05',
                title: 'PENGUMUMAN EKSKUL TARI TRADISIONAL!',
                content: 'Halo para penari muda! Latihan minggu depan akan fokus pada tarian Saman dan Poco-Poco. Harap bawa kostum latihan dan sepatu olahraga yang nyaman. <br> <br> <b>Perubahan Jadwal:</b> <br> - Senin: 16.00-17.30 (Gedung Serbaguna Lantai 2) <br> - Kamis: 15.30-17.00 (Aula Utama) <br> <br> <b>Pentas Akhir Semester:</b> <br> Akan dilaksanakan pada 15 Desember 2025 di Gedung Pertemuan. Semua anggota wajib hadir latihan tambahan mulai 1 Desember. <br> <br> Jaga semangat dan kekompakan tim! Kita bisa menang bersama 💃🕺'
            },
            lukas: {
                img: '../../../Images/Person-Photo/Person-7.jpg',
                name: 'Lukas Moretti',
                date: 'Jumat 13:23',
                title: 'PENGUMUMAN EKSKUL FILM PENDEK!',
                content: 'Teman-teman Film Pendek, minggu depan kita akan mulai proses syuting film pendek tema "Kehidupan Sekolah". <br> <br> <b>Divisi yang dibutuhkan:</b> <br> 1. Aktor/A atris (5 orang) <br> 2. Kameramen (3 orang) <br> 3. Penata Suara (2 orang) <br> 4. Editor Video (2 orang) <br> 5. Penata Artistik (3 orang) <br> <br> <b>Deadline Pendaftaran:</b> <br> Senin, 24 November 2025 pukul 15.00. <br> <br> Siapa pun yang berminat, silakan daftar di meja saya atau DM saya di grup WhatsApp. Mari kita buat film terbaik bersama! 🎬'
            },
            julien: {
                img: '../../../Images/Person-Photo/Person-10.jpg',
                name: 'Julien Laurent',
                date: 'Jumat 14:03',
                title: 'PENGUMUMAN EKSKUL BADMINTON!',
                content: 'Atlet-atlet badminton yang hebat, turnamen internal akan digelar bulan depan! <br> <br> <b>Turnamen Internal Badminton 2025:</b> <br> - Tanggal: 5-7 Desember 2025 <br> - Lokasi: Lapangan Badminton Indoor <br> - Kategori: Tunggal Putra, Tunggal Putri, Ganda Putra, Ganda Putri, Ganda Campuran <br> <br> <b>Pendaftaran:</b> <br> Silakan isi formulir pendaftaran di Google Form (link di grup WA) sebelum 25 November 2025. <br> <br> Hadiah menanti pemenang! Jangan lupa latihan rutin setiap hari Rabu dan Sabtu. Keep smashing! 🏸'
            },
            sophia: {
                img: '../../../Images/Person-Photo/Person-3.jpg',
                name: 'Sophia Andersson',
                date: 'Kamis 10:42',
                title: 'PENGUMUMAN EKSKUL ENGLISH CLUB!',
                content: 'Hello everyone! We have exciting news for our English Club members. <br> <br> <b>English Debate Competition:</b> <br> - Date: 20 December 2025 <br> - Theme: "Technology in Education" <br> - Teams: 3 people per team <br> - Registration Deadline: 30 November 2025 <br> <br> <b>Special Workshop:</b> <br> - Guest Speaker: Mr. James Wilson (Native Speaker from UK) <br> - Date: 10 December 2025 <br> - Time: 14.00-16.00 <br> <br> Don\'t miss this opportunity to improve your English skills and win amazing prizes! Let\'s speak confidently together! 🌍📚'
            },
            nora: {
                img: '../../../Images/Person-Photo/Person-6.jpg',
                name: 'Nora Schmidt',
                date: 'Rabu 08:33',
                title: 'PENGUMUMAN EKSKUL WEB TECHNOLOGIES!',
                content: 'Hi Web Tech enthusiasts! Our next project is coming up. <br> <br> <b>Project: School Website Redesign</b> <br> - Timeline: 1 December 2025 - 20 January 2026 <br> - Team Structure: Frontend (4), Backend (3), UI/UX Designer (2), Project Manager (1) <br> <br> <b>Skills Required:</b> <br> - HTML, CSS, JavaScript (Frontend) <br> - PHP, MySQL (Backend) <br> - Figma, Adobe XD (UI/UX) <br> <br> <b>Registration:</b> <br> Please fill the form by 22 November 2025. Selected members will be announced on 25 November. <br> <br> Let\'s build something amazing together! Code with passion! 💻🚀'
            }
        };

        function showDetail(teacherKey) {
            const announcement = announcements[teacherKey];
            
            document.getElementById('detail-sender-img').src = announcement.img;
            document.getElementById('detail-sender-name').textContent = announcement.name;
            document.getElementById('detail-sender-date').textContent = announcement.date;
            document.getElementById('detail-title').textContent = announcement.title;
            document.getElementById('detail-content').innerHTML = announcement.content;
        }
    </script>
</body>
</html>