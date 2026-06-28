<?php $data = $koneksi->query("SELECT * FROM prodi_mitra_informasi WHERE prodi='pemerintahan' AND kategori='mitra_sosial'")->fetch_assoc(); ?>
<main>
    <div class="bg-success text-white pt-5 pb-10">
        <div class="container-xl px-4 pt-5">
            <h1 class="fw-bold mb-2"><i class="far fa-heart me-2"></i> Kemitraan Lembaga Sosial & Swasta</h1>
            <p class="lead text-white-50">Berkolaborasi dengan LSM, Panti Sosial, dan program CSR Perusahaan.</p>
        </div>
    </div>
    <div class="container-xl px-4 mt-n10 mb-5">
        <div class="row gx-4 mb-4">
            <div class="col-lg-6 mb-4">
                <div class="card shadow-sm border-0 h-100 rounded-4 bg-success text-white p-4">
                    <div class="card-body">
                        <i class="fas fa-globe-asia fa-2x mb-3 text-white-50"></i>
                        <h4 class="fw-bold mb-3">LSM / Non-Governmental Organization</h4>
                        <p class="mb-4 opacity-75"><?= htmlspecialchars($data['konten_utama'] ?? 'Data belum diatur.') ?></p>
                        <?php if(!empty($data['file_lampiran_1'])): ?>
                            <a href="uploads/mitra/<?= $data['file_lampiran_1'] ?>" target="_blank" class="fw-bold text-white text-decoration-none border-bottom pb-1 border-white">Daftar Mitra LSM <i class="fas fa-arrow-right ms-1"></i></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="card shadow-sm border-0 h-100 rounded-4 p-4">
                    <div class="card-body">
                        <i class="far fa-building fa-2x mb-3 text-success"></i>
                        <h4 class="fw-bold text-dark mb-3">Kemitraan CSR Swasta</h4>
                        <p class="text-muted mb-4"><?= htmlspecialchars($data['konten_tambahan_1'] ?? 'Data belum diatur.') ?></p>
                        <?php if(!empty($data['file_lampiran_2'])): ?>
                            <a href="uploads/mitra/<?= $data['file_lampiran_2'] ?>" target="_blank" class="fw-bold text-success text-decoration-none border-bottom pb-1 border-success">Portofolio Kemitraan CSR <i class="fas fa-arrow-right ms-1"></i></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="card shadow-sm border-0 rounded-pill px-4 py-2">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="fw-bold text-dark mb-1">Jaringan Yayasan Ursulin</h6>
                    <p class="small text-muted mb-0">Kerja sama internal antar lembaga pendidikan, panti asuhan, dan layanan sosial di bawah naungan tarekat Ursulin.</p>
                </div>
                <div class="avatar bg-success bg-opacity-25 rounded-circle d-flex justify-content-center align-items-center" style="width:40px;height:40px;"><i class="fas fa-cross text-success"></i></div>
            </div>
        </div>
    </div>
</main>