<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");
// C:\xampp\htdocs\FINAL\modul\publik\baca_berita.php

// Pastikan menggunakan prepared statement yang benar dengan fetch_assoc langsung
$id_berita = isset($_GET['id']) ? (int)$_GET['id'] : 0;

$stmt = $koneksi->prepare("SELECT * FROM prodi_berita WHERE id = ?");
$stmt->bind_param("i", $id_berita);
$stmt->execute();
$berita = $stmt->get_result()->fetch_assoc();

if (!$berita) {
    echo "<div class='container-xl px-4 mt-5 py-5 text-center' data-aos='zoom-in'>
            <div class='alert alert-danger border-start-lg border-start-danger shadow-sm'>
                <h4 class='fw-bold'><i class='fas fa-exclamation-triangle me-2'></i> Konten Tidak Ditemukan</h4>
                <p class='mb-3'>Maaf, artikel yang Anda cari tidak tersedia atau telah diarsipkan oleh pengelola situs.</p>
                <a href='index.php' class='btn btn-primary rounded-pill btn-sm px-4'><i class='fas fa-arrow-left me-1'></i> Kembali ke Beranda</a>
            </div>
          </div>";
} else {
    // Ambil 10 Berita Populer/Terbaru untuk Sidebar Samping (Dibatasi 10 agar efek scroll terlihat)
    $q_sidebar = $koneksi->query("SELECT id, judul, gambar_thumbnail, tanggal_publikasi, unit_kategori FROM prodi_berita WHERE id != '$id_berita' ORDER BY tanggal_publikasi DESC LIMIT 10");

    // Persiapan URL & Judul untuk tombol Share Media Sosial
    $current_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $share_title = rawurlencode($berita['judul']);
    $share_url   = rawurlencode($current_url);
?>
<div class="container-xl px-4 mt-4 mt-lg-5 mb-5">
    
    <nav aria-label="breadcrumb" class="mb-4" data-aos="fade-down">
        <ol class="breadcrumb breadcrumb-transparent mb-0 shadow-none ps-0">
            <li class="breadcrumb-item"><a href="index.php" class="text-decoration-none text-primary">Beranda</a></li>
            <li class="breadcrumb-item"><a href="index.php#portal-berita" class="text-decoration-none text-primary">Portal Berita</a></li>
            <li class="breadcrumb-item active text-muted" aria-current="page"><?= htmlspecialchars(substr($berita['judul'], 0, 30)) ?>...</li>
        </ol>
    </nav>

    <div class="row gx-lg-5">
        
        <div class="col-lg-8 mb-5 mb-lg-0">
            <div class="card shadow-sm border-0 rounded-4 overflow-hidden" data-aos="fade-up">
                <div class="card-body p-4 p-md-5">
                    
                    <div class="d-flex align-items-center mb-3">
                        <span class="badge bg-primary bg-opacity-10 text-primary rounded-pill px-3 py-2 fw-bold text-uppercase small me-3">
                            <i class="fas fa-bookmark me-1"></i> <?= htmlspecialchars($berita['unit_kategori'] ?? 'Umum') ?>
                        </span>
                        <span class="text-muted small fw-bold">
                            <i class="far fa-calendar-alt me-1"></i> <?= date('d F Y', strtotime($berita['tanggal_publikasi'])) ?>
                        </span>
                    </div>

                    <h1 class="fw-black text-dark mb-4" style="line-height: 1.3; font-size: 2.2rem;">
                        <?= htmlspecialchars($berita['judul']) ?>
                    </h1>

                    <div class="d-flex align-items-center mb-4 p-3 bg-light rounded-3 border-start border-primary border-4">
                        <div class="avatar bg-primary text-white rounded-circle me-3 d-flex justify-content-center align-items-center fw-bold" style="width: 45px; height: 45px;">
                            <?= strtoupper(substr($berita['penulis'], 0, 1)) ?>
                        </div>
                        <div>
                            <div class="fw-bold text-dark mb-1">Oleh: <?= htmlspecialchars($berita['penulis']) ?></div>
                            <div class="text-xs text-muted"><i class="fas fa-check-circle text-success me-1"></i> Dipublikasikan oleh Biro Humas</div>
                        </div>
                    </div>

                    <div class="mb-4 rounded-4 overflow-hidden shadow-sm" data-aos="zoom-in" data-aos-delay="100">
                        <img src="uploads/prodi/berita/<?= htmlspecialchars($berita['gambar_thumbnail']) ?>" class="w-100 img-fluid" onerror="this.src='/FINAL/assets/img/demo/demo-ocean-lg.jpg'" style="max-height: 500px; object-fit: cover;">
                    </div>

                    <div class="text-dark" style="font-size: 1.15rem; line-height: 1.8; letter-spacing: 0.01rem;" data-aos="fade-up" data-aos-delay="200">
                        <?= $berita['konten'] ?>
                    </div>

                    <div class="border-top pt-4 mt-5 d-flex justify-content-between align-items-center flex-wrap" data-aos="fade-up">
                        <a href="index.php#portal-berita" class="btn btn-outline-primary rounded-pill px-4 btn-sm mb-3 mb-md-0 fw-bold">
                            <i class="fas fa-arrow-left me-2"></i> Kembali ke Berita
                        </a>
                        
                        <div class="d-flex align-items-center">
                            <span class="small text-muted fw-bold me-3">Bagikan Berita:</span>
                            
                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?= $share_url ?>" target="_blank" class="btn btn-sm btn-icon btn-primary rounded-circle shadow-sm me-2" title="Bagikan ke Facebook">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            
                            <a href="https://twitter.com/intent/tweet?text=<?= $share_title ?>&url=<?= $share_url ?>" target="_blank" class="btn btn-sm btn-icon btn-dark rounded-circle shadow-sm me-2" title="Bagikan ke X (Twitter)">
                                <i class="fab fa-twitter"></i>
                            </a>
                            
                            <a href="https://api.whatsapp.com/send?text=*<?= $share_title ?>*%0A<?= $share_url ?>" target="_blank" class="btn btn-sm btn-icon btn-success rounded-circle shadow-sm" title="Bagikan ke WhatsApp">
                                <i class="fab fa-whatsapp fs-5"></i>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-lg-4">
            
            <div class="card border-0 shadow-sm rounded-4 mb-4 sticky-top overflow-hidden" style="top: 90px; z-index: 10;" data-aos="fade-left" data-aos-delay="300">
                
                <div class="card-header bg-white pt-4 pb-3 border-bottom border-light">
                    <h5 class="fw-bold text-dark mb-3"><i class="fas fa-fire text-warning me-2"></i> Kabar Terkini Lainnya</h5>
                    
                    <div class="input-group input-group-sm mb-1 shadow-none border rounded-pill overflow-hidden">
                        <span class="input-group-text bg-light border-0 text-muted ps-3"><i class="fas fa-search"></i></span>
                        <input type="text" id="cari-sidebar" class="form-control border-0 bg-light py-2" placeholder="Cari berita lainnya..." onkeyup="filterSidebar()">
                    </div>
                </div>

                <div class="card-body p-0 rounded-bottom-4" style="max-height: 500px; overflow-y: auto; overflow-x: hidden;" id="daftar-berita-sidebar">
                    
                    <?php if($q_sidebar && $q_sidebar->num_rows > 0): ?>
                        <div class="list-group list-group-flush">
                            <?php while($side = $q_sidebar->fetch_assoc()): ?>
                                <div class="list-group-item px-4 py-3 border-bottom border-light item-sidebar-berita">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0">
                                            <img src="uploads/prodi/berita/<?= htmlspecialchars($side['gambar_thumbnail']) ?>" class="rounded-3 shadow-sm" style="width: 75px; height: 75px; object-fit: cover;" onerror="this.src='/FINAL/assets/img/demo/demo-ocean-sm.jpg'">
                                        </div>
                                        <div class="ms-3 flex-grow-1">
                                            <span class="badge bg-secondary bg-opacity-10 text-secondary text-uppercase rounded-pill px-2 py-1 mb-2 d-inline-block" style="font-size: 0.65rem; letter-spacing: 0.5px;">
                                                <?= htmlspecialchars($side['unit_kategori'] ?? 'Umum') ?>
                                            </span>
                                            <a href="index.php?module=baca_berita&id=<?= $side['id'] ?>" class="text-dark fw-bold text-decoration-none d-block mb-1 text-hover-primary judul-sidebar-berita" style="font-size: 0.95rem; line-height: 1.3;">
                                                <?= htmlspecialchars(substr($side['judul'], 0, 50)) ?><?= (strlen($side['judul']) > 50) ? '...' : '' ?>
                                            </a>
                                            <div class="text-muted small"><i class="far fa-clock me-1"></i><?= date('d M Y', strtotime($side['tanggal_publikasi'])) ?></div>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    <?php else: ?>
                        <p class="text-muted small text-center py-5"><i class="fas fa-inbox fa-2x opacity-25 mb-2"></i><br>Tidak ada berita lain tersedia.</p>
                    <?php endif; ?>
                </div>

            </div>
        </div>

    </div>
</div>

<script>
    if (typeof AOS !== 'undefined') {
        AOS.init({ duration: 800, once: true });
    }

    function filterSidebar() {
        var input = document.getElementById("cari-sidebar");
        var filter = input.value.toLowerCase();
        var container = document.getElementById("daftar-berita-sidebar");
        var items = container.getElementsByClassName("item-sidebar-berita");

        for (var i = 0; i < items.length; i++) {
            var judul = items[i].getElementsByClassName("judul-sidebar-berita")[0];
            if (judul) {
                var txtValue = judul.textContent || judul.innerText;
                if (txtValue.toLowerCase().indexOf(filter) > -1) {
                    items[i].style.display = "";
                } else {
                    items[i].style.display = "none";
                }
            }       
        }
    }
</script>

<style>
    /* PERBAIKAN 3: Menghilangkan garis pembatas di item paling bawah agar lengkungan bersih */
    .item-sidebar-berita:last-child {
        border-bottom: none !important;
    }

    /* Kostumisasi Scrollbar */
    #daftar-berita-sidebar::-webkit-scrollbar {
        width: 6px;
    }
    #daftar-berita-sidebar::-webkit-scrollbar-track {
        background: transparent; 
        border-bottom-right-radius: 1rem;
    }
    #daftar-berita-sidebar::-webkit-scrollbar-thumb {
        background: #e0e0e0; 
        border-radius: 10px;
    }
    #daftar-berita-sidebar::-webkit-scrollbar-thumb:hover {
        background: #b0b0b0; 
    }
</style>

<?php } ?>