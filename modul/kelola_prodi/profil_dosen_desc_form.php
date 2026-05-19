<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");

// 1. DETEKSI PRODI
$mod_aktif = isset($_GET['module']) ? $_GET['module'] : '';
if ($mod_aktif == 'prodi_sosiatri') {
    $prodi = 'sosiatri';
    $nama_prodi_tampil = 'Pembangunan Sosial (Sosiatri)';
    $bg_color = 'bg-success';
    $btn_color = 'btn-success';
    $role_filter = 'dosen_sosiatri';
} else {
    $prodi = 'pemerintahan';
    $nama_prodi_tampil = 'Ilmu Pemerintahan';
    $bg_color = 'bg-primary';
    $btn_color = 'btn-primary';
    $role_filter = 'dosen_pemerintahan';
}

// 2. QUERY DAFTAR DOSEN SESUAI PRODI (Hanya dosen yang rolenya sesuai)
$sql_master = "SELECT d.id, d.gelar_depan, d.nama_lengkap, d.gelar_belakang 
               FROM dosen d
               JOIN users u ON d.user_id = u.id
               JOIN user_roles ur ON u.id = ur.user_id
               JOIN roles r ON ur.role_id = r.id
               WHERE r.role_name = '$role_filter'";
$query_master = $koneksi->query($sql_master);
?>

<header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
    <div class="container-xl px-4">
        <div class="page-header-content">
            <div class="row align-items-center pt-3">
                <div class="col-auto mb-3">
                    <h1 class="page-header-title">
                        <div class="page-header-icon"><i data-feather="user-plus"></i></div>
                        Kelola Dosen Tampil - <?= $nama_prodi_tampil ?>
                    </h1>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="container-xl px-4 mt-4">
    <div class="card mb-4 shadow-sm border-0">
        <div class="card-header <?= $bg_color ?> text-white">
            <i class="fas fa-plus-circle me-2"></i> Tambah / Edit Dosen ke Halaman Publik
        </div>
        <div class="card-body p-4">
            
            <form action="index.php?module=<?= $mod_aktif ?>&act=proses_profil_dosen" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="prodi" value="<?= $prodi ?>">
                <input type="hidden" name="redirect_module" value="<?= $mod_aktif ?>">

                <div class="mb-4">
                    <label class="form-label fw-bold">Pilih Dosen <span class="text-danger">*</span></label>
                    <select class="form-select bg-light" name="dosen_id" required>
                        <option value="">-- Pilih Dosen <?= $nama_prodi_tampil ?> --</option>
                        <?php while($d = $query_master->fetch_assoc()): ?>
                            <option value="<?= $d['id'] ?>">
                                <?= trim($d['gelar_depan'] . ' ' . $d['nama_lengkap'] . ', ' . $d['gelar_belakang'], ' ,') ?>
                            </option>
                        <?php endwhile; ?>
                    </select>
                </div>

                <div class="row gx-3 mb-4">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Jabatan di Website</label>
                        <input type="text" class="form-control bg-light" name="jabatan_web" placeholder="Misal: Ketua Program Studi, Lektor..." required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Bidang Keahlian</label>
                        <input type="text" class="form-control bg-light" name="keahlian_web" placeholder="Misal: Sosiologi Pedesaan" required>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-bold">Upload Foto Profil (Rekomendasi 1:1 / Persegi)</label>
                    <input class="form-control" type="file" name="foto_web" accept="image/*">
                    <small class="text-muted">Jika mengedit, biarkan kosong jika tidak ingin mengganti foto.</small>
                </div>

                <button class="btn <?= $btn_color ?> rounded-pill px-4" type="submit">
                    <i class="fas fa-save me-2"></i> Simpan ke Website
                </button>
            </form>
        </div>
    </div>
</div>