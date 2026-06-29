<?php
$stmt = $koneksi->prepare("SELECT konten FROM perpus_profil WHERE kategori = 'layanan'");
$stmt->execute();
$konten = $stmt->get_result()->fetch_assoc()['konten'] ?? '';

$lay = json_decode($konten, true) ?: [
    'tata_tertib' => ['Data belum diatur.'], 
    'jam_operasional' => [['hari' => '-', 'jam' => '-']], 
    'ketentuan_pinjam' => ['Data belum diatur.']
];
?>
<main>
    <header class="page-header page-header-dark bg-teal pb-10" style="background-color: #20c997;">
        <div class="container-xl px-4 pt-4">
            <h1 class="page-header-title text-white"><div class="page-header-icon text-white"><i class="fas fa-clock"></i></div> Jam Layanan & Tata Tertib</h1>
            <div class="page-header-subtitle text-white-50">Informasi operasional dan pedoman peminjaman koleksi perpustakaan.</div>
        </div>
    </header>

    <div class="container-xl px-4 mt-n10 mb-5">
        <div class="row">
            <div class="col-lg-4 mb-4">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-header bg-white fw-bold py-3"><i class="fas fa-info-circle text-teal me-2"></i> Informasi Layanan</div>
                    <div class="card-body p-3">
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <button class="nav-link active mb-2 text-start fw-bold" id="v-pills-tertib-tab" data-bs-toggle="pill" data-bs-target="#v-pills-tertib" type="button" role="tab"><i class="fas fa-list-ol me-2"></i> Tata Tertib Pemustaka</button>
                            <button class="nav-link mb-2 text-start fw-bold" id="v-pills-jam-tab" data-bs-toggle="pill" data-bs-target="#v-pills-jam" type="button" role="tab"><i class="fas fa-calendar-alt me-2"></i> Jam Operasional</button>
                            <button class="nav-link text-start fw-bold" id="v-pills-pinjam-tab" data-bs-toggle="pill" data-bs-target="#v-pills-pinjam" type="button" role="tab"><i class="fas fa-book-reader me-2"></i> Ketentuan Peminjaman</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-8 mb-4">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body p-5">
                        <div class="tab-content" id="v-pills-tabContent">
                            
                            <div class="tab-pane fade show active" id="v-pills-tertib" role="tabpanel">
                                <h4 class="fw-bold text-dark mb-4">Tata Tertib Pemustaka</h4>
                                <ul class="list-group list-group-flush text-muted">
                                    <?php foreach ($lay['tata_tertib'] as $tertib) : ?>
                                    <li class="list-group-item border-0 px-0 d-flex align-items-start">
                                        <i class="fas fa-check-circle mt-1 me-3 text-teal"></i>
                                        <span><?= htmlspecialchars($tertib) ?></span>
                                    </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>

                            <div class="tab-pane fade" id="v-pills-jam" role="tabpanel">
                                <h4 class="fw-bold text-dark mb-4">Jam Operasional Perpustakaan</h4>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead class="bg-light"><tr><th>Hari</th><th>Waktu Pelayanan</th></tr></thead>
                                        <tbody>
                                            <?php foreach ($lay['jam_operasional'] as $jam) : ?>
                                            <tr>
                                                <td class="fw-bold"><?= htmlspecialchars($jam['hari']) ?></td>
                                                <td><i class="fas fa-clock text-warning me-2"></i> <?= htmlspecialchars($jam['jam']) ?></td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="v-pills-pinjam" role="tabpanel">
                                <h4 class="fw-bold text-dark mb-4">Ketentuan Peminjaman Buku</h4>
                                <ul class="list-group list-group-flush text-muted">
                                    <?php foreach ($lay['ketentuan_pinjam'] as $pinjam) : ?>
                                    <li class="list-group-item border-0 px-0 d-flex align-items-start">
                                        <i class="fas fa-chevron-right mt-1 me-3 text-teal"></i>
                                        <span><?= htmlspecialchars($pinjam) ?></span>
                                    </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script>if (typeof feather !== 'undefined') feather.replace();</script>
<style>
/* CSS Tambahan khusus untuk Nav Pills agar match dengan desain STPM */
.nav-pills .nav-link { color: #495057; border-radius: 0.5rem; transition: all 0.2s; }
.nav-pills .nav-link:hover { background-color: #f8f9fa; }
.nav-pills .nav-link.active { background-color: #e6f9f4; color: #20c997; border-left: 4px solid #20c997; }
</style>