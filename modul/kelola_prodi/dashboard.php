<?php
// C:\xampp\htdocs\FINAL\modul\kelola_prodi\dashboard.php
// Pastikan akses aman
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");

// 1. LOGIKA DINAMIS PRODI (Mendeteksi prodi mana yang sedang diakses)
$nama_prodi = "";
$role_dosen_prodi = "";

if ($module_url == 'prodi_sosiatri') {
    $nama_prodi = "Pembangunan Sosial";
    $role_dosen_prodi = "dosen_sosiatri";
} else {
    $nama_prodi = "Ilmu Pemerintahan";
    $role_dosen_prodi = "dosen_pemerintahan";
}

// 2. AMBIL DATA STATISTIK DARI DATABASE
// Hitung jumlah Dosen khusus untuk prodi yang sedang aktif
$q_dosen = $koneksi->query("
    SELECT COUNT(d.id) as tot 
    FROM dosen d
    JOIN user_roles ur ON d.user_id = ur.user_id
    JOIN roles r ON ur.role_id = r.id
    WHERE r.role_name = '$role_dosen_prodi'
")->fetch_assoc();
$total_dosen = $q_dosen['tot'] ?? 0;

// (Untuk Dokumen dan Berita, Anda bisa sesuaikan nama tabelnya dengan yang ada di database Anda nanti)
// Contoh query placeholder:
$total_dokumen = 12; // Ganti dengan: $koneksi->query("SELECT COUNT(*) FROM prodi_dokumen WHERE prodi='$module_url'")->fetch_assoc()['tot'];
$total_berita  = 8;  // Ganti dengan: $koneksi->query("SELECT COUNT(*) FROM prodi_berita WHERE prodi='$module_url'")->fetch_assoc()['tot'];
?>

<header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
    <div class="container-xl px-4">
        <div class="page-header-content pt-4">
            <div class="row align-items-center justify-content-between">
                <div class="col-auto mt-4">
                    <h1 class="page-header-title">
                        <div class="page-header-icon"><i data-feather="globe"></i></div>
                        Dashboard Program Studi
                    </h1>
                    <div class="page-header-subtitle">
                        Sistem Kelola Akademik & Profil Prodi <?= htmlspecialchars($nama_prodi) ?>
                    </div>
                </div>
                <div class="col-12 col-xl-auto mt-4 text-white">
                    <div class="d-flex align-items-center">
                        <div class="avatar avatar-lg me-3">
                            <div class="avatar-img bg-white text-primary d-flex align-items-center justify-content-center fw-bold fs-4 rounded-circle">
                                <?= strtoupper(substr($_SESSION['nama_lengkap'] ?? 'U', 0, 1)) ?>
                            </div>
                        </div>
                        <div>
                            <div class="fw-bold">Selamat datang, <?= htmlspecialchars($_SESSION['nama_lengkap'] ?? $_SESSION['username']) ?>!</div>
                            <div class="small opacity-75">Kelola data program studi Anda dengan mudah.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="container-xl px-4 mt-n10">
    
    <div class="row">
        <div class="col-xxl-3 col-xl-3 col-md-6 mb-4">
            <div class="card h-100 border-start-lg border-start-primary shadow-sm">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <div class="small fw-bold text-primary mb-1">Dosen Homebase</div>
                            <div class="h3 fw-bold text-dark mb-0"><?= $total_dosen ?> Orang</div>
                        </div>
                        <div class="ms-2"><i class="fas fa-chalkboard-teacher fa-2x text-gray-200"></i></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xxl-3 col-xl-3 col-md-6 mb-4">
            <div class="card h-100 border-start-lg border-start-success shadow-sm">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <div class="small fw-bold text-success mb-1">Mahasiswa Aktif</div>
                            <div class="h3 fw-bold text-dark mb-0">-</div>
                        </div>
                        <div class="ms-2"><i class="fas fa-user-graduate fa-2x text-gray-200"></i></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xxl-3 col-xl-3 col-md-6 mb-4">
            <div class="card h-100 border-start-lg border-start-warning shadow-sm">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <div class="small fw-bold text-warning mb-1">Dokumen Akademik</div>
                            <div class="h3 fw-bold text-dark mb-0"><?= $total_dokumen ?> Berkas</div>
                        </div>
                        <div class="ms-2"><i class="fas fa-file-alt fa-2x text-gray-200"></i></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xxl-3 col-xl-3 col-md-6 mb-4">
            <div class="card h-100 border-start-lg border-start-info shadow-sm">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <div class="small fw-bold text-info mb-1">Berita & Informasi</div>
                            <div class="h3 fw-bold text-dark mb-0"><?= $total_berita ?> Artikel</div>
                        </div>
                        <div class="ms-2"><i class="fas fa-newspaper fa-2x text-gray-200"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8 mb-4">
            <div class="card shadow-sm h-100">
                <div class="card-header bg-white fw-bold text-dark">
                    <i class="fas fa-rocket me-2 text-primary"></i> Akses Cepat Modul Prodi
                </div>
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-md-3 col-6 mb-3">
                            <a href="index.php?module=<?= $module_url ?>&act=kurikulum" class="text-decoration-none text-dark">
                                <div class="p-3 border rounded hover-bg-light transition-all">
                                    <i class="fas fa-book-open fa-2x text-primary mb-2"></i><br>
                                    <span class="small fw-bold">Kurikulum</span>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3 col-6 mb-3">
                            <a href="index.php?module=<?= $module_url ?>&act=dok_akademik" class="text-decoration-none text-dark">
                                <div class="p-3 border rounded hover-bg-light transition-all">
                                    <i class="fas fa-file-pdf fa-2x text-success mb-2"></i><br>
                                    <span class="small fw-bold">Upload Dokumen</span>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3 col-6 mb-3">
                            <a href="index.php?module=<?= $module_url ?>&act=berita" class="text-decoration-none text-dark">
                                <div class="p-3 border rounded hover-bg-light transition-all">
                                    <i class="fas fa-bullhorn fa-2x text-warning mb-2"></i><br>
                                    <span class="small fw-bold">Tulis Berita</span>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3 col-6 mb-3">
                            <a href="index.php?module=<?= $module_url ?>&act=akreditasi" class="text-decoration-none text-dark">
                                <div class="p-3 border rounded hover-bg-light transition-all">
                                    <i class="fas fa-award fa-2x text-info mb-2"></i><br>
                                    <span class="small fw-bold">Akreditasi</span>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-3 col-6 mb-3">
                            <a href="index.php?module=<?= $module_url ?>&act=akreditasi" class="text-decoration-none text-dark">
                                <div class="p-3 border rounded hover-bg-light transition-all h-100">
                                    <i class="fas fa-award fa-2x text-info mb-2"></i><br>
                                    <span class="small fw-bold">Akreditasi</span>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-12 mt-2">
                            <a href="index.php?module=<?= $module_url ?>&act=profil_prodi" class="btn btn-outline-primary w-100 py-3 rounded-3 fw-bold border-dashed">
                                <i class="fas fa-edit me-2"></i> Kelola Tampilan Profil Beranda Prodi
                            </a>
                        </div>


                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 mb-4">
            <div class="card bg-primary text-white shadow-sm h-100">
                <div class="card-body d-flex flex-column justify-content-center align-items-center text-center">
                    <i class="fas fa-info-circle fa-3x mb-3 text-white-50"></i>
                    <h5 class="fw-bold">Pusat Informasi Prodi</h5>
                    <p class="small opacity-75 mb-0">
                        Pastikan untuk selalu memperbarui dokumen akreditasi, berita kegiatan mahasiswa, dan kurikulum terbaru agar informasi di website publik tetap relevan.
                    </p>
                </div>
            </div>
        </div>
    </div>

</div>

<style>
    .hover-bg-light:hover {
        background-color: #f8f9fa !important;
        transform: translateY(-2px);
        box-shadow: 0 .125rem .25rem rgba(0,0,0,.075);
    }
    .transition-all {
        transition: all 0.2s ease-in-out;
    }
</style>