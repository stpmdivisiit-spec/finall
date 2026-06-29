<?php if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!"); 
// C:\xampp\htdocs\FINAL\modul\perpustakaan\layanan_data.php
$kat = $_GET['kat'] ?? '';
?>

<div class="container-fluid px-4 mt-4">
    
    <?php if ($kat == 'bebas') : ?>
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 mb-0 text-gray-800 fw-bold"><i class="fas fa-file-signature me-2"></i>Data Surat Bebas Pustaka</h1>
            <button class="btn btn-primary shadow-sm rounded-pill px-3" data-bs-toggle="modal" data-bs-target="#modalTambah">
                <i class="fas fa-plus me-1"></i> Tambah Data
            </button>
        </div>

        <div class="card shadow-sm border-0 mb-4">
            <div class="card-header bg-white py-3">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Mahasiswa Bebas Pustaka</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered" id="datatablesSimple" width="100%" cellspacing="0">
                        <thead class="table-light">
                            <tr>
                                <th>No</th>
                                <th>NIM</th>
                                <th>Nama Mahasiswa</th>
                                <th>Program Studi</th>
                                <th>Tanggal Terbit</th>
                                <th>File Surat</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $query = $koneksi->query("SELECT * FROM perpus_layanan_bebas ORDER BY tanggal_terbit DESC");
                            while ($row = $query->fetch_assoc()) :
                            ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><span class="badge bg-secondary"><?= htmlspecialchars($row['nim']) ?></span></td>
                                <td class="fw-bold"><?= htmlspecialchars($row['nama_mahasiswa']) ?></td>
                                <td><?= htmlspecialchars($row['program_studi']) ?></td>
                                <td><?= date('d M Y', strtotime($row['tanggal_terbit'])) ?></td>
                                <td class="text-center">
                                    <?php if (!empty($row['file_surat'])) : ?>
                                        <a href="uploads/perpustakaan/layanan/<?= $row['file_surat'] ?>" target="_blank" class="btn btn-sm btn-outline-info rounded-pill"><i class="fas fa-eye"></i> Lihat</a>
                                    <?php else: ?>
                                        <span class="text-muted small">Tidak ada file</span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalEdit<?= $row['id'] ?>"><i class="fas fa-edit"></i></button>
                                    <a href="index.php?module=perpustakaan&act=hapus_layanan&kat=bebas&id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah kamu yakin ingin menghapus data ini?');"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>

                            <div class="modal fade" id="modalEdit<?= $row['id'] ?>" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content border-0 shadow">
                                        <div class="modal-header bg-light">
                                            <h5 class="modal-title fw-bold">Edit Data Bebas Pustaka</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="index.php?module=perpustakaan&act=proses_layanan" method="POST" enctype="multipart/form-data">
                                            <div class="modal-body">
                                                <input type="hidden" name="aksi" value="edit_bebas">
                                                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                                <input type="hidden" name="file_lama" value="<?= $row['file_surat'] ?>">
                                                
                                                <div class="mb-3">
                                                    <label class="form-label">NIM</label>
                                                    <input type="text" class="form-control" name="nim" value="<?= htmlspecialchars($row['nim']) ?>" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Nama Mahasiswa</label>
                                                    <input type="text" class="form-control" name="nama_mahasiswa" value="<?= htmlspecialchars($row['nama_mahasiswa']) ?>" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Program Studi</label>
                                                    <select class="form-select" name="program_studi" required>
                                                        <option value="Pembangunan Sosial" <?= ($row['program_studi'] == 'Pembangunan Sosial') ? 'selected' : '' ?>>Pembangunan Sosial</option>
                                                        <option value="Ilmu Pemerintahan" <?= ($row['program_studi'] == 'Ilmu Pemerintahan') ? 'selected' : '' ?>>Ilmu Pemerintahan</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Tanggal Terbit</label>
                                                    <input type="date" class="form-control" name="tanggal_terbit" value="<?= $row['tanggal_terbit'] ?>" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Update File Surat (PDF/JPG)</label>
                                                    <input type="file" class="form-control" name="file_surat" accept=".pdf, .jpg, .jpeg, .png">
                                                    <small class="text-muted">Biarkan kosong jika tidak ingin mengubah file.</small>
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

        <div class="modal fade" id="modalTambah" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content border-0 shadow">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title fw-bold">Tambah Surat Bebas Pustaka</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="index.php?module=perpustakaan&act=proses_layanan" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">
                            <input type="hidden" name="aksi" value="tambah_bebas">
                            <div class="mb-3">
                                <label class="form-label fw-bold">NIM</label>
                                <input type="text" class="form-control" name="nim" placeholder="Masukkan NIM" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Nama Lengkap</label>
                                <input type="text" class="form-control" name="nama_mahasiswa" placeholder="Nama Mahasiswa" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Program Studi</label>
                                <select class="form-select" name="program_studi" required>
                                    <option value="" disabled selected>Pilih Program Studi...</option>
                                    <option value="Pembangunan Sosial">Pembangunan Sosial</option>
                                    <option value="Ilmu Pemerintahan">Ilmu Pemerintahan</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Tanggal Terbit</label>
                                <input type="date" class="form-control" name="tanggal_terbit" value="<?= date('Y-m-d') ?>" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Upload File (Opsional)</label>
                                <input type="file" class="form-control" name="file_surat" accept=".pdf, .jpg, .jpeg, .png">
                                <small class="text-muted">Maksimal 2MB. Format: PDF, JPG, PNG.</small>
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


    <?php elseif ($kat == 'referensi') : ?>
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 mb-0 text-gray-800 fw-bold"><i class="fas fa-bookmark me-2"></i>Data Layanan Referensi</h1>
            <button class="btn btn-primary shadow-sm rounded-pill px-3" data-bs-toggle="modal" data-bs-target="#modalTambahRef">
                <i class="fas fa-plus me-1"></i> Tambah Referensi
            </button>
        </div>

        <div class="card shadow-sm border-0 mb-4">
            <div class="card-header bg-white py-3">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Sumber Referensi Digital</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered" id="datatablesSimple" width="100%" cellspacing="0">
                        <thead class="table-light">
                            <tr>
                                <th width="5%">No</th>
                                <th width="15%">Jenis Referensi</th>
                                <th width="25%">Judul / Sumber</th>
                                <th width="30%">Deskripsi Singkat</th>
                                <th width="10%" class="text-center">Tautan</th>
                                <th width="15%" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $query = $koneksi->query("SELECT * FROM perpus_layanan_referensi ORDER BY id DESC");
                            while ($row = $query->fetch_assoc()) :
                            ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><span class="badge bg-info text-dark"><?= htmlspecialchars($row['jenis_referensi']) ?></span></td>
                                <td class="fw-bold"><?= htmlspecialchars($row['judul_referensi']) ?></td>
                                <td><?= htmlspecialchars($row['deskripsi']) ?></td>
                                <td class="text-center">
                                    <a href="<?= htmlspecialchars($row['link_tautan']) ?>" target="_blank" class="btn btn-sm btn-outline-primary rounded-pill" title="Kunjungi Tautan"><i class="fas fa-external-link-alt"></i> Buka</a>
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalEditRef<?= $row['id'] ?>"><i class="fas fa-edit"></i></button>
                                    <a href="index.php?module=perpustakaan&act=hapus_layanan&kat=referensi&id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah kamu yakin ingin menghapus referensi ini?');"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>

                            <div class="modal fade" id="modalEditRef<?= $row['id'] ?>" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content border-0 shadow">
                                        <div class="modal-header bg-light">
                                            <h5 class="modal-title fw-bold">Edit Sumber Referensi</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="index.php?module=perpustakaan&act=proses_layanan" method="POST">
                                            <div class="modal-body text-start">
                                                <input type="hidden" name="aksi" value="edit_referensi">
                                                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                                
                                                <div class="mb-3">
                                                    <label class="form-label fw-bold">Jenis Referensi</label>
                                                    <select class="form-select" name="jenis_referensi" required>
                                                        <option value="Jurnal Ilmiah" <?= ($row['jenis_referensi'] == 'Jurnal Ilmiah') ? 'selected' : '' ?>>Jurnal Ilmiah</option>
                                                        <option value="E-Book & Repositori" <?= ($row['jenis_referensi'] == 'E-Book & Repositori') ? 'selected' : '' ?>>E-Book & Repositori</option>
                                                        <option value="Kamus & Ensiklopedia" <?= ($row['jenis_referensi'] == 'Kamus & Ensiklopedia') ? 'selected' : '' ?>>Kamus & Ensiklopedia</option>
                                                        <option value="Panduan Akademik" <?= ($row['jenis_referensi'] == 'Panduan Akademik') ? 'selected' : '' ?>>Panduan Akademik</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label fw-bold">Judul / Nama Sumber</label>
                                                    <input type="text" class="form-control" name="judul_referensi" value="<?= htmlspecialchars($row['judul_referensi']) ?>" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label fw-bold">Deskripsi</label>
                                                    <textarea class="form-control" name="deskripsi" rows="3" required><?= htmlspecialchars($row['deskripsi']) ?></textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label fw-bold">URL Tautan</label>
                                                    <input type="url" class="form-control" name="link_tautan" value="<?= htmlspecialchars($row['link_tautan']) ?>" placeholder="https://" required>
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

        <div class="modal fade" id="modalTambahRef" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content border-0 shadow">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title fw-bold">Tambah Sumber Referensi</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="index.php?module=perpustakaan&act=proses_layanan" method="POST">
                        <div class="modal-body text-start">
                            <input type="hidden" name="aksi" value="tambah_referensi">
                            
                            <div class="mb-3">
                                <label class="form-label fw-bold">Jenis Referensi</label>
                                <select class="form-select" name="jenis_referensi" required>
                                    <option value="" disabled selected>Pilih Jenis Referensi...</option>
                                    <option value="Jurnal Ilmiah">Jurnal Ilmiah</option>
                                    <option value="E-Book & Repositori">E-Book & Repositori</option>
                                    <option value="Kamus & Ensiklopedia">Kamus & Ensiklopedia</option>
                                    <option value="Panduan Akademik">Panduan Akademik</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Judul / Nama Sumber</label>
                                <input type="text" class="form-control" name="judul_referensi" placeholder="Contoh: Google Scholar, Garuda Ristekdikti" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Deskripsi</label>
                                <textarea class="form-control" name="deskripsi" rows="3" placeholder="Jelaskan fungsi atau isi dari tautan referensi ini..." required></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">URL Tautan</label>
                                <input type="url" class="form-control" name="link_tautan" placeholder="https://" required>
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
        

<?php elseif ($kat == 'usulan') : ?>
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 mb-0 text-gray-800 fw-bold"><i class="fas fa-hand-holding-heart me-2"></i>Data Usulan Pengadaan Buku</h1>
            <button class="btn btn-primary shadow-sm rounded-pill px-3" data-bs-toggle="modal" data-bs-target="#modalTambahUsulan">
                <i class="fas fa-plus me-1"></i> Tambah Usulan Manual
            </button>
        </div>

        <div class="card shadow-sm border-0 mb-4">
            <div class="card-header bg-white py-3">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Rekomendasi Koleksi dari Pemustaka</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered" id="datatablesSimple" width="100%" cellspacing="0">
                        <thead class="table-light">
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Pengusul & Prodi</th>
                                <th>Detail Buku</th>
                                <th>Alasan</th>
                                <th>Status</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $query = $koneksi->query("SELECT * FROM perpus_layanan_usulan ORDER BY created_at DESC");
                            while ($row = $query->fetch_assoc()) :
                                // Logika Warna Status
                                $bg_status = 'bg-warning text-dark';
                                if ($row['status_usulan'] == 'Disetujui') $bg_status = 'bg-success';
                                elseif ($row['status_usulan'] == 'Ditolak') $bg_status = 'bg-danger';
                            ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= date('d M Y', strtotime($row['created_at'])) ?></td>
                                <td>
                                    <strong><?= htmlspecialchars($row['nama_pengusul']) ?></strong><br>
                                    <small class="text-muted"><?= htmlspecialchars($row['program_studi']) ?></small>
                                </td>
                                <td>
                                    <span class="fw-bold text-teal"><?= htmlspecialchars($row['judul_buku']) ?></span><br>
                                    <small>Pengarang: <?= htmlspecialchars($row['pengarang']) ?></small><br>
                                    <small>Penerbit: <?= htmlspecialchars($row['penerbit_tahun']) ?></small>
                                </td>
                                <td class="small"><?= htmlspecialchars($row['alasan']) ?></td>
                                <td><span class="badge <?= $bg_status ?>"><?= htmlspecialchars($row['status_usulan']) ?></span></td>
                                <td class="text-center">
                                    <button class="btn btn-warning btn-sm mb-1" data-bs-toggle="modal" data-bs-target="#modalEditUsulan<?= $row['id'] ?>"><i class="fas fa-edit"></i></button>
                                    <a href="index.php?module=perpustakaan&act=hapus_layanan&kat=usulan&id=<?= $row['id'] ?>" class="btn btn-danger btn-sm mb-1" onclick="return confirm('Hapus usulan ini?');"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>

                            <div class="modal fade" id="modalEditUsulan<?= $row['id'] ?>" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content border-0 shadow">
                                        <div class="modal-header bg-light">
                                            <h5 class="modal-title fw-bold">Tinjau Usulan & Ubah Status</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <form action="index.php?module=perpustakaan&act=proses_layanan" method="POST">
                                            <div class="modal-body text-start">
                                                <input type="hidden" name="aksi" value="edit_usulan">
                                                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                                
                                                <div class="mb-3">
                                                    <label class="form-label fw-bold">Status Usulan</label>
                                                    <select class="form-select border-primary" name="status_usulan" required>
                                                        <option value="Menunggu Review" <?= ($row['status_usulan'] == 'Menunggu Review') ? 'selected' : '' ?>>Menunggu Review</option>
                                                        <option value="Disetujui" <?= ($row['status_usulan'] == 'Disetujui') ? 'selected' : '' ?>>Disetujui (Akan Diadakan)</option>
                                                        <option value="Ditolak" <?= ($row['status_usulan'] == 'Ditolak') ? 'selected' : '' ?>>Ditolak</option>
                                                    </select>
                                                </div>
                                                <hr>
                                                <div class="mb-3">
                                                    <label class="form-label">Nama Pengusul</label>
                                                    <input type="text" class="form-control" name="nama_pengusul" value="<?= htmlspecialchars($row['nama_pengusul']) ?>" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Program Studi</label>
                                                    <select class="form-select" name="program_studi" required>
                                                        <option value="Pembangunan Sosial" <?= ($row['program_studi'] == 'Pembangunan Sosial') ? 'selected' : '' ?>>Pembangunan Sosial</option>
                                                        <option value="Ilmu Pemerintahan" <?= ($row['program_studi'] == 'Ilmu Pemerintahan') ? 'selected' : '' ?>>Ilmu Pemerintahan</option>
                                                        <option value="Dosen / Staff" <?= ($row['program_studi'] == 'Dosen / Staff') ? 'selected' : '' ?>>Dosen / Staff</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Judul Buku</label>
                                                    <input type="text" class="form-control" name="judul_buku" value="<?= htmlspecialchars($row['judul_buku']) ?>" required>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label">Pengarang</label>
                                                        <input type="text" class="form-control" name="pengarang" value="<?= htmlspecialchars($row['pengarang']) ?>" required>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label">Penerbit & Thn</label>
                                                        <input type="text" class="form-control" name="penerbit_tahun" value="<?= htmlspecialchars($row['penerbit_tahun']) ?>" required>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Alasan Usulan</label>
                                                    <textarea class="form-control" name="alasan" rows="2" required><?= htmlspecialchars($row['alasan']) ?></textarea>
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

        <div class="modal fade" id="modalTambahUsulan" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content border-0 shadow">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title fw-bold">Tambah Usulan Manual</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>
                    <form action="index.php?module=perpustakaan&act=proses_layanan" method="POST">
                        <div class="modal-body text-start">
                            <input type="hidden" name="aksi" value="tambah_usulan">
                            <input type="hidden" name="status_usulan" value="Menunggu Review"> <div class="mb-3">
                                <label class="form-label fw-bold">Nama Pengusul</label>
                                <input type="text" class="form-control" name="nama_pengusul" placeholder="Cth: Yohanes Pembaptis" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Program Studi / Jabatan</label>
                                <select class="form-select" name="program_studi" required>
                                    <option value="" disabled selected>Pilih...</option>
                                    <option value="Pembangunan Sosial">Pembangunan Sosial</option>
                                    <option value="Ilmu Pemerintahan">Ilmu Pemerintahan</option>
                                    <option value="Dosen / Staff">Dosen / Staff</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Judul Buku</label>
                                <input type="text" class="form-control" name="judul_buku" placeholder="Judul lengkap buku" required>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Pengarang</label>
                                    <input type="text" class="form-control" name="pengarang" placeholder="Nama Penulis" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Penerbit & Tahun</label>
                                    <input type="text" class="form-control" name="penerbit_tahun" placeholder="Cth: Gramedia, 2024" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Alasan Usulan</label>
                                <textarea class="form-control" name="alasan" rows="2" placeholder="Referensi mata kuliah..." required></textarea>
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


    <?php endif; ?>
</div>