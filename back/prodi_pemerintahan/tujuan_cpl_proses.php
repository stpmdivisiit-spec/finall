<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id     = (int)$_POST['id'];
    $prodi  = $koneksi->real_escape_string($_POST['prodi']);
    $tujuan = $koneksi->real_escape_string($_POST['tujuan']);
    $cpl    = $koneksi->real_escape_string($_POST['cpl']);

    if ($id > 0) {
        $sql = "UPDATE prodi_tujuan_cpl SET tujuan = '$tujuan', cpl = '$cpl' WHERE id = '$id'";
    } else {
        $sql = "INSERT INTO prodi_tujuan_cpl (prodi, tujuan, cpl) VALUES ('$prodi', '$tujuan', '$cpl')";
    }

    if ($koneksi->query($sql)) {
        echo "<script>alert('Tujuan & CPL berhasil disimpan!'); window.location='index.php?module=prodi_pemerintahan&act=tujuan_cpl';</script>";
    } else {
        echo "<script>alert('Gagal menyimpan: " . $koneksi->error . "'); window.history.back();</script>";
    }
}
?>