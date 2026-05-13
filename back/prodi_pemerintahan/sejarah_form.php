<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");

$prodi = 'pemerintahan';
$query = $koneksi->query("SELECT * FROM prodi_sejarah WHERE prodi = '$prodi'");
$data = $query->fetch_assoc();

$id_sejarah = $data['id'] ?? '';
$konten = $data['konten_sejarah'] ?? '';
$gambar_lama = $data['file_gambar'] ?? '';
?>

<div class="container-xl px-4 mt-4">
    <div class="card mb-4 shadow-sm">
        <div class="card-header bg-info text-white">
            <i class="fas fa-history me-1"></i> Kelola Sejarah Prodi
        </div>
        <div class="card-body">
            <form action="index.php?module=prodi_pemerintahan&act=proses_sejarah" method="POST" enctype="multipart/form-data">
                
                <input type="hidden" name="id" value="<?= htmlspecialchars($id_sejarah) ?>">
                <input type="hidden" name="prodi" value="<?= $prodi ?>">
                <input type="hidden" name="gambar_lama" value="<?= htmlspecialchars($gambar_lama) ?>">

                <div class="mb-3">
                    <label class="form-label fw-bold">Foto/Gambar Pendukung Sejarah</label><br>
                    <?php if (!empty($gambar_lama)): ?>
                        <img src="uploads/profil/<?= $gambar_lama ?>" class="img-fluid rounded border mb-2" style="max-height: 200px;">
                    <?php endif; ?>
                    <input class="form-control" type="file" name="file_gambar" accept="image/*">
                    <small class="text-muted">Biarkan kosong jika tidak ingin mengubah gambar.</small>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold" for="konten_sejarah">Naskah Sejarah Prodi</label>
                    <textarea class="form-control" id="konten_sejarah" name="konten_sejarah" rows="10" placeholder="Ketikkan sejarah prodi..."><?= htmlspecialchars($konten) ?></textarea>
                </div>

                <button class="btn btn-info text-white" type="submit"><i class="fas fa-save me-1"></i> Simpan Sejarah</button>
            </form>
        </div>
    </div>
</div>