<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$query = $koneksi->query("SELECT * FROM dosen WHERE id = '$id'");
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
                        Edit Data Dosen
                    </h1>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="container-xl px-4 mt-4">
    <div class="card mb-4">
        <div class="card-header bg-indigo text-white">Form Edit Dosen</div>
        <div class="card-body">
            <form action="index.php?module=admin&act=proses_edit_dosen" method="POST">
                
                <!-- Input hidden untuk menampung ID -->
                <input type="hidden" name="id" value="<?= $data['id'] ?>">

                <!-- Baris 1: NIDN & NIP -->
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

                <!-- Baris 2: Nama & Gelar -->
                <div class="row gx-3 mb-3">
                    <div class="col-md-3">
                        <label class="small mb-1" for="gelar_depan">Gelar Depan</label>
                        <input class="form-control" id="gelar_depan" name="gelar_depan" type="text" value="<?= htmlspecialchars($data['gelar_depan'] ?? '') ?>" />
                    </div>
                    <div class="col-md-6">
                        <label class="small mb-1" for="nama_lengkap">Nama Lengkap *</label>
                        <input class="form-control" id="nama_lengkap" name="nama_lengkap" type="text" required value="<?= htmlspecialchars($data['nama_lengkap'] ?? '') ?>" />
                    </div>
                    <div class="col-md-3">
                        <label class="small mb-1" for="gelar_belakang">Gelar Belakang</label>
                        <input class="form-control" id="gelar_belakang" name="gelar_belakang" type="text" value="<?= htmlspecialchars($data['gelar_belakang'] ?? '') ?>" />
                    </div>
                </div>

                <!-- Baris 3: Jabatan & Status -->
                <div class="row gx-3 mb-3">
                    <div class="col-md-6">
                        <label class="small mb-1" for="jabatan_fungsional">Jabatan Fungsional</label>
                        <input class="form-control" id="jabatan_fungsional" name="jabatan_fungsional" type="text" value="<?= htmlspecialchars($data['jabatan_fungsional'] ?? '') ?>" />
                    </div>
                    <div class="col-md-6">
                        <label class="small mb-1" for="status_dosen">Status Dosen</label>
                        <select class="form-control" id="status_dosen" name="status_dosen">
                            <option value="Aktif" <?= ($data['status_dosen'] == 'Aktif') ? 'selected' : '' ?>>Aktif</option>
                            <option value="Tugas Belajar" <?= ($data['status_dosen'] == 'Tugas Belajar') ? 'selected' : '' ?>>Tugas Belajar</option>
                            <option value="Non-Aktif" <?= ($data['status_dosen'] == 'Non-Aktif') ? 'selected' : '' ?>>Non-Aktif</option>
                        </select>
                    </div>
                </div>

                <!-- Baris 4: Kontak -->
                <div class="row gx-3 mb-3">
                    <div class="col-md-6">
                        <label class="small mb-1" for="email">Email</label>
                        <input class="form-control" id="email" name="email" type="email" value="<?= htmlspecialchars($data['email'] ?? '') ?>" />
                    </div>
                    <div class="col-md-6">
                        <label class="small mb-1" for="no_hp">No. Handphone</label>
                        <input class="form-control" id="no_hp" name="no_hp" type="text" value="<?= htmlspecialchars($data['no_hp'] ?? '') ?>" />
                    </div>
                </div>

                <!-- Tombol -->
                <button class="btn btn-primary" type="submit">Update Data</button>
                <a href="index.php?module=admin&act=data_pegawai" class="btn btn-light">Batal</a>
            </form>
        </div>
    </div>
</div>