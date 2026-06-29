<?php
// Deteksi kategori yang sedang aktif dari URL (jika ada)
$kat_aktif = $_GET['kat'] ?? '';

// Array pembantu untuk mendeteksi apakah salah satu submenu dalam sebuah grup sedang aktif
$is_dokumen_mutu = in_array($kat_aktif, ['kebijakan_mutu', 'manual_mutu', 'standar_mutu', 'formulir_sop']);
$is_ami = in_array($kat_aktif, ['panduan_ami', 'instrumen_ami', 'laporan_ami', 'tindak_lanjut_ami']);
$is_mutu_akademik = in_array($kat_aktif, ['evaluasi_pembelajaran', 'tracer_study', 'kepuasan_mahasiswa', 'kepuasan_dosen']);
$is_akreditasi = in_array($kat_aktif, ['akreditasi_lembaga', 'instrumen_banpt', 'evaluasi_diri', 'laporan_akreditasi']);

// Deteksi apakah user sedang berada di halaman Dasbor LPM utama
$is_dashboard_lpm = ($mod == 'lpm' && (!isset($_GET['act']) || $_GET['act'] == 'dashboard'));
?>

<a class="nav-link collapsed <?= ($mod == 'lpm') ? 'active' : '' ?>" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseLPM" aria-expanded="<?= ($mod == 'lpm') ? 'true' : 'false' ?>" aria-controls="collapseLPM">
    <div class="nav-link-icon"><i data-feather="shield"></i></div>
    Unit LPM
    <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
</a>
<div class="collapse <?= ($mod == 'lpm') ? 'show' : '' ?>" id="collapseLPM" data-bs-parent="#accordionSidenav">
    <nav class="sidenav-menu-nested nav accordion" id="accordionLPM">

        <a class="nav-link <?= $is_dashboard_lpm ? 'active text-primary fw-bold' : '' ?>" href="index.php?module=lpm&act=dashboard">
            Dasbor Utama
        </a>

        <a class="nav-link <?= $is_dokumen_mutu ? '' : 'collapsed' ?> <?= $is_dokumen_mutu ? 'active text-dark fw-bold' : '' ?>" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#dokumenMutu" aria-expanded="<?= $is_dokumen_mutu ? 'true' : 'false' ?>" aria-controls="dokumenMutu">
            Dokumen Mutu
            <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>
        <div class="collapse <?= $is_dokumen_mutu ? 'show' : '' ?>" id="dokumenMutu" data-bs-parent="#accordionLPM">
            <nav class="sidenav-menu-nested nav">
                <a class="nav-link <?= ($kat_aktif == 'kebijakan_mutu') ? 'active text-primary' : '' ?>" href="index.php?module=lpm&act=dokumen&kat=kebijakan_mutu">Kebijakan Mutu</a>
                <a class="nav-link <?= ($kat_aktif == 'manual_mutu') ? 'active text-primary' : '' ?>" href="index.php?module=lpm&act=dokumen&kat=manual_mutu">Manual Mutu</a>
                <a class="nav-link <?= ($kat_aktif == 'standar_mutu') ? 'active text-primary' : '' ?>" href="index.php?module=lpm&act=dokumen&kat=standar_mutu">Standar Mutu</a>
                <a class="nav-link <?= ($kat_aktif == 'formulir_sop') ? 'active text-primary' : '' ?>" href="index.php?module=lpm&act=dokumen&kat=formulir_sop">Formulir & SOP</a>
            </nav>
        </div>

        <a class="nav-link <?= $is_ami ? '' : 'collapsed' ?> <?= $is_ami ? 'active text-dark fw-bold' : '' ?>" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#amiLPM" aria-expanded="<?= $is_ami ? 'true' : 'false' ?>" aria-controls="amiLPM">
            Audit Mutu (AMI)
            <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>
        <div class="collapse <?= $is_ami ? 'show' : '' ?>" id="amiLPM" data-bs-parent="#accordionLPM">
            <nav class="sidenav-menu-nested nav">
                <a class="nav-link <?= ($kat_aktif == 'panduan_ami') ? 'active text-primary' : '' ?>" href="index.php?module=lpm&act=dokumen&kat=panduan_ami">Panduan AMI</a>
                <a class="nav-link <?= ($kat_aktif == 'instrumen_ami') ? 'active text-primary' : '' ?>" href="index.php?module=lpm&act=dokumen&kat=instrumen_ami">Instrumen AMI</a>
                <a class="nav-link <?= ($kat_aktif == 'laporan_ami') ? 'active text-primary' : '' ?>" href="index.php?module=lpm&act=dokumen&kat=laporan_ami">Laporan Hasil AMI</a>
                <a class="nav-link <?= ($kat_aktif == 'tindak_lanjut_ami') ? 'active text-primary' : '' ?>" href="index.php?module=lpm&act=dokumen&kat=tindak_lanjut_ami">Tindak Lanjut AMI</a>
            </nav>
        </div>

        <a class="nav-link <?= $is_mutu_akademik ? '' : 'collapsed' ?> <?= $is_mutu_akademik ? 'active text-dark fw-bold' : '' ?>" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#mutuAkademik" aria-expanded="<?= $is_mutu_akademik ? 'true' : 'false' ?>" aria-controls="mutuAkademik">
            Mutu Akademik
            <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>
        <div class="collapse <?= $is_mutu_akademik ? 'show' : '' ?>" id="mutuAkademik" data-bs-parent="#accordionLPM">
            <nav class="sidenav-menu-nested nav">
                <a class="nav-link <?= ($kat_aktif == 'evaluasi_pembelajaran') ? 'active text-primary' : '' ?>" href="index.php?module=lpm&act=dokumen&kat=evaluasi_pembelajaran">Evaluasi Pembelajaran</a>
                <a class="nav-link <?= ($kat_aktif == 'tracer_study') ? 'active text-primary' : '' ?>" href="index.php?module=lpm&act=dokumen&kat=tracer_study">Laporan Tracer Study</a>
                <a class="nav-link <?= ($kat_aktif == 'kepuasan_mahasiswa') ? 'active text-primary' : '' ?>" href="index.php?module=lpm&act=dokumen&kat=kepuasan_mahasiswa">Kepuasan Mahasiswa</a>
                <a class="nav-link <?= ($kat_aktif == 'kepuasan_dosen') ? 'active text-primary' : '' ?>" href="index.php?module=lpm&act=dokumen&kat=kepuasan_dosen">Kepuasan Dosen & Tendik</a>
            </nav>
        </div>

        <a class="nav-link <?= $is_akreditasi ? '' : 'collapsed' ?> <?= $is_akreditasi ? 'active text-dark fw-bold' : '' ?>" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#akreditasiLPM" aria-expanded="<?= $is_akreditasi ? 'true' : 'false' ?>" aria-controls="akreditasiLPM">
            Akreditasi
            <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>
        <div class="collapse <?= $is_akreditasi ? 'show' : '' ?>" id="akreditasiLPM" data-bs-parent="#accordionLPM">
            <nav class="sidenav-menu-nested nav">
                <a class="nav-link <?= ($kat_aktif == 'akreditasi_lembaga') ? 'active text-primary' : '' ?>" href="index.php?module=lpm&act=dokumen&kat=akreditasi_lembaga">Akreditasi Lembaga</a>
                <a class="nav-link <?= ($kat_aktif == 'instrumen_banpt') ? 'active text-primary' : '' ?>" href="index.php?module=lpm&act=dokumen&kat=instrumen_banpt">Instrumen BAN-PT</a>
                <a class="nav-link <?= ($kat_aktif == 'evaluasi_diri') ? 'active text-primary' : '' ?>" href="index.php?module=lpm&act=dokumen&kat=evaluasi_diri">Borang / Evaluasi Diri</a>
                <a class="nav-link <?= ($kat_aktif == 'laporan_akreditasi') ? 'active text-primary' : '' ?>" href="index.php?module=lpm&act=dokumen&kat=laporan_akreditasi">Laporan Akreditasi</a>
            </nav>
        </div>

    </nav>
</div>