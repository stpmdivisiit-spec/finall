<?php
// File: modul/lp2m/index.php
$act = $_GET['act'] ?? 'dashboard';

switch ($act) {
    case 'dashboard':
        if (file_exists('modul/lp2m/dashboard.php')) include 'modul/lp2m/dashboard.php';
        break;

    // --- SATU ROUTE UNTUK SEMUA JENIS DOKUMEN ---
    case 'dokumen':
        if (file_exists('modul/lp2m/dokumen_data.php')) include 'modul/lp2m/dokumen_data.php';
        break;
    case 'proses_dokumen':
        if (file_exists('modul/lp2m/dokumen_proses.php')) include 'modul/lp2m/dokumen_proses.php';
        break;
    case 'hapus_dokumen':
        $id = (int)$_GET['id'];
        $kat = $_GET['kat']; // Untuk redirect kembali ke menu yang tepat
        
        $data = $koneksi->query("SELECT file_dokumen FROM lp2m_dokumen WHERE id = '$id'")->fetch_assoc();
        if ($data && !empty($data['file_dokumen'])) {
            $target = 'uploads/lp2m/dokumen/' . $data['file_dokumen'];
            if (file_exists($target)) unlink($target);
        }
        $koneksi->query("DELETE FROM lp2m_dokumen WHERE id = '$id'");
        echo "<script>alert('Dokumen dihapus!'); window.location='index.php?module=lp2m&act=dokumen&kat=$kat';</script>";
        break;

default:
        if (file_exists('modul/lp2m/dashboard.php')) {
            include 'modul/lp2m/dashboard.php';
        } else {
            echo "<div class='alert alert-danger mt-4'>Halaman Dashboard LP2M belum dibuat.</div>";
        }
        break;
}
?>