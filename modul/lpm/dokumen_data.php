<?php if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!"); 
// C:\xampp\htdocs\FINAL\modul\lpm\dokumen_data.php

$kat = $_GET['kat'] ?? 'kebijakan_mutu';

// Pemetaan Judul berdasarkan URL
$kategori_map = [
    'kebijakan_mutu' => ['Kebijakan Mutu', 'fa-file-contract'],
    'manual_mutu' => ['Manual Mutu', 'fa-book'],
    'standar_mutu' => ['Standar Mutu', 'fa-list-alt'],
    'formulir_sop' => ['Formulir & SOP', 'fa-edit'],
    // Bisa ditambah kategori lain nantinya
];

$judul_halaman = $kategori_map[$kat][0] ?? 'Dokumen LPM';
$ikon_halaman = $kategori_map[$kat][1] ?? 'fa-folder';
?>

<div class="container-fluid px-4 mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800 fw-bold"><i class="fas <?= $ikon_halaman ?> me-2 text-success"></i><?= $judul_halaman ?></h1>
        <button class="btn btn-success shadow-sm rounded-pill px-3" data-bs-toggle="modal" data-bs-target="#modalTambahDokumen">
            <i class="fas fa-upload me-1"></i> Unggah Dokumen
        </button>
    </div>

    <div class="card shadow-sm border-0 mb-4 border-top border-4 border-success">
        <div class="card-header bg-white py-3">
            <h6 class="m-0 font-weight-bold text-success">Daftar <?= $judul_halaman ?></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-bordered" id="datatablesSimple" width="100%">
                    <thead class="table-light">
                        <tr>
                            <th width="5%">No</th>
                            <th width="15%">Tgl. Upload</th>
                            <th width="35%">Nama Dokumen</th>
                            <th width="20%">Deskripsi Singkat</th>
                            <th width="10%" class="text-center">File</th>
                            <th width="15%" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $query = $koneksi->query("SELECT * FROM lpm_dokumen WHERE kategori = '$kat' ORDER BY id DESC");
                        
                        // Error handling agar tidak terjadi fetch_assoc() on bool
                        if ($query) {
                            if ($query->num_rows > 0) {
                                while ($row = $query->fetch_assoc()) :
                        ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= date('d M Y', strtotime($row['tanggal_upload'])) ?></td>
                            <td class="fw-bold text-dark"><?= htmlspecialchars($row['nama_dokumen']) ?></td>
                            <td class="small text-muted"><?= htmlspecialchars($row['deskripsi']) ?></td>
                            <td class="text-center">
                                <a href="uploads/lpm/dokumen/<?= $row['file_dokumen'] ?>" target="_blank" class="btn btn-sm btn-outline-success rounded-pill" title="Lihat/Unduh">
                                    <i class="fas fa-download"></i> Unduh
                                </a>
                            </td>
                            <td class="text-center">
                                <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalEdit<?= $row['id'] ?>"><i class="fas fa-edit"></i></button>
                                <a href="index.php?module=lpm&act=hapus_dokumen&kat=<?= $kat ?>&id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus dokumen ini permanen?');"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>

                        <div class="modal fade" id="modalEdit<?= $row['id'] ?>" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content border-0 shadow">
                                    <div class="modal-header bg-light">
                                        <h5 class="modal-title fw-bold">Edit Dokumen Mutu</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <form action="index.php?module=lpm&act=proses_dokumen" method="POST" enctype="multipart/form-data">
                                        <div class="modal-body text-start">
                                            <input type="hidden" name="aksi" value="edit_dokumen">
                                            <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                            <input type="hidden" name="kategori" value="<?= $kat ?>">
                                            <input type="hidden" name="file_lama" value="<?= $row['file_dokumen'] ?>">
                                            
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Nama Dokumen</label>
                                                <input type="text" class="form-control" name="nama_dokumen" value="<?= htmlspecialchars($row['nama_dokumen']) ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Tanggal Dokumen</label>
                                                <input type="date" class="form-control" name="tanggal_upload" value="<?= $row['tanggal_upload'] ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Deskripsi Singkat</label>
                                                <textarea class="form-control" name="deskripsi" rows="2"><?= htmlspecialchars($row['deskripsi']) ?></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Update File (PDF/DOC/XLS)</label>
                                                <input type="file" class="form-control" name="file_dokumen" accept=".pdf, .doc, .docx, .xls, .xlsx">
                                                <small class="text-muted">Biarkan kosong jika tidak ingin mengubah file.</small>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-success"><i class="fas fa-save me-1"></i> Simpan Perubahan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <?php 
                                endwhile; 
                            } else {
                                echo "<tr><td colspan='6' class='text-center py-4 text-muted'>Belum ada dokumen yang diunggah pada kategori ini.</td></tr>";
                            }
                        } else {
                            echo "<tr><td colspan='6' class='text-center py-4 text-danger fw-bold'>Tabel 'lpm_dokumen' tidak ditemukan di database. Pastikan Anda telah menjalankan perintah SQL.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalTambahDokumen" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content border-0 shadow">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title fw-bold">Unggah Dokumen Baru</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <form action="index.php?module=lpm&act=proses_dokumen" method="POST" enctype="multipart/form-data">
                    <div class="modal-body text-start">
                        <input type="hidden" name="aksi" value="tambah_dokumen">
                        <input type="hidden" name="kategori" value="<?= $kat ?>">
                        
                        <div class="mb-3">
                            <label class="form-label fw-bold">Nama Dokumen <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="nama_dokumen" placeholder="Contoh: SK Rektor Tentang Kebijakan Mutu" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Tanggal Dokumen <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" name="tanggal_upload" value="<?= date('Y-m-d') ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Deskripsi Singkat</label>
                            <textarea class="form-control" name="deskripsi" rows="2" placeholder="Penjelasan isi dokumen..."></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">File Dokumen <span class="text-danger">*</span></label>
                            <input type="file" class="form-control" name="file_dokumen" accept=".pdf, .doc, .docx, .xls, .xlsx" required>
                        </div>
                    </div>
                    <div class="modal-footer bg-light">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success"><i class="fas fa-upload me-1"></i> Unggah Dokumen</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>