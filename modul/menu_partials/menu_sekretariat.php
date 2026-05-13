<a class="nav-link collapsed <?= ($mod == 'sekretariat') ? 'active' : '' ?>" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseSekretariat" aria-expanded="false" aria-controls="collapseSekretariat">
    <div class="nav-link-icon"><i data-feather="briefcase"></i></div>
    Sekretariat
    <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
</a>

<div class="collapse <?= ($mod == 'sekretariat') ? 'show' : '' ?>" id="collapseSekretariat" data-bs-parent="#accordionSidenav">
    <nav class="sidenav-menu-nested nav accordion" id="accordionSekretariat">
        
        <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#profilSekretariat" aria-expanded="false" aria-controls="profilSekretariat">
            Profil Sekretariat
            <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>
        <div class="collapse" id="profilSekretariat" data-bs-parent="#accordionSekretariat">
            <nav class="sidenav-menu-nested nav">
                <a class="nav-link" href="index.php?module=sekretariat&act=profil&kat=profil_tugas">Profil & Tugas Pokok</a>
                <a class="nav-link" href="index.php?module=sekretariat&act=profil&kat=struktur">Struktur Organisasi</a>
                <a class="nav-link" href="index.php?module=sekretariat&act=profil&kat=layanan">Layanan & Fungsi</a>
            </nav>
        </div>

        <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#administrasi" aria-expanded="false" aria-controls="administrasi">
            Administrasi
            <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>
        <div class="collapse" id="administrasi" data-bs-parent="#accordionSekretariat">
            <nav class="sidenav-menu-nested nav">
                <a class="nav-link" href="index.php?module=sekretariat&act=arsip&kat=surat_menyurat">Surat Menyurat</a>
                <a class="nav-link" href="index.php?module=sekretariat&act=arsip&kat=dok_akademik">Dokumen Akademik</a>
                <a class="nav-link" href="index.php?module=sekretariat&act=arsip&kat=buku_induk">Buku Induk Mahasiswa</a>
                <a class="nav-link" href="index.php?module=sekretariat&act=arsip&kat=kalender_akademik">Kalender Akademik</a>
            </nav>
        </div>

        <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#keuanganBarang" aria-expanded="false" aria-controls="keuanganBarang">
            Keuangan & Barang Milik
            <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>
        <div class="collapse" id="keuanganBarang" data-bs-parent="#accordionSekretariat">
            <nav class="sidenav-menu-nested nav">
                <a class="nav-link" href="index.php?module=sekretariat&act=arsip&kat=anggaran">Rencana & Realisasi Anggaran</a>
                <a class="nav-link" href="index.php?module=sekretariat&act=arsip&kat=aset_barang">Inventaris & Aset Barang</a>
                <a class="nav-link" href="index.php?module=sekretariat&act=arsip&kat=pengadaan">Pengadaan Barang & Jasa</a>
            </nav>
        </div>

        <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#arsipDokumen" aria-expanded="false" aria-controls="arsipDokumen">
            Arsip & Dokumen
            <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>
        <div class="collapse" id="arsipDokumen" data-bs-parent="#accordionSekretariat">
            <nav class="sidenav-menu-nested nav">
                <a class="nav-link" href="index.php?module=sekretariat&act=arsip&kat=dokumen_kebijakan">Dokumen Kebijakan</a>
                <a class="nav-link" href="index.php?module=sekretariat&act=arsip&kat=sop_panduan">SOP & Panduan Kerja</a>
                <a class="nav-link" href="index.php?module=sekretariat&act=arsip&kat=laporan_sekretariat">Laporan Tahunan</a>
            </nav>
        </div>
        
        <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#pengumumanSekretariat" aria-expanded="false" aria-controls="pengumumanSekretariat">
            Pengumuman & Agenda
            <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>
        <div class="collapse" id="pengumumanSekretariat" data-bs-parent="#accordionSekretariat">
            <nav class="sidenav-menu-nested nav">
                <a class="nav-link" href="index.php?module=sekretariat&act=arsip&kat=pengumuman">Pengumuman Sekretariat</a>
                <a class="nav-link" href="index.php?module=sekretariat&act=arsip&kat=agenda_kegiatan">Agenda & Jadwal</a>
                <a class="nav-link" href="index.php?module=sekretariat&act=arsip&kat=galeri_sekretariat">Galeri Kegiatan</a>
            </nav>
        </div>

    </nav>
</div>