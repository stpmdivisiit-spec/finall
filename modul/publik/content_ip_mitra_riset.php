<?php $data = $koneksi->query("SELECT * FROM prodi_mitra_informasi WHERE prodi='pemerintahan' AND kategori='mitra_penelitian'")->fetch_assoc(); ?>
<main>
    <div class="bg-success text-white pt-5 pb-10">
        <div class="container-xl px-4 pt-5">
            <h1 class="fw-bold mb-2"><i class="fas fa-share-alt me-2"></i> Kerja Sama Penelitian</h1>
            <p class="lead text-white-50">Sinergi riset lintas perguruan tinggi dan pertukaran data antar lembaga.</p>
        </div>
    </div>
    <div class="container-xl px-4 mt-n10 mb-5">
        <div class="row gx-4">
            <div class="col-lg-4 mb-4">
                <div class="card shadow-sm border-0 h-100 rounded-4 py-5 text-center bg-light">
                    <div class="card-body">
                        <i class="fas fa-microscope fa-4x text-success mb-4 opacity-75"></i>
                        <h4 class="fw-bold text-dark mb-3">Joint Research</h4>
                        <p class="text-muted small px-3"><?= htmlspecialchars($data['konten_utama'] ?? 'Data belum diatur.') ?></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 mb-4">
                <div class="card shadow-sm border-0 h-100 rounded-4">
                    <div class="card-header bg-white border-bottom p-4">
                        <h5 class="fw-bold text-dark mb-0"><i class="fas fa-clipboard-check text-success me-2"></i> Ruang Lingkup Kemitraan Riset</h5>
                    </div>
                    <div class="card-body p-4 p-md-5">
                        <div class="editor-content-success text-muted mb-4">
                            <?= $data['konten_tambahan_1'] ?? '<p>Belum ada data.</p>' ?>
                        </div>
                        <?php if(!empty($data['file_lampiran_1'])): ?>
                            <a href="uploads/mitra/<?= $data['file_lampiran_1'] ?>" target="_blank" class="btn btn-outline-dark rounded-pill px-4 shadow-sm">Download Draft MoU Riset</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<style>.editor-content-success ul { list-style-type: none; padding-left: 0; } .editor-content-success li { position: relative; padding-left: 2rem; margin-bottom: 1rem; border-bottom: 1px solid #f8f9fa; padding-bottom: 0.5rem; } .editor-content-success li::before { content: "\f00c"; font-family: "Font Awesome 5 Free"; font-weight: 900; color: #198754; position: absolute; left: 0; top: 2px; font-size: 1.1rem; }</style>