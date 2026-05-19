<main>
    <header class="page-header page-header-dark bg-danger pb-10">
        <div class="container-xl px-4">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="shield"></i></div>
                            Pusat Pengaduan & Perlindungan
                        </h1>
                        <div class="page-header-subtitle">Kanal pelaporan indikasi pelanggaran akademik, fasilitas, perundungan, atau kekerasan seksual.</div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container-xl px-4 mt-n10 mb-5">
        <div class="row gx-4">
            <div class="col-lg-4 mb-4">
                <div class="card shadow-sm border-0 h-100 bg-dark text-white text-center p-5 d-flex flex-column justify-content-center">
                    <i class="fas fa-user-secret fa-4x mb-3 text-white-50"></i>
                    <h4 class="fw-bold">Identitas Anda Dijamin 100% Aman!</h4>
                    <p class="small text-white-50 mt-3 mb-0">Sistem pelaporan ini menganut prinsip <strong>Whistleblowing System</strong>. Institusi menjamin kerahasiaan identitas pelapor dari segala bentuk ancaman, intimidasi, maupun sanksi akademik.</p>
                </div>
            </div>
            
            <div class="col-lg-8 mb-4">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-header bg-transparent border-bottom p-4">
                        <h5 class="fw-bold text-dark mb-0">Formulir Pelaporan Daring</h5>
                    </div>
                    <div class="card-body p-4 p-md-5">
                        <form>
                            <div class="mb-3">
                                <label class="form-label small fw-bold text-muted">Kategori Aduan <span class="text-danger">*</span></label>
                                <select class="form-select bg-light" required>
                                    <option value="">-- Pilih Jenis Pelanggaran --</option>
                                    <option>Pelayanan Administrasi & Fasilitas Kampus</option>
                                    <option>Pungutan Liar / Korupsi</option>
                                    <option>Pelanggaran Etik Dosen / Staf</option>
                                    <option>Perundungan (Bullying) / Kekerasan Fisik</option>
                                    <option>Kekerasan Seksual (Satgas PPKS)</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label small fw-bold text-muted">Kronologi Kejadian <span class="text-danger">*</span></label>
                                <textarea class="form-control bg-light" rows="4" placeholder="Ceritakan secara detail: Apa yang terjadi, Kapan, Dimana, dan Siapa yang terlibat..." required></textarea>
                            </div>
                            <div class="mb-4">
                                <label class="form-label small fw-bold text-muted">Bukti Lampiran (Opsional)</label>
                                <input type="file" class="form-control bg-light" accept="image/*, .pdf">
                                <div class="form-text small">Unggah foto, rekaman layar, atau dokumen PDF sebagai bukti pendukung (Maks. 5MB).</div>
                            </div>
                            <div class="form-check mb-4">
                                <input class="form-check-input border-danger" type="checkbox" id="anonimCheck" checked>
                                <label class="form-check-label fw-bold text-danger small" for="anonimCheck">
                                    Kirim Laporan secara Anonim (Tanpa mencantumkan nama pelapor)
                                </label>
                            </div>
                            <button type="button" class="btn btn-danger px-4 rounded-pill shadow-sm"><i class="fas fa-paper-plane me-2"></i>Kirim Laporan Secara Aman</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script>if (typeof feather !== 'undefined') feather.replace();</script>