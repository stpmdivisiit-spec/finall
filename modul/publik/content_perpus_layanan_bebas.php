<main>
    <header class="page-header page-header-dark bg-teal pb-10">
        <div class="container-xl px-4">
            <div class="page-header-content pt-5">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title text-white fw-bold">
                            <i class="fas fa-file-contract me-3"></i>
                            Layanan Surat Bebas Pustaka
                        </h1>
                        <div class="page-header-subtitle text-white-50">Informasi persyaratan dan verifikasi status bebas pinjaman buku.</div>
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
                        <i class="fas fa-info-circle me-2"></i> Persyaratan
                    </div>
                    <div class="card-body pt-0 text-muted" style="font-size: 0.95rem;">
                        <p>Surat Keterangan Bebas Pustaka merupakan syarat wajib bagi mahasiswa STPM Santa Ursula untuk mengikuti ujian Yudisium dan Wisuda.</p>
                        <ul class="list-group list-group-flush mb-3">
                            <li class="list-group-item px-0 border-light"><i class="fas fa-check text-success me-2"></i> Tidak memiliki pinjaman buku.</li>
                            <li class="list-group-item px-0 border-light"><i class="fas fa-check text-success me-2"></i> Tidak memiliki denda keterlambatan.</li>
                            <li class="list-group-item px-0 border-light"><i class="fas fa-check text-success me-2"></i> Menyerahkan hardcopy & softcopy Skripsi.</li>
                        </ul>
                        <a href="#" class="btn btn-teal w-100 rounded-pill"><i class="fas fa-download me-1"></i> Unduh Formulir</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-8 mb-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-header bg-white py-3 border-bottom-0">
                        <h5 class="fw-bold text-dark mb-0">Cek Status Bebas Pustaka</h5>
                        <small class="text-muted">Ketik NIM atau Nama Anda pada kolom pencarian di bawah ini.</small>
                    </div>
                    <div class="card-body pt-0">
                        <div class="table-responsive">
                            <table class="table table-hover table-striped" id="datatablesSimple">
                                <thead class="bg-light text-dark">
                                    <tr>
                                        <th>NIM</th>
                                        <th>Nama Lengkap</th>
                                        <th>Program Studi</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Mengambil data secara dinamis dari database (dikelola oleh backend)
                                    $query = $koneksi->query("SELECT nim, nama_mahasiswa, program_studi FROM perpus_layanan_bebas ORDER BY tanggal_terbit DESC");
                                    while ($row = $query->fetch_assoc()) :
                                    ?>
                                    <tr>
                                        <td class="fw-bold text-teal"><?= htmlspecialchars($row['nim']) ?></td>
                                        <td><?= htmlspecialchars($row['nama_mahasiswa']) ?></td>
                                        <td><?= htmlspecialchars($row['program_studi']) ?></td>
                                        <td><span class="badge bg-success rounded-pill px-3"><i class="fas fa-check-circle me-1"></i> Tervalidasi</span></td>
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