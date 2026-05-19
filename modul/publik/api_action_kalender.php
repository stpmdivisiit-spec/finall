<?php
error_reporting(0);
ob_start();

require_once "../../config/koneksi.php";

ob_clean();
header('Content-Type: application/json');

$action = $_GET['action'] ?? '';

// Pemetaan sinkronisasi otomatis unit kerja ke string category database
$unit_to_category = [
    'admin'         => 'event-info',
    'pemerintahan'  => 'event-warning',
    'sosiatri'      => 'event-success',
    'kemahasiswaan' => 'event-important',
    'perpustakaan'  => 'event-inverse',
    'sekretariat'   => 'event-inverse'
];

if($action == 'save') {
    $id       = $_POST['id'] ?? '';
    $title    = $_POST['title'] ?? '';
    $desc     = $_POST['description'] ?? '';
    $start    = $_POST['start_date'] ?? '';
    $end      = $_POST['end_date'] ?? '';
    $owner    = $_POST['unit_owner'] ?? 'admin';
    
    // Sinkronkan kolom category database berdasarkan dropdown unit pelaksana yang dipilih
    $category = $unit_to_category[$owner] ?? 'event-info';

    if(!empty($id)) {
        // AKSI EDIT (UPDATE DATA)
        $stmt = $koneksi->prepare("UPDATE events SET title=?, description=?, start_date=?, end_date=?, category=?, unit_owner=? WHERE id=?");
        $stmt->bind_param("ssssssi", $title, $desc, $start, $end, $category, $owner, $id);
    } else {
        // AKSI TAMBAH (INSERT DATA BARU)
        $stmt = $koneksi->prepare("INSERT INTO events (title, description, start_date, end_date, category, unit_owner) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $title, $desc, $start, $end, $category, $owner);
    }

    if($stmt->execute()) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => $koneksi->error]);
    }
    exit;
}

if($action == 'delete') {
    $id = $_POST['id'] ?? '';
    
    $stmt = $koneksi->prepare("DELETE FROM events WHERE id = ?");
    $stmt->bind_param("i", $id);
    
    if($stmt->execute()) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Gagal menghapus data agenda.']);
    }
    exit;
}
?>