<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");

// 1. DETEKSI PRODI DARI URL
$mod_aktif = isset($_GET['module']) ? $_GET['module'] : '';
if ($mod_aktif == 'prodi_sosiatri') {
    $prodi = 'sosiatri';
    $nama_prodi = 'Pembangunan Sosial (Sosiatri)';
    $bg_color = 'bg-success';
    $btn_color = 'btn-success';
    $text_color = 'text-success';
} else {
    $prodi = 'pemerintahan';
    $nama_prodi = 'Ilmu Pemerintahan';
    $bg_color = 'bg-primary';
    $btn_color = 'btn-primary';
    $text_color = 'text-primary';
}

// 2. DETEKSI KATEGORI DARI URL ACT
$kategori = isset($_GET['act']) ? $_GET['act'] : 'penelitian_dosen';

// Setup Label Dinamis Berdasarkan Kategori
if ($kategori == 'penelitian_dosen') {
    $judul_halaman = "Penelitian Dosen";
    $lbl_utama = "Ketua Peneliti (Dosen)";
    $lbl_pendamping = "Anggota Peneliti (Opsional)";
    $tampil_lokasi = false;
} elseif ($kategori == 'riset_mahasiswa') {
    $judul_halaman = "Riset Mahasiswa";
    $lbl_utama = "Nama Mahasiswa";
    $lbl_pendamping = "Dosen Pembimbing";
    $tampil_lokasi = false;
} else {
    $kategori = 'abdimas';
    $judul_halaman = "Pengabdian Masyarakat (Abdimas)";
    $lbl_utama = "Ketua Pelaksana";
    $lbl_pendamping = "Anggota Pelaksana";
    $tampil_lokasi = true;
    $lbl_lokasi = "Lokasi Pelaksanaan / Mitra";
}

// Ambil Data dari Database
$query = $koneksi->query("SELECT * FROM prodi_riset_abdimas WHERE prodi = '$prodi' AND kategori = '$kategori' ORDER BY tahun DESC, id DESC");
?>

<div class="container-xl px-4 mt-4">
    <div class="row">
        <div class="col-lg-4 mb-4">
            <div class="card shadow-sm border-top-lg border-top-<?= str_replace('bg-', '', $bg_color) ?>">
                <div class="card-header <?= $text_color ?> fw-bold bg-white">Tambah Data <?= $judul_halaman ?></div>
                <div class="card-body bg-light">
                    <form action="index.php?module=<?= $mod_aktif ?>&act=proses_riset_abdimas" method="POST" enctype="multipart/form-data">
                        
                        <input type="hidden" name="prodi" value="<?= $prodi ?>">
                        <input type="hidden" name="kategori" value="<?= $kategori ?>">
                        <input type="hidden" name="redirect_module" value="<?= $mod_aktif ?>">
                        <input type="hidden" name="act_redir" value="<?= $kategori ?>"> 
                        
                        <div class="mb-3">
                            <label class="small mb-1 fw-bold text-dark">Judul <?= $judul_halaman ?> <span class="text-danger">*</span></label>
                            <textarea class="form-control" name="judul" rows="2" placeholder="Masukkan judul..." required></textarea>
                        </div>
                        
                        <div class="mb-3">
                            <label class="small mb-1 fw-bold text-dark"><?= $lbl_utama ?> <span class="text-danger">*</span></label>
                            <input class="form-control" name="personil_utama" type="text" placeholder="Nama lengkap & gelar" required>
                        </div>

                        <div class="mb-3">
                            <label class="small mb-1 fw-bold text-dark"><?= $lbl_pendamping ?></label>
                            <input class="form-control" name="personil_pendamping" type="text" placeholder="Kosongkan jika tidak ada">
                        </div>

                        <?php if ($tampil_lokasi): ?>
                        <div class="mb-3">
                            <label class="small mb-1 fw-bold text-dark"><?= $lbl_lokasi ?> <span class="text-danger">*</span></label>
                            <input class="form-control" name="keterangan_lokasi" type="text" placeholder="Cth: Desa Oebelo, Kupang" required>
                        </div>
                        <?php else: ?>
                            <input type="hidden" name="keterangan_lokasi" value="-">
                        <?php endif; ?>

                        <div class="row gx-3 mb-3">
                            <div class="col-md-5">
                                <label class="small mb-1 fw-bold text-dark">Tahun <span class="text-danger">*</span></label>
                                <input class="form-control" name="tahun" type="number" min="2000" max="2099" value="<?= date('Y') ?>" required>
                            </div>
                            <div class="col-md-7">
                                <label class="small mb-1 fw-bold text-dark">Laporan (PDF) <span class="text-danger">*</span></label>
                                <input class="form-control" name="file_dokumen" type="file" accept=".pdf" required>
                            </div>
                        </div>

                        <button class="btn <?= $btn_color ?> w-100 rounded-pill fw-bold" type="submit"><i class="fas fa-save me-1"></i> Simpan Data</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-8 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-dark text-white">Daftar <?= $judul_halaman ?> - <?= $nama_prodi ?></div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover mb-0" id="datatablesSimple">
                            <thead class="bg-light text-dark">
                                <tr>
                                    <th class="text-center" width="10%">Tahun</th>
                                    <th width="65%">Informasi Dokumen</th>
                                    <th class="text-center" width="10%">PDF</th>
                                    <th class="text-center" width="15%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if($query->num_rows > 0): ?>
                                    <?php while($row = $query->fetch_assoc()): ?>
                                    <tr>
                                        <td class="text-center fw-bold <?= $text_color ?> align-middle"><?= $row['tahun'] ?></td>
                                        <td>
                                            <div class="fw-bold mb-1 text-dark"><?= htmlspecialchars($row['judul']) ?></div>
                                            <div class="small text-muted">
                                                <i class="fas fa-user-tie me-1"></i> <?= $lbl_utama ?>: <span class="text-dark fw-bold"><?= htmlspecialchars($row['personil_utama']) ?></span>
                                            </div>
                                            <?php if(!empty($row['personil_pendamping'])): ?>
                                            <div class="small text-muted">
                                                <i class="fas fa-users me-1"></i> <?= $lbl_pendamping ?>: <?= htmlspecialchars($row['personil_pendamping']) ?>
                                            </div>
                                            <?php endif; ?>
                                            <?php if($tampil_lokasi && !empty($row['keterangan_lokasi']) && $row['keterangan_lokasi'] != '-'): ?>
                                            <div class="small text-danger mt-1 fw-bold">
                                                <i class="fas fa-map-marker-alt me-1"></i> Lokasi: <?= htmlspecialchars($row['keterangan_lokasi']) ?>
                                            </div>
                                            <?php endif; ?>
                                        </td>
                                        <td class="text-center align-middle">
                                            <a href="uploads/riset_abdimas/<?= $row['file_dokumen'] ?>" target="_blank" class="btn btn-sm btn-outline-danger shadow-sm" title="Lihat PDF">
                                                <i class="far fa-file-pdf"></i>
                                            </a>
                                        </td>
                                        <td class="text-center align-middle">
                                            <a href="index.php?module=<?= $mod_aktif ?>&act=hapus_riset_abdimas&id=<?= $row['id'] ?>&redir=<?= $kategori ?>" class="btn btn-sm btn-outline-danger border-0" onclick="return confirm('Yakin ingin menghapus data ini secara permanen?')">
                                                <i class="fas fa-trash-alt"></i> Hapus
                                            </a>
                                        </td>
                                    </tr>
                                    <?php endwhile; ?>
                                <?php else: ?>
                                    <tr><td colspan="4" class="text-center py-4 text-muted">Belum ada data yang diinputkan.</td></tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>