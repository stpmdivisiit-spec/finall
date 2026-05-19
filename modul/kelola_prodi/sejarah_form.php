<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");

$mod_aktif = $_GET['module'];
$prodi = ($mod_aktif == 'prodi_sosiatri') ? 'sosiatri' : 'pemerintahan';
$bg_color = ($prodi == 'sosiatri') ? 'bg-success' : 'bg-primary';

$query = $koneksi->query("SELECT * FROM prodi_sejarah WHERE prodi = '$prodi' LIMIT 1");
$data = $query->fetch_assoc();

$id_sejarah = $data['id'] ?? 0;
$konten = $data['konten_sejarah'] ?? '';
?>

<div class="container-xl px-4 mt-4">
    <div class="card mb-4 shadow-sm border-0">
        <div class="card-header <?= $bg_color ?> text-white"><i class="fas fa-history me-1"></i> Kelola Sejarah Program Studi</div>
        <div class="card-body p-4">
            <form action="index.php?module=<?= $mod_aktif ?>&act=sejarah_proses" method="POST">
                <input type="hidden" name="id" value="<?= $id_sejarah ?>">
                <input type="hidden" name="prodi" value="<?= $prodi ?>">
                <input type="hidden" name="redirect_module" value="<?= $mod_aktif ?>">

                <div class="mb-4">
                    <label class="form-label fw-bold">Konten Sejarah (Gunakan Editor untuk membuat Timeline)</label>
                    <textarea class="form-control editor-html" id="konten_sejarah" name="konten_sejarah" rows="10"><?= $konten ?></textarea>
                </div>

                <button class="btn <?= ($prodi == 'sosiatri') ? 'btn-success' : 'btn-primary' ?> rounded-pill px-4" type="submit">
                    <i class="fas fa-save me-1"></i> Simpan Sejarah
                </button>
            </form>
        </div>
    </div>
</div>
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script>CKEDITOR.replace('konten_sejarah', { height: 400 });</script>