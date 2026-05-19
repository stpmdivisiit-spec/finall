<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");

$mod_aktif = isset($_GET['module']) ? $_GET['module'] : '';
$prodi = ($mod_aktif == 'prodi_sosiatri') ? 'sosiatri' : 'pemerintahan';
$bg_color = ($prodi == 'sosiatri') ? 'bg-success' : 'bg-primary';

// Ambil ID jika mode Edit
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$nilai = ''; $no_sk = ''; $tahun = date('Y'); $masa_berlaku = ''; $file_lama = '';

if ($id > 0) {
    $query = $koneksi->query("SELECT * FROM prodi_akreditasi WHERE id = '$id' AND prodi = '$prodi'");
    if ($data = $query->fetch_assoc()) {
        $nilai = $data['nilai_akreditasi'];
        $no_sk = $data['no_sk'];
        $tahun = $data['tahun_sk'];
        $masa_berlaku = $data['masa_berlaku'];
        $file_lama = $data['file_sertifikat'];
    }
}
?>

<div class="container-xl px-4 mt-4">
    <div class="card shadow-sm border-0">
        <div class="card-header <?= $bg_color ?> text-white">
            <i class="fas fa-edit me-2"></i> Form Akreditasi Program Studi
        </div>
        <div class="card-body p-4">
            <form action="index.php?module=<?= $mod_aktif ?>&act=akreditasi_proses" method="POST" enctype="multipart/form-data">
                
                <input type="hidden" name="id" value="<?= $id ?>">
                <input type="hidden" name="prodi" value="<?= $prodi ?>">
                <input type="hidden" name="redirect_module" value="<?= $mod_aktif ?>">
                <input type="hidden" name="file_lama" value="<?= htmlspecialchars($file_lama) ?>">

                <div class="row gx-3 mb-4">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Nilai Akreditasi <span class="text-danger">*</span></label>
                        <select class="form-select bg-light" name="nilai_akreditasi" required>
                            <option value="">-- Pilih Nilai --</option>
                            <option value="Unggul" <?= ($nilai=='Unggul')?'selected':'' ?>>Unggul</option>
                            <option value="Baik Sekali" <?= ($nilai=='Baik Sekali')?'selected':'' ?>>Baik Sekali</option>
                            <option value="Baik" <?= ($nilai=='Baik')?'selected':'' ?>>Baik</option>
                            <option value="A" <?= ($nilai=='A')?'selected':'' ?>>A</option>
                            <option value="B" <?= ($nilai=='B')?'selected':'' ?>>B</option>
                            <option value="C" <?= ($nilai=='C')?'selected':'' ?>>C</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Tahun Penetapan SK <span class="text-danger">*</span></label>
                        <input type="number" class="form-control bg-light" name="tahun_sk" value="<?= $tahun ?>" required>
                    </div>
                </div>

                <div class="row gx-3 mb-4">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Nomor SK BAN-PT <span class="text-danger">*</span></label>
                        <input type="text" class="form-control bg-light" name="no_sk" value="<?= htmlspecialchars($no_sk) ?>" placeholder="Contoh: 1234/SK/BAN-PT/Akred/S/..." required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Masa Berlaku (Sampai) <span class="text-danger">*</span></label>
                        <input type="date" class="form-control bg-light" name="masa_berlaku" value="<?= $masa_berlaku ?>" required>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-bold">Upload Sertifikat Akreditasi (Format PDF/JPG/PNG)</label>
                    <input class="form-control" type="file" name="file_sertifikat" accept=".pdf, .jpg, .jpeg, .png">
                    <?php if(!empty($file_lama)): ?>
                        <small class="text-success mt-1 d-block"><i class="fas fa-check-circle"></i> File saat ini: <?= $file_lama ?></small>
                    <?php endif; ?>
                </div>

                <button class="btn <?= str_replace('bg-', 'btn-', $bg_color) ?> rounded-pill px-4" type="submit">
                    <i class="fas fa-save me-2"></i> Simpan Data Akreditasi
                </button>
                <a href="index.php?module=<?= $mod_aktif ?>&act=akreditasi" class="btn btn-light rounded-pill px-4 border ms-2">Batal</a>
            </form>
        </div>
    </div>
</div>