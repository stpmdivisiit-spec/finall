<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");

// Menarik data Peraturan Akademik
$q_akademik = $koneksi->query("SELECT * FROM sekretariat_arsip WHERE kategori_arsip = 'peraturan_akademik' ORDER BY tanggal DESC");

// (Opsional) Jika di backend Anda membuat kategori khusus regulasi kelembagaan, ubah ini. Jika tidak, ini bisa diisi manual atau mengambil kategori lain.
// Untuk saat ini, mari asumsikan kita punya kategori 'regulasi_kelembagaan' di database.
$q_lembaga = $koneksi->query("SELECT * FROM sekretariat_arsip WHERE kategori_arsip = 'regulasi_kelembagaan' ORDER BY tanggal DESC");
?>

<main>
    <header class="page-header page-header-dark bg-secondary pb-10">
        <div class="container-xl px-4">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title text-white">
                            <div class="page-header-icon text-white"><i data-feather="book-open"></i></div>
                            Peraturan Kampus
                        </h1>
                        <div class="page-header-subtitle text-white-50">Peraturan kelembagaan, akademik, dan ketertiban mahasiswa.</div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    
    <div class="container-xl px-4 mt-n10 mb-5">
        <div class="row gx-4">
            
            <div class="col-lg-6 mb-4">
                <div class="card shadow-sm border-0 h-100 rounded-4 border-top border-secondary border-4">
                    <div class="card-header bg-transparent border-bottom p-4">
                        <h5 class="fw-bold text-dark mb-0"><i class="fas fa-graduation-cap text-secondary me-2"></i>Regulasi Akademik</h5>
                    </div>
                    <div class="list-group list-group-flush">
                        <?php if($q_akademik->num_rows > 0): while($row = $q_akademik->fetch_assoc()): ?>
                            <div class="list-group-item p-4 d-flex justify-content-between align-items-center hover-bg-light transition-all">
                                <div>
                                    <h6 class="fw-bold text-dark mb-1"><?= htmlspecialchars($row['judul_arsip']) ?></h6>
                                    <p class="small text-muted mb-0" style="line-height:1.5;"><?= htmlspecialchars($row['keterangan']) ?></p>
                                </div>
                                <?php if(!empty($row['file_lampiran'])): ?>
                                    <a href="uploads/sekretariat/dokumen/<?= htmlspecialchars($row['file_lampiran']) ?>" target="_blank" download class="btn btn-outline-secondary btn-sm rounded-pill px-3 shadow-sm flex-shrink-0 ms-3 fw-bold">Unduh PDF</a>
                                <?php endif; ?>
                            </div>
                        <?php endwhile; else: ?>
                            <div class="p-4 text-center text-muted small fst-italic">Belum ada regulasi akademik yang dipublikasikan.</div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6 mb-4">
                <div class="card shadow-sm border-0 h-100 rounded-4 border-top border-dark border-4">
                    <div class="card-header bg-transparent border-bottom p-4">
                        <h5 class="fw-bold text-dark mb-0"><i class="fas fa-building text-dark me-2"></i>Regulasi Kelembagaan</h5>
                    </div>
                    <div class="list-group list-group-flush">
                        <?php if($q_lembaga->num_rows > 0): while($row = $q_lembaga->fetch_assoc()): ?>
                            <div class="list-group-item p-4 d-flex justify-content-between align-items-center hover-bg-light transition-all">
                                <div>
                                    <h6 class="fw-bold text-dark mb-1"><?= htmlspecialchars($row['judul_arsip']) ?></h6>
                                    <p class="small text-muted mb-0" style="line-height:1.5;"><?= htmlspecialchars($row['keterangan']) ?></p>
                                </div>
                                <?php if(!empty($row['file_lampiran'])): ?>
                                    <a href="uploads/sekretariat/dokumen/<?= htmlspecialchars($row['file_lampiran']) ?>" target="_blank" download class="btn btn-outline-dark btn-sm rounded-pill px-3 shadow-sm flex-shrink-0 ms-3 fw-bold">Unduh PDF</a>
                                <?php endif; ?>
                            </div>
                        <?php endwhile; else: ?>
                            <div class="list-group-item p-4 d-flex justify-content-between align-items-center hover-bg-light transition-all">
                                <div>
                                    <h6 class="fw-bold text-dark mb-1">Statuta STPM Santa Ursula</h6>
                                    <p class="small text-muted mb-0">Pedoman dasar penyelenggaraan Tridharma dan landasan hukum tata kelola kampus.</p>
                                </div>
                                <a href="#!" class="btn btn-outline-dark btn-sm rounded-pill px-3 shadow-sm flex-shrink-0 ms-3 fw-bold">Unduh PDF</a>
                            </div>
                            <div class="list-group-item p-4 d-flex justify-content-between align-items-center bg-light">
                                <div>
                                    <h6 class="fw-bold text-dark mb-1">Peraturan Pokok Kepegawaian</h6>
                                    <p class="small text-muted mb-0">Hak, kewajiban, tata tertib, serta penilaian kinerja pegawai di bawah naungan Yayasan.</p>
                                </div>
                                <a href="#!" class="btn btn-outline-dark btn-sm rounded-pill px-3 shadow-sm flex-shrink-0 ms-3 fw-bold">Unduh PDF</a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</main>
<style>.hover-bg-light:hover{background-color:#f8f9fa!important}</style>
<script>if (typeof feather !== 'undefined') feather.replace();</script>