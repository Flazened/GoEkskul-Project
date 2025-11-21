<?php
session_start();

// Koneksi database
$host = "localhost";
$user = "root";
$pass = "";
$db = "goekskul_database"; // ganti sesuai nama database Anda

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// Jika user belum login, kembalikan ke halaman login
if (!isset($_SESSION['user'])) {
    header("Location: ../Auth/Sign_In.php");
    exit;
}

// Ambil ID dari URL
$id = $_GET['id'] ?? null;

if (!$id || !is_numeric($id)) {
    header("Location: dashboard.php");
    exit;
}

// Ambil data ekskul berdasarkan ID
$query = "SELECT id, name, category, instructor_name FROM extracurriculars WHERE id = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$ekskul = mysqli_fetch_assoc($result);

if (!$ekskul) {
    header("Location: dashboard.php");
    exit;
}

// Jika form disubmit, update data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $category = $_POST['category'] ?? '';
    $instructor_name = $_POST['instructor_name'] ?? '';

    $update_query = "UPDATE extracurriculars SET name = ?, category = ?, instructor_name = ? WHERE id = ?";
    $update_stmt = mysqli_prepare($conn, $update_query);
    mysqli_stmt_bind_param($update_stmt, "sssi", $name, $category, $instructor_name, $id);

    if (mysqli_stmt_execute($update_stmt)) {
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Gagal menyimpan perubahan.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Ekstrakurikuler</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="/Styles/Dashboard/Dashboard-Admin/edit.css">
    <link rel="stylesheet" href="/Styles/Dashboard/Dashboard-Admin/dashboardes.css">
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
                            <h2>Ekskul</h2>
                        </a>

                        <a href="Ekskul_Registrasi.php" class="menu-list">
                            <i class="material-icons-outlined">grid_view</i>
                            <h2>Peserta-Ekskul</h2>
                        </a>

                        <a href="users.php" class="menu-list">
                            <i class="material-icons-outlined">description</i>
                            <h2>Users</h2>
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

            <a href="#" class="profile">
                <img src="../../../Images/Person-Photo/Person-31.png">
                <div class="name-role">
                    <h1><?= htmlspecialchars($_SESSION['user'] ?? 'Belum diatur', ENT_QUOTES, 'UTF-8') ?></h1>
                    <p>ADMIN</p>
                </div>
            </a>
        </aside>

        <section class="dashboard">
            <section class="bottom">


                <div class="form-container">
                    <h2>Edit</h2>
                    <?php if (isset($error)): ?>
                        <p class="error"><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></p>
                    <?php endif; ?>

                    <form method="POST">
                        <div class="form-group">
                            <label for="name">Nama Ekskul</label>
                            <input type="text" name="name" id="name" value="<?= htmlspecialchars($ekskul['name'], ENT_QUOTES, 'UTF-8') ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="category">Kategori</label>
                            <input type="text" name="category" id="category" value="<?= htmlspecialchars($ekskul['category'], ENT_QUOTES, 'UTF-8') ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="instructor_name">Pembina</label>
                            <input type="text" name="instructor_name" id="instructor_name" value="<?= htmlspecialchars($ekskul['instructor_name'], ENT_QUOTES, 'UTF-8') ?>" required>
                        </div>

                        <button type="submit" class="btn">Simpan Perubahan</button>
                        <a href="dashboard.php" class="btn btn-back">Kembali</a>
                    </form>
                </div>
            </section>
        </section>
    </main>
</body>
</html>