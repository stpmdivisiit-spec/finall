<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Biro Kemahasiswaan - STPM Santa Ursula</title>
    
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="/FINAL/css/style2.css" rel="stylesheet" /> 
    <link rel="icon" type="image/x-icon" href="/FINAL/assets/img/favicon.png" />
    
    <script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">

    <style>
        /* CSS Khusus Front-End */
        body { background-color: #f2f6fc; }
        /* Memastikan dropdown memiliki animasi halus dan border yang rapi */
        .dropdown-menu { border: none; box-shadow: 0 0.15rem 1.75rem 0 rgba(33, 40, 50, 0.15); border-radius: 0.5rem; }
    </style>
</head>

<body class="nav-fixed sidenav-toggled"> 

    <nav class="topnav navbar navbar-expand-xl bg-white shadow-sm sticky-top" id="sidenavAccordion">
        <div class="container px-4">
            <a class="navbar-brand d-flex align-items-center text-primary fw-bold" href="/FINAL/index.php?module=kemahasiswaan">
                <img src="/FINAL/assets/img/logo.svg" alt="Logo" class="me-2 rounded" style="width: 40px;" onerror="this.src='https://via.placeholder.com/40'">
                <span class="d-none d-sm-block">KEMAHASISWAAN</span>
                <span class="d-block d-sm-none">KEMA</span> </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav_kema">
                <i data-feather="menu"></i>
            </button>

            <div class="collapse navbar-collapse" id="main_nav_kema">
                <ul class="navbar-nav ms-auto align-items-center" style="font-size: 0.9rem;">
                    
                    <li class="nav-item me-2">
                        <a class="nav-link text-dark" href="/FINAL/index.php" title="Kembali ke Beranda Kampus">
                            <i class="fas fa-home"></i>
                        </a>
                    </li>
                    
<li class="nav-item dropdown no-caret">
                        <a class="nav-link dropdown-toggle <?= in_array($mod, ['kema_profil', 'kema_beasiswa', 'kema_konseling', 'kema_kesehatan', 'kema_karir', 'kema_pengaduan']) ? 'active text-danger' : 'text-dark' ?>" id="navLayanan" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Layanan 
                        </a>
                        <div class="dropdown-menu border-0 shadow animated--fade-in-up" aria-labelledby="navLayanan">
                            <a class="dropdown-item <?= ($mod=='kema_profil') ? 'active bg-danger text-white fw-bold' : 'fw-bold text-danger' ?>" href="/FINAL/index.php?module=kema_profil">Profil Kemahasiswaan</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item <?= ($mod=='kema_beasiswa') ? 'active' : '' ?>" href="/FINAL/index.php?module=kema_beasiswa">Info Beasiswa</a>
                            <a class="dropdown-item <?= ($mod=='kema_konseling') ? 'active' : '' ?>" href="/FINAL/index.php?module=kema_konseling">Bimbingan Konseling</a>
                            <a class="dropdown-item <?= ($mod=='kema_kesehatan') ? 'active' : '' ?>" href="/FINAL/index.php?module=kema_kesehatan">Layanan Kesehatan</a>
                            <a class="dropdown-item <?= ($mod=='kema_karir') ? 'active' : '' ?>" href="/FINAL/index.php?module=kema_karir">Karir & Magang</a>
                            <a class="dropdown-item <?= ($mod=='kema_pengaduan') ? 'active' : '' ?>" href="/FINAL/index.php?module=kema_pengaduan">Pengaduan</a>
                        </div>
                    </li>

<li class="nav-item dropdown no-caret">
                        <a class="nav-link dropdown-toggle <?= in_array($mod, ['kema_bem', 'kema_hima', 'kema_ukm', 'kema_lkmm', 'kema_agenda']) ? 'active text-danger' : 'text-dark' ?>" id="navOrmawa" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            ORMAWA 
                        </a>
                        <div class="dropdown-menu border-0 shadow animated--fade-in-up" aria-labelledby="navOrmawa">
                            <a class="dropdown-item <?= ($mod=='kema_bem') ? 'active' : '' ?>" href="/FINAL/index.php?module=kema_bem">BEM & BLM</a>
                            <a class="dropdown-item <?= ($mod=='kema_hima') ? 'active' : '' ?>" href="/FINAL/index.php?module=kema_hima">Himpunan Mahasiswa</a>
                            <a class="dropdown-item <?= ($mod=='kema_ukm') ? 'active' : '' ?>" href="/FINAL/index.php?module=kema_ukm">UKM</a>
                            <a class="dropdown-item <?= ($mod=='kema_lkmm') ? 'active' : '' ?>" href="/FINAL/index.php?module=kema_lkmm">LKMM</a>
                            <a class="dropdown-item <?= ($mod=='kema_agenda') ? 'active' : '' ?>" href="/FINAL/index.php?module=kema_agenda">Agenda Kegiatan</a>
                        </div>
                    </li>


<li class="nav-item dropdown no-caret">
                        <a class="nav-link dropdown-toggle <?= in_array($mod, ['kema_pres_akademik', 'kema_pres_nonakademik', 'kema_pres_penghargaan']) ? 'active text-danger' : 'text-dark' ?>" id="navPrestasi" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Prestasi 
                        </a>
                        <div class="dropdown-menu border-0 shadow animated--fade-in-up" aria-labelledby="navPrestasi">
                            <a class="dropdown-item <?= ($mod=='kema_pres_akademik') ? 'active' : '' ?>" href="/FINAL/index.php?module=kema_pres_akademik">Akademik</a>
                            <a class="dropdown-item <?= ($mod=='kema_pres_nonakademik') ? 'active' : '' ?>" href="/FINAL/index.php?module=kema_pres_nonakademik">Non-Akademik</a>
                            <a class="dropdown-item <?= ($mod=='kema_pres_penghargaan') ? 'active' : '' ?>" href="/FINAL/index.php?module=kema_pres_penghargaan">Penghargaan</a>
                        </div>
                    </li>

<li class="nav-item dropdown no-caret">
                        <a class="nav-link dropdown-toggle <?= in_array($mod, ['kema_alumni_profil', 'kema_alumni_testimoni', 'kema_alumni_tracer', 'kema_alumni_forum']) ? 'active text-danger' : 'text-dark' ?>" id="navTracer" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Alumni 
                        </a>
                        <div class="dropdown-menu border-0 shadow animated--fade-in-up" aria-labelledby="navTracer">
                            <a class="dropdown-item <?= ($mod=='kema_alumni_profil') ? 'active' : '' ?>" href="/FINAL/index.php?module=kema_alumni_profil">Profil Alumni</a>
                            <a class="dropdown-item <?= ($mod=='kema_alumni_testimoni') ? 'active' : '' ?>" href="/FINAL/index.php?module=kema_alumni_testimoni">Testimoni Alumni</a>
                            <a class="dropdown-item <?= ($mod=='kema_alumni_tracer') ? 'active' : '' ?>" href="/FINAL/index.php?module=kema_alumni_tracer">Tracer Study</a>
                            <a class="dropdown-item <?= ($mod=='kema_alumni_forum') ? 'active' : '' ?>" href="/FINAL/index.php?module=kema_alumni_forum">Forum Alumni</a>
                        </div>
                    </li>

<li class="nav-item dropdown no-caret">
                        <a class="nav-link dropdown-toggle <?= in_array($mod, ['kema_wirausaha_program', 'kema_wirausaha_inovasi', 'kema_wirausaha_bisnis']) ? 'active text-danger' : 'text-dark' ?>" id="navWirausaha" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Wirausaha 
                        </a>
                        <div class="dropdown-menu border-0 shadow animated--fade-in-up" aria-labelledby="navWirausaha">
                            <a class="dropdown-item <?= ($mod=='kema_wirausaha_program') ? 'active' : '' ?>" href="/FINAL/index.php?module=kema_wirausaha_program">Program Mahasiswa</a>
                            <a class="dropdown-item <?= ($mod=='kema_wirausaha_inovasi') ? 'active' : '' ?>" href="/FINAL/index.php?module=kema_wirausaha_inovasi">Produk Inovasi</a>
                            <a class="dropdown-item <?= ($mod=='kema_wirausaha_bisnis') ? 'active' : '' ?>" href="/FINAL/index.php?module=kema_wirausaha_bisnis">Bisnis Kampus</a>
                        </div>
                    </li>

<li class="nav-item dropdown no-caret">
                        <a class="nav-link dropdown-toggle <?= in_array($mod, ['kema_pelatihan_karakter', 'kema_pelatihan_karier', 'kema_pelatihan_digital']) ? 'active text-danger' : 'text-dark' ?>" id="navPelatihan" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Pelatihan 
                        </a>
                        <div class="dropdown-menu border-0 shadow animated--fade-in-up" aria-labelledby="navPelatihan">
                            <a class="dropdown-item <?= ($mod=='kema_pelatihan_karakter') ? 'active' : '' ?>" href="/FINAL/index.php?module=kema_pelatihan_karakter">Pelatihan Karakter (Serviam)</a>
                            <a class="dropdown-item <?= ($mod=='kema_pelatihan_karier') ? 'active' : '' ?>" href="/FINAL/index.php?module=kema_pelatihan_karier">Layanan Karier</a>
                            <a class="dropdown-item <?= ($mod=='kema_pelatihan_digital') ? 'active' : '' ?>" href="/FINAL/index.php?module=kema_pelatihan_digital">Literasi Digital</a>
                        </div>
                    </li>

      <li class="nav-item dropdown no-caret">
                        <a class="nav-link dropdown-toggle <?= in_array($mod, ['kema_pengabdian_baksos', 'kema_pengabdian_desa', 'kema_pengabdian_relawan']) ? 'active text-danger' : 'text-dark' ?>" id="navPengabdian" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Pengabdian 
                        </a>
                        <div class="dropdown-menu border-0 shadow animated--fade-in-up" aria-labelledby="navPengabdian">
                            <a class="dropdown-item <?= ($mod=='kema_pengabdian_baksos') ? 'active' : '' ?>" href="/FINAL/index.php?module=kema_pengabdian_baksos">Bakti Sosial</a>
                            <a class="dropdown-item <?= ($mod=='kema_pengabdian_desa') ? 'active' : '' ?>" href="/FINAL/index.php?module=kema_pengabdian_desa">Kerja Bakti Desa</a>
                            <a class="dropdown-item <?= ($mod=='kema_pengabdian_relawan') ? 'active' : '' ?>" href="/FINAL/index.php?module=kema_pengabdian_relawan">Relawan Mahasiswa</a>
                        </div>
                    </li>

<li class="nav-item dropdown no-caret">
                        <a class="nav-link dropdown-toggle <?= in_array($mod, ['kema_dok_pedoman', 'kema_dok_ormawa', 'kema_dok_laporan', 'kema_dok_sop']) ? 'active text-danger' : 'text-dark' ?>" id="navDokumen" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Dokumen 
                        </a>
                        <div class="dropdown-menu dropdown-menu-end border-0 shadow animated--fade-in-up" aria-labelledby="navDokumen">
                            <a class="dropdown-item <?= ($mod=='kema_dok_pedoman') ? 'active' : '' ?>" href="/FINAL/index.php?module=kema_dok_pedoman">Buku Pedoman</a>
                            <a class="dropdown-item <?= ($mod=='kema_dok_ormawa') ? 'active' : '' ?>" href="/FINAL/index.php?module=kema_dok_ormawa">Panduan ORMAWA</a>
                            <a class="dropdown-item <?= ($mod=='kema_dok_laporan') ? 'active' : '' ?>" href="/FINAL/index.php?module=kema_dok_laporan">Laporan Tahunan</a>
                            <a class="dropdown-item <?= ($mod=='kema_dok_sop') ? 'active' : '' ?>" href="/FINAL/index.php?module=kema_dok_sop">SOP Layanan</a>
                        </div>
                    </li>
                    
                </ul>
            </div>
        </div>
    </nav>

    <div id="layoutSidenav">
        <div id="layoutSidenav_content">