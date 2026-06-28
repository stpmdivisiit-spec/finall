<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");
// C:\xampp\htdocs\FINAL\modul\admin\dosen_form_tambah.php
?>

<header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
    <div class="container-xl px-4">
        <div class="page-header-content">
            <div class="row align-items-center justify-content-between pt-3">
                <div class="col-auto mb-3">
                    <h1 class="page-header-title">
                        <div class="page-header-icon"><i data-feather="user-plus"></i></div>
                        Tambah Data & Akun Dosen
                    </h1>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="container-xl px-4 mt-4">
    <form action="index.php?module=admin&act=proses_tambah_dosen" method="POST">
        <input type="hidden" name="csrf_token" value="<?= generateCSRFToken() ?>">
        <!-- CARD 1: INFORMASI PROFIL -->
        <div class="card mb-4">
            <div class="card-header bg-indigo text-white">1. Informasi Profil Dosen</div>
            <div class="card-body">
                <div class="row gx-3 mb-3">
                    <div class="col-md-6">
                        <label class="small mb-1" for="nidn">NIDN</label>
                        <input class="form-control" id="nidn" name="nidn" type="text" placeholder="Masukkan NIDN" />
                    </div>
                    <div class="col-md-6">
                        <label class="small mb-1" for="nip">NIP</label>
                        <input class="form-control" id="nip" name="nip" type="text" placeholder="Masukkan NIP" />
                    </div>
                </div>

                <div class="row gx-3 mb-3">
                    <div class="col-md-3">
                        <label class="small mb-1" for="gelar_depan">Gelar Depan</label>
                        <input class="form-control" id="gelar_depan" name="gelar_depan" type="text" placeholder="Cth: Dr., Prof." />
                    </div>
                    <div class="col-md-6">
                        <label class="small mb-1" for="nama_lengkap">Nama Lengkap *</label>
                        <input class="form-control" id="nama_lengkap" name="nama_lengkap" type="text" placeholder="Nama Lengkap" required />
                    </div>
                    <div class="col-md-3">
                        <label class="small mb-1" for="gelar_belakang">Gelar Belakang</label>
                        <input class="form-control" id="gelar_belakang" name="gelar_belakang" type="text" placeholder="Cth: S.Sos., M.Si." />
                    </div>
                </div>

                <div class="row gx-3 mb-3">
                    <div class="col-md-6">
                        <label class="small mb-1" for="jabatan_fungsional">Jabatan Fungsional</label>
                        <input class="form-control" id="jabatan_fungsional" name="jabatan_fungsional" type="text" placeholder="Cth: Asisten Ahli, Lektor" />
                    </div>
                    <div class="col-md-6">
                        <label class="small mb-1" for="status_dosen">Status Dosen</label>
                        <select class="form-control" id="status_dosen" name="status_dosen">
                            <option value="Aktif">Aktif</option>
                            <option value="Tugas Belajar">Tugas Belajar</option>
                            <option value="Non-Aktif">Non-Aktif</option>
                        </select>
                    </div>
                </div>

                <div class="row gx-3 mb-3">
                    <div class="col-md-6">
                        <label class="small mb-1" for="no_hp">No. Handphone</label>
                        <input class="form-control" id="no_hp" name="no_hp" type="text" placeholder="Nomor WA/HP" />
                    </div>
                    <div class="col-md-6">
                        <label class="small mb-1" for="email">Email *</label>
                        <input class="form-control" id="email" name="email" type="email" placeholder="Email aktif (untuk login)" required />
                    </div>
                </div>
            </div>
        </div>

        <!-- CARD 2: INFORMASI AKUN -->
        <div class="card mb-4">
            <div class="card-header bg-dark text-white">2. Informasi Akun Login</div>
            <div class="card-body">
                <div class="row gx-3 mb-3">
                    <div class="col-md-6">
                        <label class="small mb-1" for="username">Username *</label>
                        <input class="form-control" id="username" name="username" type="text" placeholder="Username untuk login" required />
                    </div>
                    <div class="col-md-6">
                        <label class="small mb-1" for="role_id">Role Akses *</label>
                        <select class="form-control" id="role_id" name="role_id" required>
                            <option value="">-- Pilih Role --</option>
                            <?php
                            $roles = $koneksi->query("SELECT * FROM roles WHERE role_name LIKE '%dosen%' ORDER BY role_name ASC");
                            while ($r = $roles->fetch_assoc()) {
                                echo '<option value="'.$r['id'].'">'.ucwords(str_replace('_', ' ', $r['role_name'])).'</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="row gx-3 mb-3">
                    <div class="col-md-6">
                        <label class="small mb-1" for="password">Password *</label>
                        <input class="form-control" id="password" name="password" type="password" required />
                    </div>
                    <div class="col-md-6">
                        <label class="small mb-1" for="confirm_password">Konfirmasi Password *</label>
                        <input class="form-control" id="confirm_password" name="confirm_password" type="password" required />
                    </div>
                </div>
            </div>
        </div>

        <!-- TOMBOL SUBMIT -->
        <div class="mb-4">
            <button class="btn btn-primary" type="submit">Simpan Data & Buat Akun</button>
            <a href="index.php?module=admin&act=data_pegawai" class="btn btn-light">Batal</a>
        </div>

    </form>
</div>