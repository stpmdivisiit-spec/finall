<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");

// 1. DETEKSI PRODI DARI URL
$mod_aktif = isset($_GET['module']) ? $_GET['module'] : '';
if ($mod_aktif == 'prodi_sosiatri') {
    $prodi = 'sosiatri';
    $nama_prodi = 'Pembangunan Sosial (Sosiatri)';
    $bg_color = 'bg-success';
    $btn_color = 'btn-success';
} else {
    $prodi = 'pemerintahan';
    $nama_prodi = 'Ilmu Pemerintahan';
    $bg_color = 'bg-primary';
    $btn_color = 'btn-primary';
}

// 2. DETEKSI KATEGORI DARI ACT
$act_aktif = isset($_GET['act']) ? $_GET['act'] : 'jadwal_kuliah';

if ($act_aktif == 'jadwal_kuliah') {
    $kategori = 'jadwal';
    $judul_halaman = "Jadwal Perkuliahan";
    $label_ket = "Tahun Akademik & Semester (Cth: 2025/2026 Ganjil)";
    $icon = "calendar";
} elseif ($act_aktif == 'buku_akademik') {
    $kategori = 'buku';
    $judul_halaman = "Buku Akademik";
    $label_ket = "Tahun Terbit / Edisi";
    $icon = "book";
} else {
    $kategori = 'skripsi';
    $judul_halaman = "Panduan Skripsi & Tugas Akhir";
    $label_ket = "Tahun Revisi / Edisi";
    $icon = "file-text";
}

// 3. AMBIL DATA DARI DATABASE
$query = $koneksi->query("SELECT * FROM prodi_dokumen_akademik WHERE prodi = '$prodi' AND kategori = '$kategori' ORDER BY id DESC");
?>

<header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
    <div class="container-xl px-4">
        <div class="page-header-content">
            <div class="row align-items-center pt-3">
                <div class="col-auto mb-3">
                    <h1 class="page-header-title">
                        <div class="page-header-icon"><i data-feather="<?= $icon ?>"></i></div>
                        Kelola <?= $judul_halaman ?> - <?= $nama_prodi ?>
                    </h1>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="container-xl px-4 mt-4">
    <div class="row">
        <div class="col-lg-4 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-header <?= $bg_color ?> text-white">
                    <i class="fas fa-upload me-2"></i> Upload <?= $judul_halaman ?>
                </div>
                <div class="card-body bg-light">
                    <form action="index.php?module=<?= $mod_aktif ?>&act=proses_dokumen" method="POST" enctype="multipart/form-data">
                        
                        <input type="hidden" name="prodi" value="<?= $prodi ?>">
                        <input type="hidden" name="kategori" value="<?= $kategori ?>">
                        <input type="hidden" name="redirect_module" value="<?= $mod_aktif ?>">
                        <input type="hidden" name="redirect_act" value="<?= $act_aktif ?>"> 
                        
                        <div class="mb-3">
                            <label class="form-label fw-bold text-dark">Judul Dokumen <span class="text-danger">*</span></label>
                            <input class="form-control" name="judul_dokumen" type="text" placeholder="Contoh: Jadwal Induk Prodi" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold text-dark"><?= $label_ket ?> <span class="text-danger">*</span></label>
                            <input class="form-control" name="keterangan" type="text" placeholder="Masukkan keterangan..." required>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-bold text-dark">File Dokumen (PDF/DOCX) <span class="text-danger">*</span></label>
                            <input class="form-control" name="file_dokumen" type="file" accept=".pdf,.doc,.docx" required>
                        </div>
                        <button class="btn <?= $btn_color ?> w-100 rounded-pill fw-bold" type="submit">
                            <i class="fas fa-save me-1"></i> Simpan Dokumen
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-8 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-dark text-white">
                    <i class="fas fa-list me-2"></i> Daftar File <?= $judul_halaman ?>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover mb-0">
                            <thead class="bg-light text-dark">
                                <tr>
                                    <th>Judul Dokumen</th>
                                    <th>Keterangan</th>
                                    <th class="text-center">Unduhan</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if($query->num_rows > 0): ?>
                                    <?php while($row = $query->fetch_assoc()): ?>
                                    <tr>
                                        <td class="fw-bold text-dark align-middle"><?= htmlspecialchars($row['judul_dokumen']) ?></td>
                                        <td class="text-muted align-middle"><?= htmlspecialchars($row['keterangan']) ?></td>
                                        <td class="text-center align-middle">
                                            <a href="uploads/akademik/<?= $row['file_dokumen'] ?>" target="_blank" class="btn btn-sm btn-outline-dark rounded-pill px-3"><i class="fas fa-download me-1"></i> File</a>
                                        </td>
                                        <td class="text-center align-middle">
                                            <a href="index.php?module=<?= $mod_aktif ?>&act=hapus_dokumen&id=<?= $row['id'] ?>&kat_redir=<?= $act_aktif ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Yakin ingin menghapus dokumen ini secara permanen?')"><i class="fas fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                    <?php endwhile; ?>
                                <?php else: ?>
                                    <tr><td colspan="4" class="text-center py-4 text-muted">Belum ada dokumen yang diunggah.</td></tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>