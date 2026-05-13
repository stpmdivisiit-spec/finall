<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");
$prodi = 'pemerintahan';

// Seting Dinamis Berdasarkan URL
if ($act == 'dok_pedoman') {
    $kategori = 'pedoman';
    $judul_halaman = "Pedoman Skripsi";
    $label_ket = "Tahun Revisi / Berlaku";
} elseif ($act == 'dok_panduan') {
    $kategori = 'panduan';
    $judul_halaman = "Buku Panduan";
    $label_ket = "Tahun Terbit / Edisi";
} elseif ($act == 'dok_laporan') {
    $kategori = 'laporan';
    $judul_halaman = "Laporan Tahunan";
    $label_ket = "Periode Tahun";
} else {
    $kategori = 'sop';
    $judul_halaman = "SOP Akademik";
    $label_ket = "Nomor SOP / Keterangan";
}

$query = $koneksi->query("SELECT * FROM prodi_dokumen_resmi WHERE prodi = '$prodi' AND kategori = '$kategori' ORDER BY id DESC");
?>

<div class="container-xl px-4 mt-4">
    <div class="row">
        <!-- FORM UPLOAD -->
        <div class="col-lg-4 mb-4">
            <div class="card shadow-sm border-top-lg border-top-danger">
                <div class="card-header fw-bold text-danger">Upload <?= $judul_halaman ?></div>
                <div class="card-body">
                    <form action="index.php?module=prodi_pemerintahan&act=proses_dok_resmi" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="prodi" value="<?= $prodi ?>">
                        <input type="hidden" name="kategori" value="<?= $kategori ?>">
                        <input type="hidden" name="act_redir" value="<?= $act ?>">
                        
                        <div class="mb-3">
                            <label class="small fw-bold">Judul <?= $judul_halaman ?></label>
                            <input class="form-control" name="judul_dokumen" type="text" placeholder="Contoh: SOP Pelaksanaan UTS..." required>
                        </div>
                        <div class="mb-3">
                            <label class="small fw-bold"><?= $label_ket ?></label>
                            <input class="form-control" name="keterangan" type="text" placeholder="Wajib diisi..." required>
                        </div>
                        <div class="mb-3">
                            <label class="small fw-bold">File Dokumen (Wajib PDF)</label>
                            <input class="form-control" name="file_dokumen" type="file" accept=".pdf" required>
                        </div>
                        <button class="btn btn-danger w-100" type="submit"><i class="fas fa-upload me-1"></i> Upload Arsip</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- TABEL DATA -->
        <div class="col-lg-8 mb-4">
            <div class="card shadow-sm">
                <div class="card-header bg-dark text-white">Daftar Arsip <?= $judul_halaman ?></div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="bg-light">
                            <tr>
                                <th>Nama Dokumen & Keterangan</th>
                                <th class="text-center" style="width: 120px;">File Arsip</th>
                                <th class="text-center" style="width: 80px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($row = $query->fetch_assoc()): ?>
                            <tr>
                                <td>
                                    <div class="fw-bold text-primary"><?= htmlspecialchars($row['judul_dokumen']) ?></div>
                                    <div class="small text-muted mt-1"><i class="fas fa-tag"></i> <?= htmlspecialchars($row['keterangan']) ?></div>
                                </td>
                                <td class="text-center align-middle">
                                    <a href="uploads/dokumen_resmi/<?= $row['file_dokumen'] ?>" target="_blank" class="badge bg-danger text-decoration-none">
                                        <i class="far fa-file-pdf"></i> Lihat PDF
                                    </a>
                                </td>
                                <td class="text-center align-middle">
                                    <a href="index.php?module=prodi_pemerintahan&act=hapus_dok_resmi&id=<?= $row['id'] ?>&redir=<?= $act ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Yakin ingin menghapus dokumen ini beserta file fisiknya?')">
                                        <i data-feather="trash-2"></i>
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