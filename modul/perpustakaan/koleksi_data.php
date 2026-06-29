<?php if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!"); 
// C:\xampp\htdocs\FINAL\modul\perpustakaan\koleksi_data.php

$kat = $_GET['kat'] ?? 'opac';

// Konfigurasi Judul dan Ikon berdasarkan kategori
$config = [
    'opac' => ['judul' => 'Katalog Buku Fisik (OPAC)', 'icon' => 'fa-book'],
    'ebook' => ['judul' => 'E-Book & Jurnal Digital', 'icon' => 'fa-tablet-alt'],
    'repo' => ['judul' => 'Repository Skripsi', 'icon' => 'fa-graduation-cap'],
    'berkala' => ['judul' => 'Terbitan Berkala (Majalah/Buletin)', 'icon' => 'fa-newspaper']
];
$title = $config[$kat]['judul'];
$icon = $config[$kat]['icon'];
?>

<div class="container-fluid px-4 mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800 fw-bold"><i class="fas <?= $icon ?> me-2"></i><?= $title ?></h1>
        <button class="btn btn-primary shadow-sm rounded-pill px-3" data-bs-toggle="modal" data-bs-target="#modalTambahKoleksi">
            <i class="fas fa-plus me-1"></i> Tambah Data
        </button>
    </div>

    <div class="card shadow-sm border-0 mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-bordered" id="datatablesSimple">
                    <thead class="table-light">
                        <tr>
                            <th width="5%">No</th>
                            <?php if ($kat != 'repo') echo '<th width="10%" class="text-center">Cover</th>'; ?>
                            <th width="30%">Judul Koleksi</th>
                            <th width="20%"><?= ($kat == 'repo') ? 'Penulis / Prodi' : 'Pengarang / Penerbit' ?></th>
                            <th width="10%">Tahun</th>
                            <?php if ($kat == 'opac') echo '<th width="10%" class="text-center">Stok</th>'; ?>
                            <th width="15%" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $query = $koneksi->query("SELECT * FROM perpus_koleksi WHERE kategori_koleksi = '$kat' ORDER BY id DESC");
                        while ($row = $query->fetch_assoc()) :
                        ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <?php if ($kat != 'repo') : ?>
                            <td class="text-center">
                                <?php if (!empty($row['cover_gambar'])) : ?>
                                    <img src="uploads/perpustakaan/cover/<?= $row['cover_gambar'] ?>" width="50" class="img-thumbnail shadow-sm">
                                <?php else: ?>
                                    <i class="fas fa-image fa-2x text-muted opacity-50"></i>
                                <?php endif; ?>
                            </td>
                            <?php endif; ?>
                            
                            <td class="fw-bold text-teal">
                                <?= htmlspecialchars($row['judul']) ?>
                                <?php if ($kat == 'berkala' && !empty($row['edisi_volume'])) echo "<br><small class='text-muted'>Edisi: {$row['edisi_volume']}</small>"; ?>
                            </td>
                            
                            <td>
                                <strong><?= htmlspecialchars($row['penulis_pengarang']) ?></strong><br>
                                <small class="text-muted"><?= htmlspecialchars($kat == 'repo' ? $row['program_studi'] : $row['penerbit']) ?></small>
                            </td>
                            
                            <td><?= htmlspecialchars($row['tahun_terbit']) ?></td>
                            
                            <?php if ($kat == 'opac') : ?>
                            <td class="text-center"><span class="badge bg-<?= $row['stok_fisik'] > 0 ? 'success' : 'danger' ?>"><?= $row['stok_fisik'] ?></span></td>
                            <?php endif; ?>
                            
                            <td class="text-center">
                                <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalEdit<?= $row['id'] ?>"><i class="fas fa-edit"></i></button>
                                <a href="index.php?module=perpustakaan&act=hapus_koleksi&kat=<?= $kat ?>&id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data koleksi ini?');"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>

                        <div class="modal fade" id="modalEdit<?= $row['id'] ?>" tabindex="-1">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content border-0 shadow">
                                    <div class="modal-header bg-light">
                                        <h5 class="modal-title fw-bold">Edit <?= $title ?></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <form action="index.php?module=perpustakaan&act=proses_koleksi" method="POST" enctype="multipart/form-data">
                                        <div class="modal-body text-start">
                                            <input type="hidden" name="aksi" value="edit_koleksi">
                                            <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                            <input type="hidden" name="kategori_koleksi" value="<?= $kat ?>">
                                            <input type="hidden" name="cover_lama" value="<?= $row['cover_gambar'] ?>">
                                            <input type="hidden" name="file_lama" value="<?= $row['file_lampiran'] ?>">
                                            
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Judul <?= ($kat == 'repo') ? 'Skripsi' : 'Buku/Literatur' ?></label>
                                                <input type="text" class="form-control" name="judul" value="<?= htmlspecialchars($row['judul']) ?>" required>
                                            </div>
                                            
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label fw-bold"><?= ($kat == 'repo') ? 'Nama Mahasiswa' : 'Penulis/Pengarang' ?></label>
                                                    <input type="text" class="form-control" name="penulis_pengarang" value="<?= htmlspecialchars($row['penulis_pengarang']) ?>" required>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <?php if ($kat == 'repo') : ?>
                                                        <label class="form-label fw-bold">Program Studi</label>
                                                        <select class="form-select" name="program_studi" required>
                                                            <option value="Pembangunan Sosial" <?= ($row['program_studi'] == 'Pembangunan Sosial') ? 'selected' : '' ?>>Pembangunan Sosial</option>
                                                            <option value="Ilmu Pemerintahan" <?= ($row['program_studi'] == 'Ilmu Pemerintahan') ? 'selected' : '' ?>>Ilmu Pemerintahan</option>
                                                        </select>
                                                    <?php else : ?>
                                                        <label class="form-label fw-bold">Penerbit</label>
                                                        <input type="text" class="form-control" name="penerbit" value="<?= htmlspecialchars($row['penerbit']) ?>">
                                                    <?php endif; ?>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-4 mb-3">
                                                    <label class="form-label fw-bold">Tahun <?= ($kat == 'repo') ? 'Lulus' : 'Terbit' ?></label>
                                                    <input type="text" class="form-control" name="tahun_terbit" value="<?= htmlspecialchars($row['tahun_terbit']) ?>" required>
                                                </div>
                                                
                                                <?php if ($kat == 'opac' || $kat == 'berkala') : ?>
                                                <div class="col-md-4 mb-3">
                                                    <label class="form-label fw-bold">ISBN / ISSN</label>
                                                    <input type="text" class="form-control" name="isbn_issn" value="<?= htmlspecialchars($row['isbn_issn']) ?>">
                                                </div>
                                                <?php endif; ?>

                                                <?php if ($kat == 'opac') : ?>
                                                <div class="col-md-4 mb-3">
                                                    <label class="form-label fw-bold">Stok Fisik</label>
                                                    <input type="number" class="form-control" name="stok_fisik" value="<?= $row['stok_fisik'] ?>" min="0" required>
                                                </div>
                                                <?php endif; ?>

                                                <?php if ($kat == 'berkala') : ?>
                                                <div class="col-md-4 mb-3">
                                                    <label class="form-label fw-bold">Edisi / Volume</label>
                                                    <input type="text" class="form-control" name="edisi_volume" value="<?= htmlspecialchars($row['edisi_volume']) ?>">
                                                </div>
                                                <?php endif; ?>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label fw-bold"><?= ($kat == 'repo') ? 'Abstrak Skripsi' : 'Deskripsi Singkat' ?></label>
                                                <textarea class="form-control" name="abstrak_deskripsi" rows="3"><?= htmlspecialchars($row['abstrak_deskripsi']) ?></textarea>
                                            </div>

                                            <?php if ($kat != 'opac') : ?>
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Tautan Eksternal (Opsional)</label>
                                                <input type="url" class="form-control" name="tautan_luar" value="<?= htmlspecialchars($row['tautan_luar']) ?>" placeholder="https://...">
                                            </div>
                                            <?php endif; ?>

                                            <div class="row bg-light p-3 rounded mx-0">
                                                <?php if ($kat != 'repo') : ?>
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label fw-bold">Ganti Cover (JPG/PNG)</label>
                                                    <input type="file" class="form-control" name="cover_gambar" accept="image/*">
                                                </div>
                                                <?php endif; ?>
                                                
                                                <?php if ($kat != 'opac') : ?>
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label fw-bold">Ganti Dokumen (PDF)</label>
                                                    <input type="file" class="form-control" name="file_lampiran" accept=".pdf">
                                                </div>
                                                <?php endif; ?>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary"><i class="fas fa-save me-1"></i> Simpan Perubahan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalTambahKoleksi" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content border-0 shadow">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title fw-bold">Tambah <?= $title ?></h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <form action="index.php?module=perpustakaan&act=proses_koleksi" method="POST" enctype="multipart/form-data">
                    <div class="modal-body text-start">
                        <input type="hidden" name="aksi" value="tambah_koleksi">
                        <input type="hidden" name="kategori_koleksi" value="<?= $kat ?>">
                        
                        <div class="mb-3">
                            <label class="form-label fw-bold">Judul <?= ($kat == 'repo') ? 'Skripsi' : 'Buku/Literatur' ?> <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="judul" required>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold"><?= ($kat == 'repo') ? 'Nama Mahasiswa' : 'Penulis/Pengarang' ?> <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="penulis_pengarang" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <?php if ($kat == 'repo') : ?>
                                    <label class="form-label fw-bold">Program Studi <span class="text-danger">*</span></label>
                                    <select class="form-select" name="program_studi" required>
                                        <option value="Pembangunan Sosial">Pembangunan Sosial</option>
                                        <option value="Ilmu Pemerintahan">Ilmu Pemerintahan</option>
                                    </select>
                                <?php else : ?>
                                    <label class="form-label fw-bold">Penerbit</label>
                                    <input type="text" class="form-control" name="penerbit">
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-bold">Tahun <?= ($kat == 'repo') ? 'Lulus' : 'Terbit' ?> <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="tahun_terbit" required>
                            </div>
                            
                            <?php if ($kat == 'opac' || $kat == 'berkala') : ?>
                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-bold">ISBN / ISSN</label>
                                <input type="text" class="form-control" name="isbn_issn">
                            </div>
                            <?php endif; ?>

                            <?php if ($kat == 'opac') : ?>
                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-bold">Stok Fisik</label>
                                <input type="number" class="form-control" name="stok_fisik" value="1" min="0" required>
                            </div>
                            <?php endif; ?>

                            <?php if ($kat == 'berkala') : ?>
                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-bold">Edisi / Volume</label>
                                <input type="text" class="form-control" name="edisi_volume">
                            </div>
                            <?php endif; ?>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold"><?= ($kat == 'repo') ? 'Abstrak Skripsi' : 'Deskripsi Singkat' ?></label>
                            <textarea class="form-control" name="abstrak_deskripsi" rows="3"></textarea>
                        </div>

                        <?php if ($kat != 'opac') : ?>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Tautan Eksternal (Opsional)</label>
                            <input type="url" class="form-control" name="tautan_luar" placeholder="https://...">
                        </div>
                        <?php endif; ?>

                        <div class="row bg-light p-3 rounded mx-0">
                            <?php if ($kat != 'repo') : ?>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Upload Cover (JPG/PNG)</label>
                                <input type="file" class="form-control" name="cover_gambar" accept="image/*">
                            </div>
                            <?php endif; ?>
                            
                            <?php if ($kat != 'opac') : ?>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Upload Dokumen (PDF)</label>
                                <input type="file" class="form-control" name="file_lampiran" accept=".pdf">
                            </div>
                            <?php endif; ?>
                        </div>

                    </div>
                    <div class="modal-footer bg-light">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-plus me-1"></i> Simpan Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>