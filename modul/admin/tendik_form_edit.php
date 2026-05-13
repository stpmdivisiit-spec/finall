<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$query = $koneksi->query("SELECT * FROM tendik WHERE id = '$id'");
$data = $query->fetch_assoc();

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
                
                <input type="hidden" name="id" value="<?= $data['id'] ?>">

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
                            <option value="Laki-Laki" <?= ($data['jenis_kelamin'] == 'Laki-Laki' || $data['jenis_kelamin'] == 'L') ? 'selected' : '' ?>>Laki-Laki</option>
                            <option value="Perempuan" <?= ($data['jenis_kelamin'] == 'Perempuan' || $data['jenis_kelamin'] == 'P') ? 'selected' : '' ?>>Perempuan</option>
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
                            <!-- Sesuaikan value ini jika di DB anda menyimpannya berbeda -->
                            <option value="Aktif" <?= ($data['status_kepegawaian'] == 'Aktif') ? 'selected' : '' ?>>Aktif</option>
                            <option value="Non-Aktif" <?= ($data['status_kepegawaian'] == 'Non-Aktif') ? 'selected' : '' ?>>Non-Aktif</option>
                        </select>
                    </div>
                </div>

                <button class="btn btn-primary" type="submit">Update Data</button>
                <a href="index.php?module=admin&act=data_pegawai" class="btn btn-light">Batal</a>
            </form>
        </div>
    </div>
</div>