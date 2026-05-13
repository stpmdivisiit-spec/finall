<?php
$act = $_GET['act'] ?? 'dashboard';

switch ($act) {
    case 'dashboard':
        if (file_exists('modul/kemahasiswaan/dashboard.php')) include 'modul/kemahasiswaan/dashboard.php';
        break;

    // --- SATU ROUTE UNTUK SEMUA KEGIATAN & DOKUMEN MHS ---
    case 'data_kema':
        if (file_exists('modul/kemahasiswaan/kema_data.php')) include 'modul/kemahasiswaan/kema_data.php';
        break;
    case 'proses_kema':
        if (file_exists('modul/kemahasiswaan/kema_proses.php')) include 'modul/kemahasiswaan/kema_proses.php';
        break;
    case 'hapus_kema':
        $id = (int)$_GET['id'];
        $kat = $_GET['kat']; 
        
        $data = $koneksi->query("SELECT file_lampiran FROM kemahasiswaan_pusat_data WHERE id = '$id'")->fetch_assoc();
        if ($data && !empty($data['file_lampiran'])) {
            $target = 'uploads/kemahasiswaan_pusat/' . $data['file_lampiran'];
            if (file_exists($target)) unlink($target);
        }
        $koneksi->query("DELETE FROM kemahasiswaan_pusat_data WHERE id = '$id'");
        echo "<script>alert('Data terhapus!'); window.location='index.php?module=kemahasiswaan&act=data_kema&kat=$kat';</script>";
        break;

// Tambahkan kodingan ini tepat di atas "case 'data_kema':"

    // --- PROFIL KEMAHASISWAAN ---
    case 'profil':
        if (file_exists('modul/kemahasiswaan/profil_form.php')) include 'modul/kemahasiswaan/profil_form.php';
        break;
    case 'proses_profil':
        if (file_exists('modul/kemahasiswaan/profil_proses.php')) include 'modul/kemahasiswaan/profil_proses.php';
        break;

    // --- LAYANAN PENGADUAN ---
    case 'pengaduan':
        if (file_exists('modul/kemahasiswaan/pengaduan_data.php')) include 'modul/kemahasiswaan/pengaduan_data.php';
        break;
    case 'proses_pengaduan':
        if (file_exists('modul/kemahasiswaan/pengaduan_proses.php')) include 'modul/kemahasiswaan/pengaduan_proses.php';
        break;


    default:
        if (file_exists('modul/kemahasiswaan/dashboard.php')) {
            include 'modul/kemahasiswaan/dashboard.php';
        } else {
            echo "<div class='alert alert-danger mt-4'>Halaman tidak ditemukan.</div>";
        }
        break;
}
?>