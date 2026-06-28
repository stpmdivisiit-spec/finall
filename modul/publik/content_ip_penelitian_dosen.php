<?php
// AMBIL SEMUA DATA SEKALIGUS UNTUK ILMU PEMERINTAHAN
$query_dosen = $koneksi->query("SELECT * FROM prodi_riset_abdimas WHERE prodi = 'pemerintahan' AND kategori = 'penelitian_dosen' ORDER BY tahun DESC LIMIT 10");
$query_mhs   = $koneksi->query("SELECT * FROM prodi_riset_abdimas WHERE prodi = 'pemerintahan' AND kategori = 'riset_mahasiswa' ORDER BY tahun DESC LIMIT 10");
$query_abdimas = $koneksi->query("SELECT * FROM prodi_riset_abdimas WHERE prodi = 'pemerintahan' AND kategori = 'abdimas' ORDER BY tahun DESC LIMIT 10");
?>
<main>
    <div class="bg-primary text-white pt-5 pb-10" style="min-height: 40vh;">
        <div class="container-xl px-4 pt-5">
            <h1 class="fw-bold text-white mb-2"><i class="fas fa-search me-2"></i> Penelitian & Pengabdian</h1>
            <p class="lead text-white-50">Karya ilmiah, riset terapan, dan pengabdian masyarakat Ilmu Pemerintahan.</p>
        </div>
    </div>

    <div class="container-xl px-4 mt-n10 mb-5">
        <div class="row gx-4">
            
            <div class="col-lg-4 mb-4">
                <div class="card shadow-lg border-0 h-100 rounded-4 text-center py-5">
                    <div class="card-body d-flex flex-column justify-content-center align-items-center">
                        <i class="fas fa-map-marked-alt fa-4x mb-4 text-primary opacity-75"></i>
                        <h4 class="fw-bold mb-3 text-dark">Roadmap Penelitian</h4>
                        <p class="mb-5 text-muted px-3">Fokus riset berpusat pada: Inovasi Kebijakan Publik, Kapasitas Aparatur Desa, dan Penguatan Demokrasi Lokal.</p>
                        <a href="#!" class="btn btn-outline-primary fw-bold rounded-pill px-5 py-2 shadow-sm w-75">Lihat Roadmap</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-8 mb-4">
                <div class="card shadow-sm border-0 h-100 rounded-4">
                    <div class="card-header bg-white border-bottom p-4">
                        <h5 class="fw-bold text-dark mb-0"><i class="fas fa-flask text-primary me-2"></i> Hibah & Proyek Riset Terkini</h5>
                    </div>
                    
                    <div class="card-body p-0">
                        <ul class="nav nav-tabs nav-justified border-bottom-0 pt-2 px-2" id="risetTabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active fw-bold border-0 text-primary border-bottom border-primary border-3 bg-light" id="dosen-tab" data-bs-toggle="tab" data-bs-target="#dosen" type="button" role="tab">Riset Dosen</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link fw-bold border-0 text-muted" id="mhs-tab" data-bs-toggle="tab" data-bs-target="#mhs" type="button" role="tab">Riset Mahasiswa</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link fw-bold border-0 text-muted" id="abdimas-tab" data-bs-toggle="tab" data-bs-target="#abdimas" type="button" role="tab">Pengabdian</button>
                            </li>
                        </ul>

                        <div class="tab-content" id="risetTabsContent">
                            
                            <div class="tab-pane fade show active" id="dosen" role="tabpanel">
                                <div class="list-group list-group-flush rounded-bottom-4 pt-2">
                                    <?php if($query_dosen->num_rows > 0): while($row = $query_dosen->fetch_assoc()): ?>
                                    <div class="list-group-item p-4">
                                        <h6 class="fw-bold text-dark mb-1"><?= htmlspecialchars($row['judul']) ?></h6>
                                        <div class="small text-muted mb-2">
                                            <i class="fas fa-user text-primary me-1"></i> Peneliti Utama: <?= htmlspecialchars($row['personil_utama']) ?> | 
                                            <i class="far fa-calendar-alt text-primary mx-1"></i> Tahun: <?= $row['tahun'] ?>
                                        </div>
                                        <a href="uploads/riset_abdimas/<?= $row['file_dokumen'] ?>" target="_blank" class="badge bg-primary text-white text-decoration-none px-3 py-2 rounded-pill"><i class="fas fa-download me-1"></i> Unduh Jurnal/Laporan</a>
                                    </div>
                                    <?php endwhile; else: ?>
                                        <div class="p-4 text-center text-muted">Belum ada data riset dosen.</div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="mhs" role="tabpanel">
                                <div class="list-group list-group-flush rounded-bottom-4 pt-2">
                                    <?php if($query_mhs->num_rows > 0): while($row = $query_mhs->fetch_assoc()): ?>
                                    <div class="list-group-item p-4">
                                        <h6 class="fw-bold text-dark mb-1"><?= htmlspecialchars($row['judul']) ?></h6>
                                        <div class="small text-muted mb-2">
                                            <i class="fas fa-user-graduate text-primary me-1"></i> Mahasiswa: <?= htmlspecialchars($row['personil_utama']) ?> | 
                                            <i class="fas fa-chalkboard-teacher text-primary mx-1"></i> Pembimbing: <?= htmlspecialchars($row['personil_pendamping']) ?>
                                        </div>
                                        <a href="uploads/riset_abdimas/<?= $row['file_dokumen'] ?>" target="_blank" class="badge bg-primary text-white text-decoration-none px-3 py-2 rounded-pill"><i class="fas fa-download me-1"></i> Unduh Laporan</a>
                                    </div>
                                    <?php endwhile; else: ?>
                                        <div class="p-4 text-center text-muted">Belum ada data riset mahasiswa.</div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="abdimas" role="tabpanel">
                                <div class="list-group list-group-flush rounded-bottom-4 pt-2">
                                    <?php if($query_abdimas->num_rows > 0): while($row = $query_abdimas->fetch_assoc()): ?>
                                    <div class="list-group-item p-4">
                                        <h6 class="fw-bold text-dark mb-1"><?= htmlspecialchars($row['judul']) ?></h6>
                                        <div class="small text-muted mb-2">
                                            <i class="fas fa-map-marker-alt text-danger me-1"></i> Lokasi: <span class="fw-bold text-dark"><?= htmlspecialchars($row['keterangan_lokasi']) ?></span> | 
                                            <i class="far fa-calendar-alt text-primary mx-1"></i> Tahun: <?= $row['tahun'] ?>
                                        </div>
                                        <a href="uploads/riset_abdimas/<?= $row['file_dokumen'] ?>" target="_blank" class="badge bg-primary text-white text-decoration-none px-3 py-2 rounded-pill"><i class="fas fa-download me-1"></i> Unduh Laporan</a>
                                    </div>
                                    <?php endwhile; else: ?>
                                        <div class="p-4 text-center text-muted">Belum ada data pengabdian masyarakat.</div>
                                    <?php endif; ?>
                                </div>
                            </div>

                        </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script>
    if (typeof feather !== 'undefined') feather.replace();
    // Script sederhana untuk styling tab saat diklik
    document.querySelectorAll('#risetTabs .nav-link').forEach(tab => {
        tab.addEventListener('click', function() {
            document.querySelectorAll('#risetTabs .nav-link').forEach(t => {
                t.classList.remove('text-primary', 'border-bottom', 'border-primary', 'border-3', 'bg-light');
                t.classList.add('text-muted');
            });
            this.classList.remove('text-muted');
            this.classList.add('text-primary', 'border-bottom', 'border-primary', 'border-3', 'bg-light');
        });
    });
</script>