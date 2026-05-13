<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");

$kategori = $_GET['kat'] ?? 'buku';
$judul_halaman = ucwords(str_replace('_', ' ', $kategori));

// Cek apakah ini koleksi fisik atau digital
$is_digital = in_array($kategori, ['ebook', 'jurnal', 'skripsi']);

$query = $koneksi->query("SELECT * FROM perpus_koleksi WHERE kategori_koleksi = '$kategori' ORDER BY id DESC");
?>

<div class="container-xl px-4 mt-4">
    <div class="row">
        <div class="col-lg-4 mb-4">
            <div class="card shadow-sm border-top-lg border-top-primary">
                <div class="card-header fw-bold text-primary">Input <?= $judul_halaman ?></div>
                <div class="card-body">
                    <form action="index.php?module=perpustakaan&act=proses_koleksi" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="kategori_koleksi" value="<?= $kategori ?>">
                        <input type="hidden" name="is_digital" value="<?= $is_digital ? 1 : 0 ?>">
                        
                        <div class="mb-3">
                            <label class="small fw-bold">Judul <?= $judul_halaman ?></label>
                            <input class="form-control" name="judul" type="text" required>
                        </div>
                        <div class="mb-3">
                            <label class="small fw-bold">Penulis / Pengarang</label>
                            <input class="form-control" name="penulis" type="text" required>
                        </div>
                        <div class="row mb-3">
                            <div class="col-8">
                                <label class="small fw-bold">Penerbit / Afiliasi</label>
                                <input class="form-control" name="penerbit_kampus" type="text">
                            </div>
                            <div class="col-4">
                                <label class="small fw-bold">Tahun</label>
                                <input class="form-control" name="tahun_terbit" type="number" required>
                            </div>
                        </div>

                        <?php if(!$is_digital): ?>
                            <div class="mb-3">
                                <label class="small fw-bold text-success">Stok Fisik di Rak</label>
                                <input class="form-control" name="stok_fisik" type="number" value="1" required>
                            </div>
                        <?php else: ?>
                            <div class="mb-3">
                                <label class="small fw-bold text-danger">Upload File Digital (PDF)</label>
                                <input class="form-control" name="file_lampiran" type="file" accept=".pdf" required>
                            </div>
                        <?php endif; ?>

                        <div class="mb-3">
                            <label class="small fw-bold">Gambar Cover (Opsional)</label>
                            <input class="form-control" name="cover_gambar" type="file" accept="image/*">
                        </div>

                        <button class="btn btn-primary w-100" type="submit"><i class="fas fa-save me-1"></i> Simpan Katalog</button>
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
                                <th style="width: 80px;">Cover</th>
                                <th>Informasi Pustaka</th>
                                <th class="text-center"><?= $is_digital ? 'Akses File' : 'Stok' ?></th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($row = $query->fetch_assoc()): ?>
                            <tr>
                                <td>
                                    <?php if(!empty($row['cover_gambar'])): ?>
                                        <img src="uploads/perpustakaan/cover/<?= $row['cover_gambar'] ?>" class="img-fluid rounded">
                                    <?php else: ?>
                                        <div class="bg-light text-center text-muted p-2 rounded small"><i class="fas fa-image mb-1"></i><br>No Cover</div>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <strong class="text-primary"><?= htmlspecialchars($row['judul']) ?></strong><br>
                                    <span class="small text-muted">Penulis: <?= htmlspecialchars($row['penulis']) ?> (<?= $row['tahun_terbit'] ?>)</span>
                                </td>
                                <td class="text-center align-middle">
                                    <?php if($is_digital && !empty($row['file_lampiran'])): ?>
                                        <a href="uploads/perpustakaan/koleksi/<?= $row['file_lampiran'] ?>" target="_blank" class="badge bg-danger text-decoration-none">Buka PDF</a>
                                    <?php else: ?>
                                        <span class="badge bg-success fs-6"><?= $row['stok_fisik'] ?> Buku</span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-center align-middle">
                                    <a href="index.php?module=perpustakaan&act=hapus_koleksi&id=<?= $row['id'] ?>&kat=<?= $kategori ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Hapus data koleksi ini?')"><i data-feather="trash-2"></i></a>
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