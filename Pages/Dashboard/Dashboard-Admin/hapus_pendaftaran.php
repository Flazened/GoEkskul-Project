<?php
session_start();

// Pastikan hanya admin yang bisa menghapus
if (!isset($_SESSION['user'])) {
    http_response_code(403);
    echo json_encode(['success' => false, 'message' => 'Akses ditolak.']);
    exit;
}

include '../../../Config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? null;

    if (!$id || !is_numeric($id)) {
        echo json_encode(['success' => false, 'message' => 'ID tidak valid.']);
        exit;
    }

    $stmt = $koneksi->prepare("DELETE FROM extracurricular_registrations WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        if ($stmt->affected_rows > 0) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Data tidak ditemukan.']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Gagal menghapus data.']);
    }

    $stmt->close();
} else {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Metode tidak diizinkan.']);
}
?>