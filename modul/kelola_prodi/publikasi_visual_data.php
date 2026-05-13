<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");
$prodi = 'pemerintahan';
$kategori = $act; // Menangkap 'jurnal' atau 'galeri' dari URL

// Deteksi Tampilan Berdasarkan Kategori
if ($kategori == 'jurnal') {
    $title = "Jurnal Ilmiah";
    $lbl_judul = "Nama Jurnal";
    $lbl_desc = "Nomor ISSN";
} else {
    $title = "Galeri Kegiatan";
    $lbl_judul = "Judul Kegiatan";
    $lbl_desc = "Deskripsi / Keterangan Singkat";
}

$query = $koneksi->query("SELECT * FROM prodi_publikasi_visual WHERE prodi='$prodi' AND kategori='$kategori' ORDER BY id DESC");
?>

<div class="container-xl px-4 mt-4">
    <div class="row">
        <!-- FORM UPLOAD -->
        <div class="col-lg-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">Upload <?= $title ?></div>
                <div class="card-body">
                    <form action="index.php?module=prodi_pemerintahan&act=proses_publikasi_visual" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="prodi" value="<?= $prodi ?>">
                        <input type="hidden" name="kategori" value="<?= $kategori ?>">
                        
                        <div class="mb-3">
                            <label class="small mb-1 fw-bold"><?= $lbl_judul ?></label>
                            <input class="form-control" name="judul" type="text" required>
                        </div>
                        
                        <div class="mb-3">
                            <label class="small mb-1 fw-bold"><?= $lbl_desc ?></label>
                            <textarea class="form-control" name="deskripsi_issn" rows="2" required></textarea>
                        </div>

                        <?php if ($kategori == 'jurnal'): ?>
                            <div class="mb-3">
                                <label class="small mb-1 fw-bold">Link Jurnal (URL)</label>
                                <input class="form-control" name="tautan_link" type="url" placeholder="https://..." required>
                            </div>
                        <?php else: ?>
                            <div class="mb-3">
                                <label class="small mb-1 fw-bold">Tanggal Kegiatan</label>
                                <input class="form-control" name="tanggal_kegiatan" type="date" required>
                            </div>
                        <?php endif; ?>

                        <div class="mb-3">
                            <label class="small mb-1 fw-bold">Upload Gambar (Otomatis Kompres ke WebP)</label>
                            <input class="form-control" name="file_gambar" type="file" accept="image/jpeg, image/png" required>
                            <div class="form-text text-success" style="font-size: 11px;">Hanya terima format JPG dan PNG.</div>
                        </div>

                        <button class="btn btn-primary w-100" type="submit"><i class="fas fa-upload me-1"></i> Simpan Data</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- TABEL DATA -->
        <div class="col-lg-8 mb-4">
            <div class="card shadow-sm">
                <div class="card-header bg-dark text-white">Data <?= $title ?></div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead class="bg-light">
                            <tr>
                                <th>Preview</th>
                                <th>Informasi <?= $title ?></th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($row = $query->fetch_assoc()): ?>
                            <tr>
                                <td class="text-center" style="width: 150px;">
                                    <img src="uploads/visual/<?= $row['file_gambar_webp'] ?>" class="img-thumbnail" style="max-height: 100px;">
                                </td>
                                <td>
                                    <div class="fw-bold text-primary"><?= htmlspecialchars($row['judul']) ?></div>
                                    <div class="small text-muted mb-1"><?= htmlspecialchars($row['deskripsi_issn']) ?></div>
                                    
                                    <?php if ($kategori == 'jurnal'): ?>
                                        <a href="<?= htmlspecialchars($row['tautan_link']) ?>" target="_blank" class="badge bg-success text-decoration-none">Kunjungi Jurnal</a>
                                    <?php else: ?>
                                        <span class="badge bg-secondary"><i class="far fa-calendar-alt me-1"></i> <?= $row['tanggal_kegiatan'] ?></span>
                                    <?php endif; ?>
                                </td>
                                <td style="width: 80px;">
                                    <a href="index.php?module=prodi_pemerintahan&act=hapus_publikasi_visual&id=<?= $row['id'] ?>&redir=<?= $kategori ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Hapus data ini?')"><i data-feather="trash-2"></i></a>
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