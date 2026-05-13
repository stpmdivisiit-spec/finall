<a class="nav-link collapsed <?= ($mod == 'kemahasiswaan') ? 'active' : '' ?>" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseKemahasiswaan" aria-expanded="false" aria-controls="collapseKemahasiswaan">
    <div class="nav-link-icon"><i data-feather="users"></i></div>
    Kemahasiswaan
    <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
</a>

<div class="collapse <?= ($mod == 'kemahasiswaan') ? 'show' : '' ?>" id="collapseKemahasiswaan" data-bs-parent="#accordionSidenav">
    <nav class="sidenav-menu-nested nav accordion" id="accordionKemahasiswaan">
        
<a class="nav-link" href="index.php?module=kemahasiswaan&act=profil">Profil Kemahasiswaan</a>

        <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseLayanan" aria-expanded="false" aria-controls="collapseLayanan">
            Layanan
            <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>
        <div class="collapse" id="collapseLayanan" data-bs-parent="#accordionKemahasiswaan">
            <nav class="sidenav-menu-nested nav">
                <a class="nav-link" href="index.php?module=kemahasiswaan&act=data_kema&kat=beasiswa">Info Beasiswa</a>
                <a class="nav-link" href="index.php?module=kemahasiswaan&act=data_kema&kat=bk">Bimbingan Konseling</a>
                <a class="nav-link" href="index.php?module=kemahasiswaan&act=data_kema&kat=kesehatan">Layanan Kesehatan</a>
                <a class="nav-link" href="index.php?module=kemahasiswaan&act=data_kema&kat=karir">Karir & Magang</a>
                
                <a class="nav-link" href="index.php?module=kemahasiswaan&act=pengaduan">Pengaduan</a>
            </nav>
        </div>

        <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseOrmawa" aria-expanded="false" aria-controls="collapseOrmawa">
            ORMAWA
            <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>
        <div class="collapse" id="collapseOrmawa" data-bs-parent="#accordionKemahasiswaan">
            <nav class="sidenav-menu-nested nav">
                <a class="nav-link" href="index.php?module=kemahasiswaan&act=data_kema&kat=bem">BEM & BLM</a>
                <a class="nav-link" href="index.php?module=kemahasiswaan&act=data_kema&kat=hmp">Himpunan Mahasiswa</a>
                <a class="nav-link" href="index.php?module=kemahasiswaan&act=data_kema&kat=ukm">UKM</a>
                <a class="nav-link" href="index.php?module=kemahasiswaan&act=data_kema&kat=lkmm">LKMM</a>
                <a class="nav-link" href="index.php?module=kemahasiswaan&act=data_kema&kat=agenda_ormawa">Agenda Kegiatan</a>
            </nav>
        </div>

        <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapsePrestasi" aria-expanded="false" aria-controls="collapsePrestasi">
            Prestasi
            <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>
        <div class="collapse" id="collapsePrestasi" data-bs-parent="#accordionKemahasiswaan">
            <nav class="sidenav-menu-nested nav">
                <a class="nav-link" href="index.php?module=kemahasiswaan&act=data_kema&kat=prestasi_akademik">Akademik</a>
                <a class="nav-link" href="index.php?module=kemahasiswaan&act=data_kema&kat=prestasi_nonakademik">Non-Akademik</a>
                <a class="nav-link" href="index.php?module=kemahasiswaan&act=data_kema&kat=penghargaan">Penghargaan</a>
            </nav>
        </div>

        <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseTracer" aria-expanded="false" aria-controls="collapseTracer">
            Tracer Study
            <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>
        <div class="collapse" id="collapseTracer" data-bs-parent="#accordionKemahasiswaan">
            <nav class="sidenav-menu-nested nav">
                <a class="nav-link" href="index.php?module=kemahasiswaan&act=data_kema&kat=profil_alumni">Profil Alumni</a>
                <a class="nav-link" href="index.php?module=kemahasiswaan&act=data_kema&kat=testimoni">Testimoni Alumni</a>
                <a class="nav-link" href="index.php?module=kemahasiswaan&act=data_kema&kat=tracer_study">Tracer Study</a>
                <a class="nav-link" href="index.php?module=kemahasiswaan&act=data_kema&kat=forum_alumni">Forum Alumni</a>
            </nav>
        </div>

        <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseWirausaha" aria-expanded="false" aria-controls="collapseWirausaha">
            Kewirausahaan
            <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>
        <div class="collapse" id="collapseWirausaha" data-bs-parent="#accordionKemahasiswaan">
            <nav class="sidenav-menu-nested nav">
                <a class="nav-link" href="index.php?module=kemahasiswaan&act=data_kema&kat=wirausaha_program">Program</a>
                <a class="nav-link" href="index.php?module=kemahasiswaan&act=data_kema&kat=wirausaha_produk">Produk Inovasi</a>
                <a class="nav-link" href="index.php?module=kemahasiswaan&act=data_kema&kat=inkubator">Bisnis Kampus</a>
            </nav>
        </div>

        <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapsePelatihan" aria-expanded="false" aria-controls="collapsePelatihan">
            Pelatihan Karir
            <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>
        <div class="collapse" id="collapsePelatihan" data-bs-parent="#accordionKemahasiswaan">
            <nav class="sidenav-menu-nested nav">
                <a class="nav-link" href="index.php?module=kemahasiswaan&act=data_kema&kat=pelatihan_serviam">Pelatihan</a>
                <a class="nav-link" href="index.php?module=kemahasiswaan&act=data_kema&kat=pelatihan_karakter">Layanan Karier</a>
                <a class="nav-link" href="index.php?module=kemahasiswaan&act=data_kema&kat=literasi_digital">Pelatihan Literasi Digital</a>
            </nav>
        </div>

        <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapsePengabdian" aria-expanded="false" aria-controls="collapsePengabdian">
            Pengabdian & Sosial
            <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>
        <div class="collapse" id="collapsePengabdian" data-bs-parent="#accordionKemahasiswaan">
            <nav class="sidenav-menu-nested nav">
                <a class="nav-link" href="index.php?module=kemahasiswaan&act=data_kema&kat=kkn">Kuliah Kerja Nyata (KKN)</a>
                <a class="nav-link" href="index.php?module=kemahasiswaan&act=data_kema&kat=bakti_sosial">Bakti Sosial</a>
                <a class="nav-link" href="index.php?module=kemahasiswaan&act=data_kema&kat=kerja_bakti">Kerja Bakti Desa</a>
                <a class="nav-link" href="index.php?module=kemahasiswaan&act=data_kema&kat=relawan">Relawan Mahasiswa</a>
            </nav>
        </div>

        <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseDokumen" aria-expanded="false" aria-controls="collapseDokumen">
            Dokumen
            <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>
        <div class="collapse" id="collapseDokumen" data-bs-parent="#accordionKemahasiswaan">
            <nav class="sidenav-menu-nested nav">
                <a class="nav-link" href="index.php?module=kemahasiswaan&act=data_kema&kat=dok_pedoman">Buku Pedoman</a>
                <a class="nav-link" href="index.php?module=kemahasiswaan&act=data_kema&kat=dok_ormawa">Panduan ORMAWA</a>
                <a class="nav-link" href="index.php?module=kemahasiswaan&act=data_kema&kat=dok_laporan">Laporan Tahunan</a>
                <a class="nav-link" href="index.php?module=kemahasiswaan&act=data_kema&kat=dok_sop">SOP Layanan</a>
            </nav>
        </div>
    </nav>
</div>