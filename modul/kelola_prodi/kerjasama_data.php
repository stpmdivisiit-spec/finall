<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");

$mod_aktif = isset($_GET['module']) ? $_GET['module'] : '';
if ($mod_aktif == 'prodi_sosiatri') {
    $prodi = 'sosiatri';
    $nama_prodi = 'Pembangunan Sosial';
    $bg_color = 'bg-success';
    $btn_color = 'btn-success';
} else {
    $prodi = 'pemerintahan';
    $nama_prodi = 'Ilmu Pemerintahan';
    $bg_color = 'bg-primary';
    $btn_color = 'btn-primary';
}

$act_aktif = isset($_GET['act']) ? $_GET['act'] : 'mitra_pemerintah';

// Ambil data berdasarkan kategori yang sedang aktif
$query = $koneksi->query("SELECT * FROM prodi_mitra_informasi WHERE prodi='$prodi' AND kategori='$act_aktif' LIMIT 1");
$data = $query->fetch_assoc();
?>

<div class="container-xl px-4 mt-4">

    <?php if($act_aktif == 'mitra_pemerintah'): ?>
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-header <?= $bg_color ?> text-white"><i class="fas fa-landmark me-2"></i> Kemitraan Pemerintah & Desa</div>
        <div class="card-body p-4">
            <form action="index.php?module=<?= $mod_aktif ?>&act=proses_kerjasama" method="POST">
                <input type="hidden" name="prodi" value="<?= $prodi ?>">
                <input type="hidden" name="kategori" value="<?= $act_aktif ?>">
                
                <div class="mb-3">
                    <label class="fw-bold">Deskripsi Laboratorium Sosial Desa</label>
                    <textarea class="form-control bg-light" name="konten_utama" rows="4" required><?= $data['konten_utama'] ?? '' ?></textarea>
                    <small class="text-muted">Jelaskan tentang MoU strategis dengan DPMD dan Pemerintah Desa.</small>
                </div>
                <button type="submit" class="btn <?= $btn_color ?> px-4 rounded-pill"><i class="fas fa-save me-1"></i> Simpan Data</button>
            </form>
        </div>
    </div>

    <?php elseif($act_aktif == 'mitra_sosial'): ?>
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-header <?= $bg_color ?> text-white"><i class="fas fa-building me-2"></i> Kemitraan Lembaga Sosial & Swasta</div>
        <div class="card-body p-4">
            <form action="index.php?module=<?= $mod_aktif ?>&act=proses_kerjasama" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="prodi" value="<?= $prodi ?>">
                <input type="hidden" name="kategori" value="<?= $act_aktif ?>">
                <input type="hidden" name="file_lama_1" value="<?= $data['file_lampiran_1'] ?? '' ?>">
                <input type="hidden" name="file_lama_2" value="<?= $data['file_lampiran_2'] ?? '' ?>">

                <div class="row gx-4">
                    <div class="col-md-6 mb-4 border-end">
                        <h6 class="fw-bold text-success mb-3">Sektor LSM / NGO</h6>
                        <textarea class="form-control bg-light mb-3" name="konten_utama" rows="3" placeholder="Deskripsi kerja sama LSM..."><?= $data['konten_utama'] ?? '' ?></textarea>
                        <label class="small fw-bold">Upload Daftar Mitra LSM (PDF)</label>
                        <input type="file" class="form-control" name="file_lampiran_1" accept=".pdf">
                        <?php if(!empty($data['file_lampiran_1'])) echo "<small class='text-success'>File aktif: ".$data['file_lampiran_1']."</small>"; ?>
                    </div>
                    <div class="col-md-6 mb-4">
                        <h6 class="fw-bold text-primary mb-3">Sektor Swasta / CSR</h6>
                        <textarea class="form-control bg-light mb-3" name="konten_tambahan_1" rows="3" placeholder="Deskripsi kerja sama CSR..."><?= $data['konten_tambahan_1'] ?? '' ?></textarea>
                        <label class="small fw-bold">Upload Portofolio CSR (PDF)</label>
                        <input type="file" class="form-control" name="file_lampiran_2" accept=".pdf">
                        <?php if(!empty($data['file_lampiran_2'])) echo "<small class='text-success'>File aktif: ".$data['file_lampiran_2']."</small>"; ?>
                    </div>
                </div>
                <hr>
                <button type="submit" class="btn <?= $btn_color ?> px-4 rounded-pill w-100"><i class="fas fa-save me-1"></i> Simpan Data Sosial & Swasta</button>
            </form>
        </div>
    </div>

    <?php elseif($act_aktif == 'mitra_mbkm'): ?>
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-header <?= $bg_color ?> text-white"><i class="fas fa-leaf me-2"></i> Kemitraan Program MBKM</div>
        <div class="card-body p-4 text-center">
            <form action="index.php?module=<?= $mod_aktif ?>&act=proses_kerjasama" method="POST">
                <input type="hidden" name="prodi" value="<?= $prodi ?>">
                <input type="hidden" name="kategori" value="<?= $act_aktif ?>">
                
                <i class="fas fa-link fa-3x text-muted mb-3"></i>
                <h5 class="fw-bold mb-3">Tautan Formulir Pengajuan Proposal MBKM</h5>
                <div class="mb-4 mx-auto" style="max-width: 600px;">
                    <input type="url" class="form-control form-control-lg bg-light text-center" name="link_tautan" value="<?= $data['link_tautan'] ?? '#' ?>" placeholder="https://forms.gle/..." required>
                    <small class="text-muted mt-2 d-block">Link ini akan ditautkan ke tombol "Kirim Proposal Kemitraan" di halaman pengunjung.</small>
                </div>
                <button type="submit" class="btn <?= $btn_color ?> px-5 rounded-pill"><i class="fas fa-save me-1"></i> Simpan Tautan</button>
            </form>
        </div>
    </div>

    <?php elseif($act_aktif == 'mitra_penelitian'): ?>
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-header <?= $bg_color ?> text-white"><i class="fas fa-microscope me-2"></i> Kerja Sama Penelitian</div>
        <div class="card-body p-4">
            <form action="index.php?module=<?= $mod_aktif ?>&act=proses_kerjasama" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="prodi" value="<?= $prodi ?>">
                <input type="hidden" name="kategori" value="<?= $act_aktif ?>">
                <input type="hidden" name="file_lama_1" value="<?= $data['file_lampiran_1'] ?? '' ?>">

                <div class="mb-3">
                    <label class="fw-bold">Deskripsi Joint Research</label>
                    <textarea class="form-control bg-light" name="konten_utama" rows="3" required><?= $data['konten_utama'] ?? '' ?></textarea>
                </div>
                <div class="mb-3">
                    <label class="fw-bold">Ruang Lingkup Kemitraan Riset</label>
                    <textarea class="form-control editor-html" name="konten_tambahan_1" rows="5" required><?= $data['konten_tambahan_1'] ?? '' ?></textarea>
                </div>
                <div class="mb-4">
                    <label class="fw-bold">Upload Draft MoU Riset (PDF/Word)</label>
                    <input class="form-control" type="file" name="file_lampiran_1" accept=".pdf,.doc,.docx">
                    <?php if(!empty($data['file_lampiran_1'])) echo "<small class='text-success mt-1 d-block'><i class='fas fa-check'></i> File aktif: ".$data['file_lampiran_1']."</small>"; ?>
                </div>
                <button type="submit" class="btn <?= $btn_color ?> px-4 rounded-pill"><i class="fas fa-save me-1"></i> Simpan Data Riset</button>
            </form>
        </div>
    </div>
    <?php endif; ?>

</div>

<?php if($act_aktif == 'mitra_penelitian'): ?>
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script>CKEDITOR.replace('konten_tambahan_1', { height: 150 });</script>
<?php endif; ?>