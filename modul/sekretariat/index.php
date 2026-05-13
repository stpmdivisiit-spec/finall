<?php
$act = $_GET['act'] ?? 'dashboard';

switch ($act) {
    case 'dashboard':
        if (file_exists('modul/sekretariat/dashboard.php')) include 'modul/sekretariat/dashboard.php';
        break;

    // --- PROFIL SEKRETARIAT ---
    case 'profil':
        if (file_exists('modul/sekretariat/profil_form.php')) include 'modul/sekretariat/profil_form.php';
        break;
    case 'proses_profil':
        if (file_exists('modul/sekretariat/profil_proses.php')) include 'modul/sekretariat/profil_proses.php';
        break;

    // --- SMART CRUD ARSIP ADMINISTRASI & KEUANGAN ---
    case 'arsip':
        if (file_exists('modul/sekretariat/arsip_data.php')) include 'modul/sekretariat/arsip_data.php';
        break;
    case 'proses_arsip':
        if (file_exists('modul/sekretariat/arsip_proses.php')) include 'modul/sekretariat/arsip_proses.php';
        break;
    case 'hapus_arsip':
        $id = (int)$_GET['id'];
        $kat = $_GET['kat']; 
        
        $data = $koneksi->query("SELECT file_lampiran FROM sekretariat_arsip WHERE id = '$id'")->fetch_assoc();
        if ($data && !empty($data['file_lampiran'])) {
            $target = 'uploads/sekretariat/dokumen/' . $data['file_lampiran'];
            if (file_exists($target)) unlink($target);
        }
        $koneksi->query("DELETE FROM sekretariat_arsip WHERE id = '$id'");
        echo "<script>alert('Arsip berhasil dihapus!'); window.location='index.php?module=sekretariat&act=arsip&kat=$kat';</script>";
        break;

    default:
        if (file_exists('modul/sekretariat/dashboard.php')) include 'modul/sekretariat/dashboard.php';
        break;
}
?>