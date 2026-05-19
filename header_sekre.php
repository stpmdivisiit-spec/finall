<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Bagian Sekretariat - STPM Santa Ursula</title>
    
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
            <a class="navbar-brand d-flex align-items-center text-primary fw-bold" href="/FINAL/index.php?module=sekretariat">
                <img src="/FINAL/assets/img/logo.svg" alt="Logo" class="me-2 rounded" style="width: 40px;" onerror="this.src='https://via.placeholder.com/40'">
                <span class="d-none d-sm-block">SEKRETARIAT</span>
                <span class="d-block d-sm-none">SEKRE</span>
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav_sekre">
                <i data-feather="menu"></i>
            </button>

            <div class="collapse navbar-collapse" id="main_nav_sekre">
                <ul class="navbar-nav ms-auto align-items-center" style="font-size: 0.95rem;">
                    
                    <li class="nav-item me-2">
                        <a class="nav-link text-dark" href="/FINAL/index.php" title="Kembali ke Beranda Kampus">
                            <i class="fas fa-home"></i>
                        </a>
                    </li>
                    
<li class="nav-item dropdown no-caret">
                        <a class="nav-link dropdown-toggle <?= in_array($mod, ['sekre_profil_tupoksi', 'sekre_profil_struktur', 'sekre_profil_layanan']) ? 'active fw-bold text-dark' : 'text-dark' ?>" id="navProfilSekre" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Profil <i class="fas fa-chevron-down ms-1" style="font-size: 0.7em;"></i>
                        </a>
                        <div class="dropdown-menu border-0 shadow animated--fade-in-up" aria-labelledby="navProfilSekre">
                            <a class="dropdown-item <?= ($mod=='sekre_profil_tupoksi') ? 'active bg-secondary text-white' : '' ?>" href="/FINAL/index.php?module=sekre_profil_tupoksi">Tugas Pokok & Fungsi</a>
                            <a class="dropdown-item <?= ($mod=='sekre_profil_struktur') ? 'active bg-secondary text-white' : '' ?>" href="/FINAL/index.php?module=sekre_profil_struktur">Struktur Organisasi</a>
                            <a class="dropdown-item <?= ($mod=='sekre_profil_layanan') ? 'active bg-secondary text-white' : '' ?>" href="/FINAL/index.php?module=sekre_profil_layanan">Layanan & Maklumat</a>
                        </div>
                    </li>

<li class="nav-item dropdown no-caret">
                        <a class="nav-link dropdown-toggle <?= in_array($mod, ['sekre_layanan_surat', 'sekre_layanan_legalisir', 'sekre_layanan_fasilitas', 'sekre_layanan_status']) ? 'active fw-bold text-dark' : 'text-dark' ?>" id="navLayananSekre" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Layanan <i class="fas fa-chevron-down ms-1" style="font-size: 0.7em;"></i>
                        </a>
                        <div class="dropdown-menu border-0 shadow animated--fade-in-up" aria-labelledby="navLayananSekre">
                            <a class="dropdown-item <?= ($mod=='sekre_layanan_surat') ? 'active bg-secondary text-white' : '' ?>" href="/FINAL/index.php?module=sekre_layanan_surat">Pengajuan Surat Keterangan</a>
                            <a class="dropdown-item <?= ($mod=='sekre_layanan_legalisir') ? 'active bg-secondary text-white' : '' ?>" href="/FINAL/index.php?module=sekre_layanan_legalisir">Legalisir Ijazah / Transkrip</a>
                            <a class="dropdown-item <?= ($mod=='sekre_layanan_fasilitas') ? 'active bg-secondary text-white' : '' ?>" href="/FINAL/index.php?module=sekre_layanan_fasilitas">Peminjaman Ruangan & Fasilitas</a>
                            <a class="dropdown-item <?= ($mod=='sekre_layanan_status') ? 'active bg-secondary text-white' : '' ?>" href="/FINAL/index.php?module=sekre_layanan_status">Cek Status Dokumen</a>
                        </div>
                    </li>

<li class="nav-item dropdown no-caret">
                        <a class="nav-link dropdown-toggle <?= in_array($mod, ['sekre_info_pengumuman', 'sekre_info_agenda_pimpinan', 'sekre_info_kalender', 'sekre_info_berita']) ? 'active fw-bold text-dark' : 'text-dark' ?>" id="navInfoSekre" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Informasi <i class="fas fa-chevron-down ms-1" style="font-size: 0.7em;"></i>
                        </a>
                        <div class="dropdown-menu border-0 shadow animated--fade-in-up" aria-labelledby="navInfoSekre">
                            <a class="dropdown-item <?= ($mod=='sekre_info_pengumuman') ? 'active bg-secondary text-white' : '' ?>" href="/FINAL/index.php?module=sekre_info_pengumuman">Pengumuman Kampus</a>
                            <a class="dropdown-item <?= ($mod=='sekre_info_agenda_pimpinan') ? 'active bg-secondary text-white' : '' ?>" href="/FINAL/index.php?module=sekre_info_agenda_pimpinan">Agenda Pimpinan</a>
                            <a class="dropdown-item <?= ($mod=='sekre_info_kalender') ? 'active bg-secondary text-white' : '' ?>" href="/FINAL/index.php?module=sekre_info_kalender">Kalender Kegiatan</a>
                            <a class="dropdown-item <?= ($mod=='sekre_info_berita') ? 'active bg-secondary text-white' : '' ?>" href="/FINAL/index.php?module=sekre_info_berita">Berita Sekretariat</a>
                        </div>
                    </li>

<li class="nav-item dropdown no-caret">
                        <a class="nav-link dropdown-toggle <?= in_array($mod, ['sekre_dok_sk', 'sekre_dok_peraturan', 'sekre_dok_pedoman', 'sekre_dok_formulir']) ? 'active fw-bold text-dark' : 'text-dark' ?>" id="navRegulasiSekre" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Dokumen & Regulasi <i class="fas fa-chevron-down ms-1" style="font-size: 0.7em;"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end border-0 shadow animated--fade-in-up" aria-labelledby="navRegulasiSekre">
                            <a class="dropdown-item <?= ($mod=='sekre_dok_sk') ? 'active bg-secondary text-white' : '' ?>" href="/FINAL/index.php?module=sekre_dok_sk">SK Ketua STPM</a>
                            <a class="dropdown-item <?= ($mod=='sekre_dok_peraturan') ? 'active bg-secondary text-white' : '' ?>" href="/FINAL/index.php?module=sekre_dok_peraturan">Peraturan Akademik</a>
                            <a class="dropdown-item <?= ($mod=='sekre_dok_pedoman') ? 'active bg-secondary text-white' : '' ?>" href="/FINAL/index.php?module=sekre_dok_pedoman">Pedoman Umum</a>
                            <a class="dropdown-item <?= ($mod=='sekre_dok_formulir') ? 'active bg-secondary text-white' : '' ?>" href="/FINAL/index.php?module=sekre_dok_formulir">Formulir Administrasi</a>
                        </div>
                    </li>                    
                </ul>
            </div>
        </div>
    </nav>

    <div id="layoutSidenav">
        <div id="layoutSidenav_content">