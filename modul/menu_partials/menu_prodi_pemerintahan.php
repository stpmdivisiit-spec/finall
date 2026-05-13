<?php
// Deteksi prodi berdasarkan session user yang sedang login
$roles_user = $_SESSION['roles'] ?? [];
if (in_array('dosen_sosiatri', $roles_user) || in_array('staf_prodi_sosiatri', $roles_user)) {
    $nama_prodi = "Pembangunan Sosial";
    $link_prodi = "prodi_sosiatri";
} else {
    $nama_prodi = "Ilmu Pemerintahan";
    $link_prodi = "prodi_pemerintahan";
}
?>

<a class="nav-link" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseProdi" aria-expanded="false" aria-controls="collapseProdi">
    <div class="nav-link-icon"><i data-feather="globe"></i></div>
    Prodi <?= $nama_prodi ?>
    <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
</a>
<div class="collapse show" id="collapseProdi" data-bs-parent="#accordionSidenav">
    <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavProdi">
        
        <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#prodiCollapseProfil" aria-expanded="false" aria-controls="prodiCollapseProfil">
            Profil Prodi
            <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>
        <div class="collapse" id="prodiCollapseProfil" data-bs-parent="#accordionSidenavProdi">
            <nav class="sidenav-menu-nested nav">
                <a class="nav-link" href="index.php?module=<?= $link_prodi ?>&act=visi_misi">Visi & Misi Prodi</a>
                <a class="nav-link" href="index.php?module=<?= $link_prodi ?>&act=tujuan_cpl">Tujuan & CPL</a>
                <a class="nav-link" href="index.php?module=<?= $link_prodi ?>&act=struktur">Struktur Organisasi</a>
                <a class="nav-link" href="index.php?module=<?= $link_prodi ?>&act=profil_dosen_desc">Profil Dosen</a>
                <a class="nav-link" href="index.php?module=<?= $link_prodi ?>&act=akreditasi">Akreditasi Prodi</a>
                <a class="nav-link" href="index.php?module=<?= $link_prodi ?>&act=sejarah">Sejarah Prodi</a>
            </nav>
        </div>

        <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#prodiCollapseAkademik" aria-expanded="false" aria-controls="prodiCollapseAkademik">
            Akademik
            <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>
        <div class="collapse" id="prodiCollapseAkademik" data-bs-parent="#accordionSidenavProdi">
            <nav class="sidenav-menu-nested nav">
                <a class="nav-link" href="index.php?module=<?= $link_prodi ?>&act=kurikulum">Kurikulum</a>
                <a class="nav-link" href="index.php?module=<?= $link_prodi ?>&act=jadwal_kuliah">Jadwal Kuliah</a>
                <a class="nav-link" href="index.php?module=<?= $link_prodi ?>&act=buku_akademik">Buku Akademik</a>
                <a class="nav-link" href="index.php?module=<?= $link_prodi ?>&act=panduan_skripsi">Panduan Skripsi</a>
                <a class="nav-link" href="index.php?module=<?= $link_prodi ?>&act=kalender">Kalender</a>
            </nav>
        </div>

        <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#prodiCollapseRiset" aria-expanded="false" aria-controls="prodiCollapseRiset">
            Pengabdian & Riset
            <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>
        <div class="collapse" id="prodiCollapseRiset" data-bs-parent="#accordionSidenavProdi">
            <nav class="sidenav-menu-nested nav">
                <a class="nav-link" href="index.php?module=<?= $link_prodi ?>&act=penelitian_dosen">Penelitian Dosen</a>
                <a class="nav-link" href="index.php?module=<?= $link_prodi ?>&act=riset_mahasiswa">Riset Mahasiswa</a>
                <a class="nav-link" href="index.php?module=<?= $link_prodi ?>&act=abdimas">Abdimas Prodi</a>
                <a class="nav-link" href="index.php?module=<?= $link_prodi ?>&act=jurnal">Jurnal Ilmiah</a>
                <a class="nav-link" href="index.php?module=<?= $link_prodi ?>&act=galeri">Galeri Kegiatan</a>
            </nav>
        </div>
        
        <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#prodiCollapseMahasiswa" aria-expanded="false" aria-controls="prodiCollapseMahasiswa">
            Kemahasiswaan
            <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>
        <div class="collapse" id="prodiCollapseMahasiswa" data-bs-parent="#accordionSidenavProdi">
            <nav class="sidenav-menu-nested nav">
                <a class="nav-link" href="index.php?module=<?= $link_prodi ?>&act=hmps">HMPS</a>
                <a class="nav-link" href="index.php?module=<?= $link_prodi ?>&act=prestasi">Prestasi</a>
                <a class="nav-link" href="index.php?module=<?= $link_prodi ?>&act=kegiatan_mahasiswa">Kegiatan</a>
                <a class="nav-link" href="index.php?module=<?= $link_prodi ?>&act=tracer_study">Tracer Study (Loker)</a>
            </nav>
        </div>

        <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#prodiCollapseKerjasama" aria-expanded="false" aria-controls="prodiCollapseKerjasama">
            Kerja Sama & Mitra
            <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>
        <div class="collapse" id="prodiCollapseKerjasama" data-bs-parent="#accordionSidenavProdi">
            <nav class="sidenav-menu-nested nav">
                <a class="nav-link" href="index.php?module=<?= $link_prodi ?>&act=mitra_pemerintah">Pemerintah & Desa</a>
                <a class="nav-link" href="index.php?module=<?= $link_prodi ?>&act=mitra_sosial">Sosial & Lembaga</a>
                <a class="nav-link" href="index.php?module=<?= $link_prodi ?>&act=mitra_mbkm">Program MBKM</a>
                <a class="nav-link" href="index.php?module=<?= $link_prodi ?>&act=mitra_penelitian">Kerja Sama Penelitian</a>
            </nav>
        </div>

        <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#prodiCollapseBerita" aria-expanded="false" aria-controls="prodiCollapseBerita">
            Berita & Agenda
            <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>
        <div class="collapse" id="prodiCollapseBerita" data-bs-parent="#accordionSidenavProdi">
            <nav class="sidenav-menu-nested nav">
                <a class="nav-link" href="index.php?module=<?= $link_prodi ?>&act=berita">Artikel & Berita</a>
                <a class="nav-link" href="index.php?module=<?= $link_prodi ?>&act=seminar">Seminar</a>
                <a class="nav-link" href="index.php?module=<?= $link_prodi ?>&act=pengumuman">Pengumuman</a>
                <a class="nav-link" href="index.php?module=<?= $link_prodi ?>&act=agenda">Agenda Kegiatan</a>
            </nav>
        </div>

        <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#prodiCollapseDokumen" aria-expanded="false" aria-controls="prodiCollapseDokumen">
            Dokumen
            <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>
        <div class="collapse" id="prodiCollapseDokumen" data-bs-parent="#accordionSidenavProdi">
            <nav class="sidenav-menu-nested nav">
                <a class="nav-link" href="index.php?module=<?= $link_prodi ?>&act=dok_pedoman">Pedoman Skripsi</a>
                <a class="nav-link" href="index.php?module=<?= $link_prodi ?>&act=dok_panduan">Buku Panduan</a>
                <a class="nav-link" href="index.php?module=<?= $link_prodi ?>&act=dok_laporan">Laporan Tahunan</a>
                <a class="nav-link" href="index.php?module=<?= $link_prodi ?>&act=dok_sop">SOP Akademik</a>
            </nav>
        </div>

        <a class="nav-link" href="index.php?module=<?= $link_prodi ?>&act=kontak">Kontak & Layanan</a>
    </nav>
</div>