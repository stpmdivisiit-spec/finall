<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");

// Tarik data gambar bagan (Desktop)
$q_bagan = $koneksi->query("SELECT gambar_bagan FROM setting_struktur WHERE id=1")->fetch_assoc();
$gambar_struktur = $q_bagan['gambar_bagan'] ?? '';

// Tarik data pejabat (Mobile)
$q_pejabat = $koneksi->query("SELECT * FROM struktur_organisasi_item ORDER BY urutan ASC");
?>

<style>
/* CSS Kustom untuk Mobile Timeline */
.mobile-org-timeline {
    position: relative;
    padding-left: 1.5rem;
}
.mobile-org-timeline::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    height: 100%;
    width: 2px;
    background: #e2e8f0;
}
.org-timeline-item {
    position: relative;
    margin-bottom: 2rem;
}
.org-timeline-marker {
    position: absolute;
    left: -1.85rem;
    top: 0.25rem;
    width: 14px;
    height: 14px;
    border-radius: 50%;
    border: 2px solid #fff;
    z-index: 1;
}
.zoomable-image {
    transition: transform 0.3s ease;
    cursor: zoom-in;
}
.zoomable-image:hover {
    transform: scale(1.02);
}
</style>

<main>
    <header class="page-header page-header-dark bg-info pb-10">
        <div class="container-xl px-4">
            <div class="page-header-content pt-4" data-aos="fade-down">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="git-merge"></i></div>
                            Struktur Organisasi
                        </h1>
                        <div class="page-header-subtitle">Bagan hierarki manajerial dan akademik di STPM Santa Ursula.</div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container-xl px-4 mt-n10 mb-5">
        <div class="card shadow-sm border-0 rounded-4 mb-4" data-aos="fade-up" data-aos-delay="100">
            <div class="card-body p-4 p-md-5">
                
                <div class="text-center mb-5 border-bottom pb-4">
                    <h3 class="fw-bold text-dark mb-2">Susunan Kepemimpinan Institusi</h3>
                    <p class="text-muted small">Periode Kepengurusan Berjalan</p>
                </div>

                <div class="d-none d-md-block text-center">
                    <?php if(!empty($gambar_struktur) && file_exists('uploads/struktur/' . $gambar_struktur)): ?>
                        <div class="p-2 bg-light rounded-4 border">
                            <img src="uploads/struktur/<?= htmlspecialchars($gambar_struktur) ?>" class="img-fluid rounded-3 zoomable-image shadow-sm" alt="Bagan Struktur Organisasi" style="width: 100%; object-fit: contain;">
                        </div>
                        <p class="text-muted small mt-3"><i class="fas fa-info-circle me-1"></i> Gambar bagan organisasi. Sorot gambar untuk memperbesar.</p>
                    <?php else: ?>
                        <div class="p-5 bg-light rounded-4 border-dashed">
                            <i class="far fa-image fa-3x text-muted opacity-50 mb-3"></i>
                            <h5 class="text-dark fw-bold">Bagan Belum Diunggah</h5>
                            <p class="text-muted small">Administrator belum mengunggah gambar bagan struktur organisasi.</p>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="d-block d-md-none">
                    <div class="alert alert-info border-start-lg border-start-info shadow-sm mb-4">
                        <i class="fas fa-mobile-alt me-2"></i> Tampilan dioptimalkan untuk perangkat seluler.
                    </div>

                    <div class="mobile-org-timeline mt-2">
                        <?php if($q_pejabat->num_rows > 0): while($pjb = $q_pejabat->fetch_assoc()): ?>
                            <div class="org-timeline-item" data-aos="fade-left">
                                <div class="org-timeline-marker bg-<?= htmlspecialchars($pjb['warna_ikon']) ?>"></div>
                                <div class="card border-0 shadow-sm bg-light">
                                    <div class="card-body p-3">
                                        <div class="d-flex align-items-center mb-2">
                                            <div class="icon-stack icon-stack-sm bg-<?= htmlspecialchars($pjb['warna_ikon']) ?>-soft text-<?= htmlspecialchars($pjb['warna_ikon']) ?> me-2 flex-shrink-0">
                                                <i class="fas fa-user-tie"></i>
                                            </div>
                                            <span class="small fw-bold text-uppercase text-<?= htmlspecialchars($pjb['warna_ikon']) ?>">
                                                <?= htmlspecialchars($pjb['nama_jabatan']) ?>
                                            </span>
                                        </div>
                                        <h6 class="fw-bolder text-dark mb-1 fs-5"><?= htmlspecialchars($pjb['nama_pejabat']) ?></h6>
                                        <p class="text-muted small mb-0" style="line-height: 1.5;"><?= htmlspecialchars($pjb['deskripsi']) ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; else: ?>
                            <p class="text-muted text-center fst-italic py-4">Data struktur organisasi belum ditambahkan.</p>
                        <?php endif; ?>
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