**GoEkskul**: Sistem Pendaftaran & Manajemen Ekstrakurikuler
GoEkskul adalah sebuah aplikasi yang dirancang untuk mempermudah pengelolaan pendaftaran dan manajemen ekstrakurikuler di sekolah. Proyek ini dibuat untuk mengatasi masalah-masalah yang sering terjadi pada sistem manual, seperti risiko kesalahan data, kurangnya transparansi, dan sulitnya pemantauan.

👥 Kontributor
Vincent Genesius : UI/UX Designer 

Kevin : Front-End Developer 

Michael Yusliardy : Back-End Developer 


💡 Latar Belakang Masalah
Proyek ini dibangun untuk menyelesaikan beberapa masalah utama yang dihadapi dalam pengelolaan ekstrakurikuler secara konvensional:
Tingginya Risiko Kesalahan Data: Pencatatan data pendaftar secara manual rentan terhadap human error, seperti salah ketik nama atau Nomor Induk Siswa (NIS).
Keterbatasan Informasi & Transparansi: Siswa dan orang tua sering kali kesulitan mengakses informasi terkini mengenai jadwal, lokasi, dan pembina ekstrakurikuler.
Kesulitan Rekapitulasi & Pemantauan: Panitia atau pembina kesulitan merekapitulasi data pendaftar dan memantau kehadiran anggota secara real-time.
Potensi Manipulasi Absensi: Sistem absensi manual (tanda tangan) rentan terhadap praktik "titip absen".
Informasi Cepat Tertimbun: Pengumuman penting seringkali tertimbun di grup chat, dan perubahan jadwal tidak sampai ke seluruh anggota tepat waktu, menyebabkan kebingungan.


✅ Solusi yang Ditawarkan
GoEkskul adalah solusi digital yang mengotomatisasi proses pendaftaran dan absensi, serta menyediakan platform terpusat untuk informasi. Fitur-fitur utama yang ditawarkan meliputi:
Pendaftaran Ekskul: Sistem pendaftaran digital yang mempermudah siswa mendaftar ekstrakurikuler yang diinginkan.
Profil Ekstrakurikuler: Halaman detail untuk setiap ekskul yang berisi informasi lengkap, daftar anggota, dan pembina.
Absensi Digital: Absensi menggunakan QR code untuk mencegah adanya manipulasi data.
Informasi & Pengumuman: Fitur pengumuman yang terstruktur dari pembina untuk siswa, seperti info lomba atau perubahan jadwal.
Rekapitulasi Otomatis: Sistem yang secara otomatis merekapitulasi data pendaftar dan kehadiran untuk memudahkan pemantauan oleh pembina.

👨‍👩‍👧‍👦 Target Pengguna
Proyek ini dirancang untuk melayani tiga kelompok pengguna utama:
Siswa: Sebagai pengguna utama untuk mendaftar ekstrakurikuler, melihat informasi, dan melakukan absensi digital.
Pembina/Panitia: Untuk memantau pendaftar, mengelola absensi, membuat rekap data, dan menyebarkan pengumuman.
Orang Tua: Untuk memantau kegiatan, jadwal, dan keterlibatan anak dalam ekstrakurikuler.

💻 Teknologi & Arsitektur
Proyek GoEkskul dibangun dengan arsitektur Model-View-Controller (MVC), yang memisahkan logika aplikasi dari presentasi antarmuka pengguna. Berikut adalah komponen utama yang digunakan:
Front-End: HTML, CSS, dan JavaScript.
Back-End: PHP dengan framework Laravel.
Database: MySQL.
Lingkungan Pengembangan Lokal: Laragon.
Desain: Figma untuk flowchart dan wireframe.

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

Buka file .env dan sesuaikan kredensial database Anda.

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

Lisensi MIT
Hak Cipta
Dengan ini diberikan izin, secara gratis, kepada siapa pun yang memperoleh salinan perangkat lunak ini dan file dokumentasi terkait ("Perangkat Lunak"), untuk berurusan dengan Perangkat Lunak tanpa batasan, termasuk tanpa batasan hak untuk menggunakan, menyalin, memodifikasi, menggabungkan, menerbitkan, mendistribusikan, mensublisensikan, dan/atau menjual salinan Perangkat Lunak, dan untuk mengizinkan orang yang kepadanya Perangkat Lunak disediakan untuk melakukannya, tunduk pada ketentuan berikut:
Pemberitahuan hak cipta di atas dan pemberitahuan izin ini harus disertakan dalam semua salinan atau bagian substansial dari Perangkat Lunak.
PERANGKAT LUNAK INI DISEDIAKAN "SEBAGAIMANA ADANYA", TANPA JAMINAN APA PUN, TERSURAT MAUPUN TERSIRAT, TERMASUK NAMUN TIDAK TERBATAS PADA JAMINAN KELAYAKAN DAGANG, KESESUAIAN UNTUK TUJUAN TERTENTU, DAN NON-PELANGGARAN. DALAM KONDISI APA PUN PENULIS ATAU PEMILIK HAK CIPTA TIDAK BERTANGGUNG JAWAB ATAS KLAIM, KERUSAKAN, ATAU TANGGUNG JAWAB LAINNYA, BAIK DALAM TINDAKAN KONTRAK, WANPRESTASI, ATAU LAINNYA, YANG TIMBUL DARI, DARI, ATAU SEHUBUNGAN DENGAN PERANGKAT LUNAK ATAU PENGGUNAAN ATAU PERDAGANGAN LAIN DALAM PERANGKAT LUNAK.






