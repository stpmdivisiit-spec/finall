<?php
// File: modul/admin/index.php
$act = $_GET['act'] ?? 'dashboard';

switch ($act) {
    case 'dashboard':
        if (file_exists('modul/admin/dashboard.php')) include 'modul/admin/dashboard.php';
        break;

    // --- CRUD KELOLA PENGGUNA ---
    case 'kelola_pengguna':
        if (file_exists('modul/admin/kelola_pengguna.php')) include 'modul/admin/kelola_pengguna.php';
        break;
    case 'pengguna_tambah':
    case 'pengguna_edit':
        if (file_exists('modul/admin/kelola_pengguna_form.php')) include 'modul/admin/kelola_pengguna_form.php';
        break;
    case 'pengguna_proses':
        if (file_exists('modul/admin/kelola_pengguna_proses.php')) include 'modul/admin/kelola_pengguna_proses.php';
        break;
    case 'pengguna_hapus':
        $id = (int)$_GET['id'];
        $koneksi->query("DELETE FROM users WHERE id = '$id'");
        echo "<script>alert('Akun pengguna berhasil dihapus!'); window.location='index.php?module=admin&act=kelola_pengguna';</script>";
        break;
        
    // --- TAMBAHAN: CRUD DATA PEGAWAI & DOSEN ---
    case 'data_pegawai':
        if (file_exists('modul/admin/data_pegawai.php')) include 'modul/admin/data_pegawai.php';
        break;

// ========================================================
    // --- MANAJEMEN PROFIL & SEJARAH LEMBAGA ---
    // ========================================================
    case 'sejarah_lembaga':
        if (file_exists('modul/admin/sejarah_lembaga.php')) {
            include 'modul/admin/sejarah_lembaga.php';
        } else {
            echo "<div class='alert alert-danger m-4'>Error: File modul/admin/sejarah_lembaga.php tidak ditemukan!</div>";
        }
        break;

// --- Visi Misi Lembaga ---
    case 'visi_misi_lembaga':
        if (file_exists('modul/admin/visi_misi_lembaga.php')) {
            include 'modul/admin/visi_misi_lembaga.php';
        } else {
            echo "<div class='alert alert-danger m-4'>Error: File modul/admin/visi_misi_lembaga.php tidak ditemukan!</div>";
        }
        break;

// --- Struktur Organisasi Lembaga ---
    case 'struktur_organisasi_lembaga':
        if (file_exists('modul/admin/struktur_organisasi_lembaga.php')) {
            include 'modul/admin/struktur_organisasi_lembaga.php';
        } else {
            echo "<div class='alert alert-danger m-4'>Error: File modul/admin/struktur_organisasi_lembaga.php tidak ditemukan!</div>";
        }
        break;


    case 'tambah_dosen':
        if (file_exists('modul/admin/dosen_form_tambah.php')) include 'modul/admin/dosen_form_tambah.php';
        break;
    case 'edit_dosen':
        if (file_exists('modul/admin/dosen_form_edit.php')) include 'modul/admin/dosen_form_edit.php';
        break;
    case 'hapus_dosen':
        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
        if ($id > 0) {
            $koneksi->query("DELETE FROM dosen WHERE id = '$id'");
            echo "<script>alert('Data Dosen berhasil dihapus!'); window.location='index.php?module=admin&act=data_pegawai';</script>";
        }
        break;

    case 'tambah_pegawai':
        if (file_exists('modul/admin/tendik_form_tambah.php')) include 'modul/admin/tendik_form_tambah.php';
        break;
    case 'edit_pegawai':
        if (file_exists('modul/admin/tendik_form_edit.php')) include 'modul/admin/tendik_form_edit.php';
        break;
    case 'hapus_pegawai':
        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
        if ($id > 0) {
            $koneksi->query("DELETE FROM tendik WHERE id = '$id'");
            echo "<script>alert('Data Tendik berhasil dihapus!'); window.location='index.php?module=admin&act=data_pegawai';</script>";
        }
        break;

    // --- PROSES ACTION DOSEN ---
    case 'proses_tambah_dosen':
        if (file_exists('modul/admin/proses_tambah_dosen.php')) include 'modul/admin/proses_tambah_dosen.php';
        break;
        
    // PERBAIKAN FATAL: UBAH 'proses_edit_dosen' MENJADI 'proses_update_dosen'
    case 'proses_update_dosen': 
        if (file_exists('modul/admin/proses_update_dosen.php')) include 'modul/admin/proses_update_dosen.php';
        break;

    // --- PROSES ACTION TENDIK ---
    case 'proses_tambah_tendik':
        if (file_exists('modul/admin/proses_tambah_tendik.php')) include 'modul/admin/proses_tambah_tendik.php';
        break;
    case 'proses_edit_tendik':
        if (file_exists('modul/admin/proses_update_tendik.php')) include 'modul/admin/proses_update_tendik.php';
        break;

    default:
        if (file_exists('modul/admin/dashboard.php')) include 'modul/admin/dashboard.php';
        break;
}
?>