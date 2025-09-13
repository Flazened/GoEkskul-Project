GoEkskul
Sistem Pendaftaran dan Manajemen Ekstrakurikuler
GoEkskul adalah sebuah aplikasi yang dirancang untuk menyederhanakan dan mengotomatisasi proses pendaftaran dan manajemen ekstrakurikuler di sekolah. Aplikasi ini dibuat untuk mengatasi masalah-masalah utama dalam pengelolaan ekstrakurikuler secara manual.

<br>

GoEkskul Team
- Kevin
- Michael Yusliardy
- Vincent Genesius



⚙️ Panduan Instalasi (Development)
Untuk menjalankan proyek ini secara lokal, ikuti langkah-langkah berikut:

Clone Repositori:

Bash

git clone [URL_REPOSITORI_ANDA]
Siapkan Lingkungan Laragon:

Pastikan Laragon sudah terinstal dan berjalan.

Salin folder proyek ini ke direktori www di dalam folder Laragon.

Konfigurasi Database:

Buat database baru di MySQL (melalui Laragon atau phpMyAdmin).

Salin file .env.example menjadi .env di folder proyek.

Buka file .env dan sesuaikan kredensial database:

DB_DATABASE=nama_database_anda
DB_USERNAME=user_database_anda
DB_PASSWORD=password_database_anda
Instal Dependensi & Migrasi Database:

Buka terminal di folder proyek.

Instal dependensi Laravel:

Bash

composer install
Jalankan migrasi database untuk membuat tabel:

Bash

php artisan migrate
Jalankan Aplikasi:

Mulai server web melalui Laragon.

Akses aplikasi di browser Anda melalui URL lokal yang disediakan oleh Laragon.


💻 Teknologi & Arsitektur
Proyek GoEkskul dibangun dengan arsitektur Model-View-Controller (MVC), yang memisahkan logika aplikasi dari presentasi antarmuka pengguna. Berikut adalah komponen utama yang digunakan:

Database:

MySQL: Digunakan sebagai sistem manajemen database (DBMS) untuk menyimpan semua data, seperti informasi siswa, ekstrakurikuler, dan absensi.

Lingkungan Pengembangan:

Laragon: Digunakan sebagai local development environment untuk mempermudah instalasi dan konfigurasi server web (Apache), database (MySQL), dan bahasa pemrograman (PHP).

Web Framework & Bahasa Pemrograman:

Laravel (PHP): Digunakan sebagai back-end framework untuk membangun logika bisnis, mengelola interaksi dengan database, dan menyediakan API.

HTML, CSS, dan JavaScript: Digunakan untuk membangun sisi front-end aplikasi, menciptakan antarmuka yang interaktif dan responsif bagi pengguna.

Figma: Digunakan untuk merancang flowchart, wireframe, dan prototipe desain antarmuka pengguna (UI/UX).



💻 Latar Belakang Masalah
Pengelolaan ekstrakurikuler secara tradisional seringkali menghadapi tantangan berikut:

Tingginya Risiko Kesalahan Data: Pencatatan manual rentan terhadap human error, seperti salah ketik nama atau NIS.

Keterbatasan Informasi & Transparansi: Siswa dan orang tua kesulitan mendapatkan informasi terkini tentang jadwal, lokasi, dan pembina.

Kesulitan Rekapitulasi & Pemantauan: Panitia atau pembina kesulitan merekapitulasi data pendaftar dan memantau kehadiran secara real-time.

Potensi Manipulasi Absensi: Sistem absensi manual (tanda tangan) rentan terhadap praktik "titip absen".

Informasi Tidak Tersampaikan dengan Merata: Pengumuman penting seringkali tidak sampai ke seluruh anggota tepat waktu.

<br>

✅ Solusi yang Ditawarkan
GoEkskul menawarkan solusi digital dengan fitur-fitur berikut:

Pendaftaran Ekskul: Sistem pendaftaran digital yang mempermudah siswa mendaftar ekstrakurikuler.

Profil Ekstrakurikuler: Halaman detail untuk setiap ekskul yang berisi informasi lengkap, daftar anggota, dan pembina.

Absensi Digital: Absensi menggunakan QR code untuk mencegah manipulasi data.

Informasi & Pengumuman: Fitur pengumuman terstruktur dari pembina untuk siswa, seperti info lomba atau perubahan jadwal.

Rekapitulasi Otomatis: Sistem yang secara otomatis merekapitulasi data pendaftar dan kehadiran untuk memudahkan pemantauan.

<br>

👨‍👩‍👧‍👦 Target Pengguna
Proyek ini dirancang untuk tiga kelompok pengguna utama:

Siswa: Sebagai pengguna utama untuk pendaftaran dan absensi.

Pembina/Panitia: Untuk mengelola data pendaftar, absensi, dan pengumuman.

Orang Tua: Untuk memantau kegiatan dan keterlibatan anak.

<br>

Lisensi MIT

Dengan ini diberikan izin, secara gratis, kepada siapa pun yang memperoleh salinan perangkat lunak ini dan file dokumentasi terkait ("Perangkat Lunak"), untuk berurusan dengan Perangkat Lunak tanpa batasan, termasuk tanpa batasan hak untuk menggunakan, menyalin, memodifikasi, menggabungkan, menerbitkan, mendistribusikan, mensublisensikan, dan/atau menjual salinan Perangkat Lunak, dan untuk mengizinkan orang yang kepadanya Perangkat Lunak disediakan untuk melakukannya, tunduk pada ketentuan berikut:

Pemberitahuan hak cipta di atas dan pemberitahuan izin ini harus disertakan dalam semua salinan atau bagian substansial dari Perangkat Lunak.

PERANGKAT LUNAK INI DISEDIAKAN "SEBAGAIMANA ADANYA", TANPA JAMINAN APA PUN, TERSURAT MAUPUN TERSIRAT, TERMASUK NAMUN TIDAK TERBATAS PADA JAMINAN KELAYAKAN DAGANG, KESESUAIAN UNTUK TUJUAN TERTENTU, DAN NON-PELANGGARAN. DALAM KONDISI APA PUN PENULIS ATAU PEMILIK HAK CIPTA TIDAK BERTANGGUNG JAWAB ATAS KLAIM, KERUSAKAN, ATAU TANGGUNG JAWAB LAINNYA, BAIK DALAM TINDAKAN KONTRAK, WANPRESTASI, ATAU LAINNYA, YANG TIMBUL DARI, DARI, ATAU SEHUBUNGAN DENGAN PERANGKAT LUNAK ATAU PENGGUNAAN ATAU PERDAGANGAN LAIN DALAM PERANGKAT LUNAK.

