<?php
// api_extracurriculars.php
header('Content-Type: application/json; charset=utf-8');
require_once 'koneksi.php';

$query = "SELECT id, name, category, day, time, location, instructor_name, instructor_photo, activity_photo FROM extracurriculars ORDER BY category, name";
$result = mysqli_query($koneksi, $query);

$data = [];
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

echo json_encode(['status' => 'ok', 'data' => $data]);
