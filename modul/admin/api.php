<?php
// Tahan error agar tidak merusak format JSON
error_reporting(0);
ob_start();

// Panggil koneksi database (Sesuaikan mundurnya folder ../ sesuai letak file ini)
require_once "../../config/koneksi.php"; 

ob_clean();
header('Content-Type: application/json');

$action = isset($_GET['action']) ? $_GET['action'] : '';

// 1. FUNGSI MENAMPILKAN DATA (READ)
if ($action == 'fetch') {
    $result = $koneksi->query("SELECT * FROM events ORDER BY start_date ASC");
    $data = [];
    while ($row = $result->fetch_assoc()) {
        $data[] = [
            'id'    => $row['id'],
            'title' => $row['title'],
            'text'  => $row['description'],
            'start' => date('Y-m-d\TH:i:s', strtotime($row['start_date'])),
            'end'   => date('Y-m-d\TH:i:s', strtotime($row['end_date'])),
            'class' => $row['category']
        ];
    }
    echo json_encode($data);
    exit;
}

// 2. FUNGSI SIMPAN & EDIT DATA (CREATE / UPDATE)
if ($action == 'save') {
    $title = $_POST['title'];
    $desc  = $_POST['description'];
    $start = date('Y-m-d H:i:s', strtotime($_POST['start_date']));
    $end   = date('Y-m-d H:i:s', strtotime($_POST['end_date']));
    $cat   = $_POST['category'];
    $id    = isset($_POST['id']) ? $_POST['id'] : '';

    if (!empty($id)) {
        // Mode Edit (Update)
        $stmt = $koneksi->prepare("UPDATE events SET title=?, description=?, start_date=?, end_date=?, category=? WHERE id=?");
        $stmt->bind_param("sssssi", $title, $desc, $start, $end, $cat, $id);
    } else {
        // Mode Tambah Baru (Insert)
        $stmt = $koneksi->prepare("INSERT INTO events (title, description, start_date, end_date, category) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $title, $desc, $start, $end, $cat);
    }

    if ($stmt->execute()) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => $koneksi->error]);
    }
    exit;
}

// 3. FUNGSI HAPUS DATA (DELETE)
if ($action == 'delete') {
    $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
    
    $stmt = $koneksi->prepare("DELETE FROM events WHERE id=?");
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Gagal menghapus data']);
    }
    exit;
}
?>