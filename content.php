<?php
// content.php - MESIN ROUTING (SMART ROUTER)

// Pastikan session dimulai
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Pastikan koneksi database tersedia
if (!isset($koneksi)) {
    include_once "config/koneksi.php";
}

// === BAGIAN 1: PENGUNJUNG PUBLIK (BELUM LOGIN) ===
if (!isset($_SESSION['roles']) || empty($_SESSION['roles'])) {
    
    $module = $_GET['module'] ?? 'beranda';
    
    // Whitelist Halaman Publik
    $public_routes = [
        'beranda' => 'modul/publik/beranda.php',
        'tentang' => 'modul/publik/tentang.php',
        'kontak'  => 'modul/publik/kontak.php',
        'login'   => 'login.php'
    ];

    if (array_key_exists($module, $public_routes)) {
        if ($module == 'login') { header("Location: login.php"); exit; }
        
        if (file_exists($public_routes[$module])) {
            include $public_routes[$module];
        } else {
            echo "<div class='alert alert-danger'>Halaman publik belum dibuat: $module</div>";
        }
    } else {
        include 'modul/publik/beranda.php';
    }

} else {
// === BAGIAN 2: USER SUDAH LOGIN (MEMBER AREA) ===

    // 1. PETA ROLE KE FOLDER FISIK MODUL
    $role_to_folder_map = [
        'admin'                   => 'admin',
        'operator_sistem'         => 'admin',
        'staf_it_admin'           => 'admin',
        
        // MENGARAH KE FOLDER YANG SAMA (kelola_prodi)
        'dosen_pemerintahan'      => 'kelola_prodi', 
        'dosen_sosiatri'          => 'kelola_prodi',
        
        'staf_lp2m'               => 'lp2m',
        'staf_lpm'                => 'lpm',
        'staf_perpustakaan'       => 'perpustakaan',
        'staf_sekretariat'        => 'sekretariat',
        
        // Staf prodi juga diarahkan ke kelola_prodi
        'staf_prodi_pemerintahan' => 'kelola_prodi', 
        'staf_prodi_sosiatri'     => 'kelola_prodi', 
        
        'staf_kemahasiswaan'      => 'kemahasiswaan',
        'staf_dosen'              => 'sekretariat',
    ];

    $user_roles = $_SESSION['roles']; 
    $is_admin   = in_array('admin', $user_roles) || in_array('operator_sistem', $user_roles) || in_array('staf_it_admin', $user_roles);

    // 2. TENTUKAN FOLDER YANG BOLEH DIAKSES USER INI
    $allowed_folders = [];
    foreach ($user_roles as $role) {
        if (isset($role_to_folder_map[$role])) {
            $folder = $role_to_folder_map[$role];
            if (!in_array($folder, $allowed_folders)) {
                $allowed_folders[] = $folder;
            }
        }
    }

    // Keamanan Ekstra
    if (empty($allowed_folders)) { include "modul/403.php"; exit; }

    // Folder default saat baru login
    $user_default_folder = $allowed_folders[0];

    // 3. === TRIK LOGIKA URL SUPER BERSIH (DYNAMIC PRODI) ===
    $url_segment = $_GET['module'] ?? '';
    
    // Virtual Mapping: Jika URL adalah prodi_xxx, arahkan ke folder fisik 'kelola_prodi'
    $virtual_modules = [
        'prodi_pemerintahan' => 'kelola_prodi',
        'prodi_sosiatri'     => 'kelola_prodi'
    ];
    
    // Cek apakah URL ada di Virtual Mapping, jika tidak pakai URL aslinya
    $physical_folder = $virtual_modules[$url_segment] ?? $url_segment;
    $target_folder = '';

    // --- PERBAIKAN ERROR DI SINI: Pindahkan pengecekan admin ke atas ---
    $is_super_admin = in_array('admin', $user_roles) || in_array('operator_sistem', $user_roles) || in_array('staf_it_admin', $user_roles);

    // Skenario A: URL Kosong (Dashboard Default)
    if (empty($url_segment)) {
        $target_folder = $user_default_folder;
    } 
    // Skenario B: URL Valid dan Folder Tersedia (Admin Bebas Masuk folder prodi)
    elseif (is_dir("modul/" . $physical_folder) && ($is_super_admin || in_array($physical_folder, $allowed_folders))) {
        $target_folder = $physical_folder;
    }
    // Skenario C: URL berupa 'Action' (misal: user_data)
    else {
        $target_folder = $user_default_folder;
        $_GET['act'] = $url_segment; // Masukkan ke parameter act
    }

    // 4. CEK HAK AKSES & MUAT MODUL
    $can_access = $is_super_admin || in_array($target_folder, $allowed_folders);
    $path_to_module = "modul/" . $target_folder . "/index.php";

    if ($can_access) {
        if (file_exists($path_to_module)) {
            // MUAT MODUL FISIK
            include $path_to_module;
        } else {
            echo "<div class='alert alert-danger mt-4'>
                    <strong>Error 404:</strong> Modul belum tersedia.<br>
                    Target Fisik: $target_folder<br>
                    Path: $path_to_module
                  </div>";
        }
    } else {
        include "modul/403.php"; 
    }
}
?>