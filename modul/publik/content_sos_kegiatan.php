<?php
$query = $koneksi->query("SELECT * FROM kema_kegiatan WHERE prodi='sosiatri' ORDER BY id DESC");
?>
<main>
    <div class="bg-success text-white pt-5 pb-10 text-center">
        <div class="container-xl px-4 pt-5">
            <h1 class="fw-bold text-white mb-2"><i class="fas fa-camera-retro me-2"></i> Geliat & Kegiatan Mahasiswa</h1>
            <p class="lead text-white-50">Dinamika pembelajaran di luar kelas, pelatihan, dan bakti kemasyarakatan.</p>
        </div>
    </div>
    <div class="container-xl px-4 mt-n10 mb-5">
        <div class="row gx-4">
            <?php if($query->num_rows > 0): while($row = $query->fetch_assoc()): ?>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card shadow-sm border-0 rounded-4 overflow-hidden h-100">
                    <img src="uploads/kemahasiswaan/<?= $row['file_gambar_webp'] ?>" class="card-img-top" style="height: 200px; object-fit: cover;">
                    <div class="card-body p-4 bg-white">
                        <span class="badge <?= ($row['kategori_kegiatan'] == 'Sosial') ? 'bg-danger' : 'bg-info' ?> bg-opacity-25 text-<?= ($row['kategori_kegiatan'] == 'Sosial') ? 'danger' : 'info' ?> rounded-pill mb-2 px-2 py-1"><?= $row['kategori_kegiatan'] ?></span>
                        <h6 class="fw-bold text-dark mb-2"><?= htmlspecialchars($row['nama_kegiatan']) ?></h6>
                        <p class="small text-muted mb-0" style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;"><?= htmlspecialchars($row['deskripsi']) ?></p>
                    </div>
                </div>
            </div>
            <?php endwhile; else: ?>
                <div class="col-12 text-center text-muted"><div class="card shadow-sm border-0 py-5">Belum ada dokumentasi kegiatan.</div></div>
            <?php endif; ?>
        </div>
    </div>
</main>