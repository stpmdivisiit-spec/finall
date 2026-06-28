<a class="nav-link collapsed <?= ($mod == 'sekretariat') ? 'active' : '' ?>" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseSekretariat" aria-expanded="false" aria-controls="collapseSekretariat">
    <div class="nav-link-icon"><i data-feather="briefcase"></i></div>
    Sekretariat
    <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
</a>

<div class="collapse <?= ($mod == 'sekretariat') ? 'show' : '' ?>" id="collapseSekretariat" data-bs-parent="#accordionSidenav">
    <nav class="sidenav-menu-nested nav accordion" id="accordionSekretariat">
        
        <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#profilSekretariat">
            Profil & Maklumat
            <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>
        <div class="collapse" id="profilSekretariat" data-bs-parent="#accordionSekretariat">
            <nav class="sidenav-menu-nested nav">
                <a class="nav-link" href="index.php?module=sekretariat&act=profil&kat=profil_tugas">Profil & Tugas Pokok</a>
                <a class="nav-link" href="index.php?module=sekretariat&act=profil&kat=struktur">Struktur Organisasi</a>
                <a class="nav-link" href="index.php?module=sekretariat&act=profil&kat=layanan">Layanan & Maklumat</a>
            </nav>
        </div>

        <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#layananSekretariat">
            Manajemen Layanan
            <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>
        <div class="collapse" id="layananSekretariat" data-bs-parent="#accordionSekretariat">
            <nav class="sidenav-menu-nested nav">
                <a class="nav-link" href="index.php?module=sekretariat&act=layanan&kat=surat_menyurat">Permohonan Surat</a>
                <a class="nav-link" href="index.php?module=sekretariat&act=layanan&kat=legalisir">Legalisir & Dok. Akademik</a>
                <a class="nav-link" href="index.php?module=sekretariat&act=layanan&kat=fasilitas">Peminjaman & Aset Inventaris</a>
            </nav>
        </div>

        <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#infoSekretariat">
            Informasi & Agenda
            <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>
        <div class="collapse" id="infoSekretariat" data-bs-parent="#accordionSekretariat">
            <nav class="sidenav-menu-nested nav">
                <a class="nav-link" href="index.php?module=sekretariat&act=informasi&kat=pengumuman">Pengumuman Kampus</a>
                <a class="nav-link" href="index.php?module=sekretariat&act=informasi&kat=agenda_pimpinan">Agenda Pimpinan</a>
                <a class="nav-link" href="index.php?module=sekretariat&act=informasi&kat=kalender_akademik">Kalender Kegiatan</a>
                <a class="nav-link" href="index.php?module=sekretariat&act=informasi&kat=berita_sekretariat">Berita Sekretariat</a>
            </nav>
        </div>

        <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#regulasiSekretariat">
            Dokumen & Regulasi
            <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>
        <div class="collapse" id="regulasiSekretariat" data-bs-parent="#accordionSekretariat">
            <nav class="sidenav-menu-nested nav">
                <a class="nav-link" href="index.php?module=sekretariat&act=regulasi&kat=sk_ketua">SK Ketua STPM</a>
                <a class="nav-link" href="index.php?module=sekretariat&act=regulasi&kat=peraturan_akademik">Peraturan Akademik</a>
                <a class="nav-link" href="index.php?module=sekretariat&act=regulasi&kat=pedoman_umum">Pedoman Umum & SOP</a>
                <a class="nav-link" href="index.php?module=sekretariat&act=regulasi&kat=formulir">Formulir Administrasi</a>
            </nav>
        </div>

        <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#internalSekretariat">
            Keuangan & Internal
            <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>
        <div class="collapse" id="internalSekretariat" data-bs-parent="#accordionSekretariat">
            <nav class="sidenav-menu-nested nav">
                <a class="nav-link" href="index.php?module=sekretariat&act=internal&kat=buku_induk">Buku Induk Mahasiswa</a>
                <a class="nav-link" href="index.php?module=sekretariat&act=internal&kat=anggaran">Laporan Anggaran</a>
                <a class="nav-link" href="index.php?module=sekretariat&act=internal&kat=pengadaan">Pengadaan Barang/Jasa</a>
            </nav>
        </div>

    </nav>
</div>