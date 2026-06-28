<?php
$data = $koneksi->query("SELECT * FROM kema_hmps WHERE prodi='sosiatri'")->fetch_assoc();
?>
<main>
    <div class="bg-success text-white pt-5 pb-10">
        <div class="container-xl px-4 pt-5">
            <h1 class="fw-bold text-white mb-2"><i class="fas fa-user-friends me-2"></i> Himpunan Mahasiswa Program Studi (HMPS)</h1>
            <p class="lead text-white-50">Wadah aspirasi, kreativitas, dan pengembangan kepemimpinan mahasiswa Pembangunan Sosial.</p>
        </div>
    </div>

    <div class="container-xl px-4 mt-n10 mb-5">
        <div class="row gx-4">
            <div class="col-lg-7 mb-4">
                <div class="card shadow-sm border-0 h-100 rounded-4">
                    <div class="card-body p-5">
                        <span class="badge bg-success bg-opacity-25 text-success rounded-pill px-3 py-2 mb-3">Tentang Organisasi</span>
                        <h3 class="fw-bold text-dark mb-4">HMPS Pembangunan Sosial</h3>
                        <p class="text-muted mb-4"><?= nl2br(htmlspecialchars($data['deskripsi'] ?? 'Deskripsi belum tersedia.')) ?></p>
                        <hr class="mb-4">
                        <h6 class="fw-bold text-success mb-3"><i class="fas fa-bullseye me-2"></i> Fokus Program Kerja</h6>
                        <div class="text-muted editor-content-success">
                            <?= $data['fokus_program'] ?? '<p>Belum ada data.</p>' ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 mb-4">
                <div class="card shadow-sm border-0 h-100 rounded-4 text-center py-5 bg-light">
                    <div class="card-body d-flex flex-column justify-content-center align-items-center">
                        <i class="fas fa-sitemap fa-4x text-success mb-4"></i>
                        <h4 class="fw-bold text-dark mb-3">Struktur Pengurus</h4>
                        <p class="small text-muted mb-4 px-4">Kepengurusan HMPS Pembangunan Sosial dirombak setiap satu tahun akademik melalui Pemilihan Raya (Pemira).</p>
                        <?php if(!empty($data['file_struktur'])): ?>
                            <a href="uploads/kemahasiswaan/<?= $data['file_struktur'] ?>" target="_blank" class="btn btn-success rounded-pill px-5 fw-bold shadow-sm">Lihat Bagan Struktur</a>
                        <?php else: ?>
                            <button class="btn btn-secondary rounded-pill px-5 fw-bold" disabled>Bagan Belum Tersedia</button>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<style>.editor-content-success ul { padding-left: 1.5rem; } .editor-content-success li { margin-bottom: 0.5rem; }</style>