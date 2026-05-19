<main>
    <header class="page-header page-header-dark bg-teal pb-10" style="background-color: #20c997;">
        <div class="container-xl px-4">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title text-white">
                            <div class="page-header-icon text-white"><i data-feather="check-circle"></i></div>
                            Cek Status Peminjaman & Denda
                        </h1>
                        <div class="page-header-subtitle text-white-50">Lacak buku yang sedang Anda pinjam dan riwayat denda keterlambatan.</div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container-xl px-4 mt-n10 mb-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-sm border-0 mb-4">
                    <div class="card-body p-5 text-center">
                        <i class="fas fa-barcode fa-3x mb-3" style="color: #20c997;"></i>
                        <h3 class="fw-bold text-dark mb-2">Portal Pengecekan Cepat</h3>
                        <p class="text-muted mb-4">Masukkan Nomor Induk Mahasiswa (NIM) atau Nomor Anggota Perpustakaan Anda untuk melihat ringkasan status sirkulasi.</p>
                        
                        <form class="mb-5">
                            <div class="input-group input-group-lg shadow-sm rounded-pill overflow-hidden border">
                                <span class="input-group-text bg-white border-0"><i class="fas fa-id-card text-muted"></i></span>
                                <input type="text" class="form-control border-0 bg-white px-2" placeholder="Masukkan NIM (Contoh: 190xxxx)" aria-label="NIM">
                                <button class="btn text-white px-4 fw-bold" type="button" style="background-color: #20c997;">Cek Data</button>
                            </div>
                        </form>
                        
                        <div class="text-start border border-teal rounded p-0 overflow-hidden d-none" style="border-color: #20c997 !important;">
                            <div class="bg-light p-3 border-bottom d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="fw-bold text-dark">Data Anggota: Maria Goreti</div>
                                    <div class="small text-muted">NIM: 1902123 | Pembangunan Sosial</div>
                                </div>
                                <span class="badge bg-success">Status: AKTIF</span>
                            </div>
                            <div class="p-4">
                                <h6 class="fw-bold text-dark mb-3"><i class="fas fa-book-reader me-2" style="color: #20c997;"></i>Buku yang Sedang Dipinjam:</h6>
                                <ul class="list-group list-group-flush small mb-4">
                                    <li class="list-group-item px-0 d-flex justify-content-between align-items-center">
                                        <div>
                                            <strong>Pemberdayaan Masyarakat Pedesaan</strong><br>
                                            <span class="text-muted">Tgl Pinjam: 15 Mei 2026</span>
                                        </div>
                                        <div class="text-end">
                                            <span class="badge bg-warning text-dark mb-1">Jatuh Tempo: 22 Mei 2026</span><br>
                                            <span class="text-muted" style="font-size: 0.75rem;">Sisa 3 Hari</span>
                                        </div>
                                    </li>
                                </ul>
                                
                                <div class="alert alert-danger mb-0 py-2 border-0">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="small fw-bold"><i class="fas fa-exclamation-circle me-2"></i>Total Denda Belum Dibayar:</div>
                                        <div class="fw-bold">Rp 0,-</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script>if (typeof feather !== 'undefined') feather.replace();</script>