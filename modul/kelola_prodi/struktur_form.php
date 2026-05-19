<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");

// 1. DETEKSI PRODI BERDASARKAN URL
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

// 2. AMBIL DATA STRUKTUR
$query = $koneksi->query("SELECT * FROM prodi_struktur_organisasi WHERE prodi = '$prodi' LIMIT 1");
$data = $query->fetch_assoc();

$id_struktur = $data['id'] ?? 0;
$ketua_prodi = $data['ketua_prodi_nama'] ?? '';
$sekretaris_prodi = $data['sekretaris_prodi_nama'] ?? '';
$kepala_lab = $data['kepala_lab_nama'] ?? '';
$tugas_lab = $data['kepala_lab_tugas'] ?? '';
$staf_admin = $data['staf_admin_nama'] ?? '';
$tugas_admin = $data['staf_admin_tugas'] ?? '';
?>

<header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
    <div class="container-xl px-4">
        <div class="page-header-content">
            <div class="row align-items-center justify-content-between pt-3">
                <div class="col-auto mb-3">
                    <h1 class="page-header-title">
                        <div class="page-header-icon"><i data-feather="git-merge"></i></div>
                        Kelola Struktur Organisasi - <?= $nama_prodi_tampil ?>
                    </h1>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="container-xl px-4 mt-4">
    <div class="card mb-4 shadow-sm border-0">
        <div class="card-header <?= $bg_color ?> text-white">
            <i class="fas fa-sitemap me-2"></i> Personalia Struktur Prodi
        </div>
        <div class="card-body p-4">
            <form action="index.php?module=<?= $mod_aktif ?>&act=proses_struktur" method="POST">
                
                <input type="hidden" name="id" value="<?= htmlspecialchars($id_struktur) ?>">
                <input type="hidden" name="prodi" value="<?= $prodi ?>">
                <input type="hidden" name="redirect_module" value="<?= $mod_aktif ?>">

                <h6 class="fw-bold text-dark border-bottom pb-2 mb-3">Jajaran Pimpinan Prodi</h6>
                <div class="row gx-3 mb-4">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold text-muted">Nama Ketua Program Studi</label>
                        <input type="text" class="form-control bg-light" name="ketua_prodi_nama" value="<?= htmlspecialchars($ketua_prodi) ?>" placeholder="Contoh: Nama Kaprodi, S.Sos., M.Si." required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold text-muted">Nama Sekretaris Program Studi</label>
                        <input type="text" class="form-control bg-light" name="sekretaris_prodi_nama" value="<?= htmlspecialchars($sekretaris_prodi) ?>" placeholder="Contoh: Nama Sekprodi, S.Sos., M.A.">
                    </div>
                </div>

                <h6 class="fw-bold text-dark border-bottom pb-2 mb-3">Unit Layanan & Laboratorium</h6>
                <div class="row gx-3 mb-4">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold text-muted">Pejabat Kepala Laboratorium</label>
                        <input type="text" class="form-control bg-light" name="kepala_lab_nama" value="<?= htmlspecialchars($kepala_lab) ?>" placeholder="Contoh: Kepala Laboratorium Sosiologi">
                        <input type="text" class="form-control bg-light mt-2" name="kepala_lab_tugas" value="<?= htmlspecialchars($tugas_lab) ?>" placeholder="Deskripsi Tugas (Opsional)">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold text-muted">Koordinator Staf Administrasi</label>
                        <input type="text" class="form-control bg-light" name="staf_admin_nama" value="<?= htmlspecialchars($staf_admin) ?>" placeholder="Contoh: Staf Administrasi Prodi">
                        <input type="text" class="form-control bg-light mt-2" name="staf_admin_tugas" value="<?= htmlspecialchars($tugas_admin) ?>" placeholder="Deskripsi Tugas (Opsional)">
                    </div>
                </div>

                <button class="btn <?= $btn_color ?> rounded-pill px-4" type="submit">
                    <i class="fas fa-save me-2"></i> Simpan Struktur
                </button>
            </form>
        </div>
    </div>
</div>