<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");

$prodi = 'pemerintahan';
$query = $koneksi->query("SELECT * FROM prodi_struktur_organisasi WHERE prodi = '$prodi'");
$data = $query->fetch_assoc();

$id_struktur = $data['id'] ?? '';
$deskripsi = $data['deskripsi'] ?? '';
$gambar_lama = $data['file_gambar'] ?? '';
?>

<div class="container-xl px-4 mt-4">
    <div class="card mb-4 shadow-sm">
        <div class="card-header bg-success text-white">Kelola Struktur Organisasi</div>
        <div class="card-body">
            <!-- PENTING: enctype="multipart/form-data" wajib untuk upload file -->
            <form action="index.php?module=prodi_pemerintahan&act=proses_struktur" method="POST" enctype="multipart/form-data">
                
                <input type="hidden" name="id" value="<?= htmlspecialchars($id_struktur) ?>">
                <input type="hidden" name="prodi" value="<?= $prodi ?>">
                <input type="hidden" name="gambar_lama" value="<?= htmlspecialchars($gambar_lama) ?>">

                <div class="mb-3">
                    <label class="form-label fw-bold">Bagan Struktur Organisasi Saat Ini</label><br>
                    <?php if (!empty($gambar_lama)): ?>
                        <img src="uploads/struktur/<?= $gambar_lama ?>" class="img-fluid rounded border mb-2" style="max-height: 200px;">
                    <?php else: ?>
                        <div class="alert alert-warning py-2">Belum ada bagan struktur yang diunggah.</div>
                    <?php endif; ?>
                    <input class="form-control" type="file" name="file_gambar" accept="image/*">
                    <small class="text-muted">Biarkan kosong jika tidak ingin mengubah gambar.</small>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold" for="deskripsi">Deskripsi Singkat</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"><?= htmlspecialchars($deskripsi) ?></textarea>
                </div>

                <button class="btn btn-success" type="submit"><i class="fas fa-save me-1"></i> Simpan Struktur</button>
            </form>
        </div>
    </div>
</div>