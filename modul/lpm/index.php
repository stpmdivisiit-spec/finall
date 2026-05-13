<?php
$act = $_GET['act'] ?? 'dashboard';

switch ($act) {
    case 'dashboard':
        if (file_exists('modul/lpm/dashboard.php')) {
            include 'modul/lpm/dashboard.php';
        } else {
            echo "<div class='alert alert-info mt-4'>Halaman Dashboard LPM belum dibuat.</div>";
        }
        break;

    // --- SATU ROUTE UNTUK KE-16 SUB MENU LPM ---
    case 'dokumen':
        if (file_exists('modul/lpm/dokumen_data.php')) include 'modul/lpm/dokumen_data.php';
        break;
        
    case 'proses_dokumen':
        if (file_exists('modul/lpm/dokumen_proses.php')) include 'modul/lpm/dokumen_proses.php';
        break;
        
    case 'hapus_dokumen':
        $id = (int)$_GET['id'];
        $kat = $_GET['kat']; 
        
        $data = $koneksi->query("SELECT file_dokumen FROM lpm_dokumen WHERE id = '$id'")->fetch_assoc();
        if ($data && !empty($data['file_dokumen'])) {
            $target = 'uploads/lpm/dokumen/' . $data['file_dokumen'];
            if (file_exists($target)) unlink($target);
        }
        $koneksi->query("DELETE FROM lpm_dokumen WHERE id = '$id'");
        echo "<script>alert('Dokumen LPM berhasil dihapus!'); window.location='index.php?module=lpm&act=dokumen&kat=$kat';</script>";
        break;

    default:
        if (file_exists('modul/lpm/dashboard.php')) {
            include 'modul/lpm/dashboard.php';
        } else {
            echo "<div class='alert alert-danger mt-4'>Error 404: Modul LPM tidak ditemukan.</div>";
        }
        break;
}
?>