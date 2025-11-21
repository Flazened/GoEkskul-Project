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
    <link rel="stylesheet" href="../../Styles/Landing/kontak.css">
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
            <a href="tentang.php" class="link">Tentang</a>
            <a href="#" class="active link">Kontak</a>
        </nav>

        <!-- MASUK & DAFTAR -->
        <div class="tombol-regis">
            <a href="../Auth/Sign_in.php" class="login">Masuk</a>
            <a href="../Auth/Sign_up.php" class="register">Daftar</a>
        </div>
    </header>

    <!-- MAIN CONTENT -->
    <main class="kontak-full">
        <h1>Ada Pertanyaan? <br> Kami Siap Bantu!</h1>
        <section class="kontak-main">
            <section class="kontak-left">
                <div class="left-text">
                    <h1>Informasi Kontak</h1>
                    <p><b>EkskulHub Team</b> siap membantu <br> biar pengalamanmu makin mudah <br> dan lancar.</p>
                </div>

                <section class="kontak-detail">
                    <div class="information-detail">
                        <i class="material-icons-outlined">call</i>
                        <div class="detail">
                            <h1>Telepon Kami</h1>
                            <p>+62 897-3871-170</p>
                        </div>
                    </div>

                    <div class="information-detail">
                        <i class="material-icons-outlined">mail</i>
                        <div class="detail">
                            <h1>Email Kami</h1>
                            <p>goekskulid@gmail.com</p>
                        </div>
                    </div>

                    <div class="information-detail">
                        <i class="material-icons-outlined">location_on</i>
                        <div class="detail">
                            <h1>Alamat</h1>
                            <p>Pontianak, Kalimantan Barat, <br>Indonesia</p>
                        </div>
                    </div>
                </section>

                <section class="follow-us">
                    <h1>Ikuti Kami</h1>
                    <div class="social-media-ikon">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-x-twitter"></i></a>
                    </div>
                </section>
            </section>

            <section class="kontak-right">
                <div class="text-box">
                    <h1>Nama</h1>
                    <input type="nama">
                </div>

                <div class="text-box">
                    <h1>Email</h1>
                    <input type="email">
                </div>

                <div class="text-box-pesan">
                    <h1>Pesan</h1>
                    <input type="pesan" class="pesan-text-box">
                </div>

                <a href="#">Kirim Pesan</a>
            </section>
        </section>
    </main>

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
                        <a href="tentang.php">Tentang</a>
                        <a href="#">Kontak</a>
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