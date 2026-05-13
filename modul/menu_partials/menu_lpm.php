<a class="nav-link collapsed <?= ($mod == 'lpm') ? 'active' : '' ?>" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseLPM" aria-expanded="false" aria-controls="collapseLPM">
    <div class="nav-link-icon"><i data-feather="shield"></i></div>
    Unit LPM
    <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
</a>
<div class="collapse <?= ($mod == 'lpm') ? 'show' : '' ?>" id="collapseLPM" data-bs-parent="#accordionSidenav">
    <nav class="sidenav-menu-nested nav accordion" id="accordionLPM">

        <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#dokumenMutu" aria-expanded="false" aria-controls="dokumenMutu">
            Dokumen Mutu
            <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>
        <div class="collapse" id="dokumenMutu" data-bs-parent="#accordionLPM">
            <nav class="sidenav-menu-nested nav">
                <a class="nav-link" href="index.php?module=lpm&act=dokumen&kat=kebijakan_mutu">Kebijakan Mutu</a>
                <a class="nav-link" href="index.php?module=lpm&act=dokumen&kat=manual_mutu">Manual Mutu</a>
                <a class="nav-link" href="index.php?module=lpm&act=dokumen&kat=standar_mutu">Standar Mutu</a>
                <a class="nav-link" href="index.php?module=lpm&act=dokumen&kat=formulir_sop">Formulir & SOP</a>
            </nav>
        </div>

        <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#amiLPM" aria-expanded="false" aria-controls="amiLPM">
            AMI
            <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>
        <div class="collapse" id="amiLPM" data-bs-parent="#accordionLPM">
            <nav class="sidenav-menu-nested nav">
                <a class="nav-link" href="index.php?module=lpm&act=dokumen&kat=panduan_ami">Panduan AMI</a>
                <a class="nav-link" href="index.php?module=lpm&act=dokumen&kat=instrumen_ami">Instrumen AMI</a>
                <a class="nav-link" href="index.php?module=lpm&act=dokumen&kat=laporan_ami">Laporan Hasil AMI</a>
                <a class="nav-link" href="index.php?module=lpm&act=dokumen&kat=tindak_lanjut_ami">Tindak Lanjut AMI</a>
            </nav>
        </div>

        <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#mutuAkademik" aria-expanded="false" aria-controls="mutuAkademik">
            Mutu Akademik
            <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>
        <div class="collapse" id="mutuAkademik" data-bs-parent="#accordionLPM">
            <nav class="sidenav-menu-nested nav">
                <a class="nav-link" href="index.php?module=lpm&act=dokumen&kat=evaluasi_pembelajaran">Evaluasi Pembelajaran</a>
                <a class="nav-link" href="index.php?module=lpm&act=dokumen&kat=tracer_study">Laporan Tracer Study</a>
                <a class="nav-link" href="index.php?module=lpm&act=dokumen&kat=kepuasan_mahasiswa">Kepuasan Mahasiswa</a>
                <a class="nav-link" href="index.php?module=lpm&act=dokumen&kat=kepuasan_dosen">Kepuasan Dosen & Tendik</a>
            </nav>
        </div>

        <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#akreditasiLPM" aria-expanded="false" aria-controls="akreditasiLPM">
            Akreditasi
            <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>
        <div class="collapse" id="akreditasiLPM" data-bs-parent="#accordionLPM">
            <nav class="sidenav-menu-nested nav">
                <a class="nav-link" href="index.php?module=lpm&act=dokumen&kat=akreditasi_lembaga">Akreditasi Lembaga</a>
                <a class="nav-link" href="index.php?module=lpm&act=dokumen&kat=instrumen_banpt">Instrumen BAN-PT</a>
                <a class="nav-link" href="index.php?module=lpm&act=dokumen&kat=evaluasi_diri">Borang / Evaluasi Diri</a>
                <a class="nav-link" href="index.php?module=lpm&act=dokumen&kat=laporan_akreditasi">Laporan Akreditasi</a>
            </nav>
        </div>

    </nav>
</div>