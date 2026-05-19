<?php
// Ambil koneksi database sejati (Mundur 2 tingkat dari subfolder menuju root)
require_once "../../config/koneksi.php";

$limit = 6; // Menampilkan 6 berita per halaman portal
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($page < 1) $page = 1;
$offset = ($page - 1) * $limit;

$keyword = isset($_GET['keyword']) ? trim($_GET['keyword']) : '';
$unit = isset($_GET['unit']) ? trim($_GET['unit']) : '';

$cari_aman = $koneksi->real_escape_string($keyword);
$unit_aman = $koneksi->real_escape_string($unit);

// 1. Membangun Klausa SQL Dinamis Berdasarkan Kombinasi Filter Keyword & Unit Kerja
$kondisi = array();

if (!empty($cari_aman)) {
    $kondisi[] = " (judul LIKE '%$cari_aman%' OR konten LIKE '%$cari_aman%' OR penulis LIKE '%$cari_aman%') ";
}

// =========================================================================
// PERBAIKAN ERROR: 
// Saya menonaktifkan sementara filter unit ini agar tidak terjadi error.
// Jika Anda ingin fitur Tab Filter Unit-nya bekerja, silakan buat dulu kolom 
// 'unit_kategori' (VARCHAR) di dalam tabel 'prodi_berita' via PhpMyAdmin,
// lalu HAPUS TANDA KOMENTAR (//) pada baris kode di bawah ini:
// =========================================================================

if (!empty($unit_aman)) {
    $kondisi[] = " unit_kategori = '$unit_aman' ";
}


$where_clause = "";
if (count($kondisi) > 0) {
    $where_clause = " WHERE " . implode(" AND ", $kondisi);
}

// 2. Hitung Total Berita untuk Menentukan Sisa Pagination
$sql_count = "SELECT COUNT(*) AS total FROM prodi_berita" . $where_clause;
$q_total = $koneksi->query($sql_count);

// PENANGKAP ERROR SQL: Agar jika ada salah kolom, tidak error putih, melainkan pesan jelas
if (!$q_total) {
    echo '<div class="col-12"><div class="alert alert-danger text-center shadow-sm p-4 rounded-3">';
    echo '<h5 class="fw-bold"><i class="fas fa-exclamation-triangle me-2 text-danger"></i>Kesalahan Struktur Database</h5>';
    echo '<p class="mb-0 text-muted">Query gagal dijalankan: <strong>' . $koneksi->error . '</strong></p>';
    echo '</div></div>';
    exit;
}

$total_data = $q_total->fetch_assoc()['total'];
$total_pages = ceil($total_data / $limit);

// 3. Tarik Data Berita Berdasarkan Aturan Batas Offset Limit
$q_berita = $koneksi->query("SELECT * FROM prodi_berita " . $where_clause . " ORDER BY id DESC LIMIT $limit OFFSET $offset");
?>

<div class="row gx-4 mt-2">
    <?php if($q_berita && $q_berita->num_rows > 0): ?>
        <?php while($b = $q_berita->fetch_assoc()): ?>
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100 shadow-sm border-0 rounded-3 overflow-hidden lift">
                <div style="position: relative;">
                    <img class="card-img-top" src="uploads/prodi/berita/<?= htmlspecialchars($b['gambar_thumbnail'] ?? '') ?>" alt="Thumbnail" style="height: 190px; object-fit: cover;" onerror="this.src='/FINAL/assets/img/demo/demo-ocean-sm.jpg'">
                    <span class="badge bg-primary text-uppercase position-absolute shadow-sm px-2 py-1" style="top:12px; left:12px; font-size:0.65rem; font-weight:700; border-radius:4px; letter-spacing:0.025rem;">
                        <?= htmlspecialchars($b['unit_kategori'] ?? 'Kabar Kampus') ?>
                    </span>
                </div>
                <div class="card-body p-4">
                    <div class="text-xs text-muted mb-2">
                        <i class="far fa-calendar-alt me-1"></i> <?= date('d M Y', strtotime($b['tanggal_publikasi'] ?? date('Y-m-d'))) ?>
                    </div>
                    <a class="text-decoration-none link-dark stretched-link" href="index.php?module=baca_berita&id=<?= $b['id'] ?>">
                        <h5 class="card-title mb-2 fw-bold text-dark text-hover-primary" style="line-height:1.4; font-size:1.05rem;">
                            <?= htmlspecialchars(substr($b['judul'], 0, 60)) ?><?= (strlen($b['judul']) > 60) ? '...' : '' ?>
                        </h5>
                    </a>
                    <p class="card-text text-muted small mb-0">
                        <?= substr(strip_tags($b['konten']), 0, 100) ?>...
                    </p>
                </div>
                <div class="card-footer px-4 py-3 bg-transparent border-top-0 pt-0 text-muted d-flex align-items-center justify-content-between" style="font-size: 0.75rem;">
                    <span><i class="far fa-user me-1"></i> Oleh: <strong><?= htmlspecialchars($b['penulis'] ?? 'Admin') ?></strong></span>
                    <span class="text-primary fw-bold">Selengkapnya <i class="fas fa-chevron-right ms-1" style="font-size:0.7em;"></i></span>
                </div>
            </div>
        </div>
        <?php endwhile; ?>
    <?php else: ?>
        <div class="col-12 text-center py-5">
            <div class="p-5 bg-light rounded-3 border border-1 border-dashed">
                <i class="fas fa-folder-open fa-3x mb-3 text-gray-300"></i>
                <h5 class="text-gray-700 fw-bold">Arsip Berita Kosong</h5>
                <p class="text-muted small mb-0">Tidak ditemukan rekaman informasi publik untuk kata kunci pencarian tersebut.</p>
            </div>
        </div>
    <?php endif; ?>
</div>

<?php if ($total_pages > 1): ?>
<div class="d-flex justify-content-center border-top pt-4 mt-2">
    <nav>
        <ul class="pagination pagination-primary mb-0 gap-1 shadow-none">
            <li class="page-item <?= ($page <= 1) ? 'disabled' : '' ?>">
                <button class="page-link rounded-circle border-0 d-flex align-items-center justify-content-center" style="width:36px; height:36px;" onclick="jalankanMesinAjax('<?= htmlspecialchars($keyword, ENT_QUOTES) ?>', '<?= htmlspecialchars($unit, ENT_QUOTES) ?>', <?= $page - 1 ?>)" aria-label="Previous">
                    <i class="fas fa-chevron-left" style="font-size:0.8rem;"></i>
                </button>
            </li>
            
            <?php for($i = 1; $i <= $total_pages; $i++): ?>
                <li class="page-item <?= ($page == $i) ? 'active' : '' ?>">
                    <button class="page-link rounded-circle border-0 d-flex align-items-center justify-content-center fw-bold" style="width:36px; height:36px; font-size:0.85rem;" onclick="jalankanMesinAjax('<?= htmlspecialchars($keyword, ENT_QUOTES) ?>', '<?= htmlspecialchars($unit, ENT_QUOTES) ?>', <?= $i ?>)"><?= $i ?></button>
                </li>
            <?php endfor; ?>

            <li class="page-item <?= ($page >= $total_pages) ? 'disabled' : '' ?>">
                <button class="page-link rounded-circle border-0 d-flex align-items-center justify-content-center" style="width:36px; height:36px;" onclick="jalankanMesinAjax('<?= htmlspecialchars($keyword, ENT_QUOTES) ?>', '<?= htmlspecialchars($unit, ENT_QUOTES) ?>', <?= $page + 1 ?>)" aria-label="Next">
                    <i class="fas fa-chevron-right" style="font-size:0.8rem;"></i>
                </button>
            </li>
        </ul>
    </nav>
</div>
<?php endif; ?>