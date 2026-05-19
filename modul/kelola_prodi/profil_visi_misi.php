<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");

// 1. DETEKSI PRODI BERDASARKAN URL (Bukan dari Session Role)
$mod_aktif = isset($_GET['module']) ? $_GET['module'] : '';

if ($mod_aktif == 'prodi_sosiatri') {
    $prodi = 'sosiatri';
    $nama_prodi_tampil = 'Pembangunan Sosial (Sosiatri)';
    $bg_color = 'bg-success'; // Hijau khas Sosiatri
} else {
    // Default ke pemerintahan jika module=prodi_pemerintahan
    $prodi = 'pemerintahan';
    $nama_prodi_tampil = 'Ilmu Pemerintahan';
    $bg_color = 'bg-primary'; // Biru khas Pemerintahan
}

$kategori = 'visi_misi';

// 2. AMBIL DATA DARI DATABASE BERDASARKAN PRODI
$query = $koneksi->query("SELECT * FROM prodi_profil WHERE prodi = '$prodi' AND kategori = '$kategori'");
$data = $query->fetch_assoc();

$visi = $data['konten_1'] ?? '';
$misi = $data['konten_2'] ?? '';
$id_profil = $data['id'] ?? 0; // Set 0 jika data belum ada
?>

<header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
    <div class="container-xl px-4">
        <div class="page-header-content">
            <div class="row align-items-center justify-content-between pt-3">
                <div class="col-auto mb-3">
                    <h1 class="page-header-title">
                        <div class="page-header-icon"><i data-feather="target"></i></div>
                        Kelola Visi & Misi - <?= $nama_prodi_tampil ?>
                    </h1>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="container-xl px-4 mt-4">
    <div class="card mb-4 shadow-sm border-0">
        <div class="card-header <?= $bg_color ?> text-white">
            <i class="fas fa-edit me-2"></i> Form Visi & Misi - <?= $nama_prodi_tampil ?>
        </div>
        <div class="card-body p-4">
            <form action="index.php?module=<?= $mod_aktif ?>&act=proses_profil" method="POST">
                
                <input type="hidden" name="id" value="<?= htmlspecialchars($id_profil) ?>">
                <input type="hidden" name="prodi" value="<?= $prodi ?>">
                <input type="hidden" name="kategori" value="<?= $kategori ?>">
                <input type="hidden" name="redirect_module" value="<?= $mod_aktif ?>"> 
                <input type="hidden" name="redirect_act" value="visi_misi"> 

                <div class="mb-4">
                    <label class="form-label fw-bold text-dark" for="visi">Visi Program Studi</label>
                    <textarea class="form-control bg-light" id="visi" name="konten_1" rows="4" placeholder="Tuliskan Visi di sini..." required><?= htmlspecialchars($visi) ?></textarea>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-bold text-dark" for="misi">Misi Program Studi</label>
                    <textarea class="form-control bg-light editor-html" id="misi" name="konten_2" rows="6" placeholder="Tuliskan Misi di sini..." required><?= htmlspecialchars($misi) ?></textarea>
                    <div class="form-text text-muted mt-2"><i class="fas fa-info-circle me-1"></i> Gunakan penomoran (1, 2, 3) atau Bullet Points agar misi lebih mudah dibaca di halaman utama.</div>
                </div>

                <button class="btn <?= ($prodi == 'sosiatri') ? 'btn-success' : 'btn-primary' ?> rounded-pill px-4" type="submit">
                    <i class="fas fa-save me-2"></i> Simpan Perubahan
                </button>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Mengganti textarea ID 'visi' dan 'misi' menjadi Text Editor
        CKEDITOR.replace('visi', {
            height: 150,
            toolbar: [
                ['Bold', 'Italic', 'Underline', '-', 'RemoveFormat']
            ] // Toolbar sederhana untuk Visi
        });
        
        CKEDITOR.replace('misi', {
            height: 250,
            toolbar: [
                ['Bold', 'Italic', 'Underline'],
                ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent'],
                ['Link', 'Unlink'],
                ['Undo', 'Redo']
            ] // Toolbar lengkap dengan List untuk Misi
        });
    });
</script>