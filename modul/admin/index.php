<?php
// File: modul/admin/index.php

// Ambil parameter 'act' (action), default-nya adalah 'dashboard'
$act = $_GET['act'] ?? 'dashboard';

// PERBAIKAN: Mengganti str_contains() dengan strpos() !== false
// Ini agar kompatibel dengan PHP 7.4 ke bawah

// Logika Sub-Router
switch ($act) {
    case 'dashboard':
        // Pastikan file ini ada di: modul/admin/dashboard.php
        if (file_exists('modul/admin/dashboard.php')) {
            include 'modul/admin/dashboard.php';
        } else {
            echo "<div class='alert alert-info'>Halaman Dashboard Admin belum dibuat.</div>";
        }
        break;

    // --- CRUD User ---


// --- CRUD KELOLA PENGGUNA (MULTI-ROLE) ---
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
        // Berkat ON DELETE CASCADE di database, hapus user otomatis menghapus hak aksesnya di user_roles
        $koneksi->query("DELETE FROM users WHERE id = '$id'");
        echo "<script>alert('Akun pengguna berhasil dihapus!'); window.location='index.php?module=admin&act=kelola_pengguna';</script>";
        break;
        
        
    case 'user_tambah':
        if (file_exists('modul/admin/user_form.php')) include 'modul/admin/user_form.php';
        break;
        
    case 'user_edit':
        if (file_exists('modul/admin/user_form.php')) include 'modul/admin/user_form.php';
        break;
        
    case 'user_proses':
        if (file_exists('modul/admin/user_proses.php')) include 'modul/admin/user_proses.php';
        break;

    // ========================================================
    // --- TAMBAHAN: CRUD DATA PEGAWAI & DOSEN ---
    // ========================================================
    
    // Halaman Utama Tabel Pegawai & Dosen (Tabs)
    case 'data_pegawai':
        if (file_exists('modul/admin/data_pegawai.php')) include 'modul/admin/data_pegawai.php';
        else echo "<div class='alert alert-warning mt-4'>File data_pegawai.php tidak ditemukan.</div>";
        break;

    // --- SUB-ROUTER DOSEN ---
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

    // --- SUB-ROUTER TENDIK (PEGAWAI) ---
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
    // ========================================================


// --- PROSES ACTION DOSEN ---
    case 'proses_tambah_dosen':
        if (file_exists('modul/admin/proses_tambah_dosen.php')) include 'modul/admin/proses_tambah_dosen.php';
        break;
    case 'proses_edit_dosen':
        if (file_exists('modul/admin/proses_update_dosen.php')) include 'modul/admin/proses_update_dosen.php';
        break;

    // --- PROSES ACTION TENDIK ---
    case 'proses_tambah_tendik':
        if (file_exists('modul/admin/proses_tambah_tendik.php')) include 'modul/admin/proses_tambah_tendik.php';
        break;
    case 'proses_edit_tendik':
        if (file_exists('modul/admin/proses_update_tendik.php')) include 'modul/admin/proses_update_tendik.php';
        break;





    // --- Tambahkan Default ---
    default:
        if (file_exists('modul/admin/dashboard.php')) {
            include 'modul/admin/dashboard.php';
        }
        break;
}
?>