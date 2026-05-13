<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");

// Ambil data profil (karena hanya 1 baris, kita ambil data pertama)
$data = $koneksi->query("SELECT * FROM kema_profil LIMIT 1")->fetch_assoc();

$judul  = $data['judul'] ?? 'Profil Biro Kemahasiswaan';
$konten = $data['konten_profil'] ?? '';
$gambar = $data['file_struktur'] ?? '';
?>

<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

<div class="container-xl px-4 mt-4">
    <div class="card shadow-sm border-top-lg border-top-primary">
        <div class="card-header fw-bold text-primary">Kelola Profil Kemahasiswaan</div>
        <div class="card-body">
            <form action="index.php?module=kemahasiswaan&act=proses_profil" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="gambar_lama" value="<?= htmlspecialchars($gambar) ?>">
                
                <div class="mb-3">
                    <label class="fw-bold">Judul Halaman</label>
                    <input class="form-control form-control-lg" name="judul" type="text" value="<?= htmlspecialchars($judul) ?>" required>
                </div>
                
                <div class="mb-3">
                    <label class="fw-bold">Teks Profil (Visi, Misi, Tugas Pokok)</label>
                    <textarea id="editor_profil" name="konten"><?= htmlspecialchars($konten) ?></textarea>
                </div>

                <div class="mb-3">
                    <label class="fw-bold">Gambar Struktur Organisasi</label>
                    <input class="form-control" name="file_struktur" type="file" accept="image/*">
                    <?php if(!empty($gambar)): ?>
                        <div class="mt-2"><img src="uploads/kemahasiswaan_pusat/<?= $gambar ?>" height="100" class="rounded border"></div>
                    <?php endif; ?>
                </div>

                <button class="btn btn-primary px-4" type="submit"><i class="fas fa-save me-1"></i> Simpan Profil</button>
            </form>
        </div>
    </div>
</div>

<script>
    ClassicEditor.create(document.querySelector('#editor_profil')).catch(error => { console.error(error); });
</script>