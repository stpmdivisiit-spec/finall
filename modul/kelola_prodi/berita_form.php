<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");

$id_berita = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$judul_form = $id_berita > 0 ? "Edit Berita" : "Tulis Berita Baru";

// Proteksi Ganda: Jika bukan admin, tendang keluar dari halaman Edit!
// Proteksi Ganda: Tendang keluar jika user biasa mencoba memaksa masuk ke URL Edit!
$allowed_admin = ['admin', 'staf_it_admin', 'operator_sistem'];
$is_admin = !empty(array_intersect($allowed_admin, $_SESSION['roles'] ?? []));

if ($id_berita > 0 && !$is_admin) {
    echo "<script>alert('Akses Ditolak! Hanya Admin/IT yang memiliki wewenang untuk mengedit berita.'); window.location='index.php?module=$module_url&act=berita';</script>";
    exit;
}

// Default Data
$judul_berita = '';
$isi_berita = '';
$gambar = '';
$penulis = $_SESSION['nama_lengkap']; 
$tanggal_publikasi = date('Y-m-d'); // Default hari ini

if ($id_berita > 0) {
    $data = $koneksi->query("SELECT * FROM prodi_berita WHERE id = '$id_berita'")->fetch_assoc();
    if ($data) {
        $judul_berita      = $data['judul'];
        $isi_berita        = $data['konten'];
        $gambar            = $data['gambar_thumbnail'];
        $penulis           = $data['penulis']; 
        $tanggal_publikasi = $data['tanggal_publikasi']; // Tarik tanggal aslinya
    }
}
?>

<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

<div class="container-xl px-4 mt-4">
    <div class="card shadow-sm border-top-lg border-top-primary">
        <div class="card-header bg-white fw-bold text-primary">
            <i class="fas fa-edit me-1"></i> <?= $judul_form ?>
        </div>
        <div class="card-body">
            <form action="index.php?module=<?= $module_url ?>&act=proses_berita" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $id_berita ?>">
                <input type="hidden" name="gambar_lama" value="<?= htmlspecialchars($gambar) ?>">
                
                <div class="row">
                    <div class="col-md-8">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Judul Berita</label>
                            <input type="text" class="form-control form-control-lg" name="judul" value="<?= htmlspecialchars($judul_berita) ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Isi Berita</label>
                            <textarea id="editor_berita" name="isi_berita"><?= htmlspecialchars($isi_berita) ?></textarea>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="card bg-light shadow-none mb-3">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label fw-bold text-success"><i class="fas fa-calendar-alt"></i> Tanggal Publikasi</label>
                                    <input type="date" class="form-control" name="tanggal_publikasi" value="<?= htmlspecialchars($tanggal_publikasi) ?>" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-bold text-primary"><i class="fas fa-user-edit"></i> Penulis</label>
                                    <input type="text" class="form-control bg-white" name="penulis" value="<?= htmlspecialchars($penulis) ?>" readonly>
                                    <small class="text-muted">Nama penulis diisi otomatis sesuai akun Anda.</small>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-bold">Gambar Utama (Thumbnail)</label>
                                    <input type="file" class="form-control" name="file_gambar" accept="image/*">
                                    <?php if(!empty($gambar)): ?>
                                        <div class="mt-2"><img src="uploads/prodi/berita/<?= $gambar ?>" class="img-fluid rounded border"></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-paper-plane me-1"></i> Publikasikan</button>
                            <a href="index.php?module=<?= $module_url ?>&act=berita" class="btn btn-outline-secondary">Batal</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    ClassicEditor.create(document.querySelector('#editor_berita')).catch(error => { console.error(error); });
</script>