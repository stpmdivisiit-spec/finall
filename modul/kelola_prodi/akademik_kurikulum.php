<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");

// 1. DETEKSI PRODI
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

// 2. AMBIL DATA KURIKULUM (Diurutkan berdasarkan semester lalu nama mk)
$query = $koneksi->query("SELECT * FROM prodi_kurikulum WHERE prodi = '$prodi' ORDER BY semester ASC, jenis_mk DESC, nama_mk ASC");
?>

<header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
    <div class="container-xl px-4">
        <div class="page-header-content">
            <div class="row align-items-center pt-3">
                <div class="col-auto mb-3">
                    <h1 class="page-header-title">
                        <div class="page-header-icon"><i data-feather="book-open"></i></div>
                        Kelola Kurikulum OBE - <?= $nama_prodi ?>
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
                    <i class="fas fa-plus-circle me-2"></i> Tambah Mata Kuliah
                </div>
                <div class="card-body bg-light">
                    <form action="index.php?module=<?= $mod_aktif ?>&act=proses_kurikulum" method="POST">
                        <input type="hidden" name="prodi" value="<?= $prodi ?>">
                        <input type="hidden" name="redirect_module" value="<?= $mod_aktif ?>">
                        
                        <div class="mb-3">
                            <label class="form-label fw-bold text-dark">Pilih Semester <span class="text-danger">*</span></label>
                            <select class="form-select" name="semester" required>
                                <option value="">-- Semester --</option>
                                <?php for($i=1; $i<=8; $i++): ?>
                                    <option value="<?= $i ?>">Semester <?= $i ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold text-dark">Kode MK <span class="text-danger">*</span></label>
                            <input class="form-control" name="kode_mk" type="text" placeholder="Contoh: UNI101" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold text-dark">Nama Mata Kuliah <span class="text-danger">*</span></label>
                            <input class="form-control" name="nama_mk" type="text" placeholder="Contoh: Pendidikan Agama Katolik" required>
                        </div>
                        <div class="row gx-3 mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold text-dark">Bobot SKS <span class="text-danger">*</span></label>
                                <input class="form-control" name="sks" type="number" min="1" max="6" value="3" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold text-dark">Sifat MK <span class="text-danger">*</span></label>
                                <select class="form-select" name="jenis_mk">
                                    <option value="Wajib">Wajib</option>
                                    <option value="Pilihan">Pilihan</option>
                                </select>
                            </div>
                        </div>
                        <button class="btn <?= $btn_color ?> w-100 rounded-pill fw-bold" type="submit">Simpan Mata Kuliah</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-8 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-dark text-white">
                    <i class="fas fa-list me-2"></i> Daftar Mata Kuliah
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover mb-0">
                            <thead class="bg-light text-dark">
                                <tr>
                                    <th class="text-center">Smt</th>
                                    <th>Kode</th>
                                    <th>Mata Kuliah</th>
                                    <th class="text-center">SKS</th>
                                    <th class="text-center">Sifat</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if($query->num_rows > 0): ?>
                                    <?php while($row = $query->fetch_assoc()): ?>
                                    <tr>
                                        <td class="text-center fw-bold text-primary"><?= $row['semester'] ?></td>
                                        <td class="fw-bold"><?= htmlspecialchars($row['kode_mk']) ?></td>
                                        <td><?= htmlspecialchars($row['nama_mk']) ?></td>
                                        <td class="text-center"><?= $row['sks'] ?></td>
                                        <td class="text-center">
                                            <?php if($row['jenis_mk'] == 'Wajib'): ?>
                                                <span class="badge bg-success">Wajib</span>
                                            <?php else: ?>
                                                <span class="badge bg-warning text-dark">Pilihan</span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="text-center">
                                            <a href="index.php?module=<?= $mod_aktif ?>&act=hapus_kurikulum&id=<?= $row['id'] ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Yakin ingin menghapus MK ini dari kurikulum?')"><i class="fas fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                    <?php endwhile; ?>
                                <?php else: ?>
                                    <tr><td colspan="6" class="text-center py-4 text-muted">Belum ada mata kuliah yang diinputkan.</td></tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>