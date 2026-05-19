<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");

$id_berita = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// 1. Ambil Detail Berita Berdasarkan ID dengan Prepared Statements
$stmt = $koneksi->prepare("SELECT * FROM prodi_berita WHERE id = ?");
$stmt->bind_param("i", $id_berita);
$stmt->execute();
$berita = $stmt->get_result()->fetch_assoc();

if (!$berita) {
    echo "<div class='container-xl px-4 mt-5 py-5 text-center'>
            <div class='alert alert-danger border-start-lg border-start-danger shadow-sm'>
                <h4 class='fw-bold'><i class='fas fa-exclamation-triangle me-2'></i> Konten Tidak Ditemukan</h4>
                <p class='mb-3'>Maaf, artikel yang Anda cari tidak tersedia atau telah diarsipkan oleh pengelola situs.</p>
                <a href='index.php' class='btn btn-primary rounded-pill btn-sm px-4'><i class='fas fa-arrow-left me-1'></i> Kembali ke Beranda</a>
            </div>
          </div>";
} else {
    // 2. Ambil 5 Berita Populer/Terbaru untuk Sidebar Samping
    $q_sidebar = $koneksi->query("SELECT id, judul, gambar_thumbnail, tanggal_publikasi, unit_kategori FROM prodi_berita WHERE id != '$id_berita' ORDER BY tanggal_publikasi DESC LIMIT 5");
?>
<div class="container-xl px-4 mt-5 fade-in-up">
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb breadcrumb-transparent mb-0 shadow-none ps-0">
            <li class="breadcrumb-item"><a href="index.php" class="text-decoration-none">Beranda</a></li>
            <li class="breadcrumb-item"><a href="index.php#portal-berita" class="text-decoration-none">Berita</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= htmlspecialchars(substr($berita['judul'], 0, 30)) ?>...</li>
        </ol>
    </nav>

    <div class="row gx-4">
        <div class="col-lg-8 mb-4">
            <div class="card shadow-sm border-0 rounded-3 overflow-hidden">
                <div class="card-body p-4 p-md-5">
                    <div class="d-flex align-items-center mb-3">
                        <span class="badge bg-primary-soft text-primary rounded-pill px-3 py-2 fw-bold text-uppercase small me-3">
                            <i class="fas fa-bookmark me-1"></i> <?= htmlspecialchars($berita['unit_kategori'] ?? 'Umum') ?>
                        </span>
                        <span class="text-muted small">
                            <i class="far fa-calendar-alt me-1"></i> <?= date('d F Y', strtotime($berita['tanggal_publikasi'])) ?>
                        </span>
                    </div>

                    <h1 class="fw-black text-dark mb-4" style="line-height: 1.3; font-size: 2.3rem;">
                        <?= htmlspecialchars($berita['judul']) ?>
                    </h1>

                    <div class="d-flex align-items-center mb-4 p-3 bg-light rounded-2 border-start border-primary border-3">
                        <img src="/FINAL/assets/img/illustrations/profiles/profile-1.png" class="rounded-circle me-3" style="width: 40px; height: 40px;">
                        <div>
                            <div class="fw-bold text-dark small">Kontributor: <?= htmlspecialchars($berita['penulis']) ?></div>
                            <div class="text-xs text-muted">Diverifikasi oleh Biro Humas STPM Santa Ursula</div>
                        </div>
                    </div>

                    <div class="mb-4 rounded-3 overflow-hidden shadow-sm">
                        <img src="uploads/prodi/berita/<?= htmlspecialchars($berita['gambar_thumbnail']) ?>" class="w-100 img-fluid" onerror="this.src='/FINAL/assets/img/demo/demo-ocean-lg.jpg'" style="max-height: 480px; object-fit: cover;">
                    </div>

                    <div class="text-gray-700 text-justify" style="font-size: 1.1rem; line-height: 1.9; letter-spacing: 0.02rem;">
                        <?= $berita['konten'] ?>
                    </div>

                    <div class="border-top pt-4 mt-5 d-flex justify-content-between align-items-center flex-wrap">
                        <a href="index.php#portal-berita" class="btn btn-outline-primary rounded-pill px-4 btn-sm mb-2">
                            <i class="fas fa-arrow-left me-2"></i> Kembali ke Portal Berita
                        </a>
                        <div class="mb-2">
                            <span class="small text-muted me-2">Bagikan:</span>
                            <button class="btn btn-sm btn-icon btn-transparent-dark"><i class="fab fa-facebook-f"></i></button>
                            <button class="btn btn-sm btn-icon btn-transparent-dark"><i class="fab fa-twitter"></i></button>
                            <button class="btn btn-sm btn-icon btn-transparent-dark"><i class="fab fa-whatsapp"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card border-0 shadow-sm rounded-3 mb-4 sticky-top" style="top: 90px; z-index: 10;">
                <div class="card-header bg-white fw-bold text-primary pt-4 pb-3 border-bottom-0">
                    <i class="fas fa-fire text-warning me-2"></i> Artikel Terkini Lainnya
                </div>
                <div class="card-body px-4 pt-0 pb-4">
                    <?php if($q_sidebar && $q_sidebar->num_rows > 0): ?>
                        <?php while($side = $q_sidebar->fetch_assoc()): ?>
                            <div class="d-flex align-items-center py-3 border-bottom border-1 border-light">
                                <div class="flex-shrink-0">
                                    <img src="uploads/prodi/berita/<?= htmlspecialchars($side['gambar_thumbnail']) ?>" class="rounded shadow-none" style="width: 70px; height: 70px; object-fit: cover;" onerror="this.src='/FINAL/assets/img/demo/demo-ocean-sm.jpg'">
                                </div>
                                <div class="ms-3">
                                    <span class="badge bg-yellow-soft text-yellow text-uppercase rounded-pill px-2 py-0 mb-1" style="font-size: 0.65rem;">
                                        <?= htmlspecialchars($side['unit_kategori'] ?? 'Umum') ?>
                                    </span>
                                    <a href="index.php?module=baca_berita&id=<?= $side['id'] ?>" class="text-dark fw-bold text-decoration-none d-block mb-1 text-hover-primary" style="font-size: 0.9rem; line-height: 1.3;">
                                        <?= htmlspecialchars(substr($side['judul'], 0, 45)) ?>...
                                    </a>
                                    <div class="text-muted" style="font-size: 0.75rem;"><i class="far fa-clock me-1"></i><?= date('d M Y', strtotime($side['tanggal_publikasi'])) ?></div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <p class="text-muted small text-center py-3">Tidak ada berita terkait lainnya.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>