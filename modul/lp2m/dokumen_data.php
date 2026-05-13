<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");

// TANGKAP KATEGORI DARI URL
$kategori = $_GET['kat'] ?? 'umum';

// UBAH JUDUL HALAMAN OTOMATIS BERDASARKAN KATEGORI
$judul_halaman = ucwords(str_replace('_', ' ', $kategori));

// AMBIL DATA HANYA SESUAI KATEGORI YANG DIKLIK
$query = $koneksi->query("SELECT * FROM lp2m_dokumen WHERE kategori_dokumen = '$kategori' ORDER BY id DESC");
?>

<div class="container-xl px-4 mt-4">
    <div class="row">
        <div class="col-lg-4 mb-4">
            <div class="card shadow-sm border-top-lg border-top-primary">
                <div class="card-header fw-bold text-primary">Upload <?= $judul_halaman ?></div>
                <div class="card-body">
                    <form action="index.php?module=lp2m&act=proses_dokumen" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="kategori_dokumen" value="<?= $kategori ?>">
                        
                        <div class="mb-3">
                            <label class="small fw-bold">Judul / Nama Dokumen</label>
                            <input class="form-control" name="judul" type="text" required>
                        </div>
                        <div class="mb-3">
                            <label class="small fw-bold">Keterangan Singkat</label>
                            <textarea class="form-control" name="deskripsi" rows="2"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="small fw-bold">File Dokumen (PDF)</label>
                            <input class="form-control" name="file_dokumen" type="file" accept=".pdf" required>
                        </div>
                        <button class="btn btn-primary w-100" type="submit">Upload Arsip</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-8 mb-4">
            <div class="card shadow-sm">
                <div class="card-header bg-dark text-white">Daftar <?= $judul_halaman ?></div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Judul Dokumen</th>
                                <th>File</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($row = $query->fetch_assoc()): ?>
                            <tr>
                                <td><?= date('d M Y', strtotime($row['tanggal_upload'])) ?></td>
                                <td>
                                    <strong><?= htmlspecialchars($row['judul']) ?></strong><br>
                                    <span class="small text-muted"><?= htmlspecialchars($row['deskripsi']) ?></span>
                                </td>
                                <td>
                                    <a href="uploads/lp2m/dokumen/<?= $row['file_dokumen'] ?>" target="_blank" class="badge bg-success text-decoration-none">Lihat PDF</a>
                                </td>
                                <td>
                                    <a href="index.php?module=lp2m&act=hapus_dokumen&id=<?= $row['id'] ?>&kat=<?= $kategori ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Hapus dokumen?')"><i data-feather="trash-2"></i></a>
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