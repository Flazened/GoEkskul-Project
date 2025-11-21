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
    <link rel="stylesheet" href="/Styles/Dashboard/Dashboard-Guru//sistem.css">
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
                            <h2>Daftar Ekskul</h2>
                        </a>
        
                        <a href="ekskul-saya.php" class="menu-list">
                            <i class="material-icons-outlined">star</i>
                            <h2>Ekskul Saya</h2>
                        </a>
        
                        <a href="absensi.php" class="menu-list">
                            <i class="material-icons-outlined">edit_calendar</i>
                            <h2 class= "active">Absensi</h2>
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
                    <h1><?=htmlspecialchars($user)?></h1>
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

<div class="basket">
    <p>Ekskul Basket</p>
</div>

  <div class="date-picker">
    <select class="year-select">
      <option>2025</option>
      <option>2024</option>
      <option>2023</option>
    </select>

    <select class="month-select">
      <option>January</option>
      <option>February</option>
      <option>March</option>
      <option>April</option>
      <option>May</option>
      <option>June</option>
      <option>July</option>
      <option>August</option>
      <option selected>September</option>
      <option>October</option>
      <option>November</option>
      <option>December</option>
    </select>
  </div>



<div class="tabel-container">
  <table class="tabel-eksul">
    <thead>
      <tr>
        <th class="">No</th>
        <th class="">Nama</th>
        <th class="">Minggu 1</th>
        <th class="">Minggu 2</th>
        <th class="">Minggu 3</th>
        <th class="">Minggu 4</th>
      </tr>
    </thead>
    <tbody>
      <tr><td>1</td><td>Adrian Petrovic</td><td>✔</td><td>✔</td><td></td><td></td></tr>
      <tr><td>2</td><td>Alexander Muller</td><td>✔</td><td>✔</td><td></td><td></td></tr>
      <tr><td>3</td><td>Daniel Novak</td><td>✔</td><td>✔</td><td></td><td></td></tr>
      <tr><td>4</td><td>Emil Kovacs</td><td>✔</td><td>✔</td><td></td><td></td></tr>
      <tr><td>5</td><td>Gabriel Santos</td><td>✔</td><td>✔</td><td></td><td></td></tr>
      <tr><td>6</td><td>Leon Fischer</td><td>✔</td><td>✔</td><td></td><td></td></tr>
      <tr><td>7</td><td>Lucas Schneider</td><td>✔</td><td>✔</td><td></td><td></td></tr>
      <tr><td>8</td><td>Markus Johansson</td><td>✔</td><td>✔</td><td></td><td></td></tr>
      <tr><td>9</td><td>Matteo Rossi</td><td>✔</td><td>✔</td><td></td><td></td></tr>
      <tr><td>10</td><td>Nikolai Dragunov</td><td>✔</td><td>✔</td><td></td><td></td></tr>
      <tr><td>11</td><td>Oliver Becker</td><td>✔</td><td>✔</td><td></td><td></td></tr>
      <tr><td>12</td><td>Pablo Ramirez</td><td>✔</td><td>✔</td><td></td><td></td></tr>
      <tr><td>13</td><td>Rafael Costa</td><td>✔</td><td>✔</td><td></td><td></td></tr>
      <tr><td>14</td><td>Samuel Lindberg</td><td>✔</td><td>✔</td><td></td><td></td></tr>
      <tr><td>15</td><td>Stefan Ivanov</td><td>✔</td><td>✔</td><td></td><td></td></tr>
      <tr><td>16</td><td>Theodor Klein</td><td>✔</td><td>✔</td><td></td><td></td></tr>
      <tr><td>17</td><td>Viktor Hansen</td><td>✔</td><td>✔</td><td></td><td></td\></tr>
      <tr><td>18</td><td>Vincent Genesius</td><td>✔</td><td>✔</td><td></td><td></td></tr>
      <tr><td>19</td><td>William Andersen</td><td>✔</td><td>✔</td><td></td><td></td></tr>
      <tr><td>20</td><td>Yannick Dupont</td><td>✔</td><td>✔</td><td></td><td></td></tr>
    </tbody>
  </table>
</div>

<div class="gitar">
    <p>Ekskul Gitar</p>
</div>

  <div class="date-picker">

    <select class="month-select2">
      <option>January</option>
      <option>February</option>
      <option>March</option>
      <option>April</option>
      <option>May</option>
      <option>June</option>
      <option>July</option>
      <option>August</option>
      <option selected>September</option>
      <option>October</option>
      <option>November</option>
      <option>December</option>
    </select>
  </div>

<div class="tabel-container2">
  <table class="tabel-eksul2">
    <thead>
      <tr>
        <th class="">No</th>
        <th class="">Nama</th>
        <th class="">Minggu 1</th>
        <th class="">Minggu 2</th>
        <th class="">Minggu 3</th>
        <th class="">Minggu 4</th>
      </tr>
    </thead>
    <tbody>
      <tr><td>1</td><td>Adrian Petrovic</td><td>✔</td><td>✔</td><td></td><td></td></tr>
      <tr><td>2</td><td>Alexander Muller</td><td>✔</td><td>✔</td><td></td><td></td></tr>
      <tr><td>3</td><td>Daniel Novak</td><td>✔</td><td>✔</td><td></td><td></td></tr>
      <tr><td>4</td><td>Emil Kovacs</td><td>✔</td><td>✔</td><td></td><td></td></tr>
      <tr><td>5</td><td>Gabriel Santos</td><td>✔</td><td>✔</td><td></td><td></td></tr>
      <tr><td>6</td><td>Leon Fischer</td><td>✔</td><td>✔</td><td></td><td></td></tr>
      <tr><td>7</td><td>Lucas Schneider</td><td>✔</td><td>✔</td><td></td><td></td></tr>
      <tr><td>8</td><td>Markus Johansson</td><td>✔</td><td>✔</td><td></td><td></td></tr>
      <tr><td>9</td><td>Matteo Rossi</td><td>✔</td><td>✔</td><td></td><td></td></tr>
      <tr><td>10</td><td>Nikolai Dragunov</td><td>✔</td><td>✔</td><td></td><td></td></tr>
      <tr><td>11</td><td>Oliver Becker</td><td>✔</td><td>✔</td><td></td><td></td></tr>
      <tr><td>12</td><td>Pablo Ramirez</td><td>✔</td><td>✔</td><td></td><td></td></tr>
    </tbody>
  </table>
</div>
        </section>
</body>
</html>