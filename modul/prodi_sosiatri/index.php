<?php
// File: modul/prodi_sosiatri/index.php

// Ambil parameter 'act' (action), default-nya adalah 'dashboard'
$act = $_GET['act'] ?? 'dashboard';

// PERBAIKAN: Mengganti str_contains() dengan strpos() !== false
// Ini agar kompatibel dengan PHP 7.4 ke bawah






echo '
<nav class="nav nav-tabs mb-3">
    <a class="nav-link ' . ($act == 'dashboard' ? 'active' : '') . '" href="dashboard">Dashboard</a>
    <a class="nav-link ' . (strpos($act, 'user') !== false ? 'active' : '') . '" href="user_data">Kelola User</a>
    <a class="nav-link ' . (strpos($act, 'dosen') !== false ? 'active' : '') . '" href="dosen_data">Kelola Dosen</a>
    <a class="nav-link ' . (strpos($act, 'tendik') !== false ? 'active' : '') . '" href="tendik_data">Kelola Tendik</a>
</nav>
';






// Logika Sub-Router
switch ($act) {
    case 'dashboard':
        // Pastikan file ini ada di: modul/prodi_sosiatri/dashboard.php
        if (file_exists('modul/prodi_sosiatri/dashboard.php')) {
            include 'modul/prodi_sosiatri/dashboard.php';
        } else {
            echo "<div class='alert alert-info'>Halaman Dashboard prodi_sosiatri belum dibuat.</div>";
        }
        break;

    // --- CRUD User ---
    case 'user_data':
        if (file_exists('modul/prodi_sosiatri/user_data.php')) include 'modul/prodi_sosiatri/user_data.php';
        else echo "File user_data.php tidak ditemukan";
        break;
        
    case 'user_tambah':
        if (file_exists('modul/prodi_sosiatri/user_form.php')) include 'modul/prodi_sosiatri/user_form.php';
        break;
        
    case 'user_edit':
        if (file_exists('modul/prodi_sosiatri/user_form.php')) include 'modul/prodi_sosiatri/user_form.php';
        break;
        
    case 'user_proses':
        if (file_exists('modul/prodi_sosiatri/user_proses.php')) include 'modul/prodi_sosiatri/user_proses.php';
        break;
        
    // --- Tambahkan Default ---
    default:
        if (file_exists('modul/prodi_sosiatri/dashboard.php')) {
            include 'modul/prodi_sosiatri/dashboard.php';
        }
        break;
}
?>