<main>
    <header class="page-header page-header-dark bg-teal pb-10">
        <div class="container-xl px-4">
            <div class="page-header-content pt-5">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title text-white fw-bold">
                            <i class="fas fa-bookmark me-3"></i>
                            Layanan Referensi
                        </h1>
                        <div class="page-header-subtitle text-white-50">Pusat tautan literatur, jurnal ilmiah, dan panduan akademik digital.</div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container-xl px-4 mt-n10 mb-5">
        <div class="row">
            <div class="col-lg-4 mb-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-header bg-white fw-bold text-teal py-3 border-bottom-0">
                        <i class="fas fa-info-circle me-2"></i> Panduan Penggunaan
                    </div>
                    <div class="card-body pt-0 text-muted" style="font-size: 0.95rem;">
                        <p>Layanan Referensi Perpustakaan STPM Santa Ursula menyediakan kumpulan tautan penting untuk mendukung riset dan penulisan karya ilmiah kamu.</p>
                        <ul class="list-group list-group-flush mb-3">
                            <li class="list-group-item px-0 border-light"><i class="fas fa-book-open text-primary me-2"></i> Akses Jurnal Nasional & Internasional.</li>
                            <li class="list-group-item px-0 border-light"><i class="fas fa-search text-primary me-2"></i> Pencarian Repositori Akademik.</li>
                            <li class="list-group-item px-0 border-light"><i class="fas fa-atlas text-primary me-2"></i> Panduan Sitasi dan Plagiarisme.</li>
                        </ul>
                        <p class="small text-dark mt-2 mb-0 fw-bold">Butuh Bantuan Lebih Lanjut?</p>
                        <p class="small">Hubungi staf perpustakaan untuk konsultasi penelusuran literatur secara langsung di ruang layanan.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-8 mb-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-header bg-white py-3 border-bottom-0">
                        <h5 class="fw-bold text-dark mb-0">Direktori Tautan Referensi</h5>
                        <small class="text-muted">Ketik kata kunci (misal: "Jurnal" atau "Google") pada kolom pencarian.</small>
                    </div>
                    <div class="card-body pt-0">
                        <div class="table-responsive">
                            <table class="table table-hover table-striped" id="datatablesSimple">
                                <thead class="bg-light text-dark">
                                    <tr>
                                        <th>Kategori</th>
                                        <th>Sumber / Judul</th>
                                        <th>Deskripsi Singkat</th>
                                        <th class="text-center">Akses</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Mengambil data secara dinamis dari database
                                    $query = $koneksi->query("SELECT * FROM perpus_layanan_referensi ORDER BY jenis_referensi ASC, judul_referensi ASC");
                                    while ($row = $query->fetch_assoc()) :
                                    ?>
                                    <tr>
                                        <td class="small fw-bold text-secondary"><?= htmlspecialchars($row['jenis_referensi']) ?></td>
                                        <td class="fw-bold text-teal"><?= htmlspecialchars($row['judul_referensi']) ?></td>
                                        <td class="small"><?= htmlspecialchars($row['deskripsi']) ?></td>
                                        <td class="text-center">
                                            <a href="<?= htmlspecialchars($row['link_tautan']) ?>" target="_blank" rel="noopener noreferrer" class="btn btn-sm btn-outline-teal rounded-pill px-3 shadow-sm">
                                                Buka <i class="fas fa-arrow-right ms-1"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script>if (typeof feather !== 'undefined') feather.replace();</script>