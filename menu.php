<?php
// menu.php
$mod = $_GET['module'] ?? '';
$user_roles = $_SESSION['roles'] ?? [];

// Deteksi Role Utama
$is_super_admin = in_array('admin', $user_roles) || in_array('operator_sistem', $user_roles) || in_array('staf_it_admin', $user_roles);
$is_dosen_pem   = in_array('dosen_pemerintahan', $user_roles) || in_array('staf_prodi_pemerintahan', $user_roles);
$is_dosen_sos   = in_array('dosen_sosiatri', $user_roles) || in_array('staf_prodi_sosiatri', $user_roles);
?>

<div class="nav accordion" id="accordionSidenav">
    
    <a class="nav-link <?php echo ($mod == 'beranda' || $mod == '') ? 'active' : ''; ?>" href="index.php?module=beranda">
        <div class="nav-link-icon"><i class="fa fa-home"></i></div>
        Beranda
    </a>

    <?php if (!empty($user_roles)): ?>
        
        <a class="nav-link <?php echo ($mod == 'kalender_admin') ? 'active' : ''; ?>" href="index.php?module=kalender_admin">
            <div class="nav-link-icon"><i class="fas fa-calendar-alt"></i></div>
            Kalender Akademik
        </a>

        <?php if ($is_super_admin): ?>
            <?php if (file_exists('modul/menu_partials/menu_admin.php')) include 'modul/menu_partials/menu_admin.php'; ?>
            
            <div class="sidenav-menu-heading">Akses Program Studi</div>
            
            <?php 
                $nama_prodi = "Ilmu Pemerintahan";
                $link_prodi = "prodi_pemerintahan";
                $collapse_id = "collapsePem"; 
                include 'modul/menu_partials/menu_prodi_dinamis.php'; 
            ?>
            
            <?php 
                $nama_prodi = "Pembangunan Sosial";
                $link_prodi = "prodi_sosiatri";
                $collapse_id = "collapseSos"; 
                include 'modul/menu_partials/menu_prodi_dinamis.php'; 
            ?>
        <?php endif; ?>

        <?php if ($is_dosen_pem && !$is_super_admin): ?>
            <div class="sidenav-menu-heading">Kelola Program Studi</div>
            <?php 
                $nama_prodi = "Ilmu Pemerintahan";
                $link_prodi = "prodi_pemerintahan";
                $collapse_id = "collapsePem";
                include 'modul/menu_partials/menu_prodi_dinamis.php'; 
            ?>
        <?php endif; ?>

        <?php if ($is_dosen_sos && !$is_super_admin): ?>
            <div class="sidenav-menu-heading">Kelola Program Studi</div>
            <?php 
                $nama_prodi = "Pembangunan Sosial";
                $link_prodi = "prodi_sosiatri";
                $collapse_id = "collapseSos";
                include 'modul/menu_partials/menu_prodi_dinamis.php'; 
            ?>
        <?php endif; ?>

        <?php 
        if (in_array('staf_lp2m', $user_roles) || $is_super_admin): 
            if (file_exists('modul/menu_partials/menu_lp2m.php')) include 'modul/menu_partials/menu_lp2m.php';
        endif; 
        
        if (in_array('staf_lpm', $user_roles) || $is_super_admin): 
            if (file_exists('modul/menu_partials/menu_lpm.php')) include 'modul/menu_partials/menu_lpm.php';
        endif; 
        
        if (in_array('staf_kemahasiswaan', $user_roles) || $is_super_admin): 
            if (file_exists('modul/menu_partials/menu_kemahasiswaan.php')) include 'modul/menu_partials/menu_kemahasiswaan.php';
        endif; 
        
        if (in_array('staf_perpustakaan', $user_roles) || $is_super_admin): 
            if (file_exists('modul/menu_partials/menu_perpustakaan.php')) include 'modul/menu_partials/menu_perpustakaan.php';
        endif; 
        
        if (in_array('staf_sekretariat', $user_roles) || $is_super_admin): 
            if (file_exists('modul/menu_partials/menu_sekretariat.php')) include 'modul/menu_partials/menu_sekretariat.php';
        endif; 
        ?>

    <?php endif; // Akhir Cek Login ?>

</div>