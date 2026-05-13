<?php 
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!"); 

$prodi = 'pemerintahan';
$id_berita = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Default nilai (Untuk Form Tambah)
$judul = ''; $konten = ''; $penulis = 'Admin Prodi'; 
$tanggal = date('Y-m-d'); $status = 'Publish'; $gambar_lama = '';
$judul_form = "Tulis Artikel / Berita Baru";

// Jika ID ada, berarti ini Form Edit (Ambil data lama)
if ($id_berita > 0) {
    $judul_form = "Edit Artikel / Berita";
    $query = $koneksi->query("SELECT * FROM prodi_berita WHERE id = '$id_berita'");
    if ($data = $query->fetch_assoc()) {
        $judul       = $data['judul'];
        $konten      = $data['konten'];
        $penulis     = $data['penulis'];
        $tanggal     = $data['tanggal_publikasi'];
        $status      = $data['status'];
        $gambar_lama = $data['gambar_thumbnail'];
    }
}
?>

<!-- Load CDN CKEditor 5 -->
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

<style>
    .ck-editor__editable_inline { min-height: 400px; }
</style>

<div class="container-xl px-4 mt-4">
    <div class="card shadow-sm border-top-lg <?= $id_berita > 0 ? 'border-top-warning' : 'border-top-primary' ?>">
        <div class="card-header fw-bold <?= $id_berita > 0 ? 'text-warning' : 'text-primary' ?>">
            <?= $judul_form ?>
        </div>
        <div class="card-body">
            <form action="index.php?module=prodi_pemerintahan&act=proses_berita" method="POST" enctype="multipart/form-data">
                
                <input type="hidden" name="id" value="<?= $id_berita ?>">
                <input type="hidden" name="prodi" value="<?= $prodi ?>">
                <input type="hidden" name="gambar_lama" value="<?= htmlspecialchars($gambar_lama) ?>">
                
                <div class="mb-3">
                    <label class="form-label fw-bold">Judul Artikel</label>
                    <input class="form-control form-control-lg" name="judul" type="text" value="<?= htmlspecialchars($judul) ?>" required>
                </div>
                
                <div class="mb-3">
                    <label class="form-label fw-bold">Konten Berita</label>
                    <textarea id="editor_konten" name="konten"><?= htmlspecialchars($konten) ?></textarea>
                </div>

                <div class="row mb-3">
                    <div class="col-md-3">
                        <label class="form-label fw-bold">Tanggal</label>
                        <input class="form-control" name="tanggal_publikasi" type="date" value="<?= $tanggal ?>" required>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-bold">Penulis</label>
                        <input class="form-control" name="penulis" type="text" value="<?= htmlspecialchars($penulis) ?>" required>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-bold">Status</label>
                        <select class="form-control" name="status">
                            <option value="Publish" <?= $status == 'Publish' ? 'selected' : '' ?>>Publish Langsung</option>
                            <option value="Draft" <?= $status == 'Draft' ? 'selected' : '' ?>>Simpan Draft</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-bold">Thumbnail <?= $id_berita > 0 ? '(Opsional)' : '' ?></label>
                        <input class="form-control" name="gambar_thumbnail" type="file" accept="image/*" <?= $id_berita > 0 ? '' : 'required' ?>>
                        
                        <?php if ($id_berita > 0 && !empty($gambar_lama)): ?>
                            <div class="mt-2 small text-muted">
                                <img src="uploads/berita/<?= $gambar_lama ?>" style="height: 40px; border-radius: 4px;" class="me-2">
                                Biarkan kosong jika tidak ingin ganti foto.
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <hr>
                <button class="btn <?= $id_berita > 0 ? 'btn-warning text-white' : 'btn-primary' ?> px-4" type="submit">
                    <i class="fas fa-save me-1"></i> <?= $id_berita > 0 ? 'Simpan Perubahan' : 'Publish Artikel' ?>
                </button>
                <a href="index.php?module=prodi_pemerintahan&act=berita" class="btn btn-light">Batal</a>
            </form>
        </div>
    </div>
</div>

<script>
    ClassicEditor
        .create(document.querySelector('#editor_konten'), {
            toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', 'insertTable', 'undo', 'redo' ]
        })
        .catch(error => {
            console.error(error);
        });
</script>