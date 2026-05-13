<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");

// TANGKAP KATEGORI DARI URL
$kategori = $_GET['kat'] ?? 'umum';
$judul_halaman = ucwords(str_replace('_', ' ', $kategori));

// AMBIL DATA
$query = $koneksi->query("SELECT * FROM kemahasiswaan_pusat_data WHERE kategori_data = '$kategori' ORDER BY id DESC");
?>

<div class="container-xl px-4 mt-4">
    <div class="row">
        <div class="col-lg-4 mb-4">
            <div class="card shadow-sm border-top-lg border-top-warning">
                <div class="card-header fw-bold text-warning">Tambah Data <?= $judul_halaman ?></div>
                <div class="card-body">
                    <form action="index.php?module=kemahasiswaan&act=proses_kema" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="kategori_data" value="<?= $kategori ?>">
                        
                        <div class="mb-3">
                            <label class="small fw-bold">Judul / Nama Informasi</label>
                            <input class="form-control" name="judul" type="text" placeholder="Masukkan judul..." required>
                        </div>
                        <div class="mb-3">
                            <label class="small fw-bold">Keterangan / Deskripsi</label>
                            <textarea class="form-control" name="deskripsi" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="small fw-bold">File (Bisa Foto JPG / Dokumen PDF)</label>
                            <input class="form-control" name="file_lampiran" type="file" accept=".pdf,.jpg,.jpeg,.png">
                            <div class="small text-muted mt-1">*Bisa dikosongkan jika tidak ada file</div>
                        </div>
                        <button class="btn btn-warning text-dark fw-bold w-100" type="submit"><i class="fas fa-save me-1"></i> Simpan Data</button>
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
                                <th>Informasi / Keterangan</th>
                                <th class="text-center">Lampiran</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($row = $query->fetch_assoc()): ?>
                            <tr>
                                <td><span class="badge bg-secondary"><?= date('d M Y', strtotime($row['tanggal'])) ?></span></td>
                                <td>
                                    <strong class="text-dark"><?= htmlspecialchars($row['judul']) ?></strong><br>
                                    <span class="small text-muted"><?= htmlspecialchars($row['deskripsi']) ?></span>
                                </td>
                                <td class="text-center">
                                    <?php if(!empty($row['file_lampiran'])): ?>
                                        <a href="uploads/kemahasiswaan_pusat/<?= $row['file_lampiran'] ?>" target="_blank" class="btn btn-sm btn-info">Buka File</a>
                                    <?php else: ?>
                                        <span class="badge bg-light text-dark">-</span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-center">
                                    <a href="index.php?module=kemahasiswaan&act=hapus_kema&id=<?= $row['id'] ?>&kat=<?= $kategori ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Hapus data kemahasiswaan ini?')"><i data-feather="trash-2"></i></a>
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