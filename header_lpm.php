<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Lembaga Penjaminan Mutu (LPM) - STPM Santa Ursula</title>
    
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

    <nav class="topnav navbar navbar-expand-lg bg-white shadow-sm sticky-top" id="sidenavAccordion">
        <div class="container-fluid px-4">
            <a class="navbar-brand d-flex align-items-center text-primary fw-bold" href="/FINAL/index.php?module=lpm">
                <img src="/FINAL/assets/img/logo.svg" alt="Logo" class="me-2 rounded" style="width: 40px;" onerror="this.src='https://via.placeholder.com/40'">
                <span class="d-none d-sm-block">PENJAMINAN MUTU</span>
                <span class="d-block d-sm-none">LPM</span>
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav_lpm">
                <i data-feather="menu"></i>
            </button>

            <div class="collapse navbar-collapse" id="main_nav_lpm">
                <ul class="navbar-nav ms-auto align-items-center" style="font-size: 0.95rem;">
                    
                    <li class="nav-item me-2">
                        <a class="nav-link text-dark" href="/FINAL/index.php" title="Kembali ke Beranda Kampus">
                            <i class="fas fa-home"></i>
                        </a>
                    </li>
                    
<li class="nav-item dropdown no-caret">
                        <a class="nav-link dropdown-toggle <?= in_array($mod, ['lpm_kebijakan', 'lpm_manual', 'lpm_standar', 'lpm_formulir']) ? 'active text-info' : 'text-dark' ?>" id="navDokMutu" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Dokumen Mutu <i class="fas fa-chevron-down ms-1" style="font-size: 0.7em;"></i>
                        </a>
                        <div class="dropdown-menu border-0 shadow animated--fade-in-up" aria-labelledby="navDokMutu">
                            <a class="dropdown-item <?= ($mod=='lpm_kebijakan') ? 'active' : '' ?>" href="/FINAL/index.php?module=lpm_kebijakan">Kebijakan Mutu</a>
                            <a class="dropdown-item <?= ($mod=='lpm_manual') ? 'active' : '' ?>" href="/FINAL/index.php?module=lpm_manual">Manual Mutu</a>
                            <a class="dropdown-item <?= ($mod=='lpm_standar') ? 'active' : '' ?>" href="/FINAL/index.php?module=lpm_standar">Standar Mutu</a>
                            <a class="dropdown-item <?= ($mod=='lpm_formulir') ? 'active' : '' ?>" href="/FINAL/index.php?module=lpm_formulir">Formulir & SOP</a>
                        </div>
                    </li>

<li class="nav-item dropdown no-caret">
                        <a class="nav-link dropdown-toggle <?= in_array($mod, ['lpm_ami_panduan', 'lpm_ami_instrumen', 'lpm_ami_laporan', 'lpm_ami_tindaklanjut']) ? 'active text-info' : 'text-dark' ?>" id="navAmi" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Audit Mutu (AMI) <i class="fas fa-chevron-down ms-1" style="font-size: 0.7em;"></i>
                        </a>
                        <div class="dropdown-menu border-0 shadow animated--fade-in-up" aria-labelledby="navAmi">
                            <a class="dropdown-item <?= ($mod=='lpm_ami_panduan') ? 'active' : '' ?>" href="/FINAL/index.php?module=lpm_ami_panduan">Panduan AMI</a>
                            <a class="dropdown-item <?= ($mod=='lpm_ami_instrumen') ? 'active' : '' ?>" href="/FINAL/index.php?module=lpm_ami_instrumen">Instrumen AMI</a>
                            <a class="dropdown-item <?= ($mod=='lpm_ami_laporan') ? 'active' : '' ?>" href="/FINAL/index.php?module=lpm_ami_laporan">Laporan Hasil AMI</a>
                            <a class="dropdown-item <?= ($mod=='lpm_ami_tindaklanjut') ? 'active' : '' ?>" href="/FINAL/index.php?module=lpm_ami_tindaklanjut">Tindak Lanjut AMI</a>
                        </div>
                    </li>

<li class="nav-item dropdown no-caret">
                        <a class="nav-link dropdown-toggle <?= in_array($mod, ['lpm_mutu_pembelajaran', 'lpm_mutu_tracer', 'lpm_mutu_mhs', 'lpm_mutu_dosen']) ? 'active text-info' : 'text-dark' ?>" id="navMutuAkademik" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Mutu Akademik <i class="fas fa-chevron-down ms-1" style="font-size: 0.7em;"></i>
                        </a>
                        <div class="dropdown-menu border-0 shadow animated--fade-in-up" aria-labelledby="navMutuAkademik">
                            <a class="dropdown-item <?= ($mod=='lpm_mutu_pembelajaran') ? 'active' : '' ?>" href="/FINAL/index.php?module=lpm_mutu_pembelajaran">Evaluasi Pembelajaran</a>
                            <a class="dropdown-item <?= ($mod=='lpm_mutu_tracer') ? 'active' : '' ?>" href="/FINAL/index.php?module=lpm_mutu_tracer">Laporan Tracer Study</a>
                            <a class="dropdown-item <?= ($mod=='lpm_mutu_mhs') ? 'active' : '' ?>" href="/FINAL/index.php?module=lpm_mutu_mhs">Kepuasan Mahasiswa</a>
                            <a class="dropdown-item <?= ($mod=='lpm_mutu_dosen') ? 'active' : '' ?>" href="/FINAL/index.php?module=lpm_mutu_dosen">Kepuasan Dosen & Tendik</a>
                        </div>
                    </li>

<li class="nav-item dropdown no-caret">
                        <a class="nav-link dropdown-toggle <?= in_array($mod, ['lpm_akre_lembaga', 'lpm_akre_instrumen', 'lpm_akre_borang', 'lpm_akre_laporan']) ? 'active text-info' : 'text-dark' ?>" id="navAkreditasi" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Akreditasi <i class="fas fa-chevron-down ms-1" style="font-size: 0.7em;"></i>
                        </a>
                        <div class="dropdown-menu border-0 shadow animated--fade-in-up" aria-labelledby="navAkreditasi">
                            <a class="dropdown-item <?= ($mod=='lpm_akre_lembaga') ? 'active' : '' ?>" href="/FINAL/index.php?module=lpm_akre_lembaga">Akreditasi Lembaga</a>
                            <a class="dropdown-item <?= ($mod=='lpm_akre_instrumen') ? 'active' : '' ?>" href="/FINAL/index.php?module=lpm_akre_instrumen">Instrumen BAN-PT</a>
                            <a class="dropdown-item <?= ($mod=='lpm_akre_borang') ? 'active' : '' ?>" href="/FINAL/index.php?module=lpm_akre_borang">Borang / Evaluasi Diri</a>
                            <a class="dropdown-item <?= ($mod=='lpm_akre_laporan') ? 'active' : '' ?>" href="/FINAL/index.php?module=lpm_akre_laporan">Laporan Akreditasi</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div id="layoutSidenav">
        <div id="layoutSidenav_content">