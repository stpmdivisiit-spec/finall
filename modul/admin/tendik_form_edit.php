<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// PERBAIKAN QUERY: Menggabungkan tabel tendik, users, dan mengambil role_id
$stmt = $koneksi->prepare("
    SELECT 
        u.id AS user_id_asli, 
        u.username, 
        u.email, 
        u.status_aktif, 
        (SELECT role_id FROM user_roles WHERE user_id = u.id LIMIT 1) AS role_id,
        t.* FROM tendik t
    JOIN users u ON t.user_id = u.id
    WHERE t.id = ?
");
$stmt->bind_param("i", $id);
$stmt->execute();
$data = $stmt->get_result()->fetch_assoc();

if (!$data) {
    echo "<script>alert('Data tidak ditemukan!'); window.location='index.php?module=admin&act=data_pegawai';</script>";
    exit;
}
?>

<header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
    <div class="container-xl px-4">
        <div class="page-header-content">
            <div class="row align-items-center justify-content-between pt-3">
                <div class="col-auto mb-3">
                    <h1 class="page-header-title">
                        <div class="page-header-icon"><i data-feather="edit-2"></i></div>
                        Edit Data Tendik
                    </h1>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="container-xl px-4 mt-4">
    <div class="card mb-4">
        <div class="card-header bg-teal text-white">Form Edit Tenaga Kependidikan</div>
        <div class="card-body">

<form action="index.php?module=admin&act=proses_edit_tendik" method="POST">
    <input type="hidden" name="csrf_token" value="<?= generateCSRFToken() ?>">
    <input type="hidden" name="user_id" value="<?= $data['user_id_asli'] ?>">

    <h6 class="fw-bold text-primary mb-3">Informasi Akun Login</h6>
    <div class="row gx-3 mb-3">
        <div class="col-md-6">
            <label class="small mb-1">Username</label>
            <input class="form-control" name="username" type="text" value="<?= htmlspecialchars($data['username'] ?? '') ?>" required />
        </div>
        <div class="col-md-6">
            <label class="small mb-1">Email Akun</label>
            <input class="form-control" name="email" type="email" value="<?= htmlspecialchars($data['email'] ?? '') ?>" required />
        </div>
    </div>

    <div class="row gx-3 mb-3">
        <div class="col-md-6">
            <label class="small mb-1">Role / Hak Akses</label>
            <select class="form-control" name="role_id" required>
                <?php
                $roles = $koneksi->query("SELECT * FROM roles ORDER BY keterangan ASC");
                while($r = $roles->fetch_assoc()) {
                    $select = ($r['id'] == ($data['role_id'] ?? 0)) ? 'selected' : '';
                    echo "<option value='{$r['id']}' $select>{$r['keterangan']}</option>";
                }
                ?>
            </select>
        </div>
        <div class="col-md-6">
            <label class="small mb-1">Status Akun</label>
            <select class="form-control" name="status_aktif">
                <option value="1" <?= (isset($data['status_aktif']) && $data['status_aktif'] == 1) ? 'selected' : ''; ?>>Aktif</option>
                <option value="0" <?= (isset($data['status_aktif']) && $data['status_aktif'] == 0) ? 'selected' : ''; ?>>Non-Aktif</option>
            </select>
        </div>
    </div>

    <div class="mb-3">
        <label class="small mb-1">Password Baru (Kosongkan jika tidak diubah)</label>
        <input class="form-control" name="password" type="password" placeholder="Masukkan password baru jika ingin mengganti" />
    </div>

    <hr>
    <h6 class="fw-bold text-primary mb-3">Profil Tenaga Kependidikan</h6>
    <div class="row gx-3 mb-3">
        <div class="col-md-6">
            <label class="small mb-1" for="nip_nik">NIP / NIK</label>
            <input class="form-control" id="nip_nik" name="nip_nik" type="text" value="<?= htmlspecialchars($data['nip_nik'] ?? '') ?>" />
        </div>
        <div class="col-md-6">
            <label class="small mb-1" for="nama_lengkap">Nama Lengkap *</label>
            <input class="form-control" id="nama_lengkap" name="nama_lengkap" type="text" value="<?= htmlspecialchars($data['nama_lengkap'] ?? '') ?>" required />
        </div>
    </div>

    <div class="row gx-3 mb-3">
        <div class="col-md-6">
            <label class="small mb-1" for="jenis_kelamin">Jenis Kelamin</label>
            <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                <option value="Laki-Laki" <?= (isset($data['jenis_kelamin']) && $data['jenis_kelamin'] == 'Laki-Laki') ? 'selected' : '' ?>>Laki-Laki</option>
                <option value="Perempuan" <?= (isset($data['jenis_kelamin']) && $data['jenis_kelamin'] == 'Perempuan') ? 'selected' : '' ?>>Perempuan</option>
            </select>
        </div>
        <div class="col-md-6">
            <label class="small mb-1" for="jabatan_struktural">Jabatan Struktural</label>
            <input class="form-control" id="jabatan_struktural" name="jabatan_struktural" type="text" value="<?= htmlspecialchars($data['jabatan_struktural'] ?? '') ?>" />
        </div>
    </div>

    <div class="row gx-3 mb-3">
        <div class="col-md-6">
            <label class="small mb-1" for="no_hp">No. Handphone</label>
            <input class="form-control" id="no_hp" name="no_hp" type="text" value="<?= htmlspecialchars($data['no_hp'] ?? '') ?>" />
        </div>
        <div class="col-md-6">
            <label class="small mb-1" for="status_kepegawaian">Status Kepegawaian</label>
            <select class="form-control" id="status_kepegawaian" name="status_kepegawaian">
                <option value="Aktif" <?= (isset($data['status_kepegawaian']) && $data['status_kepegawaian'] == 'Aktif') ? 'selected' : '' ?>>Aktif</option>
                <option value="Non-Aktif" <?= (isset($data['status_kepegawaian']) && $data['status_kepegawaian'] == 'Non-Aktif') ? 'selected' : '' ?>>Non-Aktif</option>
            </select>
        </div>
    </div>

    <button class="btn btn-primary" type="submit">Update Data</button>
    <a href="index.php?module=admin&act=data_pegawai" class="btn btn-light">Batal</a>
</form>

        </div>
    </div>
</div>