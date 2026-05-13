<?php
// Pastikan akses aman
if (!defined('AKSES_DIIZINKAN')) {
    die("Akses ditolak!");
}

// === PERHITUNGAN STATISTIK UNTUK ADMIN ===
// 1. Total Dosen (Pemerintahan & Sosiatri)
$q_dosen = $koneksi->query("
    SELECT COUNT(d.id) as tot 
    FROM dosen d
    JOIN user_roles ur ON d.user_id = ur.user_id
    JOIN roles r ON ur.role_id = r.id
    WHERE r.role_name IN ('dosen_pemerintahan', 'dosen_sosiatri')
")->fetch_assoc();
$total_dosen = $q_dosen['tot'] ?? 0;

// 2. Total Tendik
$q_tendik = $koneksi->query("SELECT COUNT(id) as tot FROM tendik")->fetch_assoc();
$total_tendik = $q_tendik['tot'] ?? 0;

// 3. Total User Akun Aktif
$q_user = $koneksi->query("SELECT COUNT(id) as tot FROM users")->fetch_assoc();
$total_user = $q_user['tot'] ?? 0;
?>

<header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
    <div class="container-xl px-4">
        <div class="page-header-content pt-4">
            <div class="row align-items-center justify-content-between">
                <div class="col-auto mt-4">
                    <h1 class="page-header-title">
                        <div class="page-header-icon"><i data-feather="activity"></i></div>
                        Dashboard Administrator
                    </h1>
                    <div class="page-header-subtitle">
                        Sistem Informasi Manajemen Kampus STPM Santa Ursula
                    </div>
                </div>
                <div class="col-12 col-xl-auto mt-4 text-white opacity-75 text-end">
                    <i data-feather="calendar" class="me-2"></i>
                    <?php 
                        $hari = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
                        $bulan = array("","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
                        echo $hari[date("w")].", ".date("j")." ".$bulan[date("n")]." ".date("Y");
                    ?>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="container-xl px-4 mt-n10">
    
    <div class="row">
        <div class="col-xxl-4 col-xl-4 col-md-6 mb-4">
            <div class="card h-100 border-start-lg border-start-primary shadow-sm">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <div class="small fw-bold text-primary mb-1">Total Dosen Pengajar</div>
                            <div class="h3 fw-bold text-dark"><?= $total_dosen ?> Orang</div>
                            <a class="text-arrow-icon small text-primary" href="index.php?module=admin&act=data_pegawai">
                                Kelola Dosen <i data-feather="arrow-right"></i>
                            </a>
                        </div>
                        <div class="ms-2"><i class="fas fa-chalkboard-teacher fa-2x text-gray-200"></i></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xxl-4 col-xl-4 col-md-6 mb-4">
            <div class="card h-100 border-start-lg border-start-success shadow-sm">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <div class="small fw-bold text-success mb-1">Tenaga Kependidikan</div>
                            <div class="h3 fw-bold text-dark"><?= $total_tendik ?> Orang</div>
                            <a class="text-arrow-icon small text-success" href="index.php?module=admin&act=data_pegawai">
                                Kelola Tendik <i data-feather="arrow-right"></i>
                            </a>
                        </div>
                        <div class="ms-2"><i class="fas fa-user-tie fa-2x text-gray-200"></i></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xxl-4 col-xl-4 col-md-6 mb-4">
            <div class="card h-100 border-start-lg border-start-warning shadow-sm">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <div class="small fw-bold text-warning mb-1">Akun Pengguna Sistem</div>
                            <div class="h3 fw-bold text-dark"><?= $total_user ?> Akun</div>
                            <a class="text-arrow-icon small text-warning" href="index.php?module=admin&act=user_data">
                                Kelola User <i data-feather="arrow-right"></i>
                            </a>
                        </div>
                        <div class="ms-2"><i class="fas fa-users fa-2x text-gray-200"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card shadow-sm">
                <div class="card-header bg-white fw-bold text-dark">
                    <i class="fas fa-bolt me-2 text-primary"></i> Akses Cepat (Shortcut)
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3 col-sm-6 mb-3">
                            <a href="index.php?module=admin&act=tambah_dosen" class="btn btn-outline-primary w-100 d-flex flex-column align-items-center p-3">
                                <i class="fas fa-user-plus fa-2x mb-2"></i>
                                <span>Tambah Dosen</span>
                            </a>
                        </div>
                        <div class="col-md-3 col-sm-6 mb-3">
                            <a href="index.php?module=admin&act=tambah_pegawai" class="btn btn-outline-success w-100 d-flex flex-column align-items-center p-3">
                                <i class="fas fa-user-plus fa-2x mb-2"></i>
                                <span>Tambah Tendik</span>
                            </a>
                        </div>
                        <div class="col-md-3 col-sm-6 mb-3">
                            <a href="index.php?module=admin&act=user_tambah" class="btn btn-outline-warning w-100 d-flex flex-column align-items-center p-3">
                                <i class="fas fa-key fa-2x mb-2"></i>
                                <span>Buat Akun Login</span>
                            </a>
                        </div>
                        <div class="col-md-3 col-sm-6 mb-3">
                            <a href="index.php?module=prodi_pemerintahan" class="btn btn-outline-dark w-100 d-flex flex-column align-items-center p-3">
                                <i class="fas fa-globe fa-2x mb-2"></i>
                                <span>Pantau Web Prodi</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>