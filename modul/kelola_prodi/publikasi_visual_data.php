<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");

// 1. DETEKSI PRODI DARI URL
$mod_aktif = isset($_GET['module']) ? $_GET['module'] : '';
if ($mod_aktif == 'prodi_sosiatri') {
    $prodi = 'sosiatri';
    $nama_prodi = 'Pembangunan Sosial (Sosiatri)';
    $bg_color = 'bg-success';
    $btn_color = 'btn-success';
} else {
    $prodi = 'pemerintahan';
    $nama_prodi = 'Ilmu Pemerintahan';
    $bg_color = 'bg-primary';
    $btn_color = 'btn-primary';
}

// 2. DETEKSI KATEGORI (jurnal ATAU galeri)
$kategori = isset($_GET['act']) ? $_GET['act'] : 'galeri'; 

if ($kategori == 'jurnal') {
    $title = "Jurnal Ilmiah";
    $lbl_judul = "Nama Jurnal / Artikel";
    $lbl_desc = "Nomor ISSN / Keterangan";
    $icon = "book-open";
} else {
    $title = "Galeri Kegiatan";
    $lbl_judul = "Judul Kegiatan";
    $lbl_desc = "Deskripsi / Keterangan Singkat";
    $icon = "image";
}

$query = $koneksi->query("SELECT * FROM prodi_publikasi_visual WHERE prodi='$prodi' AND kategori='$kategori' ORDER BY id DESC");
?>

<header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
    <div class="container-xl px-4">
        <div class="page-header-content">
            <div class="row align-items-center pt-3">
                <div class="col-auto mb-3">
                    <h1 class="page-header-title">
                        <div class="page-header-icon"><i data-feather="<?= $icon ?>"></i></div>
                        Kelola <?= $title ?> - <?= $nama_prodi ?>
                    </h1>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="container-xl px-4 mt-4">
    <div class="row">
        <div class="col-lg-4 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-header <?= $bg_color ?> text-white">
                    <i class="fas fa-cloud-upload-alt me-2"></i> Upload <?= $title ?>
                </div>
                <div class="card-body bg-light">
                    <form action="index.php?module=<?= $mod_aktif ?>&act=proses_publikasi_visual" method="POST" enctype="multipart/form-data">
                        
                        <input type="hidden" name="prodi" value="<?= $prodi ?>">
                        <input type="hidden" name="kategori" value="<?= $kategori ?>">
                        <input type="hidden" name="redirect_module" value="<?= $mod_aktif ?>">
                        
                        <div class="mb-3">
                            <label class="form-label fw-bold text-dark"><?= $lbl_judul ?> <span class="text-danger">*</span></label>
                            <input class="form-control" name="judul" type="text" placeholder="Masukkan judul..." required>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label fw-bold text-dark"><?= $lbl_desc ?> <span class="text-danger">*</span></label>
                            <textarea class="form-control" name="deskripsi_issn" rows="2" placeholder="Masukkan keterangan..." required></textarea>
                        </div>

                        <?php if ($kategori == 'jurnal'): ?>
                            <div class="mb-3">
                                <label class="form-label fw-bold text-dark">Link Jurnal (URL) <span class="text-danger">*</span></label>
                                <input class="form-control" name="tautan_link" type="url" placeholder="https://..." required>
                            </div>
                        <?php else: ?>
                            <div class="mb-3">
                                <label class="form-label fw-bold text-dark">Tanggal Kegiatan <span class="text-danger">*</span></label>
                                <input class="form-control" name="tanggal_kegiatan" type="date" required>
                            </div>
                        <?php endif; ?>

                        <div class="mb-4">
                            <label class="form-label fw-bold text-dark">Upload Gambar (Otomatis Kompres WebP) <span class="text-danger">*</span></label>
                            <input class="form-control bg-white" name="file_gambar" type="file" accept="image/jpeg, image/png" required>
                            <div class="form-text text-success small"><i class="fas fa-check-circle"></i> Hanya menerima format JPG/PNG.</div>
                        </div>

                        <button class="btn <?= $btn_color ?> w-100 rounded-pill fw-bold" type="submit">
                            <i class="fas fa-save me-1"></i> Simpan Data
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-8 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-dark text-white">
                    <i class="fas fa-table me-2"></i> Data <?= $title ?>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover mb-0">
                            <thead class="bg-light text-dark">
                                <tr>
                                    <th class="text-center">Preview</th>
                                    <th>Informasi <?= $title ?></th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if($query->num_rows > 0): ?>
                                    <?php while($row = $query->fetch_assoc()): ?>
                                    <tr>
                                        <td class="text-center align-middle" style="width: 150px;">
                                            <img src="uploads/visual/<?= $row['file_gambar_webp'] ?>" class="img-thumbnail shadow-sm" style="max-height: 90px; object-fit: cover;">
                                        </td>
                                        <td class="align-middle">
                                            <div class="fw-bold text-dark fs-6"><?= htmlspecialchars($row['judul']) ?></div>
                                            <div class="small text-muted mb-2"><?= htmlspecialchars($row['deskripsi_issn']) ?></div>
                                            
                                            <?php if ($kategori == 'jurnal'): ?>
                                                <a href="<?= htmlspecialchars($row['tautan_link']) ?>" target="_blank" class="badge bg-success text-decoration-none px-2 py-1"><i class="fas fa-external-link-alt me-1"></i> Kunjungi Jurnal</a>
                                            <?php else: ?>
                                                <span class="badge bg-secondary px-2 py-1"><i class="far fa-calendar-alt me-1"></i> <?= date('d M Y', strtotime($row['tanggal_kegiatan'])) ?></span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="text-center align-middle" style="width: 80px;">
                                            <a href="index.php?module=<?= $mod_aktif ?>&act=hapus_publikasi_visual&id=<?= $row['id'] ?>&redir=<?= $kategori ?>" class="btn btn-sm btn-outline-danger border-0" onclick="return confirm('Yakin ingin menghapus data ini?')">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php endwhile; ?>
                                <?php else: ?>
                                    <tr><td colspan="3" class="text-center py-4 text-muted">Belum ada data yang diunggah.</td></tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>