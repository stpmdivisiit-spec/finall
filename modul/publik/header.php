<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Sistem Informasi Kampus - STPM Santa Ursula</title>
    <link href="css/style2.css" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.png" />
    <script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/js/all.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.0/feather.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #f2f6fc; }
        .top-bar { background-color: #0061f2; color: white; font-size: 0.85rem; padding: 8px 0; }
        .top-bar a { color: white; text-decoration: none; margin-right: 15px; }
        .navbar { background-color: #ffffff; box-shadow: 0 0.15rem 1.75rem 0 rgba(33, 40, 50, 0.15); padding-top: 1rem; padding-bottom: 1rem; }
        .navbar-brand { font-weight: 700; color: #0061f2; }
        .nav-link { font-weight: 500; color: #363d47; margin-left: 10px; margin-right: 10px; }
        .nav-link:hover, .nav-link.active { color: #0061f2; }
        .dropdown-menu { border: none; box-shadow: 0 0.15rem 1.75rem 0 rgba(33, 40, 50, 0.15); border-radius: 0.5rem; }
        .page-header { padding-top: 0; padding-bottom: 0; position: relative; background: #212832; }
        .carousel-item { height: 85vh; min-height: 500px; background-color: #000; }
        .carousel-item img { object-fit: cover; height: 100%; width: 100%; opacity: 0.6; }
        .carousel-caption { top: 50%; transform: translateY(-50%); bottom: initial; z-index: 2; }
        .svg-border-waves { position: absolute; bottom: 0; left: 0; width: 100%; z-index: 3; }
    </style>
</head>
<body class="nav-fixed sidenav-toggled">

    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="index.php">
                <img src="assets/img/logo.svg" alt="Logo" class="me-2 rounded" style="width: 40px;" onerror="this.src='https://via.placeholder.com/40'">
                STPM SANTA URSULA
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <?php $mod = isset($_GET['module']) ? $_GET['module'] : 'beranda'; ?>
                    
                    <li class="nav-item"><a class="nav-link <?= ($mod == 'beranda') ? 'active' : '' ?>" href="index.php">Beranda</a></li>
                    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Profil</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Sejarah</a></li>
                            <li><a class="dropdown-item" href="#">Visi & Misi</a></li>
                            <li><a class="dropdown-item" href="#">Struktur Organisasi</a></li>
                        </ul>
                    </li>
                    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle <?= ($mod=='sosiatri' || $mod=='pemerintahan') ? 'active' : '' ?>" href="#" role="button" data-bs-toggle="dropdown">Akademik</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="index.php?module=sosiatri">Ilmu Sosiatri</a></li>
                            <li><a class="dropdown-item" href="index.php?module=pemerintahan">Ilmu Pemerintahan</a></li>
                            <li><a class="dropdown-item" href="#">Kalender Akademik</a></li>
                        </ul>
                    </li>
                    
                    <li class="nav-item"><a class="nav-link <?= ($mod=='kemahasiswaan') ? 'active' : '' ?>" href="index.php?module=kemahasiswaan">Kemahasiswaan</a></li>
                    <li class="nav-item"><a class="nav-link <?= ($mod=='lpm') ? 'active' : '' ?>" href="index.php?module=lpm">LPM</a></li>
                    <li class="nav-item"><a class="nav-link <?= ($mod=='lp2m') ? 'active' : '' ?>" href="index.php?module=lp2m">LP2M</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php#berita">Berita</a></li>
                    <li class="nav-item ms-lg-2">
                        <a class="btn btn-primary px-4 rounded-pill" href="https://stpmsantaursula.siakadcloud.com/gate/login">SIAKAD Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div id="layoutSidenav">
        <div id="layoutSidenav_content">