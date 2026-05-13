<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");

$prodi = 'pemerintahan';
$query = $koneksi->query("SELECT * FROM prodi_profil_dosen_desc WHERE prodi = '$prodi'");
$data = $query->fetch_assoc();

$id_desc = $data['id'] ?? '';
$deskripsi = $data['deskripsi_singkat'] ?? '';
$gambar_lama = $data['file_gambar_bersama'] ?? '';
?>

<div class="container-xl px-4 mt-4">
    <div class="card mb-4 shadow-sm">
        <div class="card-header bg-secondary text-white">
            <i class="fas fa-users me-1"></i> Kelola Halaman Profil Dosen
        </div>
        <div class="card-body">
            <div class="alert alert-light border-start-lg border-start-secondary mb-4">
                Fitur ini mengatur <strong>Teks Pengantar</strong> dan <strong>Foto Bersama Dosen</strong> yang akan muncul di bagian paling atas pada halaman Daftar Dosen di website utama.
            </div>

            <form action="index.php?module=prodi_pemerintahan&act=proses_profil_dosen_desc" method="POST" enctype="multipart/form-data">
                
                <input type="hidden" name="id" value="<?= htmlspecialchars($id_desc) ?>">
                <input type="hidden" name="prodi" value="<?= $prodi ?>">
                <input type="hidden" name="gambar_lama" value="<?= htmlspecialchars($gambar_lama) ?>">

                <div class="mb-3">
                    <label class="form-label fw-bold">Foto Bersama / Banner Dosen</label><br>
                    <?php if (!empty($gambar_lama)): ?>
                        <img src="uploads/profil/<?= $gambar_lama ?>" class="img-fluid rounded border mb-2" style="max-height: 200px;">
                    <?php endif; ?>
                    <input class="form-control" type="file" name="file_gambar_bersama" accept="image/*">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold" for="deskripsi_singkat">Deskripsi Singkat / Pengantar</label>
                    <textarea class="form-control" id="deskripsi_singkat" name="deskripsi_singkat" rows="4" placeholder="Misal: Dosen Ilmu Pemerintahan terdiri dari pakar dan praktisi yang berpengalaman..."><?= htmlspecialchars($deskripsi) ?></textarea>
                </div>

                <button class="btn btn-secondary" type="submit"><i class="fas fa-save me-1"></i> Simpan Halaman</button>
            </form>
        </div>
    </div>
</div>