<?php
// Tarik data galeri Pembangunan Sosial
$query = $koneksi->query("SELECT * FROM prodi_publikasi_visual WHERE prodi='sosiatri' AND kategori='galeri' ORDER BY tanggal_kegiatan DESC, id DESC");
?>
<main>
    <div class="bg-success text-white pt-5 pb-10 text-center" style="min-height: 40vh;">
        <div class="container-xl px-4 pt-5">
            <h1 class="fw-bold text-white mb-2"><i class="far fa-images me-2"></i> Galeri Kegiatan Prodi</h1>
            <p class="lead text-white-50">Dokumentasi kegiatan abdimas, kuliah lapangan, dan aktivitas mahasiswa.</p>
        </div>
    </div>

    <div class="container-xl px-4 mt-n10 mb-5">
        <div class="galeri-grid">
            <?php if($query->num_rows > 0): ?>
                <?php while($row = $query->fetch_assoc()): ?>
                <div class="galeri-item card shadow-sm border-0 rounded-4 overflow-hidden h-100">
                    <div class="galeri-img-wrapper bg-light">
                        <img src="uploads/visual/<?= $row['file_gambar_webp'] ?>" class="galeri-img" loading="lazy" alt="<?= htmlspecialchars($row['judul']) ?>">
                    </div>
                    <div class="card-body p-4 bg-white">
                        <h6 class="fw-bold text-dark mb-2"><?= htmlspecialchars($row['judul']) ?></h6>
                        <p class="small text-muted mb-3 line-clamp-2"><?= htmlspecialchars($row['deskripsi_issn']) ?></p>
                        <div class="small fw-bold text-success">
                            <i class="far fa-calendar-alt me-1"></i> <?= date('d F Y', strtotime($row['tanggal_kegiatan'])) ?>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
            <?php else: ?>
                <div class="col-12 text-center text-muted py-5" style="grid-column: 1 / -1;">
                    <i class="far fa-image fa-4x mb-3 opacity-25"></i>
                    <h5>Belum ada dokumentasi galeri.</h5>
                </div>
            <?php endif; ?>
        </div>
    </div>
</main>

<style>
    .galeri-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 1.5rem; align-items: stretch; }
    .galeri-item { transition: transform 0.3s ease, box-shadow 0.3s ease; }
    .galeri-item:hover { transform: translateY(-5px); box-shadow: 0 1rem 3rem rgba(0,0,0,.15) !important; }
    .galeri-img-wrapper { height: 220px; overflow: hidden; position: relative; }
    .galeri-img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s ease; }
    .galeri-item:hover .galeri-img { transform: scale(1.08); }
    .line-clamp-2 { display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; }
</style>
<script>if (typeof feather !== 'undefined') feather.replace();</script>