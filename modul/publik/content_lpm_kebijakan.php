<?php
// Ambil dokumen terbaru untuk Kebijakan Mutu
$query_dok = $koneksi->query("SELECT * FROM lpm_dokumen WHERE kategori = 'kebijakan_mutu' ORDER BY tanggal_upload DESC, id DESC LIMIT 1");
$dokumen = $query_dok->fetch_assoc();

$link_unduh = "#!";
$teks_tombol = "Dokumen Belum Tersedia";

if ($dokumen && !empty($dokumen['file_dokumen'])) {
    $link_unduh = "uploads/lpm/dokumen/" . $dokumen['file_dokumen'];
    $teks_tombol = "Unduh SK Kebijakan Mutu";
}
?>
<main>
    <header class="page-header page-header-dark bg-dark pb-10">
        <div class="container-xl px-4">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title text-white">
                            <div class="page-header-icon text-white"><i data-feather="shield"></i></div>
                            Kebijakan Mutu SPMI
                        </h1>
                        <div class="page-header-subtitle text-white-50">Komitmen puncak STPM Santa Ursula dalam budaya mutu berkelanjutan.</div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container-xl px-4 mt-n10 mb-5">
        <div class="card shadow-sm border-0 mb-4 border-top border-info border-3">
            <div class="card-body p-5">
                <div class="text-center mb-5">
                    <i class="fas fa-landmark fa-4x text-info mb-3 opacity-75"></i>
                    <h2 class="fw-bold text-dark">Deklarasi Kebijakan Mutu</h2>
                    <p class="lead text-muted mx-auto" style="max-width: 800px;">"STPM Santa Ursula berkomitmen menyelenggarakan Tridharma Perguruan Tinggi yang berstandar nasional, transparan, dan akuntabel demi menghasilkan lulusan yang berintegritas dan berjiwa Serviam."</p>
                </div>
                
                <div class="row gx-4 mt-5">
                    <div class="col-md-6 mb-4">
                        <h5 class="fw-bold"><i class="fas fa-check-circle text-info me-2"></i>Tujuan Kebijakan</h5>
                        <p class="text-muted small">Menjamin kepatuhan terhadap Standar Nasional Pendidikan Tinggi (SN-Dikti) dan memastikan setiap unit kerja di lingkungan STPM menjalankan siklus peningkatan mutu secara konsisten (<em>Continuous Quality Improvement</em>).</p>
                    </div>
                    <div class="col-md-6 mb-4">
                        <h5 class="fw-bold"><i class="fas fa-file-signature text-info me-2"></i>Dokumen Pengesahan</h5>
                        <p class="text-muted small">Kebijakan Mutu ini disahkan oleh Ketua STPM Santa Ursula dan Yayasan Nusa Taruna Bakti, serta wajib dipedomani oleh seluruh civitas akademika.</p>
                        
                        <?php if ($link_unduh !== "#!"): ?>
                            <a href="<?= $link_unduh ?>" target="_blank" class="btn btn-outline-info rounded-pill fw-bold shadow-sm">
                                <i class="fas fa-download me-2"></i><?= $teks_tombol ?>
                            </a>
                        <?php else: ?>
                            <button class="btn btn-light rounded-pill text-muted disabled" disabled>
                                <i class="fas fa-times-circle me-2"></i><?= $teks_tombol ?>
                            </button>
                        <?php endif; ?>

                    </div>
                </div>
                
                <?php
                $query_all = $koneksi->query("SELECT * FROM lpm_dokumen WHERE kategori = 'kebijakan_mutu' ORDER BY tanggal_upload DESC");
                if ($query_all->num_rows > 1): // Tampilkan jika dokumen lebih dari 1
                ?>
                <hr class="my-5">
                <h5 class="fw-bold mb-3">Arsip Kebijakan Mutu</h5>
                <div class="table-responsive">
                    <table class="table table-hover table-sm">
                        <thead class="table-light">
                            <tr><th>Tgl. Terbit</th><th>Nama Dokumen</th><th>Aksi</th></tr>
                        </thead>
                        <tbody>
                            <?php while ($row = $query_all->fetch_assoc()) : ?>
                            <tr>
                                <td class="small"><?= date('d M Y', strtotime($row['tanggal_upload'])) ?></td>
                                <td class="fw-bold text-dark small"><?= htmlspecialchars($row['nama_dokumen']) ?></td>
                                <td>
                                    <a href="uploads/lpm/dokumen/<?= $row['file_dokumen'] ?>" target="_blank" class="btn btn-sm btn-info text-white rounded-pill px-3">Buka</a>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
                <?php endif; ?>
                
            </div>
        </div>
    </div>
</main>
<script>if (typeof feather !== 'undefined') feather.replace();</script>