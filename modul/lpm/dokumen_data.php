<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");

// TANGKAP KATEGORI DARI URL
$kategori = $_GET['kat'] ?? 'umum';

// UBAH JUDUL HALAMAN OTOMATIS
$judul_halaman = ucwords(str_replace('_', ' ', $kategori));

// AMBIL DATA
$query = $koneksi->query("SELECT * FROM lpm_dokumen WHERE kategori_dokumen = '$kategori' ORDER BY id DESC");
?>

<div class="container-xl px-4 mt-4">
    <div class="row">
        <div class="col-lg-4 mb-4">
            <div class="card shadow-sm border-top-lg border-top-success">
                <div class="card-header fw-bold text-success">Upload <?= $judul_halaman ?></div>
                <div class="card-body">
                    <form action="index.php?module=lpm&act=proses_dokumen" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="kategori_dokumen" value="<?= $kategori ?>">
                        
                        <div class="mb-3">
                            <label class="small fw-bold">Judul / Nama Dokumen</label>
                            <input class="form-control" name="judul" type="text" placeholder="Contoh: SK Rektor Kebijakan Mutu" required>
                        </div>
                        <div class="mb-3">
                            <label class="small fw-bold">Nomor Dokumen / Deskripsi</label>
                            <textarea class="form-control" name="deskripsi" rows="2"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="small fw-bold">File (PDF/Word/Excel)</label>
                            <input class="form-control" name="file_dokumen" type="file" accept=".pdf,.doc,.docx,.xls,.xlsx" required>
                        </div>
                        <button class="btn btn-success text-white w-100" type="submit"><i class="fas fa-upload me-1"></i> Simpan Arsip Mutu</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-8 mb-4">
            <div class="card shadow-sm">
                <div class="card-header bg-dark text-white">Daftar Arsip <?= $judul_halaman ?></div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Nama Dokumen Mutu</th>
                                <th class="text-center">File Arsip</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($row = $query->fetch_assoc()): ?>
                            <tr>
                                <td><span class="badge bg-light text-dark border"><?= date('d/m/Y', strtotime($row['tanggal_upload'])) ?></span></td>
                                <td>
                                    <strong class="text-primary"><?= htmlspecialchars($row['judul']) ?></strong><br>
                                    <span class="small text-muted"><?= htmlspecialchars($row['deskripsi']) ?></span>
                                </td>
                                <td class="text-center">
                                    <a href="uploads/lpm/dokumen/<?= $row['file_dokumen'] ?>" target="_blank" class="btn btn-sm btn-success">Buka File</a>
                                </td>
                                <td class="text-center">
                                    <a href="index.php?module=lpm&act=hapus_dokumen&id=<?= $row['id'] ?>&kat=<?= $kategori ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Hapus dokumen mutu ini permanen?')"><i data-feather="trash-2"></i></a>
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