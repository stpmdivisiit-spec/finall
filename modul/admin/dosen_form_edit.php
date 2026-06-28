<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");
// C:\xampp\htdocs\FINAL\modul\admin\dosen_form_edit.php
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Membuat CSRF Token secara mandiri jika belum ada di session
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// PERBAIKAN QUERY DOSEN: Menghindari bentrok ID dengan ALIAS
$stmt = $koneksi->prepare("
    SELECT 
        u.id AS user_id_asli, 
        u.username, 
        u.email, 
        u.status_aktif, 
        (SELECT role_id FROM user_roles WHERE user_id = u.id LIMIT 1) AS role_id,
        d.* FROM dosen d
    JOIN users u ON d.user_id = u.id
    WHERE d.id = ?
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
                        Edit Data Dosen
                    </h1>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="container-xl px-4 mt-4">
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">Form Edit Dosen</div>
        <div class="card-body">

<form action="index.php?module=admin&act=proses_update_dosen" method="POST">
    
    <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
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
        <input class="form-control" name="password" type="password" placeholder="Ketik password baru untuk mengubah" />
    </div>

    <hr>
    <h6 class="fw-bold text-primary mb-3">Profil Biodata Dosen</h6>
    <div class="row gx-3 mb-3">
        <div class="col-md-6">
            <label class="small mb-1" for="nidn">NIDN</label>
            <input class="form-control" id="nidn" name="nidn" type="text" value="<?= htmlspecialchars($data['nidn'] ?? '') ?>" />
        </div>
        <div class="col-md-6">
            <label class="small mb-1" for="nip">NIP</label>
            <input class="form-control" id="nip" name="nip" type="text" value="<?= htmlspecialchars($data['nip'] ?? '') ?>" />
        </div>
    </div>

    <div class="row gx-3 mb-3">
        <div class="col-md-2">
            <label class="small mb-1" for="gelar_depan">Gelar Depan</label>
            <input class="form-control" id="gelar_depan" name="gelar_depan" type="text" value="<?= htmlspecialchars($data['gelar_depan'] ?? '') ?>" />
        </div>
        <div class="col-md-8">
            <label class="small mb-1" for="nama_lengkap">Nama Lengkap *</label>
            <input class="form-control" id="nama_lengkap" name="nama_lengkap" type="text" value="<?= htmlspecialchars($data['nama_lengkap'] ?? '') ?>" required />
        </div>
        <div class="col-md-2">
            <label class="small mb-1" for="gelar_belakang">Gelar Blk.</label>
            <input class="form-control" id="gelar_belakang" name="gelar_belakang" type="text" value="<?= htmlspecialchars($data['gelar_belakang'] ?? '') ?>" />
        </div>
    </div>

    <div class="row gx-3 mb-3">
        <div class="col-md-4">
            <label class="small mb-1" for="jabatan_fungsional">Jabatan Fungsional</label>
            <input class="form-control" id="jabatan_fungsional" name="jabatan_fungsional" type="text" value="<?= htmlspecialchars($data['jabatan_fungsional'] ?? '') ?>" />
        </div>
        <div class="col-md-4">
            <label class="small mb-1" for="status_dosen">Status Dosen</label>
            <input class="form-control" id="status_dosen" name="status_dosen" type="text" value="<?= htmlspecialchars($data['status_dosen'] ?? '') ?>" />
        </div>
        <div class="col-md-4">
            <label class="small mb-1" for="no_hp">No. HP / WA</label>
            <input class="form-control" id="no_hp" name="no_hp" type="text" value="<?= htmlspecialchars($data['no_hp'] ?? '') ?>" />
        </div>
    </div>

    <button class="btn btn-primary" type="submit">Update Data Dosen</button>
    <a href="index.php?module=admin&act=data_pegawai" class="btn btn-light">Batal</a>
</form>

        </div>
    </div>
</div>