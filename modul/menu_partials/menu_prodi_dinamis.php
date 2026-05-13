<a class="nav-link collapsed <?= ($mod == $link_prodi) ? 'active' : '' ?>" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#<?= $collapse_id ?>" aria-expanded="<?= ($mod == $link_prodi) ? 'true' : 'false' ?>" aria-controls="<?= $collapse_id ?>">
    <div class="nav-link-icon"><i class="fas fa-globe"></i></div>
    Prodi <?= $nama_prodi ?>
    <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
</a>
<div class="collapse <?= ($mod == $link_prodi) ? 'show' : '' ?>" id="<?= $collapse_id ?>" data-bs-parent="#accordionSidenav">
    <nav class="sidenav-menu-nested nav accordion" id="accordion<?= $collapse_id ?>">
        
        <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#profil_<?= $collapse_id ?>" aria-expanded="false" aria-controls="profil_<?= $collapse_id ?>">
            Profil Prodi
            <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>
        <div class="collapse" id="profil_<?= $collapse_id ?>" data-bs-parent="#accordion<?= $collapse_id ?>">
            <nav class="sidenav-menu-nested nav">
                <a class="nav-link" href="index.php?module=<?= $link_prodi ?>&act=visi_misi">Visi & Misi Prodi</a>
                <a class="nav-link" href="index.php?module=<?= $link_prodi ?>&act=tujuan_cpl">Tujuan & CPL</a>
                <a class="nav-link" href="index.php?module=<?= $link_prodi ?>&act=struktur">Struktur Organisasi</a>
                <a class="nav-link" href="index.php?module=<?= $link_prodi ?>&act=profil_dosen_desc">Profil Dosen</a>
                <a class="nav-link" href="index.php?module=<?= $link_prodi ?>&act=akreditasi">Akreditasi Prodi</a>
                <a class="nav-link" href="index.php?module=<?= $link_prodi ?>&act=sejarah">Sejarah Prodi</a>
            </nav>
        </div>

        <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#akademik_<?= $collapse_id ?>" aria-expanded="false" aria-controls="akademik_<?= $collapse_id ?>">
            Akademik
            <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>
        <div class="collapse" id="akademik_<?= $collapse_id ?>" data-bs-parent="#accordion<?= $collapse_id ?>">
            <nav class="sidenav-menu-nested nav">
                <a class="nav-link" href="index.php?module=<?= $link_prodi ?>&act=kurikulum">Kurikulum</a>
                <a class="nav-link" href="index.php?module=<?= $link_prodi ?>&act=jadwal_kuliah">Jadwal Kuliah</a>
                <a class="nav-link" href="index.php?module=<?= $link_prodi ?>&act=buku_akademik">Buku Akademik</a>
                <a class="nav-link" href="index.php?module=<?= $link_prodi ?>&act=panduan_skripsi">Panduan Skripsi</a>
                <a class="nav-link" href="index.php?module=<?= $link_prodi ?>&act=kalender">Kalender</a>
            </nav>
        </div>

        <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#riset_<?= $collapse_id ?>" aria-expanded="false" aria-controls="riset_<?= $collapse_id ?>">
            Pengabdian & Riset
            <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>
        <div class="collapse" id="riset_<?= $collapse_id ?>" data-bs-parent="#accordion<?= $collapse_id ?>">
            <nav class="sidenav-menu-nested nav">
                <a class="nav-link" href="index.php?module=<?= $link_prodi ?>&act=penelitian_dosen">Penelitian Dosen</a>
                <a class="nav-link" href="index.php?module=<?= $link_prodi ?>&act=riset_mahasiswa">Riset Mahasiswa</a>
                <a class="nav-link" href="index.php?module=<?= $link_prodi ?>&act=abdimas">Abdimas Prodi</a>
                <a class="nav-link" href="index.php?module=<?= $link_prodi ?>&act=jurnal">Jurnal Ilmiah</a>
                <a class="nav-link" href="index.php?module=<?= $link_prodi ?>&act=galeri">Galeri Kegiatan</a>
            </nav>
        </div>
        
        <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#kema_<?= $collapse_id ?>" aria-expanded="false" aria-controls="kema_<?= $collapse_id ?>">
            Kemahasiswaan
            <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>
        <div class="collapse" id="kema_<?= $collapse_id ?>" data-bs-parent="#accordion<?= $collapse_id ?>">
            <nav class="sidenav-menu-nested nav">
                <a class="nav-link" href="index.php?module=<?= $link_prodi ?>&act=hmps">HMPS</a>
                <a class="nav-link" href="index.php?module=<?= $link_prodi ?>&act=prestasi">Prestasi</a>
                <a class="nav-link" href="index.php?module=<?= $link_prodi ?>&act=kegiatan_mahasiswa">Kegiatan</a>
                <a class="nav-link" href="index.php?module=<?= $link_prodi ?>&act=tracer_study">Tracer Study</a>
            </nav>
        </div>

        <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#mitra_<?= $collapse_id ?>" aria-expanded="false" aria-controls="mitra_<?= $collapse_id ?>">
            Kerja Sama & Mitra
            <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>
        <div class="collapse" id="mitra_<?= $collapse_id ?>" data-bs-parent="#accordion<?= $collapse_id ?>">
            <nav class="sidenav-menu-nested nav">
                <a class="nav-link" href="index.php?module=<?= $link_prodi ?>&act=mitra_pemerintah">Pemerintah & Desa</a>
                <a class="nav-link" href="index.php?module=<?= $link_prodi ?>&act=mitra_sosial">Sosial & Lembaga</a>
                <a class="nav-link" href="index.php?module=<?= $link_prodi ?>&act=mitra_mbkm">Program MBKM</a>
                <a class="nav-link" href="index.php?module=<?= $link_prodi ?>&act=mitra_penelitian">Kerja Sama Penelitian</a>
            </nav>
        </div>

        <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#berita_<?= $collapse_id ?>" aria-expanded="false" aria-controls="berita_<?= $collapse_id ?>">
            Berita & Agenda
            <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>
        <div class="collapse" id="berita_<?= $collapse_id ?>" data-bs-parent="#accordion<?= $collapse_id ?>">
            <nav class="sidenav-menu-nested nav">
                <a class="nav-link" href="index.php?module=<?= $link_prodi ?>&act=berita">Artikel & Berita</a>
                <a class="nav-link" href="index.php?module=<?= $link_prodi ?>&act=seminar">Seminar</a>
                <a class="nav-link" href="index.php?module=<?= $link_prodi ?>&act=pengumuman">Pengumuman</a>
                <a class="nav-link" href="index.php?module=<?= $link_prodi ?>&act=agenda">Agenda Kegiatan</a>
            </nav>
        </div>

        <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#dokumen_<?= $collapse_id ?>" aria-expanded="false" aria-controls="dokumen_<?= $collapse_id ?>">
            Dokumen
            <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>
        <div class="collapse" id="dokumen_<?= $collapse_id ?>" data-bs-parent="#accordion<?= $collapse_id ?>">
            <nav class="sidenav-menu-nested nav">
                <a class="nav-link" href="index.php?module=<?= $link_prodi ?>&act=dok_pedoman">Pedoman Skripsi</a>
                <a class="nav-link" href="index.php?module=<?= $link_prodi ?>&act=dok_panduan">Buku Panduan</a>
                <a class="nav-link" href="index.php?module=<?= $link_prodi ?>&act=dok_laporan">Laporan Tahunan</a>
                <a class="nav-link" href="index.php?module=<?= $link_prodi ?>&act=dok_sop">SOP Akademik</a>
            </nav>
        </div>
    </nav>
</div>



