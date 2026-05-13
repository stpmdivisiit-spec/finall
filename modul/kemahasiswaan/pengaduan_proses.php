<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id        = (int)$_POST['id'];
    $status    = $_POST['status'];
    $tanggapan = $koneksi->real_escape_string($_POST['tanggapan_admin']);

    $sql = "UPDATE kema_pengaduan SET status='$status', tanggapan_admin='$tanggapan' WHERE id='$id'";
    $koneksi->query($sql);
    
    echo "<script>alert('Tanggapan berhasil dikirim dan status diperbarui!'); window.location='index.php?module=kemahasiswaan&act=pengaduan';</script>";
}
?>