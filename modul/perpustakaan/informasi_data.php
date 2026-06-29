<?php if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!"); 
// C:\xampp\htdocs\FINAL\modul\perpustakaan\informasi_data.php

$kat = $_GET['kat'] ?? '';
?>

<div class="container-fluid px-4 mt-4">

    <?php if ($kat == 'acara') : ?>
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 mb-0 text-gray-800 fw-bold"><i class="fas fa-calendar-alt me-2"></i>Informasi Acara / Agenda</h1>
            <button class="btn btn-primary shadow-sm rounded-pill px-3" data-bs-toggle="modal" data-bs-target="#modalTambahAcara">
                <i class="fas fa-plus me-1"></i> Tambah Acara
            </button>
        </div>

        <div class="card shadow-sm border-0 mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered" id="datatablesSimple">
                        <thead class="table-light">
                            <tr>
                                <th width="5%">No</th>
                                <th width="25%">Nama Acara</th>
                                <th width="20%">Waktu & Tempat</th>
                                <th width="35%">Deskripsi Singkat</th>
                                <th width="15%" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $query = $koneksi->query("SELECT * FROM perpus_info_acara ORDER BY tanggal_acara DESC");
                            while ($row = $query->fetch_assoc()) :
                            ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td class="fw-bold text-teal"><?= htmlspecialchars($row['judul_acara']) ?></td>
                                <td>
                                    <i class="fas fa-calendar-day text-muted me-1"></i> <?= date('d M Y', strtotime($row['tanggal_acara'])) ?><br>
                                    <i class="fas fa-clock text-muted me-1"></i> <?= htmlspecialchars($row['waktu_acara']) ?><br>
                                    <i class="fas fa-map-marker-alt text-muted me-1"></i> <?= htmlspecialchars($row['lokasi']) ?>
                                </td>
                                <td class="small text-muted"><?= htmlspecialchars(mb_strimwidth($row['deskripsi'], 0, 100, "...")) ?></td>
                                <td class="text-center">
                                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalEditAcara<?= $row['id'] ?>"><i class="fas fa-edit"></i></button>
                                    <a href="index.php?module=perpustakaan&act=hapus_informasi&kat=acara&id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data acara ini?');"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>

                            <div class="modal fade" id="modalEditAcara<?= $row['id'] ?>" tabindex="-1">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content border-0 shadow">
                                        <div class="modal-header bg-light">
                                            <h5 class="modal-title fw-bold">Edit Acara</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <form action="index.php?module=perpustakaan&act=proses_informasi" method="POST" enctype="multipart/form-data">
                                            <div class="modal-body text-start">
                                                <input type="hidden" name="aksi" value="edit_acara">
                                                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                                <input type="hidden" name="gambar_lama" value="<?= $row['gambar_poster'] ?>">
                                                
                                                <div class="mb-3">
                                                    <label class="form-label fw-bold">Judul Acara / Agenda</label>
                                                    <input type="text" class="form-control" name="judul_acara" value="<?= htmlspecialchars($row['judul_acara']) ?>" required>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4 mb-3">
                                                        <label class="form-label fw-bold">Tanggal</label>
                                                        <input type="date" class="form-control" name="tanggal_acara" value="<?= $row['tanggal_acara'] ?>" required>
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label class="form-label fw-bold">Waktu</label>
                                                        <input type="text" class="form-control" name="waktu_acara" value="<?= htmlspecialchars($row['waktu_acara']) ?>" placeholder="Cth: 09:00 - Selesai" required>
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label class="form-label fw-bold">Lokasi</label>
                                                        <input type="text" class="form-control" name="lokasi" value="<?= htmlspecialchars($row['lokasi']) ?>" required>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label fw-bold">Deskripsi Acara</label>
                                                    <textarea class="form-control" name="deskripsi" rows="4" required><?= htmlspecialchars($row['deskripsi']) ?></textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label fw-bold">Update Poster / Banner (Opsional)</label>
                                                    <input type="file" class="form-control" name="gambar_poster" accept="image/jpeg, image/png, image/webp">
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

        <div class="modal fade" id="modalTambahAcara" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content border-0 shadow">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title fw-bold">Tambah Acara Baru</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>
                    <form action="index.php?module=perpustakaan&act=proses_informasi" method="POST" enctype="multipart/form-data">
                        <div class="modal-body text-start">
                            <input type="hidden" name="aksi" value="tambah_acara">
                            <div class="mb-3">
                                <label class="form-label fw-bold">Judul Acara / Agenda</label>
                                <input type="text" class="form-control" name="judul_acara" placeholder="Cth: Seminar Literasi Digital" required>
                            </div>
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label fw-bold">Tanggal</label>
                                    <input type="date" class="form-control" name="tanggal_acara" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label fw-bold">Waktu</label>
                                    <input type="text" class="form-control" name="waktu_acara" placeholder="Cth: 09:00 - Selesai" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label fw-bold">Lokasi</label>
                                    <input type="text" class="form-control" name="lokasi" placeholder="Cth: Aula STPM" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Deskripsi Acara</label>
                                <textarea class="form-control" name="deskripsi" rows="4" placeholder="Penjelasan mengenai acara tersebut..." required></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Poster / Banner (Opsional)</label>
                                <input type="file" class="form-control" name="gambar_poster" accept="image/jpeg, image/png, image/webp">
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

    <?php elseif ($kat == 'galeri') : ?>
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 mb-0 text-gray-800 fw-bold"><i class="fas fa-images me-2"></i>Galeri Dokumentasi</h1>
            <button class="btn btn-primary shadow-sm rounded-pill px-3" data-bs-toggle="modal" data-bs-target="#modalTambahGaleri">
                <i class="fas fa-upload me-1"></i> Unggah Foto
            </button>
        </div>

        <div class="card shadow-sm border-0 mb-4">
            <div class="card-body bg-light">
                <div class="row g-4">
                    <?php
                    $query = $koneksi->query("SELECT * FROM perpus_info_galeri ORDER BY id DESC");
                    if($query->num_rows > 0):
                    while ($row = $query->fetch_assoc()) :
                        $foto = "uploads/perpustakaan/informasi/" . $row['file_foto'];
                    ?>
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="card border-0 shadow-sm h-100 rounded-4 overflow-hidden position-relative hover-lift">
                            <a href="<?= $foto ?>" data-toggle="lightbox" data-gallery="backend-gallery" data-caption="<?= htmlspecialchars($row['judul_foto']) ?>">
                                <img src="<?= $foto ?>" class="img-fluid w-100 rounded-4" style="height: 200px; object-fit: cover; border-bottom-left-radius: 0 !important; border-bottom-right-radius: 0 !important;" alt="Galeri">
                            </a>
                            <div class="card-body text-center p-3">
                                <h6 class="text-truncate fw-bold mb-3" title="<?= htmlspecialchars($row['judul_foto']) ?>"><?= htmlspecialchars($row['judul_foto']) ?></h6>
                                <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalEditGaleri<?= $row['id'] ?>"><i class="fas fa-edit"></i> Edit</button>
                                <a href="index.php?module=perpustakaan&act=hapus_informasi&kat=galeri&id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus foto ini?');"><i class="fas fa-trash"></i> Hapus</a>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="modalEditGaleri<?= $row['id'] ?>" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content border-0 shadow">
                                <div class="modal-header bg-light">
                                    <h5 class="modal-title fw-bold">Edit Info Foto</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <form action="index.php?module=perpustakaan&act=proses_informasi" method="POST" enctype="multipart/form-data">
                                    <div class="modal-body text-start">
                                        <input type="hidden" name="aksi" value="edit_galeri">
                                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                        <input type="hidden" name="foto_lama" value="<?= $row['file_foto'] ?>">
                                        
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Caption / Judul Foto</label>
                                            <input type="text" class="form-control" name="judul_foto" value="<?= htmlspecialchars($row['judul_foto']) ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Ganti Foto (Opsional)</label>
                                            <input type="file" class="form-control" name="file_foto" accept="image/jpeg, image/png, image/webp">
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
                    <?php 
                    endwhile; 
                    else:
                        echo '<div class="col-12 text-center text-muted py-4">Belum ada foto di galeri.</div>';
                    endif;
                    ?>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modalTambahGaleri" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content border-0 shadow">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title fw-bold">Unggah Foto Galeri</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>
                    <form action="index.php?module=perpustakaan&act=proses_informasi" method="POST" enctype="multipart/form-data">
                        <div class="modal-body text-start">
                            <input type="hidden" name="aksi" value="tambah_galeri">
                            <div class="mb-3">
                                <label class="form-label fw-bold">Caption / Judul Foto <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="judul_foto" placeholder="Cth: Kegiatan Kunjungan Maba" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Pilih File Foto <span class="text-danger">*</span></label>
                                <input type="file" class="form-control" name="file_foto" accept="image/jpeg, image/png, image/webp" required>
                            </div>
                        </div>
                        <div class="modal-footer bg-light">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary"><i class="fas fa-upload me-1"></i> Unggah Foto</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        
    <?php endif; ?>
</div>

<style>
.hover-lift { transition: transform 0.2s ease, box-shadow 0.2s ease; }
.hover-lift:hover { transform: translateY(-5px); box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important; }
</style>