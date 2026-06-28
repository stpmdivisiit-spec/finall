<?php
// C:\xampp\htdocs\FINAL\modul\publik\ajax_berita.php
require_once '../../config/koneksi.php'; 

// TANGKAP PARAMETER DARI FRONTEND
$keyword = isset($_GET['keyword']) ? trim($_GET['keyword']) : '';
$unit    = isset($_GET['unit']) ? trim($_GET['unit']) : '';

// KONFIGURASI PAGINASI
$limit = 6; 
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($page < 1) $page = 1;
$offset = ($page - 1) * $limit;

// AMANKAN DARI SQL INJECTION
$cari_aman = $koneksi->real_escape_string($keyword);
$unit_aman = $koneksi->real_escape_string($unit);

// SUSUN KONDISI (WHERE)
$kondisi = array();

if (!empty($cari_aman)) {
    // Mencari di judul, konten, atau nama penulis
    $kondisi[] = " (judul LIKE '%$cari_aman%' OR konten LIKE '%$cari_aman%' OR penulis LIKE '%$cari_aman%') ";
}

if (!empty($unit_aman)) {
    $kondisi[] = " unit_kategori = '$unit_aman' ";
}

// GABUNGKAN KONDISI
$where_clause = "";
if (count($kondisi) > 0) {
    $where_clause = " WHERE " . implode(" AND ", $kondisi);
}

// =========================================================================
// 1. MENGHITUNG TOTAL DATA
// =========================================================================
$sql_count = "SELECT COUNT(*) AS total FROM prodi_berita" . $where_clause;
$q_total = $koneksi->query($sql_count);

if (!$q_total) {
    die('<div class="alert alert-danger text-center shadow-sm m-4 p-4 rounded-4" data-aos="zoom-in">
            <i class="fas fa-exclamation-triangle fa-3x mb-3 text-danger opacity-50"></i>
            <h5 class="fw-bold">Database Error (Pencarian Total)</h5>
            <p class="mb-0 text-muted">' . $koneksi->error . '</p>
         </div>');
}

$row_count = $q_total->fetch_assoc();
$total_data = $row_count['total'];
$total_pages = ceil($total_data / $limit);

// =========================================================================
// 2. MENGAMBIL DATA BERITA SESUAI LIMIT HALAMAN
// =========================================================================
$sql_berita = "SELECT * FROM prodi_berita " . $where_clause . " ORDER BY tanggal_publikasi DESC, id DESC LIMIT $limit OFFSET $offset";
$q_berita = $koneksi->query($sql_berita);

if (!$q_berita) {
    die('<div class="alert alert-danger text-center shadow-sm m-4 p-4 rounded-4" data-aos="zoom-in">
            <i class="fas fa-database fa-3x mb-3 text-danger opacity-50"></i>
            <h5 class="fw-bold">Database Error (Pengambilan Data)</h5>
            <p class="mb-0 text-muted">' . $koneksi->error . '</p>
         </div>');
}
?>

<?php if ($q_berita->num_rows > 0): ?>
    
    <div class="row gx-4 justify-content-center">
        <?php 
        $delay = 0; // Inisialisasi delay animasi
        while ($row = $q_berita->fetch_assoc()): 
            $delay += 100; // Setiap kartu akan muncul lebih lambat 100ms dari kartu sebelumnya
        ?>
            <div class="col-lg-4 col-md-6 mb-5" data-aos="fade-up" data-aos-delay="<?= $delay ?>">
                <div class="card h-100 border-0 shadow-sm hover-lift rounded-4 overflow-hidden">
                    
                    <div style="position: relative;">
                        <img src="uploads/prodi/berita/<?= htmlspecialchars($row['gambar_thumbnail'] ?? '') ?>" class="card-img-top" alt="Gambar Berita" style="height: 200px; object-fit: cover;" onerror="this.src='/FINAL/assets/img/demo/demo-ocean-sm.jpg'">
                        
                        <span class="badge bg-primary text-uppercase position-absolute shadow-sm px-3 py-2" style="top:12px; left:12px; font-weight:700; border-radius:6px; letter-spacing:0.025rem;">
                            <?= htmlspecialchars(strtoupper($row['unit_kategori'] ?? 'Kabar Kampus')) ?>
                        </span>
                    </div>

                    <div class="card-body p-4 bg-white d-flex flex-column">
                        <div class="text-muted small fw-bold mb-2">
                            <i class="far fa-calendar-alt me-1 text-primary"></i> <?= date('d M Y', strtotime($row['tanggal_publikasi'] ?? date('Y-m-d'))) ?>
                        </div>
                        
                        <h5 class="card-title fw-bold text-dark mb-3" style="line-height:1.4;">
                            <a href="index.php?module=baca_berita&id=<?= $row['id'] ?>" class="text-dark text-decoration-none stretched-link">
                                <?= htmlspecialchars($row['judul']) ?>
                            </a>
                        </h5>
                        
                        <p class="card-text text-muted small mb-0" style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">
                            <?= strip_tags($row['konten']) ?>
                        </p>
                    </div>

                    <div class="card-footer px-4 py-3 bg-light border-top-0 d-flex align-items-center justify-content-between small">
                        <span class="text-muted"><i class="far fa-user me-1 text-primary"></i> Oleh: <span class="fw-bold"><?= htmlspecialchars($row['penulis'] ?? 'Admin') ?></span></span>
                        <span class="text-primary fw-bold">Baca <i class="fas fa-arrow-right ms-1"></i></span>
                    </div>

                </div>
            </div>
        <?php endwhile; ?>
    </div>

    <?php if ($total_pages > 1): ?>
        <style>
            .pagination-custom { display: flex; justify-content: center; align-items: center; gap: 0.75rem; margin-top: 1rem; padding-bottom: 2rem; }
            .btn-page { width: 45px; height: 45px; border-radius: 50%; background-color: #ffffff; color: #0d6efd; border: 1px solid #e9ecef; box-shadow: 0 2px 6px rgba(0,0,0,0.05); display: flex; align-items: center; justify-content: center; font-weight: 600; font-size: 1.1rem; text-decoration: none; transition: all 0.2s ease-in-out; padding: 0; }
            .btn-page:hover:not(:disabled):not(.active) { background-color: #f8f9fa; color: #0a58ca; transform: translateY(-2px); }
            .btn-page.active { background-color: #0d6efd; color: #ffffff; border-color: #0d6efd; box-shadow: 0 4px 10px rgba(13, 110, 253, 0.3); }
            .btn-page:disabled { background-color: #f8f9fa; color: #adb5bd; border-color: #f1f3f5; cursor: not-allowed; box-shadow: none; }
        </style>

        <div class="pagination-custom border-top pt-4" data-aos="fade-up">
            <button class="btn btn-page" onclick="gantiHalaman(<?= $page - 1 ?>)" <?= ($page <= 1) ? 'disabled' : '' ?>><i class="fas fa-chevron-left"></i></button>
            <?php for($i = 1; $i <= $total_pages; $i++): ?>
                <button class="btn btn-page <?= ($page == $i) ? 'active' : '' ?>" onclick="gantiHalaman(<?= $i ?>)"><?= $i ?></button>
            <?php endfor; ?>
            <button class="btn btn-page" onclick="gantiHalaman(<?= $page + 1 ?>)" <?= ($page >= $total_pages) ? 'disabled' : '' ?>><i class="fas fa-chevron-right"></i></button>
        </div>
    <?php endif; ?>

<?php else: ?>
    <div class="text-center py-5" data-aos="zoom-in">
        <div class="p-5 bg-light rounded-4 border border-1 border-dashed d-inline-block shadow-sm" style="max-width: 500px;">
            <i class="far fa-folder-open fa-4x text-muted opacity-25 mb-4"></i>
            <h4 class="fw-bold text-dark">Arsip Berita Kosong</h4>
            <p class="text-muted mb-0">Tidak ditemukan rekaman informasi publik untuk kata kunci atau kategori tersebut.</p>
        </div>
    </div>
<?php endif; ?>

<script>
    if (typeof AOS !== 'undefined') {
        AOS.init({
            duration: 800, // Durasi animasi (800ms)
            once: false,   // false = animasi akan mengulang terus setiap di-scroll atas/bawah
            offset: 50     // Jarak sebelum animasi ter-trigger
        });
        AOS.refresh();
    }
</script>