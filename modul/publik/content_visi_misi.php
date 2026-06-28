<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");

// Tarik Data Dinamis dari Database
$q_visi = $koneksi->query("SELECT konten FROM profil_lembaga WHERE kategori='visi' LIMIT 1")->fetch_assoc();
$teks_visi = $q_visi['konten'] ?? "Visi lembaga belum diatur oleh Administrator.";

$q_misi = $koneksi->query("SELECT konten FROM profil_lembaga WHERE kategori='misi' ORDER BY urutan ASC");
$q_nilai = $koneksi->query("SELECT konten FROM profil_lembaga WHERE kategori='nilai_inti' ORDER BY urutan ASC");
?>

<main>
    <!-- HEADER HIJAU -->
    <header class="page-header page-header-dark bg-success pb-10">
        <div class="container-xl px-4">
            <div class="page-header-content pt-4" data-aos="fade-down">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title fw-bold">
                            <div class="page-header-icon"><i data-feather="target"></i></div>
                            Visi, Misi & Nilai Inti
                        </h1>
                        <div class="page-header-subtitle">Arah strategis dan landasan moral civitas akademika STPM Santa Ursula.</div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container-xl px-4 mt-n10 mb-5">
        <div class="row gx-4">
            
            <!-- KARTU VISI (Overlapping Header) -->
            <div class="col-lg-12 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="card shadow-sm border-0 h-100 bg-success text-white text-center p-4 p-md-5 rounded-4" style="box-shadow: 0 0.5rem 1.5rem rgba(0, 0, 0, 0.15) !important;">
                    <i class="fas fa-eye fa-3x mb-3 text-white opacity-50"></i>
                    <h3 class="fw-bold text-white mb-4">VISI STPM SANTA URSULA</h3>
                    <p class="lead mb-0 fw-500" style="line-height: 1.8;">"<?= htmlspecialchars($teks_visi) ?>"</p>
                </div>
            </div>

            <!-- KARTU MISI -->
            <div class="col-lg-8 mb-4" data-aos="fade-right" data-aos-delay="200">
                <div class="card shadow-sm border-0 h-100 rounded-4">
                    <div class="card-header bg-white border-bottom border-light p-4">
                        <h5 class="fw-bold text-dark mb-0"><i class="fas fa-tasks text-success me-2"></i> Misi Institusi</h5>
                    </div>
                    <div class="card-body p-4 p-md-5">
                        <ol class="text-muted ps-3 mb-0" style="line-height: 1.8; font-size: 1.05rem;">
                            <?php if($q_misi->num_rows > 0): while($misi = $q_misi->fetch_assoc()): ?>
                                <li class="mb-3"><?= htmlspecialchars($misi['konten']) ?></li>
                            <?php endwhile; else: ?>
                                <p class="text-center fst-italic">Misi belum ditambahkan.</p>
                            <?php endif; ?>
                        </ol>
                    </div>
                </div>
            </div>

            <!-- KARTU NILAI INTI (SERVIAM) -->
            <div class="col-lg-4 mb-4" data-aos="fade-left" data-aos-delay="300">
                <div class="card shadow-sm border-0 h-100 bg-light rounded-4">
                    <div class="card-body p-4 p-md-5 text-center">
                        <!-- Lingkaran Ikon -->
                        <div class="icon-stack icon-stack-xl bg-white text-success mb-4 shadow-sm mx-auto d-flex justify-content-center align-items-center rounded-circle" style="width: 70px; height: 70px;">
                            <i class="fas fa-heart fa-2x"></i>
                        </div>
                        
                        <h5 class="fw-bold text-dark mb-3">Nilai Inti: SERVIAM</h5>
                        <p class="text-muted small text-start mb-4" style="line-height: 1.6;">Dalam setiap aktivitas akademiknya, civitas akademika menghidupi nilai <strong>Serviam</strong> (Saya Melayani), yang mencakup:</p>
                        
                        <ul class="text-start text-muted small list-unstyled mb-0" style="line-height: 2;">
                            <?php if($q_nilai->num_rows > 0): while($nilai = $q_nilai->fetch_assoc()): ?>
                                <li class="mb-2 d-flex align-items-start">
                                    <i class="fas fa-check-circle text-success mt-1 me-2"></i> 
                                    <span><?= htmlspecialchars($nilai['konten']) ?></span>
                                </li>
                            <?php endwhile; else: ?>
                                <p class="text-center fst-italic">Nilai Inti belum ditambahkan.</p>
                            <?php endif; ?>
                        </ul>
                        
                    </div>
                </div>
            </div>

        </div>
    </div>
</main>

<script>
    if (typeof feather !== 'undefined') feather.replace();
    if (typeof AOS !== 'undefined') AOS.init({ duration: 800, once: true });
</script>