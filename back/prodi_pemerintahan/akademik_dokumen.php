<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");

$prodi = 'pemerintahan';

// Deteksi Kategori berdasarkan URL (act)
if ($act == 'jadwal_kuliah') {
    $kategori = 'jadwal';
    $judul_halaman = "Jadwal Kuliah";
    $label_ket = "Tahun Akademik & Semester (Cth: 2025/2026 Ganjil)";
} elseif ($act == 'buku_akademik') {
    $kategori = 'buku';
    $judul_halaman = "Buku Akademik";
    $label_ket = "Tahun Terbit / Edisi";
} else {
    $kategori = 'skripsi';
    $judul_halaman = "Panduan Skripsi";
    $label_ket = "Tahun Revisi / Edisi";
}

$query = $koneksi->query("SELECT * FROM prodi_dokumen_akademik WHERE prodi = '$prodi' AND kategori = '$kategori' ORDER BY id DESC");
?>

<div class="container-xl px-4 mt-4">
    <div class="row">
        <!-- FORM UPLOAD -->
        <div class="col-lg-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-header bg-success text-white">Upload <?= $judul_halaman ?></div>
                <div class="card-body">
                    <form action="index.php?module=prodi_pemerintahan&act=proses_dokumen" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="prodi" value="<?= $prodi ?>">
                        <input type="hidden" name="kategori" value="<?= $kategori ?>">
                        <input type="hidden" name="act_redir" value="<?= $act ?>"> <!-- Untuk redirect setelah simpan -->
                        
                        <div class="mb-3">
                            <label class="small mb-1">Judul Dokumen</label>
                            <input class="form-control" name="judul_dokumen" type="text" required>
                        </div>
                        <div class="mb-3">
                            <label class="small mb-1"><?= $label_ket ?></label>
                            <input class="form-control" name="keterangan" type="text" required>
                        </div>
                        <div class="mb-3">
                            <label class="small mb-1">File Dokumen (PDF)</label>
                            <input class="form-control" name="file_dokumen" type="file" accept=".pdf,.doc,.docx" required>
                        </div>
                        <button class="btn btn-success w-100" type="submit"><i class="fas fa-upload me-1"></i> Upload File</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- TABEL DATA -->
        <div class="col-lg-8 mb-4">
            <div class="card shadow-sm">
                <div class="card-header bg-dark text-white">Daftar File <?= $judul_halaman ?></div>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Judul</th>
                                <th>Keterangan</th>
                                <th>File</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($row = $query->fetch_assoc()): ?>
                            <tr>
                                <td><?= htmlspecialchars($row['judul_dokumen']) ?></td>
                                <td><?= htmlspecialchars($row['keterangan']) ?></td>
                                <td><a href="uploads/akademik/<?= $row['file_dokumen'] ?>" target="_blank" class="badge bg-primary text-decoration-none">Lihat File</a></td>
                                <td>
                                    <a href="index.php?module=prodi_pemerintahan&act=hapus_dokumen&id=<?= $row['id'] ?>&kat_redir=<?= $act ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus dokumen ini?')"><i data-feather="trash-2"></i></a>
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