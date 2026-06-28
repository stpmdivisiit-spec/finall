<?php
// C:\xampp\htdocs\FINAL\modul\sekretariat\index.php
$act = $_GET['act'] ?? 'dashboard';
$kat = $_GET['kat'] ?? '';

switch ($act) {
    case 'dashboard':
        if (file_exists('modul/sekretariat/dashboard.php')) include 'modul/sekretariat/dashboard.php';
        break;

    // --- 1. PROFIL SEKRETARIAT ---
    case 'profil':
        if ($kat == 'profil_tugas') {
            if (file_exists('modul/sekretariat/profil_tugas.php')) include 'modul/sekretariat/profil_tugas.php';
        } elseif ($kat == 'struktur') {
            if (file_exists('modul/sekretariat/profil_struktur.php')) include 'modul/sekretariat/profil_struktur.php';
        } elseif ($kat == 'layanan') {
            if (file_exists('modul/sekretariat/profil_layanan.php')) include 'modul/sekretariat/profil_layanan.php';
        }
        break;

    // --- 2. MANAJEMEN LAYANAN (FILE KHUSUS) ---
    case 'layanan':
        if ($kat == 'surat_menyurat') {
            // File khusus untuk sistem tiket persuratan yang sudah kita buat
            if (file_exists('modul/sekretariat/arsip_data.php')) include 'modul/sekretariat/arsip_data.php';
        } elseif ($kat == 'legalisir') {
            // File khusus untuk atur legalisir & arsip dokumen akademik 
            if (file_exists('modul/sekretariat/arsip_dok_akademik.php')) include 'modul/sekretariat/arsip_dok_akademik.php';
        } elseif ($kat == 'fasilitas') {
            // File khusus untuk integrasi inventaris Aset & Peminjaman (Github)
            if (file_exists('modul/sekretariat/arsip_aset_barang.php')) include 'modul/sekretariat/arsip_aset_barang.php';
        }
        break;

    // --- 3, 4, 5. INFORMASI, REGULASI & INTERNAL (FILE GENERIK) ---
    case 'informasi':
    case 'regulasi':
    case 'internal':
        // Semua upload SK, Pengumuman, Pedoman, Anggaran menggunakan 1 File Cerdas ini
        if (file_exists('modul/sekretariat/arsip_umum.php')) {
            include 'modul/sekretariat/arsip_umum.php';
        } else {
            echo "<div class='alert alert-danger m-4'>Error: File modul/sekretariat/arsip_umum.php belum dibuat!</div>";
        }
        break;

    default:
        if (file_exists('modul/sekretariat/dashboard.php')) include 'modul/sekretariat/dashboard.php';
        break;
}
?>