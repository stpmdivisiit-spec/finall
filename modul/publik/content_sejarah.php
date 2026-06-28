<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");

// Menarik data dinamis dari database
$q_sejarah = $koneksi->query("SELECT * FROM sejarah_lembaga ORDER BY urutan ASC");
$sejarah = [];
while ($row = $q_sejarah->fetch_assoc()) {
    $sejarah[] = $row;
}
?>

<style>
/* CSS Kustom untuk Timeline Modern */
.timeline-modern {
    position: relative;
    padding-left: 2rem;
}
.timeline-modern::before {
    content: '';
    position: absolute;
    top: 0;
    left: 8px; /* Posisi Garis Vertikal Utama */
    height: 100%;
    width: 3px;
    background: #e2e8f0;
    border-radius: 5px;
}
.timeline-item {
    position: relative;
    margin-bottom: 3.5rem;
}
.timeline-marker {
    position: absolute;
    left: -2rem; /* Menarik marker ke tengah garis */
    top: 0;
    width: 20px;
    height: 20px;
    border-radius: 50%;
    background-color: #0d6efd;
    border: 4px solid #fff;
    box-shadow: 0 0 0 3px rgba(13, 110, 253, 0.2);
    z-index: 1;
}
.timeline-year {
    font-size: 0.85rem;
    font-weight: 800;
    color: #0d6efd;
    letter-spacing: 0.05rem;
    text-transform: uppercase;
    display: block;
    margin-bottom: 0.5rem;
}
.timeline-content {
    background: #fff;
    padding: 1.5rem;
    border-radius: 1rem;
    box-shadow: 0 0.25rem 1rem rgba(0,0,0,0.05);
    border: 1px solid #f1f5f9;
    transition: transform 0.2s;
}
.timeline-content:hover {
    transform: translateY(-5px);
    box-shadow: 0 0.5rem 1.5rem rgba(0,0,0,0.1);
}
.timeline-img {
    width: 100%;
    height: 220px;
    object-fit: cover;
    border-radius: 0.75rem;
    margin-bottom: 1rem;
}
</style>

<main>
    <header class="page-header page-header-dark pb-10" style="background: linear-gradient(135deg, #0d6efd 0%, #1e40af 100%);">
        <div class="container-xl px-4">
            <div class="page-header-content pt-4" data-aos="fade-down">
                <div class="row align-items-center justify-content-center text-center">
                    <div class="col-auto mt-4">
                        <div class="page-header-icon d-block mb-3 text-white-50"><i data-feather="clock" style="width: 40px; height: 40px;"></i></div>
                        <h1 class="page-header-title fw-black d-block mb-2 text-white" style="font-size: 2.5rem;">Sejarah Institusi</h1>
                        <p class="page-header-subtitle lead text-white-75">Jejak langkah, tantangan, dan dedikasi STPM Santa Ursula dalam dunia pendidikan tinggi.</p>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container-xl px-4 mt-n10 mb-5">
        <div class="card shadow border-0 rounded-4" data-aos="fade-up" data-aos-delay="100">
            <div class="card-body p-4 p-md-5">
                
                <div class="text-center mb-5 border-bottom pb-4">
                    <div class="badge bg-primary bg-opacity-10 text-primary rounded-pill px-4 py-2 fw-bold mb-3 fs-6">Historis Kampus</div>
                    <h2 class="fw-black text-dark mb-3">Lahir dari Semangat Melayani</h2>
                    <p class="lead text-muted mx-auto" style="max-width: 700px;">Dibangun di bawah naungan <strong>Yayasan Nusa Taruna Bakti</strong>, STPM Santa Ursula terus berkomitmen mencetak agen perubahan bagi bangsa dan negara.</p>
                </div>
                
                <div class="row justify-content-center">
                    <div class="col-lg-9 col-xl-8">
                        <div class="timeline-modern mt-4">
                            
                            <?php if (count($sejarah) > 0): foreach ($sejarah as $index => $item): ?>
                                <div class="timeline-item" data-aos="fade-up" data-aos-delay="<?= ($index % 3) * 100 ?>">
                                    <div class="timeline-marker"></div>
                                    <div class="timeline-content">
                                        <span class="timeline-year"><i class="fas fa-history me-1"></i> Periode / Tahun <?= htmlspecialchars($item['tahun']) ?></span>
                                        <h3 class="fw-bold text-dark mb-3"><?= htmlspecialchars($item['judul_peristiwa']) ?></h3>
                                        
                                        <?php if (!empty($item['gambar'])): ?>
                                            <img src="uploads/sejarah/<?= htmlspecialchars($item['gambar']) ?>" alt="<?= htmlspecialchars($item['judul_peristiwa']) ?>" class="timeline-img shadow-sm" onerror="this.style.display='none'">
                                        <?php endif; ?>
                                        
                                        <p class="text-muted mb-0" style="font-size: 1.05rem; line-height: 1.7;">
                                            <?= nl2br(htmlspecialchars($item['deskripsi'])) ?>
                                        </p>
                                    </div>
                                </div>
                            <?php endforeach; else: ?>
                                <div class="alert alert-light text-center border-dashed py-5 rounded-4">
                                    <i class="far fa-folder-open fa-3x text-muted opacity-25 mb-3 d-block"></i>
                                    <h5 class="fw-bold text-dark">Data Historis Kosong</h5>
                                    <p class="text-muted small mb-0">Belum ada catatan sejarah yang ditambahkan oleh Administrator.</p>
                                </div>
                            <?php endif; ?>

                        </div>
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