<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");

// Tarik data prosedur legalisir dari DB
$info = $koneksi->query("SELECT * FROM sekretariat_info_legalisir WHERE id=1")->fetch_assoc();

// Tarik data dokumen akademik publik dari DB
$q_dokumen = $koneksi->query("SELECT * FROM sekretariat_dokumen_akademik ORDER BY tanggal_upload DESC LIMIT 10");
?>

<main>
    <header class="page-header page-header-dark bg-secondary pb-10">
        <div class="container-xl px-4">
            <div class="page-header-content pt-4" data-aos="fade-down" data-aos-duration="1000">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title text-white fw-black" style="font-size: 2.3rem;">
                            <div class="page-header-icon text-white"><i data-feather="award"></i></div>
                            Legalisir Ijazah & Dokumen Akademik
                        </h1>
                        <div class="page-header-subtitle text-white-50 fs-5 mt-2">Pelayanan pengesahan dokumen kelulusan dan pusat regulasi akademik STPM Santa Ursula.</div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container-xl px-4 mt-n10 mb-5">
        
        <div class="card shadow-sm border-0 mb-5 rounded-4" data-aos="fade-up" data-aos-delay="100">
            <div class="card-body p-4 p-md-5">
                <div class="row align-items-center text-center text-lg-start">
                    <div class="col-lg-9 mb-4 mb-lg-0">
                        <h3 class="fw-black text-dark mb-3">Prosedur Pengajuan Legalisir</h3>
                        <p class="text-muted mb-0 lead" style="line-height: 1.8;">
                            <?= nl2br(htmlspecialchars($info['deskripsi_prosedur'] ?? '')) ?>
                        </p>
                    </div>
                    <div class="col-lg-3 text-center">
                        <div class="icon-stack icon-stack-xl bg-secondary bg-opacity-10 text-secondary mx-auto rounded-circle" style="width: 100px; height: 100px;">
                            <i class="fas fa-stamp fa-3x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row gx-4 text-center">
            <div class="col-md-4 mb-4" data-aos="zoom-in" data-aos-delay="200">
                <div class="card border-0 shadow-sm hover-lift h-100 p-4 border-bottom border-dark border-4 rounded-4">
                    <div class="icon-stack icon-stack-xl bg-dark text-white mx-auto mb-4 mt-2 rounded-circle" style="width:70px; height:70px;">
                        <i class="fas fa-search fa-2x"></i>
                    </div>
                    <h5 class="fw-bold text-dark mb-3"><?= htmlspecialchars($info['step1_judul'] ?? '1. Verifikasi Keaslian') ?></h5>
                    <p class="text-muted mb-0" style="line-height: 1.6;">
                        <?= htmlspecialchars($info['step1_deskripsi'] ?? '') ?>
                    </p>
                </div>
            </div>
            
            <div class="col-md-4 mb-4" data-aos="zoom-in" data-aos-delay="300">
                <div class="card border-0 shadow-sm hover-lift h-100 p-4 border-bottom border-secondary border-4 rounded-4">
                    <div class="icon-stack icon-stack-xl bg-secondary text-white mx-auto mb-4 mt-2 rounded-circle" style="width:70px; height:70px;">
                        <i class="fas fa-copy fa-2x"></i>
                    </div>
                    <h5 class="fw-bold text-dark mb-3"><?= htmlspecialchars($info['step2_judul'] ?? '2. Serahkan Salinan') ?></h5>
                    <p class="text-muted mb-0" style="line-height: 1.6;">
                        <?= htmlspecialchars($info['step2_deskripsi'] ?? '') ?>
                    </p>
                </div>
            </div>
            
            <div class="col-md-4 mb-4" data-aos="zoom-in" data-aos-delay="400">
                <div class="card border-0 shadow-sm hover-lift h-100 p-4 border-bottom border-success border-4 rounded-4">
                    <div class="icon-stack icon-stack-xl bg-success text-white mx-auto mb-4 mt-2 rounded-circle" style="width:70px; height:70px;">
                        <i class="fas fa-hand-holding fa-2x"></i>
                    </div>
                    <h5 class="fw-bold text-dark mb-3"><?= htmlspecialchars($info['step3_judul'] ?? '3. Pengambilan Dokumen') ?></h5>
                    <p class="text-muted mb-0" style="line-height: 1.6;">
                        <?= htmlspecialchars($info['step3_deskripsi'] ?? '') ?>
                    </p>
                </div>
            </div>
        </div>
        
        <div class="alert alert-secondary border-0 shadow-sm text-center mt-3 p-4 rounded-4" data-aos="fade-up">
            <i class="fas fa-exclamation-triangle me-2 text-danger"></i> 
            <strong>Penting:</strong> <?= htmlspecialchars($info['catatan_penting'] ?? '') ?>
        </div>

        <h3 class="text-dark fw-black mt-5 mb-4 border-bottom pb-2" data-aos="fade-right">Pusat Regulasi & Dokumen Akademik</h3>
        
        <div class="card shadow-sm border-0 bg-white rounded-4 overflow-hidden mb-5" data-aos="fade-up">
            <div class="card-body p-0">
                <div class="list-group list-group-flush">
                    <?php if($q_dokumen->num_rows > 0): while($dok = $q_dokumen->fetch_assoc()): ?>
                        <div class="list-group-item d-flex flex-column flex-md-row align-items-md-center justify-content-between p-4 bg-white hover-bg-light transition-all">
                            <div class="mb-3 mb-md-0 d-flex align-items-center">
                                <i class="fas fa-file-pdf fa-2x text-danger me-3 opacity-75"></i>
                                <div>
                                    <div class="fw-bold text-dark fs-6"><?= htmlspecialchars($dok['judul_dokumen']) ?></div>
                                    <div class="small text-muted mt-1">
                                        <span class="badge bg-secondary bg-opacity-10 text-secondary border px-2 py-1 me-2"><?= htmlspecialchars($dok['kategori_dokumen']) ?></span>
                                        Rilis: <?= date('d M Y', strtotime($dok['tanggal_upload'])) ?>
                                    </div>
                                </div>
                            </div>
                            <a href="uploads/sekretariat/dok_akademik/<?= htmlspecialchars($dok['file_dokumen']) ?>" download class="btn btn-outline-primary rounded-pill px-4 fw-bold shadow-none flex-shrink-0">
                                <i class="fas fa-cloud-download-alt me-2"></i>Unduh Berkas
                            </a>
                        </div>
                    <?php endwhile; else: ?>
                        <div class="p-5 text-center text-muted fst-italic bg-light">
                            <i class="far fa-folder-open fa-3x mb-3 opacity-50 d-block"></i>
                            Belum ada dokumen akademik (Pedoman/SK) yang dipublikasikan oleh Sekretariat.
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

    </div>
</main>

<style>
.hover-bg-light:hover { background-color: #f8f9fa !important; }
</style>

<script>
    if (typeof feather !== 'undefined') feather.replace();
    if (typeof AOS !== 'undefined') AOS.init({ duration: 800, once: true });
</script>