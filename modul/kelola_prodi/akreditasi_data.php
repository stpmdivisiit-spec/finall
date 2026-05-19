<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");

// 1. DETEKSI PRODI BERDASARKAN URL
$mod_aktif = isset($_GET['module']) ? $_GET['module'] : '';

if ($mod_aktif == 'prodi_sosiatri') {
    $prodi = 'sosiatri';
    $nama_prodi = 'Pembangunan Sosial (Sosiatri)';
    $bg_color = 'bg-success'; // Hijau
    $btn_color = 'btn-success';
} else {
    $prodi = 'pemerintahan';
    $nama_prodi = 'Ilmu Pemerintahan';
    $bg_color = 'bg-primary'; // Biru
    $btn_color = 'btn-primary';
}

// 2. QUERY DATA AKREDITASI
$query = $koneksi->query("SELECT * FROM prodi_akreditasi WHERE prodi = '$prodi' ORDER BY tahun_sk DESC");
?>

<header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
    <div class="container-xl px-4">
        <div class="page-header-content">
            <div class="row align-items-center pt-3">
                <div class="col-auto mb-3">
                    <h1 class="page-header-title">
                        <div class="page-header-icon"><i data-feather="award"></i></div>
                        Data Akreditasi - <?= $nama_prodi ?>
                    </h1>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="container-xl px-4 mt-4">
    <div class="card mb-4 shadow-sm border-0">
        <div class="card-header <?= $bg_color ?> text-white">
            <i class="fas fa-list me-2"></i> Riwayat Akreditasi Program Studi
        </div>
        <div class="card-body p-4">
            
  <a href="index.php?module=<?= $mod_aktif ?>&act=akreditasi_form" class="btn btn-primary btn-sm mb-3">
    <i class="fas fa-plus"></i> Tambah Akreditasi
</a>

            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover small">
                    <thead class="bg-light text-dark">
                        <tr>
                            <th class="text-center" width="15%">Nilai</th>
                            <th>Nomor SK</th>
                            <th class="text-center" width="10%">Tahun</th>
                            <th class="text-center" width="20%">Masa Berlaku</th>
                            <th class="text-center" width="15%">Sertifikat</th>
                            <th class="text-center" width="10%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($query->num_rows > 0): ?>
                            <?php while ($row = $query->fetch_assoc()): ?>
                            <tr>
                                <td class="text-center align-middle">
                                    <span class="badge <?= $bg_color ?> px-3 py-2 fs-6"><?= htmlspecialchars($row['nilai_akreditasi']) ?></span>
                                </td>
                                <td class="align-middle fw-bold"><?= htmlspecialchars($row['no_sk']) ?></td>
                                <td class="text-center align-middle"><?= htmlspecialchars($row['tahun_sk']) ?></td>
                                <td class="text-center align-middle">
                                    <?= ($row['masa_berlaku'] != '0000-00-00') ? date('d M Y', strtotime($row['masa_berlaku'])) : 'Tidak Ada Batas'; ?>
                                </td>
                                <td class="text-center align-middle">
                                    <?php if(!empty($row['file_sertifikat'])): ?>
                                        <a href="uploads/dokumen/<?= $row['file_sertifikat'] ?>" target="_blank" class="btn btn-xs btn-outline-dark rounded-pill"><i class="fas fa-file-pdf me-1"></i> Lihat</a>
                                    <?php else: ?>
                                        <span class="text-muted italic">Tidak ada</span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-center align-middle">
                                    <a href="index.php?module=<?= $mod_aktif ?>&act=akreditasi_form&id=<?= $row['id'] ?>" class="btn btn-sm btn-light text-primary border shadow-sm"><i data-feather="edit"></i></a>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr><td colspan="6" class="text-center py-4 text-muted">Belum ada riwayat akreditasi.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <div class="alert alert-light border-start-lg border-start-<?= str_replace('bg-', '', $bg_color) ?> mt-3 small">
                <i class="fas fa-info-circle me-1"></i> Data akreditasi yang berada di urutan <strong>paling atas (Tahun terbaru)</strong> adalah yang akan ditampilkan di halaman depan website.
            </div>
        </div>
    </div>
</div>