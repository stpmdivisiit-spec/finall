<main>
    <header class="page-header page-header-dark bg-secondary pb-10">
        <div class="container-xl px-4">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title text-white">
                            <div class="page-header-icon text-white"><i data-feather="file-text"></i></div>
                            Pengajuan Surat Keterangan
                        </h1>
                        <div class="page-header-subtitle text-white-50">Layanan permohonan surat administrasi akademik untuk mahasiswa aktif.</div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container-xl px-4 mt-n10 mb-5">
        <div class="row gx-4">
            <div class="col-lg-8 mb-4">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-header bg-transparent border-bottom p-4">
                        <h5 class="fw-bold text-dark mb-0">Formulir Permohonan Online</h5>
                    </div>
                    <div class="card-body p-4 p-md-5">
                        <form>
                            <div class="mb-3">
                                <label class="form-label small fw-bold text-muted">Jenis Surat yang Diajukan <span class="text-danger">*</span></label>
                                <select class="form-select bg-light" required>
                                    <option value="">-- Pilih Jenis Surat --</option>
                                    <option>Surat Keterangan Aktif Kuliah (Untuk Tunjangan Anak/Gaji)</option>
                                    <option>Surat Keterangan Berkelakuan Baik</option>
                                    <option>Surat Pengantar Izin Observasi / Pra-Penelitian</option>
                                    <option>Surat Pengantar Izin Riset (Skripsi)</option>
                                    <option>Surat Rekomendasi Beasiswa Eksternal</option>
                                </select>
                            </div>
                            <div class="row gx-3">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label small fw-bold text-muted">NIM <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control bg-light" placeholder="Masukkan NIM Anda" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label small fw-bold text-muted">Nama Lengkap <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control bg-light" placeholder="Nama sesuai ijazah" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label small fw-bold text-muted">Keperluan / Instansi Tujuan <span class="text-danger">*</span></label>
                                <textarea class="form-control bg-light" rows="3" placeholder="Contoh: Ditujukan kepada Kepala Bappeda Kab. Ende untuk pengurusan izin riset..." required></textarea>
                            </div>
                            <div class="mb-4">
                                <label class="form-label small fw-bold text-muted">Lampiran Bukti Pembayaran SPP Terakhir (PDF/JPG) <span class="text-danger">*</span></label>
                                <input type="file" class="form-control bg-light" required>
                            </div>
                            <button type="submit" class="btn btn-secondary px-4 rounded-pill shadow-sm"><i class="fas fa-paper-plane me-2"></i>Kirim Permohonan</button>
                        </form>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 mb-4">
                <div class="card shadow-sm border-0 h-100 bg-light text-center py-5">
                    <div class="card-body">
                        <i class="fas fa-info-circle fa-4x text-secondary mb-4 opacity-50"></i>
                        <h5 class="fw-bold text-dark">Informasi Layanan</h5>
                        <p class="small text-muted mb-4">Proses pencetakan dan penandatanganan surat memakan waktu maksimal <strong>1-2 Hari Kerja</strong> setelah permohonan disetujui. Pastikan Anda tidak memiliki tunggakan biaya SPP/BPP untuk memperlancar proses administrasi.</p>
                        <a href="/FINAL/index.php?module=sekre_layanan_status" class="btn btn-outline-secondary btn-sm rounded-pill px-3">Cek Status Pengajuan</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script>if (typeof feather !== 'undefined') feather.replace();</script>