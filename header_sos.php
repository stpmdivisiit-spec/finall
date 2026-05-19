<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Program Studi Pembangunan Sosial - STPM Santa Ursula</title>
    
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
            <a class="navbar-brand d-flex align-items-center text-primary fw-bold" href="/FINAL/index.php?module=sosiatri">
                <img src="/FINAL/assets/img/logo.svg" alt="Logo" class="me-2 rounded" style="width: 40px;" onerror="this.src='https://via.placeholder.com/40'">
                <span class="d-none d-sm-block">ILMU SOSIATRI</span>
                <span class="d-block d-sm-none">SOSIATRI</span> </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav_sos">
                <i data-feather="menu"></i>
            </button>

            <div class="collapse navbar-collapse" id="main_nav_sos">
                <ul class="navbar-nav ms-auto align-items-center" style="font-size: 0.9rem;">
                    
                    <li class="nav-item me-2">
                        <a class="nav-link text-dark" href="/FINAL/index.php" title="Kembali ke Beranda Kampus">
                            <i class="fas fa-home"></i>
                        </a>
                    </li>
                    


                    <li class="nav-item dropdown no-caret">
                        <a class="nav-link dropdown-toggle <?= in_array($mod, ['sos_visi_misi', 'sos_tujuan_cpl', 'sos_struktur', 'sos_dosen', 'sos_akreditasi', 'sos_sejarah']) ? 'active text-primary' : 'text-dark' ?>" id="navProfil" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Profil <i class="fas fa-chevron-down ms-1" style="font-size: 0.7em;"></i>
                        </a>
                        <div class="dropdown-menu border-0 shadow animated--fade-in-up" aria-labelledby="navProfil">
                            <a class="dropdown-item <?= ($mod=='sos_visi_misi')?'active':'' ?>" href="/FINAL/index.php?module=sos_visi_misi">Visi & Misi Prodi</a>
                            <a class="dropdown-item <?= ($mod=='sos_tujuan_cpl')?'active':'' ?>" href="/FINAL/index.php?module=sos_tujuan_cpl">Tujuan & CPL</a>
                            <a class="dropdown-item <?= ($mod=='sos_struktur')?'active':'' ?>" href="/FINAL/index.php?module=sos_struktur">Struktur Organisasi</a>
                            <a class="dropdown-item <?= ($mod=='sos_dosen')?'active':'' ?>" href="/FINAL/index.php?module=sos_dosen">Profil Dosen</a>
                            <a class="dropdown-item <?= ($mod=='sos_akreditasi')?'active':'' ?>" href="/FINAL/index.php?module=sos_akreditasi">Akreditasi Prodi</a>
                            <a class="dropdown-item <?= ($mod=='sos_sejarah')?'active':'' ?>" href="/FINAL/index.php?module=sos_sejarah">Sejarah Prodi</a>
                        </div>
                    </li>







<li class="nav-item dropdown no-caret">
                        <a class="nav-link dropdown-toggle <?= in_array($mod, ['sos_kurikulum', 'sos_jadwal', 'sos_buku_akademik', 'sos_panduan_skripsi']) ? 'active text-primary' : 'text-dark' ?>" id="navAkademik" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Akademik <i class="fas fa-chevron-down ms-1" style="font-size: 0.7em;"></i>
                        </a>
                        <div class="dropdown-menu border-0 shadow animated--fade-in-up" aria-labelledby="navAkademik">
                            <a class="dropdown-item <?= ($mod=='sos_kurikulum')?'active':'' ?>" href="/FINAL/index.php?module=sos_kurikulum">Kurikulum</a>
                            <a class="dropdown-item <?= ($mod=='sos_jadwal')?'active':'' ?>" href="/FINAL/index.php?module=sos_jadwal">Jadwal Kuliah</a>
                            <a class="dropdown-item <?= ($mod=='sos_buku_akademik')?'active':'' ?>" href="/FINAL/index.php?module=sos_buku_akademik">Buku Akademik</a>
                            <a class="dropdown-item <?= ($mod=='sos_panduan_skripsi')?'active':'' ?>" href="/FINAL/index.php?module=sos_panduan_skripsi">Panduan Skripsi</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/FINAL/index.php?module=kalender">Kalender Kampus</a>
                        </div>
                    </li>



<li class="nav-item dropdown no-caret">
                        <a class="nav-link dropdown-toggle <?= in_array($mod, ['sos_penelitian_dosen', 'sos_riset_mahasiswa', 'sos_abdimas', 'sos_jurnal', 'sos_galeri']) ? 'active text-primary' : 'text-dark' ?>" id="navRiset" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Riset & Abdimas <i class="fas fa-chevron-down ms-1" style="font-size: 0.7em;"></i>
                        </a>
                        <div class="dropdown-menu border-0 shadow animated--fade-in-up" aria-labelledby="navRiset">
                            <a class="dropdown-item <?= ($mod=='sos_penelitian_dosen')?'active':'' ?>" href="/FINAL/index.php?module=sos_penelitian_dosen">Penelitian Dosen</a>
                            <a class="dropdown-item <?= ($mod=='sos_riset_mahasiswa')?'active':'' ?>" href="/FINAL/index.php?module=sos_riset_mahasiswa">Riset Mahasiswa</a>
                            <a class="dropdown-item <?= ($mod=='sos_abdimas')?'active':'' ?>" href="/FINAL/index.php?module=sos_abdimas">Abdimas Prodi</a>
                            <a class="dropdown-item <?= ($mod=='sos_jurnal')?'active':'' ?>" href="/FINAL/index.php?module=sos_jurnal">Jurnal Ilmiah</a>
                            <a class="dropdown-item <?= ($mod=='sos_galeri')?'active':'' ?>" href="/FINAL/index.php?module=sos_galeri">Galeri Kegiatan</a>
                        </div>
                    </li>

<li class="nav-item dropdown no-caret">
                        <a class="nav-link dropdown-toggle <?= in_array($mod, ['sos_hmps', 'sos_prestasi', 'sos_kegiatan', 'sos_tracer']) ? 'active text-primary' : 'text-dark' ?>" id="navKema" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Mahasiswa <i class="fas fa-chevron-down ms-1" style="font-size: 0.7em;"></i>
                        </a>
                        <div class="dropdown-menu border-0 shadow animated--fade-in-up" aria-labelledby="navKema">
                            <a class="dropdown-item <?= ($mod=='sos_hmps')?'active':'' ?>" href="/FINAL/index.php?module=sos_hmps">HMPS Pembangunan Sosial</a>
                            <a class="dropdown-item <?= ($mod=='sos_prestasi')?'active':'' ?>" href="/FINAL/index.php?module=sos_prestasi">Prestasi Mahasiswa</a>
                            <a class="dropdown-item <?= ($mod=='sos_kegiatan')?'active':'' ?>" href="/FINAL/index.php?module=sos_kegiatan">Kegiatan Mahasiswa</a>
                            <a class="dropdown-item <?= ($mod=='sos_tracer')?'active':'' ?>" href="/FINAL/index.php?module=sos_tracer">Tracer Study (Alumni)</a>
                        </div>
                    </li>

<li class="nav-item dropdown no-caret">
                        <a class="nav-link dropdown-toggle <?= in_array($mod, ['sos_mitra_pemdesa', 'sos_mitra_sosial', 'sos_mitra_mbkm', 'sos_mitra_riset']) ? 'active text-primary' : 'text-dark' ?>" id="navMitra" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Mitra <i class="fas fa-chevron-down ms-1" style="font-size: 0.7em;"></i>
                        </a>
                        <div class="dropdown-menu border-0 shadow animated--fade-in-up" aria-labelledby="navMitra">
                            <a class="dropdown-item <?= ($mod=='sos_mitra_pemdesa')?'active':'' ?>" href="/FINAL/index.php?module=sos_mitra_pemdesa">Pemerintah & Desa</a>
                            <a class="dropdown-item <?= ($mod=='sos_mitra_sosial')?'active':'' ?>" href="/FINAL/index.php?module=sos_mitra_sosial">Sosial & Lembaga</a>
                            <a class="dropdown-item <?= ($mod=='sos_mitra_mbkm')?'active':'' ?>" href="/FINAL/index.php?module=sos_mitra_mbkm">Program MBKM</a>
                            <a class="dropdown-item <?= ($mod=='sos_mitra_riset')?'active':'' ?>" href="/FINAL/index.php?module=sos_mitra_riset">Kerja Sama Penelitian</a>
                        </div>
                    </li>

<li class="nav-item dropdown no-caret">
                        <a class="nav-link dropdown-toggle <?= in_array($mod, ['sos_berita_artikel', 'sos_berita_seminar', 'sos_berita_pengumuman', 'sos_berita_agenda']) ? 'active text-primary' : 'text-dark' ?>" id="navBerita" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Berita <i class="fas fa-chevron-down ms-1" style="font-size: 0.7em;"></i>
                        </a>
                        <div class="dropdown-menu border-0 shadow animated--fade-in-up" aria-labelledby="navBerita">
                            <a class="dropdown-item <?= ($mod=='sos_berita_artikel')?'active':'' ?>" href="/FINAL/index.php?module=sos_berita_artikel">Artikel & Berita</a>
                            <a class="dropdown-item <?= ($mod=='sos_berita_seminar')?'active':'' ?>" href="/FINAL/index.php?module=sos_berita_seminar">Seminar</a>
                            <a class="dropdown-item <?= ($mod=='sos_berita_pengumuman')?'active':'' ?>" href="/FINAL/index.php?module=sos_berita_pengumuman">Pengumuman</a>
                            <a class="dropdown-item <?= ($mod=='sos_berita_agenda')?'active':'' ?>" href="/FINAL/index.php?module=sos_berita_agenda">Agenda Kegiatan</a>
                        </div>
                    </li>

<li class="nav-item dropdown no-caret">
                        <a class="nav-link dropdown-toggle <?= in_array($mod, ['sos_dok_skripsi', 'sos_dok_panduan', 'sos_dok_laporan', 'sos_dok_sop']) ? 'active text-primary' : 'text-dark' ?>" id="navDokumen" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Dokumen <i class="fas fa-chevron-down ms-1" style="font-size: 0.7em;"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end border-0 shadow animated--fade-in-up" aria-labelledby="navDokumen">
                            <a class="dropdown-item <?= ($mod=='sos_dok_skripsi')?'active':'' ?>" href="/FINAL/index.php?module=sos_dok_skripsi">Pedoman Skripsi</a>
                            <a class="dropdown-item <?= ($mod=='sos_dok_panduan')?'active':'' ?>" href="/FINAL/index.php?module=sos_dok_panduan">Buku Panduan</a>
                            <a class="dropdown-item <?= ($mod=='sos_dok_laporan')?'active':'' ?>" href="/FINAL/index.php?module=sos_dok_laporan">Laporan Tahunan</a>
                            <a class="dropdown-item <?= ($mod=='sos_dok_sop')?'active':'' ?>" href="/FINAL/index.php?module=sos_dok_sop">SOP Akademik</a>
                        </div>
                    </li>

    
                    
                </ul>
            </div>
        </div>
    </nav>

    <div id="layoutSidenav">
        <div id="layoutSidenav_content">