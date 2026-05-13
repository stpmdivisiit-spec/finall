<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");

$kategori = $_GET['kat'] ?? 'umum';
$judul_halaman = ucwords(str_replace('_', ' ', $kategori));

// AMBIL DATA
$query = $koneksi->query("SELECT * FROM sekretariat_arsip WHERE kategori_arsip = '$kategori' ORDER BY id DESC");
?>

<div class="container-xl px-4 mt-4">
    <div class="row">
        <div class="col-lg-4 mb-4">
            <div class="card shadow-sm border-top-lg border-top-info">
                <div class="card-header fw-bold text-info">Input <?= $judul_halaman ?></div>
                <div class="card-body">
                    <form action="index.php?module=sekretariat&act=proses_arsip" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="kategori_arsip" value="<?= $kategori ?>">
                        
                        <div class="mb-3">
                            <label class="small fw-bold">Judul / Nama File</label>
                            <input class="form-control" name="judul_arsip" type="text" placeholder="Masukkan judul arsip..." required>
                        </div>
                        <div class="mb-3">
                            <label class="small fw-bold">Keterangan Tambahan</label>
                            <textarea class="form-control" name="keterangan" rows="2"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="small fw-bold">Tanggal Dokumen</label>
                            <input class="form-control" name="tanggal" type="date" value="<?= date('Y-m-d') ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="small fw-bold">Lampiran (PDF / Gambar)</label>
                            <input class="form-control" name="file_lampiran" type="file" accept=".pdf,.jpg,.jpeg,.png,.xls,.xlsx">
                        </div>
                        <button class="btn btn-info text-white w-100" type="submit"><i class="fas fa-save me-1"></i> Simpan Arsip</button>
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
                                <th>Nama Arsip & Keterangan</th>
                                <th class="text-center">Lampiran</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($row = $query->fetch_assoc()): ?>
                            <tr>
                                <td><span class="badge bg-secondary"><?= date('d/m/Y', strtotime($row['tanggal'])) ?></span></td>
                                <td>
                                    <strong class="text-dark"><?= htmlspecialchars($row['judul_arsip']) ?></strong><br>
                                    <span class="small text-muted"><?= htmlspecialchars($row['keterangan']) ?></span>
                                </td>
                                <td class="text-center">
                                    <?php if(!empty($row['file_lampiran'])): ?>
                                        <a href="uploads/sekretariat/dokumen/<?= $row['file_lampiran'] ?>" target="_blank" class="btn btn-sm btn-info text-white">Lihat Berkas</a>
                                    <?php else: ?>
                                        -
                                    <?php endif; ?>
                                </td>
                                <td class="text-center">
                                    <a href="index.php?module=sekretariat&act=hapus_arsip&id=<?= $row['id'] ?>&kat=<?= $kategori ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Hapus arsip?')"><i data-feather="trash-2"></i></a>
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