<?php $data = $koneksi->query("SELECT * FROM prodi_mitra_informasi WHERE prodi='pemerintahan' AND kategori='mitra_pemerintah'")->fetch_assoc(); ?>
<main>
    <div class="bg-success text-white pt-5 pb-10">
        <div class="container-xl px-4 pt-5">
            <h1 class="fw-bold mb-2"><i class="fas fa-map-marker-alt me-2"></i> Kemitraan Pemerintah & Desa</h1>
            <p class="lead text-white-50">Sinergi membangun daerah dari tingkat akar rumput.</p>
        </div>
    </div>
    <div class="container-xl px-4 mt-n10 mb-5">
        <div class="card shadow-sm border-0 rounded-4 mb-5">
            <div class="card-body p-5 d-flex align-items-center justify-content-between">
                <div class="pe-4">
                    <h4 class="fw-bold text-dark mb-3">Laboratorium Sosial Desa</h4>
                    <p class="text-muted mb-0"><?= htmlspecialchars($data['konten_utama'] ?? 'Data belum diatur.') ?></p>
                </div>
                <i class="fas fa-handshake fa-5x text-success opacity-50 d-none d-md-block"></i>
            </div>
        </div>

        <h5 class="fw-bold text-dark mb-4">Fokus Kerja Sama Desa</h5>
        <div class="row gx-4 text-center">
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm border-0 h-100 rounded-4 py-4 px-3">
                    <div class="card-body">
                        <div class="avatar-lg bg-success bg-opacity-25 rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 70px; height: 70px;">
                            <i class="fas fa-store fa-2x text-success"></i>
                        </div>
                        <h6 class="fw-bold text-dark mb-3">Pendampingan BUMDes</h6>
                        <p class="small text-muted mb-0">Inkubasi bisnis desa dan penguatan manajerial Badan Usaha Milik Desa agar mandiri secara ekonomi.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm border-0 h-100 rounded-4 py-4 px-3">
                    <div class="card-body">
                        <div class="avatar-lg bg-primary bg-opacity-25 rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 70px; height: 70px;">
                            <i class="fas fa-laptop-house fa-2x text-primary"></i>
                        </div>
                        <h6 class="fw-bold text-dark mb-3">Digitalisasi Desa</h6>
                        <p class="small text-muted mb-0">Membantu tata kelola arsip desa berbasis digital dan pembuatan profil desa berbasis web.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm border-0 h-100 rounded-4 py-4 px-3">
                    <div class="card-body">
                        <div class="avatar-lg bg-warning bg-opacity-25 rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 70px; height: 70px;">
                            <i class="fas fa-seedling fa-2x text-warning"></i>
                        </div>
                        <h6 class="fw-bold text-dark mb-3">Pengentasan Stunting</h6>
                        <p class="small text-muted mb-0">Program edukasi gizi dan sanitasi lingkungan bekerjasama dengan puskesmas dan aparat desa setempat.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>