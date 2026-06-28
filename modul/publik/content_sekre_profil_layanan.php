<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");

// Tarik Daftar Standar Waktu Layanan dari Database
$q_sla_publik = $koneksi->query("SELECT * FROM sekretariat_sla ORDER BY urutan ASC");
?>

<main>
    <header class="page-header page-header-dark bg-secondary pb-10">
        <div class="container-xl px-4">
            <div class="page-header-content pt-4" data-aos="fade-down" data-aos-duration="1000">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title text-white fw-black" style="font-size: 2.3rem;">
                            <div class="page-header-icon text-white"><i data-feather="shield"></i></div>
                            Maklumat & Standar Layanan
                        </h1>
                        <div class="page-header-subtitle text-white-50 mt-2 fs-5">Janji komitmen kami dalam memberikan pelayanan prima, cepat, dan anti-pungli.</div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container-xl px-4 mt-n10 mb-5">
        <div class="row gx-4">
            
            <div class="col-lg-12 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="card shadow-lg border-0 h-100 bg-dark text-white text-center p-4 p-md-5 position-relative overflow-hidden rounded-4">
                    <div class="position-absolute" style="top: -20px; right: -20px; opacity: 0.05; transform: rotate(15deg);">
                        <i class="fas fa-certificate fa-10x"></i>
                    </div>
                    
                    <div class="position-relative z-index-1">
                        <i class="fas fa-file-signature fa-3x mb-3 text-secondary"></i>
                        <h2 class="fw-black text-white mb-4" style="letter-spacing: 2px;">MAKLUMAT PELAYANAN</h2>
                        <p class="lead mb-0 mx-auto fw-500" style="max-width: 800px; line-height: 1.8; color: #e2e8f0;">
                            "Dengan ini, kami menyatakan sanggup menyelenggarakan pelayanan administrasi akademik dan umum sesuai dengan Standar Operasional Prosedur (SOP) yang telah ditetapkan. Apabila kami tidak menepati maklumat ini, kami siap menerima sanksi sesuai ketentuan yang berlaku."
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6 mb-4" data-aos="fade-right" data-aos-delay="200">
                <div class="card shadow-sm border-0 h-100 border-top border-secondary border-4 rounded-4 overflow-hidden">
                    <div class="card-header bg-white border-bottom border-light p-4">
                        <h5 class="fw-bold text-dark mb-0"><i class="fas fa-stopwatch text-secondary me-2"></i>Service Level Agreement (SLA)</h5>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover table-striped mb-0">
                                <thead class="bg-light text-muted small text-uppercase">
                                    <tr>
                                        <th class="px-4 py-3 fw-bold">Jenis Layanan Administrasi</th>
                                        <th class="text-center px-4 py-3 fw-bold" width="40%">Masa Penyelesaian</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    if($q_sla_publik && $q_sla_publik->num_rows > 0): 
                                        while($sla = $q_sla_publik->fetch_assoc()): 
                                    ?>
                                        <tr>
                                            <td class="text-dark fw-bold px-4 py-3 border-bottom-0"><?= htmlspecialchars($sla['jenis_layanan']) ?></td>
                                            <td class="text-center border-bottom-0 py-3">
                                                <span class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-25 px-3 py-2 w-100">
                                                    <?= htmlspecialchars($sla['waktu_penyelesaian']) ?>
                                                </span>
                                            </td>
                                        </tr>
                                    <?php 
                                        endwhile; 
                                    else: 
                                    ?>
                                        <tr><td colspan="2" class="text-center text-muted fst-italic py-4">Data standar layanan sedang dalam pembaruan.</td></tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 mb-4" data-aos="fade-left" data-aos-delay="300">
                <div class="card shadow-sm border-0 h-100 border-top border-danger border-4 rounded-4">
                    <div class="card-body p-4 p-md-5 text-center d-flex flex-column justify-content-center">
                        <div class="icon-stack icon-stack-xl bg-danger-soft text-danger mx-auto mb-4 rounded-circle" style="width: 80px; height: 80px;">
                            <i class="fas fa-ban fa-2x"></i>
                        </div>
                        <h3 class="fw-black text-dark mb-3">Zona Integritas Anti Pungli</h3>
                        <p class="text-muted mb-4 lead" style="font-size: 1.05rem; line-height: 1.7;">
                            Sekretariat STPM Santa Ursula berkomitmen mewujudkan wilayah birokrasi bersih dan melayani. Seluruh layanan administrasi kemahasiswaan dan kealumnian bersifat <strong class="text-danger">GRATIS (Tanpa Biaya Retribusi)</strong>.
                        </p>
                        <a href="#!" class="btn btn-outline-danger rounded-pill fw-bold py-2 mt-auto align-self-center shadow-sm hover-lift">
                            <i class="fas fa-bullhorn me-2"></i> Laporkan Pelanggaran (Whistleblowing)
                        </a>
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