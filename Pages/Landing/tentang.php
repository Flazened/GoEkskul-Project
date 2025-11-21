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
    <link rel="stylesheet" href="../../Styles/Landing/tentang.css">
</head>

<body>
    <!-- HEADER -->
    <header>
        <!-- LOGO -->
        <div class="logo">
            <img src="../../Images/Ikon GoEkskul.png">
            <h1>GoEkskul</h1>
        </div>

        <!-- NAVIGATION -->
        <nav>
            <a href="beranda.php" class="link">Beranda</a>
            <a href="fitur.php" class="link">Fitur</a>
            <a href="#" class="active link">Tentang</a>
            <a href="kontak.php" class="link">Kontak</a>
        </nav>

        <!-- MASUK & DAFTAR -->
        <div class="tombol-regis">
            <a href="../Auth/Sign_in.php" class="login">Masuk</a>
            <a href="../Auth/Sign_up.php" class="register">Daftar</a>
        </div>
    </header>

    <!-- BANNER UTAMA -->
    <section class="banner-utama">
        <h1>Platform digital <br> ekstrakurikuler!</h1>
        <p><b>GoEkskul</b> hadir untuk mempermudah proses pendaftaran, <br>absensi, dan pengelolaan ekskul. Transparan, cepat, dan <br>bisa diakses kapan pun oleh siswa maupun guru.</p>
    </section>

    <!-- VISI & EKSKULHUB TEAM -->
    <section class="visidanteam">
        <div class="visi">
            <h1>Visi Kami</h1>
            <p>Menciptakan platform digital terpercaya yang <br>memudahkan siswa dalam mengakses dan berpartisipasi <br>dalam ekstrakurikuler sehingga mendukung terciptanya <br>generasi pelajar yang aktif, kreatif, dan berprestasi baik.</p>
        </div>

        <div class="team">
            <img src="../../Images/IMG-TEAM.png">
            <div class="teampg">
                <h1>EkskulHub Team</h1>
                <p><b>EkskulHub Team</b> adalah tim pengembang di balik lahirnya <b>GoEkskul.</b> Berawal dari kepedulian terhadap proses ekstrakurikuler di sekolah yang masih manual dan kurang efisien, kami berkomitmen menghadirkan solusi digital yang lebih praktis, transparan, dan mudah digunakan oleh siswa, guru, maupun pihak sekolah.</p>
                <p>Dengan semangat kolaborasi dan inovasi, kami terus mengembangkan <b>GoEkskul</b> agar menjadi platform yang bermanfaat, membantu pengelolaan ekskul lebih terorganisir, serta mendukung siswa dalam mengeksplorasi minat dan bakatnya.</p>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer>
        <section class="footer-top">
            <section class="footer-column-1">
                <div class="goekskul-logo-display">
                    <img src="../../Images/Ikon GoEkskul.png">
                    <h1>GoEkskul</h1>
                </div>

                <section class="footer-navigation">
                    <div class="goekskul-kolom-navigasi">
                        <h1>Navigasi</h1>
                        <a href="beranda.php">Beranda</a>
                        <a href="fitur.php">Fitur</a>
                        <a href="#">Tentang</a>
                        <a href="kontak.php">Kontak</a>
                    </div>

                    <div class="goekskul-kolom-kontak">
                        <h1>Kontak</h1>
                        <div class="kontak-information">
                            <i class="material-icons-outlined">mail</i>
                            <h2>goekskulid@gmail.com</h2>
                        </div>

                        <div class="kontak-information">
                            <i class="material-icons-outlined">location_on</i>
                            <h2>Pontianak, Kalimantan <br> Barat, Indonesia</h2>
                        </div>

                        <div class="kontak-information">
                            <i class="material-icons-outlined">call</i>
                            <h2>+62-897-3871-170</h2>
                        </div>
                    </div>

                    <div class="goekskul-kolom-navigasi">
                        <h1>Bantuan</h1>
                        <a href="#">Customer Support</a>
                        <a href="#">Terms and Services</a>
                        <a href="#">Privacy Policy</a>
                        <a href="#">Cancellation and Refund Policy</a>
                    </div>
                </section>
            </section>

            <section class="footer-column-2">
                <div class="goekskul-map">
                    <img src="../../Images/Map.png"></img>
                </div>

                <div class="goekskul-sosmed">
                    <h1>Ikuti kami</h1>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-linkedin"></i></a>
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-x-twitter"></i></a>
                </div>
            </section>
        </section>
    
        <div class="goekskul-hak-cipta">Copyright © 2025 GoEkskul All Rights Reserved</div>
    </footer>
</body>
</html>