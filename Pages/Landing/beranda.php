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
  <link rel="stylesheet" href="../../Styles/Landing/beranda.css">
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
      <a href="#" class="active link">Beranda</a>
      <a href="fitur.php" class="link">Fitur</a>
      <a href="tentang.php" class="link">Tentang</a>
      <a href="kontak.php" class="link">Kontak</a>
    </nav>

    <!-- MASUK & DAFTAR -->
    <div class="tombol-regis">
      <a href="../Auth/sign_in.php" class="login">Masuk</a>
      <a href="../Auth/sign_up.php" class="register">Daftar</a>
    </div>
  </header>

  <!-- BANNER UTAMA -->
  <section class="banner-utama">
    <h1>Selamat datang di <br> GoEkskul!</h1>
    <p>Daftar ekstrakurikuler jadi mudah dan dapatkan<br> informasi lebih lengkap bersama <b>GoEkskul!</b></p>
    <a href="../Auth/sign_up.php">Mulai Sekarang</a>
  </section>

  <!-- Apa itu GoEkskul -->
  <div class="container">
    <img src="../../Images/Ikon GoEkskul.png">
    <div class="content">
      <h2>Apa itu GoEkskul?</h2>
      <p><b>GoEkskul</b>  adalah website yang dikembangkan oleh <b>EkskulHub Team</b> dalam membantu siswa melakukan pendaftaran dan pemantauan informasi ekstrakurikuler di sekolah lebih mudah dan lengkap.</p>
      <a href="tentang.php">Lihat lebih banyak...</a>
    </div>
  </div>

  <!-- Kenapa Harus GoEkskul -->
  <section class="alasan">
    <div class="alasan-judul">
      <h1>Kenapa harus GoEkskul?</h1>
      <p>Berikut alasan kenapa kamu harus pilih GoEkskul!</p>
    </div>

    <div class="alasan-container">
      <!-- Card 1 -->
      <div class="card">
        <div class="icon-box">
            <div class="line"></div>
            <img src="../../Images/Card 1.png"/>
        </div>
        <h3>Pendaftaran Lebih Mudah</h3>
        <p>Siswa bisa mendaftar ekstrakurikuler kapan saja secara online, tanpa perlu formulir manual.</p>
      </div>

      <!-- Card 2 -->
      <div class="card">
        <div class="icon-box">
          <div class="line"></div>
          <img src="../../Images/Card 2.png" alt="Informasi Terpusat" />
        </div>
        <h3>Informasi Terpusat</h3>
        <p>Semua informasi terkait ekstrakurikuler, mulai dari jadwal, kegiatan, hingga pengumuman tersedia di satu platform.</p>
      </div>

      <!-- Card 3 -->
      <div class="card">
        <div class="icon-box">
          <div class="line"></div>
          <img src="../../Images/Card 3.png" alt="Transparan & Akurat" />
        </div>
        <h3>Transparan & Akurat</h3>
        <p>Data anggota ekstrakurikuler tercatat rapi sehingga meminimalisir kesalahan dan memudahkan monitoring.</p>
      </div>

      <!-- Card 4 -->
      <div class="card">
        <div class="icon-box">
          <div class="line"></div>
          <img src="../../Images/Card 4.png" alt="Akses Cepat" />
        </div>
        <h3>Akses Cepat</h3>
        <p>Siswa dan guru dapat dengan mudah mengakses informasi sesuai kebutuhan masing-masing.</p>
      </div>

      <!-- Card 5 -->
      <div class="card">
        <div class="icon-box">
          <div class="line"></div>
          <img src="../../Images/Card 5.png" alt="Mendukung Aktivitas Sekolah" />
        </div>
        <h3>Mendukung Aktivitas Sekolah</h3>
        <p>Membantu sekolah dalam mengelola ekstrakurikuler secara lebih efektif dan efisien.</p>
      </div>

      <!-- Card 6 -->
      <div class="card">
        <div class="icon-box">
          <div class="line"></div>
          <img src="../../Images/Card 6.png" alt="Ramah & Mudah Digunakan" />
        </div>
        <h3>Ramah & Mudah Digunakan</h3>
        <p>Desain simpel dengan navigasi yang jelas membuat GoEkskul nyaman dipakai semua pengguna.</p>
      </div>
    </div>
  </section>

  <!-- FITUR UTAMA -->
  <div class="goekskul-fitur-container">
    <div class="goekskul-fitur-header">
        <div class="goekskul-fitur-text">
            <h1 class="goekskul-fitur-judul">Fitur utama GoEkskul</h1>
            <p class="goekskul-fitur-deskripsi">Bantu kamu lebih mudah dalam eksplorasi GoEkskul!</p>
        </div>
        <a href="fitur.php">Lihat lebih lengkap...</a>
    </div>

    <div class="goekskul-fitur-scroll-wrapper">
        <div class="goekskul-fitur-card"> 
            <img src="../../Images/Fitur1.png" alt="Pendaftaran Online">
            <p>Pendaftaran <br> Online</p>
        </div>

        <div class="goekskul-fitur-card">
            <img src="../../Images/Fitur2.png" alt="Informasi Lengkap">
            <p>Informasi Lengkap</p>
        </div>

        <div class="goekskul-fitur-card">
            <img src="../../Images/Fitur3.png" alt="Absensi & Monitoring">
            <p>Absensi <br> & Monitoring</p>
        </div>

        <div class="goekskul-fitur-card">
            <img src="../../Images/Fitur4.png" alt="Dashboard Siswa & Guru">
            <p>Dashboard Siswa & Guru</p>
        </div>

        <div class="goekskul-fitur-card">
            <img src="../../Images/Fitur5.png" alt="Pengelolaan Ekskul">
            <p>Pengelolaan Ekskul</p>
        </div>
    </div>
  </div>

  <!-- ALUR PENDAFTARAN -->
  <div class="goekskul-alur-container">
    <div class="goekskul-alur-header-box">
        <h1>Alur pendaftaran</h1>
        <a href="kontak.php">Butuh Bantuan?</a>
    </div>

    <div class="goekskul-alur-langkah-wrapper">
        <div class="goekskul-alur-langkah">
            <h1>1. Tekan tombol “Daftar”</h1>
            <p>Masukkan data anda dan tekan “Buat akun”, kemudian pergi ke halaman masuk.</p>
        </div>

        <div class="goekskul-alur-langkah">
            <h1>2. Masukkan akun</h1>
            <p>Masukkan email dan kata sandi yang telah dibuat dan kemudian anda akan diarahkan ke dashboard siswa.</p>
        </div>

        <div class="goekskul-alur-langkah">
            <h1>3. Daftar ekskul</h1>
            <p>Anda dapat melihat semua informasi terkait ekskul dan dapat mendaftar pada ekskul yang anda minati!</p>
        </div>
    </div>
  </div>

  <!-- BANNER AKHIR -->
  <div class="goekskul-cta-banner">
    <h1>Tunggu apalagi?<br>Ayo mulai sekarang!</h1>
    <p>Satu klik untuk mulai perjalanan ekskulmu!</p>
     <div class="Button-keren">
      <a href="../Auth/Sign_up.php">Mulai Sekarang</a>
    </div>
  </div>

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
            <a href="#">Beranda</a>
            <a href="fitur.php">Fitur</a>
            <a href="tentang.php">Tentang</a>
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