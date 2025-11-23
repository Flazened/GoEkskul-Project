
# GoEkskul
merupakan Sistem Pendaftaran & Manajemen Ekstrakurikuler GoEkskul adalah sebuah aplikasi yang dirancang untuk mempermudah pengelolaan pendaftaran dan manajemen ekstrakurikuler di sekolah. Proyek ini dibuat untuk mengatasi masalah-masalah yang sering terjadi pada sistem manual, seperti risiko kesalahan data, kurangnya transparansi, dan sulitnya pemantauan.

# 👥Kontributor
- Vincent Genesius : UI/UX Designer
- Kevin : Front-End Developer
- Michael Yusliardy : Back-End Developer

# 💡Latar Belakang
Proyek ini dibangun untuk menyelesaikan beberapa masalah utama yang dihadapi dalam pengelolaan ekstrakurikuler secara konvensional: Tingginya Risiko Kesalahan Data: Pencatatan data pendaftar secara manual rentan terhadap human error, seperti salah ketik nama atau Nomor Induk Siswa (NIS). Keterbatasan Informasi & Transparansi: Siswa dan orang tua sering kali kesulitan mengakses informasi terkini mengenai jadwal, lokasi, dan pembina ekstrakurikuler. Kesulitan Rekapitulasi & Pemantauan: Panitia atau pembina kesulitan merekapitulasi data pendaftar dan memantau kehadiran anggota secara real-time. Potensi Manipulasi Absensi: Sistem absensi manual (tanda tangan) rentan terhadap praktik "titip absen". Informasi Cepat Tertimbun: Pengumuman penting seringkali tertimbun di grup chat, dan perubahan jadwal tidak sampai ke seluruh anggota tepat waktu, menyebabkan kebingungan.

# ✅Solusi yang Ditawarkan
-	Pendaftaran Ekskul secara digital
-	Profil Ekskul yang Lengkap dengan Informasi, Anggota dan Pembina.
-	Absensi digital menggunakan QR code
-	pengumuman yang terstruktur dari pembina untuk siswa
-	merekapitulasi secara otomatis data pendaftar dan kehadiran untuk memudahkan pemantauan oleh pembina.

# 👨‍👩‍👧‍👦Target Pengguna
-	Siswa – mendaftar ekskul & melakukan absensi
-	Pembina/Panitia – memantau pendaftaran, absensi, dan membuat pengumuman
-	Orang Tua – memantau jadwal & aktivitas anak

# 🗂️Fitur Utama Aplikasi
1.	Manajemen Pengguna (users)
       o	Tambah Pengguna
       o	Lihat daftar pengguna
       o	Edit data pengguna
       o	Hapus Pengguna
2.	Manajemen Ekstrakurikuler (extracurriculars)
       o	Tambah ekskul
       o	Lihat daftar ekskul
       o  	Edit Informasi ekskul
       o	Hapus Ekskul
3.	Pendaftaran Ekskul (extracurricular_registrations)
       o	Daftar ekskul
       o	Lihat Pendaftaran Ekskul
       o	Approved/Reject Pendaftaran
       o	Hapus pendaftaran

# 💻Teknologi yang digunakan
+--------------+--------------+
| Figma        | Design UI/UX |
+--------------+--------------+
| HTML         |              |
| CSS          |   Front End  |
| JavaScript   |              |
+--------------+--------------+
| PHP          |              |
| MySQL        |    BackEnd   |
| LAragon      |              |
+--------------+--------------+

# 🔁Alur Sistem (Flow)

User -> login -> Daftar Eskul -> Pending | Approved -> Masuk Ekskul
                                         | Rejected

# 🧱Entitas & Struktur Database
+------------------------------------+---------------------+
| Entitas                            |  Deskripsi          |
+------------------------------------+---------------------+
| **users**                          |  Data Pengguna      |
+------------------------------------+---------------------+
| **extracurriculars**               |  Informasi Ekskul   |
+------------------------------------+---------------------+
| **extracurricular_registrations**  |  Pendaftaran Eskul  |
+------------------------------------+---------------------+

# Struktur Field utama
+---------------------------------------------------------------------------------------------------+
| Tabel                               | Field                                                       |
+-------------------------------------+-------------------------------------------------------------+
| **users**                           | id, nama_lengkap, kelas, email kata_sandi, tanggal_daftar   |
+-------------------------------------+-------------------------------------------------------------+
| **extracurriculars**                | id, name, category, day, time, location, instructor_name,   |
|                                     | instructor_photo, activity_photo                            |
+-------------------------------------+-------------------------------------------------------------+
| **extracurricular_registrations**   | id, user_id, extracurricular_id, registration_date, status  |
+-------------------------------------+-------------------------------------------------------------+

# ⚙️ Instalasi & Setup Database

## 1. Clone Repository
```bash
git clone https://github.com/Flazened/GoEkskul-Project.git
cd GoEkskul-Project
```

## 2. Install & Jalankan Server
- Install **XAMPP / Laragon**
- Aktifkan **Apache & MySQL**

## 3. Import Database
- Buka phpMyAdmin  
  http://localhost/phpmyadmin
- Buat database baru **web_futsal**
- Import file `goekskul_database.sql`

## 4. Konfigurasi Database
```php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "web_futsal";
```

## 5. Jalankan Website
Akses aplikasi di browser Anda melalui URL lokal yang disediakan oleh Laragon.

# 📜 Lisensi
Lisensi MIT Hak Cipta Dengan ini diberikan izin, secara gratis, kepada siapa pun yang memperoleh salinan perangkat lunak ini dan file dokumentasi terkait ("Perangkat Lunak"), untuk berurusan dengan Perangkat Lunak tanpa batasan, termasuk tanpa batasan hak untuk menggunakan, menyalin, memodifikasi, menggabungkan, menerbitkan, mendistribusikan, mensublisensikan, dan/atau menjual salinan Perangkat Lunak, dan untuk mengizinkan orang yang kepadanya Perangkat Lunak disediakan untuk melakukannya, tunduk pada ketentuan berikut: Pemberitahuan hak cipta di atas dan pemberitahuan izin ini harus disertakan dalam semua salinan atau bagian substansial dari Perangkat Lunak. PERANGKAT LUNAK INI DISEDIAKAN "SEBAGAIMANA ADANYA", TANPA JAMINAN APA PUN, TERSURAT MAUPUN TERSIRAT, TERMASUK NAMUN TIDAK TERBATAS PADA JAMINAN KELAYAKAN DAGANG, KESESUAIAN UNTUK TUJUAN TERTENTU, DAN NON-PELANGGARAN. DALAM KONDISI APA PUN PENULIS ATAU PEMILIK HAK CIPTA TIDAK BERTANGGUNG JAWAB ATAS KLAIM, KERUSAKAN, ATAU TANGGUNG JAWAB LAINNYA, BAIK DALAM TINDAKAN KONTRAK, WANPRESTASI, ATAU LAINNYA, YANG TIMBUL DARI, DARI, ATAU SEHUBUNGAN DENGAN PERANGKAT LUNAK ATAU PENGGUNAAN ATAU PERDAGANGAN LAIN DALAM PERANGKAT LUNAK.

Lisensi MIT
Hak Cipta
Dengan ini diberikan izin, secara gratis, kepada siapa pun yang memperoleh salinan perangkat lunak ini dan file dokumentasi terkait ("Perangkat Lunak"), untuk berurusan dengan Perangkat Lunak tanpa batasan, termasuk tanpa batasan hak untuk menggunakan, menyalin, memodifikasi, menggabungkan, menerbitkan, mendistribusikan, mensublisensikan, dan/atau menjual salinan Perangkat Lunak, dan untuk mengizinkan orang yang kepadanya Perangkat Lunak disediakan untuk melakukannya, tunduk pada ketentuan berikut:
Pemberitahuan hak cipta di atas dan pemberitahuan izin ini harus disertakan dalam semua salinan atau bagian substansial dari Perangkat Lunak.
PERANGKAT LUNAK INI DISEDIAKAN "SEBAGAIMANA ADANYA", TANPA JAMINAN APA PUN, TERSURAT MAUPUN TERSIRAT, TERMASUK NAMUN TIDAK TERBATAS PADA JAMINAN KELAYAKAN DAGANG, KESESUAIAN UNTUK TUJUAN TERTENTU, DAN NON-PELANGGARAN. DALAM KONDISI APA PUN PENULIS ATAU PEMILIK HAK CIPTA TIDAK BERTANGGUNG JAWAB ATAS KLAIM, KERUSAKAN, ATAU TANGGUNG JAWAB LAINNYA, BAIK DALAM TINDAKAN KONTRAK, WANPRESTASI, ATAU LAINNYA, YANG TIMBUL DARI, DARI, ATAU SEHUBUNGAN DENGAN PERANGKAT LUNAK ATAU PENGGUNAAN ATAU PERDAGANGAN LAIN DALAM PERANGKAT LUNAK.






. 
