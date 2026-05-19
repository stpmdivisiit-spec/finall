<main>
    <header class="page-header page-header-dark bg-teal pb-10" style="background-color: #20c997;">
        <div class="container-xl px-4">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title text-white">
                            <div class="page-header-icon text-white"><i data-feather="plus-square"></i></div>
                            Usulan Pengadaan Buku
                        </h1>
                        <div class="page-header-subtitle text-white-50">Saran penambahan koleksi buku demi mendukung kelancaran studi dan riset Anda.</div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container-xl px-4 mt-n10 mb-5">
        <div class="row gx-4 justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-sm border-0 mb-4">
                    <div class="card-body p-4 p-md-5">
                        <div class="text-center mb-4">
                            <i class="fas fa-book-medical fa-3x mb-3 opacity-50" style="color: #20c997;"></i>
                            <h4 class="fw-bold text-dark">Buku yang Anda cari tidak ada di OPAC?</h4>
                            <p class="text-muted small">Silakan usulkan judul buku referensi yang Anda butuhkan (khususnya terkait Ilmu Pemerintahan dan Pembangunan Sosial). UPT Perpustakaan akan mempertimbangkan usulan Anda pada periode pengadaan anggaran berikutnya.</p>
                        </div>
                        
                        <form>
                            <div class="row gx-3">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label small fw-bold text-muted">Judul Buku <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control bg-light" placeholder="Masukkan judul buku secara lengkap" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label small fw-bold text-muted">Nama Pengarang <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control bg-light" placeholder="Nama penulis utama" required>
                                </div>
                            </div>
                            <div class="row gx-3">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label small fw-bold text-muted">Penerbit</label>
                                    <input type="text" class="form-control bg-light" placeholder="Penerbit buku">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label small fw-bold text-muted">Tahun Terbit</label>
                                    <input type="number" class="form-control bg-light" placeholder="Misal: 2024">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label small fw-bold text-muted">ISBN (Jika tahu)</label>
                                    <input type="text" class="form-control bg-light" placeholder="978-xxx-xxxx">
                                </div>
                            </div>
                            <div class="mb-4">
                                <label class="form-label small fw-bold text-muted">Alasan / Kepentingan Usulan <span class="text-danger">*</span></label>
                                <textarea class="form-control bg-light" rows="3" placeholder="Contoh: Buku ini menjadi referensi wajib untuk Mata Kuliah XYZ..." required></textarea>
                            </div>
                            
                            <hr class="my-4">
                            <h6 class="fw-bold text-dark mb-3">Data Pengusul</h6>
                            <div class="row gx-3">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label small fw-bold text-muted">Nama Lengkap <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" required>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label class="form-label small fw-bold text-muted">Status <span class="text-danger">*</span></label>
                                    <select class="form-select" required>
                                        <option value="">-- Pilih --</option>
                                        <option>Mahasiswa</option>
                                        <option>Dosen</option>
                                        <option>Tenaga Kependidikan</option>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn text-white w-100 py-2 rounded-pill fw-bold shadow-sm" style="background-color: #20c997;">Kirim Usulan Buku</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script>if (typeof feather !== 'undefined') feather.replace();</script>