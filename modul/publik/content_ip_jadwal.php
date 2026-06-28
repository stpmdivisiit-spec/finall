<?php
// AMBIL SEMUA DATA SEKALIGUS UNTUK ILMU PEMERINTAHAN
$query_jadwal = $koneksi->query("SELECT * FROM prodi_dokumen_akademik WHERE prodi = 'pemerintahan' AND kategori = 'jadwal' ORDER BY id DESC");
$query_buku   = $koneksi->query("SELECT * FROM prodi_dokumen_akademik WHERE prodi = 'pemerintahan' AND kategori = 'buku' ORDER BY id DESC");
$query_skripsi= $koneksi->query("SELECT * FROM prodi_dokumen_akademik WHERE prodi = 'pemerintahan' AND kategori = 'skripsi' ORDER BY id DESC");
?>
<main>
    <div class="bg-primary text-white pt-5 pb-10" style="min-height: 40vh;">
        <div class="container-xl px-4 pt-5">
            <h1 class="fw-bold text-white mb-2"><i class="fas fa-folder-open me-2"></i> Pusat Dokumen Akademik</h1>
            <p class="lead text-white-50">Unduh jadwal perkuliahan, buku pedoman akademik, dan panduan skripsi Ilmu Pemerintahan.</p>
        </div>
    </div>

    <div class="container-xl px-4 mt-n10 mb-5">
        
        <div class="row gx-4 mb-4">
            <div class="col-lg-4 mb-4">
                <div class="card shadow-lg border-0 h-100 bg-primary text-white text-center py-5 rounded-4">
                    <div class="card-body d-flex flex-column justify-content-center align-items-center">
                        <i class="fas fa-mobile-alt fa-4x mb-4 opacity-75"></i>
                        <h3 class="fw-bold mb-3 text-white">Integrasi SIAKAD</h3>
                        <p class="mb-5 text-white-50 px-3">Akses jadwal kelas dan ruangan Anda secara *real-time* melalui Sistem Informasi Akademik.</p>
                        <a href="https://siakad.stpmsanur.ac.id" target="_blank" class="btn btn-light text-primary fw-bold rounded-pill px-5 py-2 shadow-sm w-75">Login SIAKAD</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-8 mb-4">
                <div class="card shadow-sm border-0 h-100 rounded-4">
                    <div class="card-header bg-white border-bottom p-4">
                        <h5 class="fw-bold text-dark mb-0"><i class="far fa-calendar-alt text-primary me-2"></i> Jadwal Perkuliahan</h5>
                    </div>
                    <div class="card-body p-0">
                        <div class="list-group list-group-flush rounded-bottom-4">
                            <?php if($query_jadwal->num_rows > 0): ?>
                                <?php while($row = $query_jadwal->fetch_assoc()): ?>
                                <div class="list-group-item p-4 d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="fw-bold text-dark mb-1"><?= htmlspecialchars($row['judul_dokumen']) ?></h6>
                                        <p class="small text-muted mb-0">Revisi: <?= htmlspecialchars($row['keterangan']) ?></p>
                                    </div>
                                    <a href="uploads/akademik/<?= $row['file_dokumen'] ?>" target="_blank" class="btn btn-outline-primary rounded-circle shadow-sm" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;"><i class="fas fa-arrow-down"></i></a>
                                </div>
                                <?php endwhile; ?>
                            <?php else: ?>
                                <div class="p-4 text-center text-muted"><i class="fas fa-folder-open fa-2x mb-2 opacity-25"></i><br>Belum ada jadwal yang diunggah.</div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row gx-4">
            
            <div class="col-lg-6 mb-4">
                <div class="card shadow-sm border-0 h-100 rounded-4">
                    <div class="card-header bg-white border-bottom p-4">
                        <h5 class="fw-bold text-dark mb-0"><i class="fas fa-book text-primary me-2"></i> Buku Pedoman Akademik</h5>
                    </div>
                    <div class="card-body p-0">
                        <div class="list-group list-group-flush rounded-bottom-4">
                            <?php if($query_buku->num_rows > 0): ?>
                                <?php while($row = $query_buku->fetch_assoc()): ?>
                                <div class="list-group-item p-4 d-flex justify-content-between align-items-center bg-light">
                                    <div>
                                        <h6 class="fw-bold text-dark mb-1"><?= htmlspecialchars($row['judul_dokumen']) ?></h6>
                                        <p class="small text-muted mb-0">Tahun: <?= htmlspecialchars($row['keterangan']) ?></p>
                                    </div>
                                    <a href="uploads/akademik/<?= $row['file_dokumen'] ?>" target="_blank" class="btn btn-primary rounded-pill btn-sm px-3 shadow-sm"><i class="fas fa-download me-1"></i> Unduh</a>
                                </div>
                                <?php endwhile; ?>
                            <?php else: ?>
                                <div class="p-4 text-center text-muted">Belum ada buku akademik yang diunggah.</div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 mb-4">
                <div class="card shadow-sm border-0 h-100 rounded-4">
                    <div class="card-header bg-white border-bottom p-4">
                        <h5 class="fw-bold text-dark mb-0"><i class="fas fa-graduation-cap text-primary me-2"></i> Panduan Skripsi & Tugas Akhir</h5>
                    </div>
                    <div class="card-body p-0">
                        <div class="list-group list-group-flush rounded-bottom-4">
                            <?php if($query_skripsi->num_rows > 0): ?>
                                <?php while($row = $query_skripsi->fetch_assoc()): ?>
                                <div class="list-group-item p-4 d-flex justify-content-between align-items-center bg-light">
                                    <div>
                                        <h6 class="fw-bold text-dark mb-1"><?= htmlspecialchars($row['judul_dokumen']) ?></h6>
                                        <p class="small text-muted mb-0">Edisi: <?= htmlspecialchars($row['keterangan']) ?></p>
                                    </div>
                                    <a href="uploads/akademik/<?= $row['file_dokumen'] ?>" target="_blank" class="btn btn-primary rounded-pill btn-sm px-3 shadow-sm"><i class="fas fa-download me-1"></i> Unduh</a>
                                </div>
                                <?php endwhile; ?>
                            <?php else: ?>
                                <div class="p-4 text-center text-muted">Belum ada panduan skripsi yang diunggah.</div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</main>
<script>if (typeof feather !== 'undefined') feather.replace();</script>