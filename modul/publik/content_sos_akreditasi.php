<?php
// Tarik data akreditasi terbaru (LIMIT 1)
$query = @mysqli_query($koneksi, "SELECT * FROM prodi_akreditasi WHERE prodi = 'sosiatri' ORDER BY tahun_sk DESC LIMIT 1");
$data = mysqli_fetch_array($query);

$nilai = $data['nilai_akreditasi'] ?? 'Belum Tersedia';
$no_sk = $data['no_sk'] ?? '-';
$masa_berlaku = (!empty($data['masa_berlaku']) && $data['masa_berlaku'] != '0000-00-00') ? date('d F Y', strtotime($data['masa_berlaku'])) : '-';
$file = $data['file_sertifikat'] ?? '';
?>

<main>
    <div class="bg-success text-white pt-5 pb-10 text-center" style="min-height: 45vh;">
        <div class="container-xl px-4 pt-5">
            <h1 class="fw-bold text-white mb-2"><i class="fas fa-shield-alt me-2"></i> Akreditasi Program Studi</h1>
            <p class="lead text-white-50">Bukti komitmen penyelenggaraan pendidikan yang memenuhi standar mutu nasional.</p>
        </div>
    </div>

    <div class="container-xl px-4 mt-n10 mb-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-lg border-0 rounded-4 pt-5 pb-4">
                    <div class="card-body text-center px-5">
                        
                        <div class="mb-4">
                            <i class="fas fa-award fa-5x text-warning"></i>
                        </div>

                        <h3 class="fw-bold text-dark mb-1">Terakreditasi "<?= strtoupper($nilai) ?>"</h3>
                        <p class="small text-muted mb-5">Badan Akreditasi Nasional Perguruan Tinggi (BAN-PT)</p>

                        <div class="table-responsive mb-4">
                            <table class="table table-borderless text-start mx-auto border" style="max-width: 90%; border-radius: 10px; overflow: hidden;">
                                <tbody>
                                    <tr class="bg-light border-bottom">
                                        <td class="text-muted fw-bold py-3 px-4" width="40%">Nomor SK</td>
                                        <td class="text-dark fw-bold py-3 px-4"><?= htmlspecialchars($no_sk) ?></td>
                                    </tr>
                                    <tr class="bg-white border-bottom">
                                        <td class="text-muted fw-bold py-3 px-4">Nilai Akreditasi</td>
                                        <td class="text-dark fw-bold py-3 px-4"><?= htmlspecialchars($nilai) ?></td>
                                    </tr>
                                    <tr class="bg-light">
                                        <td class="text-muted fw-bold py-3 px-4">Masa Berlaku</td>
                                        <td class="text-success fw-bold py-3 px-4">Sampai <?= $masa_berlaku ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <?php if(!empty($file)): ?>
                            <a href="uploads/dokumen/<?= $file ?>" target="_blank" class="btn btn-primary rounded-pill px-5 fw-bold shadow-sm">
                                <i class="fas fa-download me-2"></i> Unduh Sertifikat Akreditasi
                            </a>
                        <?php else: ?>
                            <button class="btn btn-secondary rounded-pill px-5 fw-bold shadow-sm" disabled>
                                <i class="fas fa-file-excel me-2"></i> Sertifikat Belum Diunggah
                            </button>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script>if (typeof feather !== 'undefined') feather.replace();</script>