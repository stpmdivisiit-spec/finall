<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Lembaga Penelitian & Pengabdian Masyarakat (LP2M) - STPM Santa Ursula</title>
    
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
            <a class="navbar-brand d-flex align-items-center text-primary fw-bold" href="/FINAL/index.php?module=lp2m">
                <img src="/FINAL/assets/img/logo.svg" alt="Logo" class="me-2 rounded" style="width: 40px;" onerror="this.src='https://via.placeholder.com/40'">
                <span class="d-none d-sm-block">LEMBAGA LP2M</span>
                <span class="d-block d-sm-none">LP2M</span>
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav_lp2m">
                <i data-feather="menu"></i>
            </button>

            <div class="collapse navbar-collapse" id="main_nav_lp2m">
                <ul class="navbar-nav ms-auto align-items-center" style="font-size: 0.9rem;">
                    
                    <li class="nav-item me-2">
                        <a class="nav-link text-dark" href="/FINAL/index.php" title="Kembali ke Beranda Kampus">
                            <i class="fas fa-home"></i>
                        </a>
                    </li>
                    
<li class="nav-item dropdown no-caret">
                        <a class="nav-link dropdown-toggle <?= in_array($mod, ['lp2m_profil_fungsi', 'lp2m_struktur', 'lp2m_vmt']) ? 'active text-warning' : 'text-dark' ?>" id="navProfilLP2M" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Profil 
                        </a>
                        <div class="dropdown-menu border-0 shadow animated--fade-in-up" aria-labelledby="navProfilLP2M">
                            <a class="dropdown-item <?= ($mod=='lp2m_profil_fungsi') ? 'active' : '' ?>" href="/FINAL/index.php?module=lp2m_profil_fungsi">Profil & Fungsi LP2M</a>
                            <a class="dropdown-item <?= ($mod=='lp2m_struktur') ? 'active' : '' ?>" href="/FINAL/index.php?module=lp2m_struktur">Struktur Organisasi</a>
                            <a class="dropdown-item <?= ($mod=='lp2m_vmt') ? 'active' : '' ?>" href="/FINAL/index.php?module=lp2m_vmt">Visi, Misi, & Tujuan</a>
                        </div>
                    </li>

<li class="nav-item dropdown no-caret">
                        <a class="nav-link dropdown-toggle <?= in_array($mod, ['lp2m_riset_roadmap', 'lp2m_riset_agenda', 'lp2m_riset_panduan', 'lp2m_riset_hasil', 'lp2m_riset_hki', 'lp2m_riset_hibah']) ? 'active text-warning' : 'text-dark' ?>" id="navRisetLP2M" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Penelitian 
                        </a>
                        <div class="dropdown-menu border-0 shadow animated--fade-in-up" aria-labelledby="navRisetLP2M">
                            <a class="dropdown-item <?= ($mod=='lp2m_riset_roadmap') ? 'active' : '' ?>" href="/FINAL/index.php?module=lp2m_riset_roadmap">Roadmap Penelitian</a>
                            <a class="dropdown-item <?= ($mod=='lp2m_riset_agenda') ? 'active' : '' ?>" href="/FINAL/index.php?module=lp2m_riset_agenda">Agenda & Tema Penelitian</a>
                            <a class="dropdown-item <?= ($mod=='lp2m_riset_panduan') ? 'active' : '' ?>" href="/FINAL/index.php?module=lp2m_riset_panduan">Panduan & Proposal</a>
                            <a class="dropdown-item <?= ($mod=='lp2m_riset_hasil') ? 'active' : '' ?>" href="/FINAL/index.php?module=lp2m_riset_hasil">Hasil & Laporan</a>
                            <a class="dropdown-item <?= ($mod=='lp2m_riset_hki') ? 'active' : '' ?>" href="/FINAL/index.php?module=lp2m_riset_hki">Hak Kekayaan Intelektual (HKI)</a>
                            <a class="dropdown-item <?= ($mod=='lp2m_riset_hibah') ? 'active' : '' ?>" href="/FINAL/index.php?module=lp2m_riset_hibah">Insentif & Hibah Penelitian</a>
                        </div>
                    </li>

<li class="nav-item dropdown no-caret">
                        <a class="nav-link dropdown-toggle <?= in_array($mod, ['lp2m_abdimas_roadmap', 'lp2m_abdimas_program', 'lp2m_abdimas_panduan', 'lp2m_abdimas_kkn', 'lp2m_abdimas_laporan']) ? 'active text-warning' : 'text-dark' ?>" id="navAbdimas" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Abdimas 
                        </a>
                        <div class="dropdown-menu border-0 shadow animated--fade-in-up" aria-labelledby="navAbdimas">
                            <a class="dropdown-item <?= ($mod=='lp2m_abdimas_roadmap') ? 'active' : '' ?>" href="/FINAL/index.php?module=lp2m_abdimas_roadmap">Roadmap Abdimas</a>
                            <a class="dropdown-item <?= ($mod=='lp2m_abdimas_program') ? 'active' : '' ?>" href="/FINAL/index.php?module=lp2m_abdimas_program">Program Pengabdian</a>
                            <a class="dropdown-item <?= ($mod=='lp2m_abdimas_panduan') ? 'active' : '' ?>" href="/FINAL/index.php?module=lp2m_abdimas_panduan">Panduan Abdimas</a>
                            <a class="dropdown-item <?= ($mod=='lp2m_abdimas_kkn') ? 'active' : '' ?>" href="/FINAL/index.php?module=lp2m_abdimas_kkn">Kuliah Kerja Nyata (KKN)</a>
                            <a class="dropdown-item <?= ($mod=='lp2m_abdimas_laporan') ? 'active' : '' ?>" href="/FINAL/index.php?module=lp2m_abdimas_laporan">Laporan & Dokumentasi</a>
                        </div>
                    </li>

<li class="nav-item dropdown no-caret">
                        <a class="nav-link dropdown-toggle <?= in_array($mod, ['lp2m_pub_jurnal', 'lp2m_pub_prosiding', 'lp2m_pub_repo', 'lp2m_pub_cfp']) ? 'active text-warning' : 'text-dark' ?>" id="navPublikasi" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Publikasi 
                        </a>
                        <div class="dropdown-menu border-0 shadow animated--fade-in-up" aria-labelledby="navPublikasi">
                            <a class="dropdown-item <?= ($mod=='lp2m_pub_jurnal') ? 'active' : '' ?>" href="/FINAL/index.php?module=lp2m_pub_jurnal">Jurnal Institusi</a>
                            <a class="dropdown-item <?= ($mod=='lp2m_pub_prosiding') ? 'active' : '' ?>" href="/FINAL/index.php?module=lp2m_pub_prosiding">Prosiding & Konferensi</a>
                            <a class="dropdown-item <?= ($mod=='lp2m_pub_repo') ? 'active' : '' ?>" href="/FINAL/index.php?module=lp2m_pub_repo">Repository Penelitian</a>
                            <a class="dropdown-item <?= ($mod=='lp2m_pub_cfp') ? 'active' : '' ?>" href="/FINAL/index.php?module=lp2m_pub_cfp">Call for Paper</a>
                        </div>
                    </li>

<li class="nav-item dropdown no-caret">
                        <a class="nav-link dropdown-toggle <?= in_array($mod, ['lp2m_kerja_penelitian', 'lp2m_kerja_abdimas', 'lp2m_kerja_mou']) ? 'active text-warning' : 'text-dark' ?>" id="navKerjasama" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Kerjasama 
                        </a>
                        <div class="dropdown-menu border-0 shadow animated--fade-in-up" aria-labelledby="navKerjasama">
                            <a class="dropdown-item <?= ($mod=='lp2m_kerja_penelitian') ? 'active' : '' ?>" href="/FINAL/index.php?module=lp2m_kerja_penelitian">Mitra Penelitian</a>
                            <a class="dropdown-item <?= ($mod=='lp2m_kerja_abdimas') ? 'active' : '' ?>" href="/FINAL/index.php?module=lp2m_kerja_abdimas">Mitra Abdimas</a>
                            <a class="dropdown-item <?= ($mod=='lp2m_kerja_mou') ? 'active' : '' ?>" href="/FINAL/index.php?module=lp2m_kerja_mou">MoU & MoA</a>
                        </div>
                    </li>
<li class="nav-item dropdown no-caret">
                        <a class="nav-link dropdown-toggle <?= in_array($mod, ['lp2m_dok_laporan', 'lp2m_dok_kebijakan', 'lp2m_dok_sop', 'lp2m_dok_formulir']) ? 'active text-warning' : 'text-dark' ?>" id="navDokLP2M" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Dokumen 
                        </a>
                        <div class="dropdown-menu dropdown-menu-end border-0 shadow animated--fade-in-up" aria-labelledby="navDokLP2M">
                            <a class="dropdown-item <?= ($mod=='lp2m_dok_laporan') ? 'active' : '' ?>" href="/FINAL/index.php?module=lp2m_dok_laporan">Laporan Tahunan</a>
                            <a class="dropdown-item <?= ($mod=='lp2m_dok_kebijakan') ? 'active' : '' ?>" href="/FINAL/index.php?module=lp2m_dok_kebijakan">Kebijakan LP2M</a>
                            <a class="dropdown-item <?= ($mod=='lp2m_dok_sop') ? 'active' : '' ?>" href="/FINAL/index.php?module=lp2m_dok_sop">SOP & Panduan</a>
                            <a class="dropdown-item <?= ($mod=='lp2m_dok_formulir') ? 'active' : '' ?>" href="/FINAL/index.php?module=lp2m_dok_formulir">Formulir & Template</a>
                        </div>
                    </li>

<li class="nav-item dropdown no-caret">
                        <a class="nav-link dropdown-toggle <?= in_array($mod, ['lp2m_info_berita', 'lp2m_info_agenda', 'lp2m_info_galeri']) ? 'active text-warning' : 'text-dark' ?>" id="navInfo" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Informasi 
                        </a>
                        <div class="dropdown-menu dropdown-menu-end border-0 shadow animated--fade-in-up" aria-labelledby="navInfo">
                            <a class="dropdown-item <?= ($mod=='lp2m_info_berita') ? 'active' : '' ?>" href="/FINAL/index.php?module=lp2m_info_berita">Berita LP2M</a>
                            <a class="dropdown-item <?= ($mod=='lp2m_info_agenda') ? 'active' : '' ?>" href="/FINAL/index.php?module=lp2m_info_agenda">Agenda & Kegiatan</a>
                            <a class="dropdown-item <?= ($mod=='lp2m_info_galeri') ? 'active' : '' ?>" href="/FINAL/index.php?module=lp2m_info_galeri">Galeri & Dokumentasi</a>
                        </div>
                    </li>


                    
                </ul>
            </div>
        </div>
    </nav>

    <div id="layoutSidenav">
        <div id="layoutSidenav_content">