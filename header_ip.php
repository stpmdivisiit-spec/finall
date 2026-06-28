<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Program Studi Ilmu Pemerintahan - STPM Santa Ursula</title>
    
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="/FINAL/css/style2.css" rel="stylesheet" /> 
    <link rel="icon" type="image/x-icon" href="/FINAL/assets/img/favicon.png" />
    
    <script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">

    <style>
        /* CSS Khusus Front-End */
        body { background-color: #f2f6fc; }
        /* Memastikan dropdown tidak tertutup di layar kecil dan memiliki animasi halus */
        .dropdown-menu { border: none; box-shadow: 0 0.15rem 1.75rem 0 rgba(33, 40, 50, 0.15); border-radius: 0.5rem; }
    </style>
</head>

<body class="nav-fixed sidenav-toggled"> 

    <nav class="topnav navbar navbar-expand-xl bg-white shadow-sm sticky-top" id="sidenavAccordion">
        <div class="container-fluid px-4">
            <a class="navbar-brand d-flex align-items-center text-primary fw-bold" href="/FINAL/index.php?module=pemerintahan">
                <img src="/FINAL/assets/img/logo.svg" alt="Logo" class="me-2 rounded" style="width: 40px;" onerror="this.src='https://via.placeholder.com/40'">
                <span class="d-none d-sm-block">ILMU PEMERINTAHAN</span>
                <span class="d-block d-sm-none">PEMERINTAHAN</span> </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav_ip">
                <i data-feather="menu"></i>
            </button>

            <div class="collapse navbar-collapse" id="main_nav_ip">
                <ul class="navbar-nav ms-auto align-items-center" style="font-size: 0.9rem;">
                    
                    <li class="nav-item me-2">
                        <a class="nav-link text-dark" href="/FINAL/index.php" title="Kembali ke Beranda Kampus">
                            <i class="fas fa-home"></i>
                        </a>
                    </li>
                    
<li class="nav-item dropdown no-caret">
                        <a class="nav-link dropdown-toggle <?= in_array($mod, ['ip_visi_misi', 'ip_tujuan_cpl', 'ip_struktur', 'ip_dosen', 'ip_akreditasi', 'ip_sejarah']) ? 'active text-primary' : 'text-dark' ?>" id="navProfilIP" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Profil 
                        </a>
                        <div class="dropdown-menu border-0 shadow animated--fade-in-up" aria-labelledby="navProfilIP">
                            <a class="dropdown-item <?= ($mod=='ip_visi_misi')?'active':'' ?>" href="/FINAL/index.php?module=ip_visi_misi">Visi & Misi Prodi</a>
                            <a class="dropdown-item <?= ($mod=='ip_tujuan_cpl')?'active':'' ?>" href="/FINAL/index.php?module=ip_tujuan_cpl">Tujuan & CPL</a>
                            <a class="dropdown-item <?= ($mod=='ip_struktur')?'active':'' ?>" href="/FINAL/index.php?module=ip_struktur">Struktur Organisasi</a>
                            <a class="dropdown-item <?= ($mod=='ip_dosen')?'active':'' ?>" href="/FINAL/index.php?module=ip_dosen">Profil Dosen</a>
                            <a class="dropdown-item <?= ($mod=='ip_akreditasi')?'active':'' ?>" href="/FINAL/index.php?module=ip_akreditasi">Akreditasi Prodi</a>
                            <a class="dropdown-item <?= ($mod=='ip_sejarah')?'active':'' ?>" href="/FINAL/index.php?module=ip_sejarah">Sejarah Prodi</a>
                        </div>
                    </li>

<li class="nav-item dropdown no-caret">
                        <a class="nav-link dropdown-toggle <?= in_array($mod, ['ip_kurikulum', 'ip_jadwal', 'ip_buku_akademik', 'ip_panduan_skripsi']) ? 'active text-primary' : 'text-dark' ?>" id="navAkademikIP" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Akademik 
                        </a>
                        <div class="dropdown-menu border-0 shadow animated--fade-in-up" aria-labelledby="navAkademikIP">
                            <a class="dropdown-item <?= ($mod=='ip_kurikulum')?'active':'' ?>" href="/FINAL/index.php?module=ip_kurikulum">Kurikulum</a>
                            <a class="dropdown-item <?= ($mod=='ip_jadwal')?'active':'' ?>" href="/FINAL/index.php?module=ip_jadwal">Jadwal Kuliah</a>
                            <a class="dropdown-item <?= ($mod=='ip_buku_akademik')?'active':'' ?>" href="/FINAL/index.php?module=ip_buku_akademik">Buku Akademik</a>
                            <a class="dropdown-item <?= ($mod=='ip_panduan_skripsi')?'active':'' ?>" href="/FINAL/index.php?module=ip_panduan_skripsi">Panduan Skripsi</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/FINAL/index.php?module=kalender">Kalender Kampus</a>
                        </div>
                    </li>

<li class="nav-item dropdown no-caret">
                        <a class="nav-link dropdown-toggle <?= in_array($mod, ['ip_penelitian_dosen', 'ip_riset_mahasiswa', 'ip_abdimas', 'ip_jurnal', 'ip_galeri']) ? 'active text-primary' : 'text-dark' ?>" id="navRisetIP" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Riset & Abdimas 
                        </a>
                        <div class="dropdown-menu border-0 shadow animated--fade-in-up" aria-labelledby="navRisetIP">
                            <a class="dropdown-item <?= ($mod=='ip_penelitian_dosen')?'active':'' ?>" href="/FINAL/index.php?module=ip_penelitian_dosen">Penelitian Dosen</a>
                            <a class="dropdown-item <?= ($mod=='ip_riset_mahasiswa')?'active':'' ?>" href="/FINAL/index.php?module=ip_riset_mahasiswa">Riset Mahasiswa</a>
                            <a class="dropdown-item <?= ($mod=='ip_abdimas')?'active':'' ?>" href="/FINAL/index.php?module=ip_abdimas">Abdimas Prodi</a>
                            <a class="dropdown-item <?= ($mod=='ip_jurnal')?'active':'' ?>" href="/FINAL/index.php?module=ip_jurnal">Jurnal Ilmiah</a>
                            <a class="dropdown-item <?= ($mod=='ip_galeri')?'active':'' ?>" href="/FINAL/index.php?module=ip_galeri">Galeri Kegiatan</a>
                        </div>
                    </li>

<li class="nav-item dropdown no-caret">
                        <a class="nav-link dropdown-toggle <?= in_array($mod, ['ip_hmps', 'ip_prestasi', 'ip_kegiatan', 'ip_tracer']) ? 'active text-primary' : 'text-dark' ?>" id="navKemaIP" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Mahasiswa 
                        </a>
                        <div class="dropdown-menu border-0 shadow animated--fade-in-up" aria-labelledby="navKemaIP">
                            <a class="dropdown-item <?= ($mod=='ip_hmps')?'active':'' ?>" href="/FINAL/index.php?module=ip_hmps">HMPS</a>
                            <a class="dropdown-item <?= ($mod=='ip_prestasi')?'active':'' ?>" href="/FINAL/index.php?module=ip_prestasi">Prestasi</a>
                            <a class="dropdown-item <?= ($mod=='ip_kegiatan')?'active':'' ?>" href="/FINAL/index.php?module=ip_kegiatan">Kegiatan</a>
                            <a class="dropdown-item <?= ($mod=='ip_tracer')?'active':'' ?>" href="/FINAL/index.php?module=ip_tracer">Tracer Study</a>
                        </div>
                    </li>

<li class="nav-item dropdown no-caret">
                        <a class="nav-link dropdown-toggle <?= in_array($mod, ['ip_mitra_pemdesa', 'ip_mitra_sosial', 'ip_mitra_mbkm', 'ip_mitra_riset']) ? 'active text-primary' : 'text-dark' ?>" id="navMitraIP" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Mitra 
                        </a>
                        <div class="dropdown-menu border-0 shadow animated--fade-in-up" aria-labelledby="navMitraIP">
                            <a class="dropdown-item <?= ($mod=='ip_mitra_pemdesa')?'active':'' ?>" href="/FINAL/index.php?module=ip_mitra_pemdesa">Pemerintah & Desa</a>
                            <a class="dropdown-item <?= ($mod=='ip_mitra_sosial')?'active':'' ?>" href="/FINAL/index.php?module=ip_mitra_sosial">Sosial & Lembaga</a>
                            <a class="dropdown-item <?= ($mod=='ip_mitra_mbkm')?'active':'' ?>" href="/FINAL/index.php?module=ip_mitra_mbkm">Program MBKM</a>
                            <a class="dropdown-item <?= ($mod=='ip_mitra_riset')?'active':'' ?>" href="/FINAL/index.php?module=ip_mitra_riset">Kerja Sama Penelitian</a>
                        </div>
                    </li>

<li class="nav-item dropdown no-caret">
                        <a class="nav-link dropdown-toggle <?= in_array($mod, ['ip_berita_artikel', 'ip_berita_seminar', 'ip_berita_pengumuman', 'ip_berita_agenda']) ? 'active text-primary' : 'text-dark' ?>" id="navBeritaIP" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Berita 
                        </a>
                        <div class="dropdown-menu border-0 shadow animated--fade-in-up" aria-labelledby="navBeritaIP">
                            <a class="dropdown-item <?= ($mod=='ip_berita_artikel')?'active':'' ?>" href="/FINAL/index.php?module=ip_berita_artikel">Artikel & Berita</a>
                            <a class="dropdown-item <?= ($mod=='ip_berita_seminar')?'active':'' ?>" href="/FINAL/index.php?module=ip_berita_seminar">Seminar</a>
                            <a class="dropdown-item <?= ($mod=='ip_berita_pengumuman')?'active':'' ?>" href="/FINAL/index.php?module=ip_berita_pengumuman">Pengumuman</a>
                            <a class="dropdown-item <?= ($mod=='ip_berita_agenda')?'active':'' ?>" href="/FINAL/index.php?module=ip_berita_agenda">Agenda Kegiatan</a>
                        </div>
                    </li>

<li class="nav-item dropdown no-caret">
                        <a class="nav-link dropdown-toggle <?= in_array($mod, ['ip_dok_skripsi', 'ip_dok_panduan', 'ip_dok_laporan', 'ip_dok_sop']) ? 'active text-primary' : 'text-dark' ?>" id="navDokumenIP" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Dokumen 
                        </a>
                        <div class="dropdown-menu dropdown-menu-end border-0 shadow animated--fade-in-up" aria-labelledby="navDokumenIP">
                            <a class="dropdown-item <?= ($mod=='ip_dok_skripsi')?'active':'' ?>" href="/FINAL/index.php?module=ip_dok_skripsi">Pedoman Skripsi</a>
                            <a class="dropdown-item <?= ($mod=='ip_dok_panduan')?'active':'' ?>" href="/FINAL/index.php?module=ip_dok_panduan">Buku Panduan</a>
                            <a class="dropdown-item <?= ($mod=='ip_dok_laporan')?'active':'' ?>" href="/FINAL/index.php?module=ip_dok_laporan">Laporan Tahunan</a>
                            <a class="dropdown-item <?= ($mod=='ip_dok_sop')?'active':'' ?>" href="/FINAL/index.php?module=ip_dok_sop">SOP Akademik</a>
                        </div>
                    </li>
                    
                </ul>
            </div>
        </div>
    </nav>

    <div id="layoutSidenav">
        <div id="layoutSidenav_content">