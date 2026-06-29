<!-- C:\xampp\htdocs\FINAL\header_perpus.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>UPT Perpustakaan - STPM Santa Ursula</title>
    
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="/FINAL/css/style2.css" rel="stylesheet" /> 
    <link rel="icon" type="image/x-icon" href="/FINAL/assets/img/favicon.png" />
    
    <script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">

    <style>
        body { background-color: #f2f6fc; }
        .dropdown-menu { border: none; box-shadow: 0 0.15rem 1.75rem 0 rgba(33, 40, 50, 0.15); border-radius: 0.5rem; }
    </style>
</head>

<body class="nav-fixed sidenav-toggled"> 

    <nav class="topnav navbar navbar-expand-xl bg-white shadow-sm sticky-top" id="sidenavAccordion">
        <div class="container-fluid px-4">
            <a class="navbar-brand d-flex align-items-center text-primary fw-bold" href="/FINAL/index.php?module=perpus">
                <img src="/FINAL/assets/img/logo.svg" alt="Logo" class="me-2 rounded" style="width: 40px;" onerror="this.src='https://via.placeholder.com/40'">
                <span class="d-none d-sm-block">PERPUSTAKAAN</span>
                <span class="d-block d-sm-none">PERPUS</span>
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav_perpus">
                <i data-feather="menu"></i>
            </button>

            <div class="collapse navbar-collapse" id="main_nav_perpus">
                <ul class="navbar-nav ms-auto align-items-center" style="font-size: 0.95rem;">
                    
                    <li class="nav-item me-2">
                        <a class="nav-link text-dark" href="/FINAL/index.php" title="Kembali ke Beranda Kampus">
                            <i class="fas fa-home"></i>
                        </a>
                    </li>
                    
<li class="nav-item dropdown no-caret">
                        <a class="nav-link dropdown-toggle <?= in_array($mod, ['perpus_profil_tentang', 'perpus_profil_vmt', 'perpus_profil_layanan', 'perpus_profil_fasilitas']) ? 'active fw-bold text-teal' : 'text-dark' ?>" id="navProfilPerpus" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Profil 
                        </a>
                        <div class="dropdown-menu border-0 shadow animated--fade-in-up" aria-labelledby="navProfilPerpus">
                            <a class="dropdown-item <?= ($mod=='perpus_profil_tentang') ? 'active bg-teal text-white' : '' ?>" href="/FINAL/index.php?module=perpus_profil_tentang">Tentang Perpustakaan</a>
                            <a class="dropdown-item <?= ($mod=='perpus_profil_vmt') ? 'active bg-teal text-white' : '' ?>" href="/FINAL/index.php?module=perpus_profil_vmt">Visi, Misi, & Tujuan</a>
                            <a class="dropdown-item <?= ($mod=='perpus_profil_layanan') ? 'active bg-teal text-white' : '' ?>" href="/FINAL/index.php?module=perpus_profil_layanan">Jam Layanan & Tata Tertib</a>
                            <a class="dropdown-item <?= ($mod=='perpus_profil_fasilitas') ? 'active bg-teal text-white' : '' ?>" href="/FINAL/index.php?module=perpus_profil_fasilitas">Fasilitas Ruangan</a>
                        </div>
                    </li>

<li class="nav-item dropdown no-caret">
                        <a class="nav-link dropdown-toggle <?= in_array($mod, ['perpus_layanan_sirkulasi', 'perpus_layanan_bebas', 'perpus_layanan_referensi', 'perpus_layanan_usulan']) ? 'active fw-bold text-teal' : 'text-dark' ?>" id="navLayananPerpus" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Layanan 
                        </a>
                        <div class="dropdown-menu border-0 shadow animated--fade-in-up" aria-labelledby="navLayananPerpus">
                            <a class="dropdown-item <?= ($mod=='perpus_layanan_sirkulasi') ? 'active bg-teal text-white' : '' ?>" href="/FINAL/index.php?module=perpus_layanan_sirkulasi" style="<?= ($mod=='perpus_layanan_sirkulasi') ? 'background-color: #20c997;' : '' ?>">Sirkulasi (Pinjam/Kembali)</a>
                            <a class="dropdown-item <?= ($mod=='perpus_layanan_bebas') ? 'active bg-teal text-white' : '' ?>" href="/FINAL/index.php?module=perpus_layanan_bebas" style="<?= ($mod=='perpus_layanan_bebas') ? 'background-color: #20c997;' : '' ?>">Surat Bebas Pustaka</a>
                            <a class="dropdown-item <?= ($mod=='perpus_layanan_referensi') ? 'active bg-teal text-white' : '' ?>" href="/FINAL/index.php?module=perpus_layanan_referensi" style="<?= ($mod=='perpus_layanan_referensi') ? 'background-color: #20c997;' : '' ?>">Layanan Referensi</a>
                            <a class="dropdown-item <?= ($mod=='perpus_layanan_usulan') ? 'active bg-teal text-white' : '' ?>" href="/FINAL/index.php?module=perpus_layanan_usulan" style="<?= ($mod=='perpus_layanan_usulan') ? 'background-color: #20c997;' : '' ?>">Usulan Pengadaan Buku</a>
                        </div>
                    </li>

<li class="nav-item dropdown no-caret">
                        <a class="nav-link dropdown-toggle <?= in_array($mod, ['perpus_koleksi_opac', 'perpus_koleksi_ebook', 'perpus_koleksi_repo', 'perpus_koleksi_berkala']) ? 'active fw-bold text-teal' : 'text-dark' ?>" id="navKoleksi" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Koleksi 
                        </a>
                        <div class="dropdown-menu border-0 shadow animated--fade-in-up" aria-labelledby="navKoleksi">
                            <a class="dropdown-item <?= ($mod=='perpus_koleksi_opac') ? 'active bg-teal text-white' : '' ?>" href="/FINAL/index.php?module=perpus_koleksi_opac" style="<?= ($mod=='perpus_koleksi_opac') ? 'background-color: #20c997;' : '' ?>">Katalog Online (OPAC)</a>
                            <a class="dropdown-item <?= ($mod=='perpus_koleksi_ebook') ? 'active bg-teal text-white' : '' ?>" href="/FINAL/index.php?module=perpus_koleksi_ebook" style="<?= ($mod=='perpus_koleksi_ebook') ? 'background-color: #20c997;' : '' ?>">E-Book & E-Journal</a>
                            <a class="dropdown-item <?= ($mod=='perpus_koleksi_repo') ? 'active bg-teal text-white' : '' ?>" href="/FINAL/index.php?module=perpus_koleksi_repo" style="<?= ($mod=='perpus_koleksi_repo') ? 'background-color: #20c997;' : '' ?>">Repository Skripsi</a>
                            <a class="dropdown-item <?= ($mod=='perpus_koleksi_berkala') ? 'active bg-teal text-white' : '' ?>" href="/FINAL/index.php?module=perpus_koleksi_berkala" style="<?= ($mod=='perpus_koleksi_berkala') ? 'background-color: #20c997;' : '' ?>">Koleksi Terbitan Berkala</a>
                        </div>
                    </li>



<li class="nav-item dropdown no-caret">
                        <a class="nav-link dropdown-toggle <?= in_array($mod, ['perpus_info_berita', 'perpus_info_acara', 'perpus_info_galeri']) ? 'active fw-bold text-teal' : 'text-dark' ?>" id="navInfoPerpus" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Informasi 
                        </a>
                        <div class="dropdown-menu dropdown-menu-end border-0 shadow animated--fade-in-up" aria-labelledby="navInfoPerpus">
                            <a class="dropdown-item <?= ($mod=='perpus_info_berita') ? 'active bg-teal text-white' : '' ?>" href="/FINAL/index.php?module=perpus_info_berita" style="<?= ($mod=='perpus_info_berita') ? 'background-color: #20c997;' : '' ?>">Berita Perpustakaan</a>
                            <a class="dropdown-item <?= ($mod=='perpus_info_acara') ? 'active bg-teal text-white' : '' ?>" href="/FINAL/index.php?module=perpus_info_acara" style="<?= ($mod=='perpus_info_acara') ? 'background-color: #20c997;' : '' ?>">Acara & Literasi</a>
                            <a class="dropdown-item <?= ($mod=='perpus_info_galeri') ? 'active bg-teal text-white' : '' ?>" href="/FINAL/index.php?module=perpus_info_galeri" style="<?= ($mod=='perpus_info_galeri') ? 'background-color: #20c997;' : '' ?>">Galeri</a>
                        </div>
                    </li>

                    <li class="nav-item ms-lg-3 mt-3 mt-lg-0">
                        <a class="btn btn-primary rounded-pill px-4 shadow-sm" href="#">
                            <i class="fas fa-search me-1"></i> Cari Buku
                        </a>
                    </li>
                    
                </ul>
            </div>
        </div>
    </nav>

    <div id="layoutSidenav">
        <div id="layoutSidenav_content">