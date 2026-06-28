<!-- C:\xampp\htdocs\FINAL\header.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Sistem Informasi Kampus - STPM Santa Ursula</title>
    
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="/FINAL/css/style2.css" rel="stylesheet" /> 
    <link rel="icon" type="image/x-icon" href="/FINAL/assets/img/favicon.png" />
    
    <script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.bootstrap5.min.css">
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        /* CSS Khusus Front-End */
        body { background-color: #f2f6fc; }
        .dropdown-menu { border: none; box-shadow: 0 0.15rem 1.75rem 0 rgba(33, 40, 50, 0.15); border-radius: 0.5rem; }
    </style>
</head>

<body class="nav-fixed sidenav-toggled"> 

<nav class="topnav navbar navbar-expand-xl navbar-light bg-white shadow-sm" id="sidenavAccordion">
    <div class="container px-4">
        <a class="navbar-brand d-flex align-items-center text-primary fw-bold" href="/FINAL/index.php">
            <img src="/FINAL/assets/img/logo.svg" alt="Logo" class="me-2 rounded" style="width: 40px;" onerror="this.src='https://via.placeholder.com/40'">
            STPM SANTA URSULA
        </a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav">
            <i data-feather="menu"></i>
        </button>

        <div class="collapse navbar-collapse" id="main_nav">
            <ul class="navbar-nav ms-auto align-items-center">
                <?php $mod = isset($_GET['module']) ? $_GET['module'] : 'beranda'; ?>

                <li class="nav-item">
                    <a class="nav-link <?= ($mod == 'beranda') ? 'active text-primary' : 'text-dark' ?>" href="/FINAL/index.php">Beranda</a>
                </li>
                
                <li class="nav-item dropdown no-caret">
                    <a class="nav-link dropdown-toggle <?= ($mod=='sejarah' || $mod=='visi_misi' || $mod=='struktur_organisasi') ? 'active text-primary' : 'text-dark' ?>" id="navbarDropdownProfil" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Profil 
                    </a>
                    <div class="dropdown-menu border-0 shadow animated--fade-in-up" aria-labelledby="navbarDropdownProfil">
                        <a class="dropdown-item <?= ($mod=='sejarah') ? 'active' : '' ?>" href="/FINAL/index.php?module=sejarah">Sejarah</a>
                        <a class="dropdown-item <?= ($mod=='visi_misi') ? 'active' : '' ?>" href="/FINAL/index.php?module=visi_misi">Visi & Misi</a>
                        <a class="dropdown-item <?= ($mod=='struktur_organisasi') ? 'active' : '' ?>" href="/FINAL/index.php?module=struktur_organisasi">Struktur Organisasi</a>
                    </div>
                </li>
                
<li class="nav-item dropdown no-caret">
    <a class="nav-link dropdown-toggle <?= ($mod=='sosiatri' || $mod=='pemerintahan' || $mod=='kalender') ? 'active text-primary' : 'text-dark' ?>" id="navbarDropdownAkademik" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Akademik 
    </a>
    <div class="dropdown-menu dropdown-menu-end border-0 shadow animated--fade-in-up" aria-labelledby="navbarDropdownAkademik">
        <a class="dropdown-item <?= ($mod=='sosiatri') ? 'active' : '' ?>" href="/FINAL/index.php?module=sosiatri">Ilmu Sosiatri</a>
        <a class="dropdown-item <?= ($mod=='pemerintahan') ? 'active' : '' ?>" href="/FINAL/index.php?module=pemerintahan">Ilmu Pemerintahan</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item <?= ($mod=='kalender') ? 'active text-primary' : '' ?> fw-bold" href="/FINAL/index.php?module=kalender">
            <i class="far fa-calendar-alt me-2"></i>Kalender Akademik
        </a>
    </div>
</li>
                
                <li class="nav-item">
                    <a class="nav-link <?= ($mod=='kemahasiswaan' || $mod=='kema') ? 'active text-primary' : 'text-dark' ?>" href="/FINAL/index.php?module=kemahasiswaan">Kemahasiswaan</a>
                </li>
                
                <li class="nav-item dropdown no-caret">
                    <a class="nav-link dropdown-toggle <?= ($mod=='lpm' || $mod=='lp2m' || $mod=='sekretariat' || $mod=='perpus') ? 'active text-primary' : 'text-dark' ?>" id="navbarDropdownLembaga" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Lembaga & Unit 
                    </a>
                    <div class="dropdown-menu border-0 shadow animated--fade-in-up" aria-labelledby="navbarDropdownLembaga">
                        <h6 class="dropdown-header text-primary fw-bold">Lembaga</h6>
                        <a class="dropdown-item" href="/FINAL/index.php?module=lpm">Penjaminan Mutu (LPM)</a>
                        <a class="dropdown-item" href="/FINAL/index.php?module=lp2m">Penelitian & Pengabdian (LP2M)</a>
                        <div class="dropdown-divider"></div>
                        <h6 class="dropdown-header text-primary fw-bold">Unit Layanan</h6>
                        <a class="dropdown-item" href="/FINAL/index.php?module=sekretariat">Sekretariat Kampus</a>
                        <a class="dropdown-item" href="/FINAL/index.php?module=perpus">UPT Perpustakaan</a>
                    </div>
                </li>
                

                
                <li class="nav-item ms-lg-3 mt-3 mt-lg-0">
                        <!-- TOMBOL PEMICU MODAL LOGIN -->
                        <button type="button" class="btn btn-primary px-4 rounded-pill fw-bold shadow-sm" data-bs-toggle="modal" data-bs-target="#loginModal">
                            <i class="fas fa-sign-in-alt me-2"></i>Login
                        </button>
                </li>


            </ul>
        </div>
    </div>
</nav>


    <!-- ========================================== -->
    <!-- MODAL LOGIN TERPUSAT -->
    <!-- ========================================== -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
                <div class="modal-header bg-primary text-white border-0 py-3">
                    <h5 class="modal-title fw-bold" id="loginModalLabel"><i class="fas fa-lock me-2"></i> Otorisasi Pengguna</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4 p-md-5 bg-light">
                    <div class="text-center mb-4">
                        <img src="/FINAL/assets/img/illustrations/windows.svg" style="width: 120px;" class="mb-3">
                        <p class="text-muted small">Gerbang login khusus civitas akademika STPM Santa Ursula (Dosen, Tendik, dan Admin).</p>
                    </div>

                    <!-- Tempat Pesan Error -->
                    <?php 
                        if (isset($_GET['error'])) {
                            echo '<div class="alert alert-danger alert-icon border-start-lg border-start-danger mb-4 shadow-sm" role="alert">
                                    <div class="alert-icon-content"><i class="fas fa-exclamation-triangle"></i></div>
                                    <div class="alert-content small fw-bold">';
                            if ($_GET['error'] == 'pass') echo 'Kata sandi yang Anda masukkan salah!';
                            elseif ($_GET['error'] == 'user') echo 'Alamat email tidak terdaftar!';
                            elseif ($_GET['error'] == 'empty') echo 'Harap isi kolom email dan kata sandi!';
                            elseif ($_GET['error'] == 'banned') echo 'Akun Anda sedang dinonaktifkan!';
                            echo '</div></div>';
                        }
                    ?>

                    <form action="login.php" method="POST">
                        <div class="form-floating mb-3">
                            <input class="form-control rounded-3" id="inputEmail" name="email" type="email" placeholder="name@example.com" required />
                            <label for="inputEmail"><i class="fas fa-envelope text-muted me-2"></i>Alamat Email Akun</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control rounded-3" id="inputPassword" name="password" type="password" placeholder="Password" required />
                            <label for="inputPassword"><i class="fas fa-key text-muted me-2"></i>Kata Sandi</label>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-4 mt-3">
                            <div class="form-check">
                                <input class="form-check-input" id="rememberMe" type="checkbox" />
                                <label class="form-check-label text-muted small" for="rememberMe">Ingat saya</label>
                            </div>
                            <a class="small text-decoration-none fw-bold" href="#">Lupa Sandi?</a>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg shadow-sm rounded-pill fw-bold">Masuk ke Dasbor</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Script Pembuka Modal Otomatis Jika Ada Error -->
    <?php if(isset($_GET['error'])): ?>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var loginModal = new bootstrap.Modal(document.getElementById('loginModal'));
            loginModal.show();
        });
    </script>
    <?php endif; ?>






<div id="layoutSidenav">
    <div id="layoutSidenav_content">





