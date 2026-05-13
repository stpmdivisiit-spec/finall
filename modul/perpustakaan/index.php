<?php
$act = $_GET['act'] ?? 'dashboard';

switch ($act) {
    case 'dashboard':
        if (file_exists('modul/perpustakaan/dashboard.php')) include 'modul/perpustakaan/dashboard.php';
        break;

    // --- SUB-ROUTER KOLEKSI BUKU / DIGITAL ---
    case 'koleksi':
        if (file_exists('modul/perpustakaan/koleksi_data.php')) include 'modul/perpustakaan/koleksi_data.php';
        break;
    case 'proses_koleksi':
        if (file_exists('modul/perpustakaan/koleksi_proses.php')) include 'modul/perpustakaan/koleksi_proses.php';
        break;
    case 'hapus_koleksi':
        $id = (int)$_GET['id'];
        $kat = $_GET['kat']; 
        
        $data = $koneksi->query("SELECT cover_gambar, file_lampiran FROM perpus_koleksi WHERE id = '$id'")->fetch_assoc();
        if ($data) {
            if (!empty($data['cover_gambar']) && file_exists('uploads/perpustakaan/cover/' . $data['cover_gambar'])) unlink('uploads/perpustakaan/cover/' . $data['cover_gambar']);
            if (!empty($data['file_lampiran']) && file_exists('uploads/perpustakaan/koleksi/' . $data['file_lampiran'])) unlink('uploads/perpustakaan/koleksi/' . $data['file_lampiran']);
        }
        $koneksi->query("DELETE FROM perpus_koleksi WHERE id = '$id'");
        echo "<script>alert('Data Koleksi berhasil dihapus!'); window.location='index.php?module=perpustakaan&act=koleksi&kat=$kat';</script>";
        break;

    // --- (Untuk fitur Dokumen/Laporan bisa Anda buat file dokumen_data.php terpisah dengan pola yang sama seperti LPM) ---

    default:
        if (file_exists('modul/perpustakaan/dashboard.php')) {
            include 'modul/perpustakaan/dashboard.php';
        } else {
            echo "<div class='alert alert-danger mt-4'>Error 404: Modul Perpustakaan tidak ditemukan.</div>";
        }
        break;
}
?>