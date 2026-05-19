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
                        Profil <i class="fas fa-chevron-down ms-1" style="font-size: 0.7em;"></i>
                    </a>
                    <div class="dropdown-menu border-0 shadow animated--fade-in-up" aria-labelledby="navbarDropdownProfil">
                        <a class="dropdown-item <?= ($mod=='sejarah') ? 'active' : '' ?>" href="/FINAL/index.php?module=sejarah">Sejarah</a>
                        <a class="dropdown-item <?= ($mod=='visi_misi') ? 'active' : '' ?>" href="/FINAL/index.php?module=visi_misi">Visi & Misi</a>
                        <a class="dropdown-item <?= ($mod=='struktur_organisasi') ? 'active' : '' ?>" href="/FINAL/index.php?module=struktur_organisasi">Struktur Organisasi</a>
                    </div>
                </li>
                
<li class="nav-item dropdown no-caret">
    <a class="nav-link dropdown-toggle <?= ($mod=='sosiatri' || $mod=='pemerintahan' || $mod=='kalender') ? 'active text-primary' : 'text-dark' ?>" id="navbarDropdownAkademik" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Akademik <i class="fas fa-chevron-down ms-1" style="font-size: 0.7em;"></i>
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
                        Lembaga & Unit <i class="fas fa-chevron-down ms-1" style="font-size: 0.7em;"></i>
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
                
                <li class="nav-item">
                    <a class="nav-link text-dark" href="/FINAL/index.php#berita">Berita</a>
                </li>
                
                <li class="nav-item ms-lg-3 mt-3 mt-lg-0">
                    <a class="btn btn-primary rounded-pill px-4 shadow-sm" href="https://stpmsantaursula.siakadcloud.com/gate/login" target="_blank">
                        SIAKAD Login
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div id="layoutSidenav">
    <div id="layoutSidenav_content">