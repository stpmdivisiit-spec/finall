<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");

// Cek data Visi Misi untuk Ilmu Pemerintahan di database
$kategori = 'visi_misi';
$prodi = 'pemerintahan';

$query = $koneksi->query("SELECT * FROM prodi_profil WHERE prodi = '$prodi' AND kategori = '$kategori'");
$data = $query->fetch_assoc();

$visi = $data['konten_1'] ?? '';
$misi = $data['konten_2'] ?? '';
$id_profil = $data['id'] ?? '';
?>

<header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
    <div class="container-xl px-4">
        <div class="page-header-content">
            <div class="row align-items-center justify-content-between pt-3">
                <div class="col-auto mb-3">
                    <h1 class="page-header-title">
                        <div class="page-header-icon"><i data-feather="target"></i></div>
                        Kelola Visi & Misi Prodi
                    </h1>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="container-xl px-4 mt-4">
    <div class="card mb-4 shadow-sm">
        <div class="card-header bg-primary text-white">Form Visi & Misi - Ilmu Pemerintahan</div>
        <div class="card-body">
            <form action="index.php?module=prodi_pemerintahan&act=proses_profil" method="POST">
                
                <!-- Data Hidden untuk pemrosesan -->
                <input type="hidden" name="id" value="<?= htmlspecialchars($id_profil) ?>">
                <input type="hidden" name="prodi" value="<?= $prodi ?>">
                <input type="hidden" name="kategori" value="<?= $kategori ?>">
                <input type="hidden" name="redirect" value="visi_misi"> <!-- Untuk kembali ke halaman ini -->

                <div class="mb-3">
                    <label class="form-label fw-bold" for="visi">Visi Program Studi</label>
                    <textarea class="form-control" id="visi" name="konten_1" rows="4" placeholder="Tuliskan Visi di sini..."><?= htmlspecialchars($visi) ?></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold" for="misi">Misi Program Studi</label>
                    <textarea class="form-control" id="misi" name="konten_2" rows="6" placeholder="Tuliskan Misi di sini..."><?= htmlspecialchars($misi) ?></textarea>
                    <div class="form-text text-muted">Gunakan penomoran (1, 2, 3) agar misi lebih mudah dibaca di halaman utama.</div>
                </div>

                <button class="btn btn-primary" type="submit">
                    <i class="fas fa-save me-1"></i> Simpan Perubahan
                </button>
            </form>
        </div>
    </div>
</div>

<!-- Jika kamu punya script WYSIWYG seperti CKEditor, bisa diinisialisasi di sini -->