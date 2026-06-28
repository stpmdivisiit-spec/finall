<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");

// 1. Deteksi Prodi
$mod_aktif = isset($_GET['module']) ? $_GET['module'] : '';
if ($mod_aktif == 'prodi_sosiatri') {
    $prodi = 'sosiatri';
    $nama_prodi_tampil = 'Pembangunan Sosial (Sosiatri)';
    $bg_color = 'bg-success';
    $btn_color = 'btn-success';
} else {
    $prodi = 'pemerintahan';
    $nama_prodi_tampil = 'Ilmu Pemerintahan';
    $bg_color = 'bg-primary';
    $btn_color = 'btn-primary';
}

// 2. Ambil Naskah Sejarah Utama
$query = $koneksi->query("SELECT * FROM prodi_sejarah WHERE prodi = '$prodi' LIMIT 1");
$data = $query->fetch_assoc();

$id_sejarah = $data['id'] ?? 0;
$konten = $data['konten_sejarah'] ?? '';

// 3. Ambil Galeri Foto (Jika naskah sudah ada)
$galeri = null;
if ($id_sejarah > 0) {
    $galeri = $koneksi->query("SELECT * FROM prodi_sejarah_galeri WHERE sejarah_id = '$id_sejarah'");
}
?>

<header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
    <div class="container-xl px-4">
        <div class="page-header-content">
            <div class="row align-items-center pt-3">
                <div class="col-auto mb-3">
                    <h1 class="page-header-title">
                        <div class="page-header-icon"><i data-feather="clock"></i></div>
                        Kelola Sejarah - <?= $nama_prodi_tampil ?>
                    </h1>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="container-xl px-4 mt-4">
    <div class="card mb-4 shadow-sm border-0">
        <div class="card-header <?= $bg_color ?> text-white">
            <i class="fas fa-history me-2"></i> Form Naskah & Galeri Sejarah
        </div>
        <div class="card-body p-4">
            <form action="index.php?module=<?= $mod_aktif ?>&act=proses_sejarah" method="POST" enctype="multipart/form-data">
                
                <input type="hidden" name="id" value="<?= htmlspecialchars($id_sejarah) ?>">
                <input type="hidden" name="prodi" value="<?= $prodi ?>">
                <input type="hidden" name="redirect_module" value="<?= $mod_aktif ?>">

                <div class="alert alert-light border-start-lg border-start-<?= str_replace('bg-', '', $bg_color) ?> mb-4">
                    <i class="fas fa-info-circle me-1"></i> Gunakan format <strong>Heading 4 (H4)</strong> untuk Judul Era/Tahun dan <strong>Paragraph (P)</strong> untuk penjelasannya agar otomatis terbentuk desain <em>Timeline</em> di website pengunjung.
                </div>

                <div class="mb-4">
                    <label class="form-label fw-bold text-dark">Naskah Timeline Sejarah</label>
                    <textarea class="form-control bg-light editor-html" id="konten_sejarah" name="konten_sejarah" rows="15" required><?= htmlspecialchars($konten) ?></textarea>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-bold text-dark">Tambah Foto ke Galeri Sejarah</label>
                    <input class="form-control" type="file" name="foto_baru[]" multiple accept="image/jpeg, image/png, image/webp">
                    <small class="text-muted">Anda bisa memilih lebih dari satu foto sekaligus (Tahan tombol Ctrl saat memilih).</small>
                </div>

                <?php if($galeri && $galeri->num_rows > 0): ?>
                    <label class="form-label fw-bold text-dark mb-3 border-bottom w-100 pb-2">Galeri Foto Saat Ini:</label>
                    <div class="row gx-3 mb-4">
                        <?php while($g = $galeri->fetch_assoc()): ?>
                            <div class="col-6 col-md-3 col-lg-2 mb-3 text-center">
                                <div class="card h-100 shadow-none border bg-light">
                                    <img src="uploads/profil/<?= $g['file_gambar'] ?>" class="card-img-top" style="height: 100px; object-fit: cover;" alt="Foto Sejarah">
                                    <div class="card-body p-2">
                                        <a href="index.php?module=<?= $mod_aktif ?>&act=hapus_foto_sejarah&id_foto=<?= $g['id'] ?>" class="btn btn-sm btn-outline-danger d-block w-100" onclick="return confirm('Yakin ingin menghapus foto ini secara permanen?')"><i class="fas fa-trash me-1"></i> Hapus</a>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>

                <button class="btn <?= $btn_color ?> rounded-pill px-4" type="submit">
                    <i class="fas fa-save me-2"></i> Simpan Sejarah
                </button>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        CKEDITOR.replace('konten_sejarah', {
            height: 350,
            toolbar: [
                ['Format', 'Bold', 'Italic', 'Underline', '-', 'RemoveFormat'],
                ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', 'Blockquote'],
                ['Link', 'Unlink'],
                ['Undo', 'Redo']
            ],
            format_tags: 'p;h3;h4;h5;h6' // Batasi format agar seragam dengan desain
        });
    });
</script>