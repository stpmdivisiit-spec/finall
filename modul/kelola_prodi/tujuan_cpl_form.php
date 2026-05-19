<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");

// 1. DETEKSI PRODI BERDASARKAN URL
$mod_aktif = isset($_GET['module']) ? $_GET['module'] : '';

if ($mod_aktif == 'prodi_sosiatri') {
    $prodi = 'sosiatri';
    $nama_prodi_tampil = 'Pembangunan Sosial (Sosiatri)';
    $bg_color = 'bg-success'; // Hijau
    $btn_color = 'btn-success';
} else {
    // Default Pemerintahan
    $prodi = 'pemerintahan';
    $nama_prodi_tampil = 'Ilmu Pemerintahan';
    $bg_color = 'bg-primary'; // Biru
    $btn_color = 'btn-primary';
}

// 2. AMBIL DATA DARI DATABASE (Tabel: prodi_tujuan_cpl)
$query = $koneksi->query("SELECT * FROM prodi_tujuan_cpl WHERE prodi = '$prodi' LIMIT 1");
$data = $query->fetch_assoc();

$id_tujuan = $data['id'] ?? 0;
$tujuan = $data['tujuan'] ?? '';
$cpl = $data['cpl'] ?? '';
?>

<header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
    <div class="container-xl px-4">
        <div class="page-header-content">
            <div class="row align-items-center justify-content-between pt-3">
                <div class="col-auto mb-3">
                    <h1 class="page-header-title">
                        <div class="page-header-icon"><i data-feather="bullseye"></i></div>
                        Kelola Tujuan & CPL - <?= $nama_prodi_tampil ?>
                    </h1>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="container-xl px-4 mt-4">
    <div class="card mb-4 shadow-sm border-0">
        <div class="card-header <?= $bg_color ?> text-white">
            <i class="fas fa-edit me-1"></i> Form Tujuan & CPL
        </div>
        <div class="card-body p-4">
            <form action="index.php?module=<?= $mod_aktif ?>&act=proses_tujuan_cpl" method="POST">
                
                <input type="hidden" name="id" value="<?= htmlspecialchars($id_tujuan) ?>">
                <input type="hidden" name="prodi" value="<?= $prodi ?>">
                <input type="hidden" name="redirect_module" value="<?= $mod_aktif ?>"> 
                <input type="hidden" name="redirect_act" value="tujuan_cpl"> 

                <div class="mb-4">
                    <label class="form-label fw-bold text-dark" for="tujuan">Tujuan Program Studi</label>
                    <textarea class="form-control bg-light" id="tujuan" name="tujuan" rows="5" placeholder="Masukkan tujuan prodi..." required><?= htmlspecialchars($tujuan) ?></textarea>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-bold text-dark" for="cpl">Capaian Pembelajaran Lulusan (CPL)</label>
                    <textarea class="form-control bg-light" id="cpl" name="cpl" rows="7" placeholder="Masukkan CPL..." required><?= htmlspecialchars($cpl) ?></textarea>
                </div>

                <button class="btn <?= $btn_color ?> rounded-pill px-4" type="submit">
                    <i class="fas fa-save me-1"></i> Simpan Data
                </button>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        CKEDITOR.replace('tujuan', { height: 200 });
        CKEDITOR.replace('cpl', { height: 300 });
    });
</script>