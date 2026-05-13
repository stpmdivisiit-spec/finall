<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");
?>

<header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
    <div class="container-xl px-4">
        <div class="page-header-content">
            <div class="row align-items-center justify-content-between pt-3">
                <div class="col-auto mb-3">
                    <h1 class="page-header-title">
                        <div class="page-header-icon"><i data-feather="user-plus"></i></div>
                        Tambah Data & Akun Tendik
                    </h1>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="container-xl px-4 mt-4">
    <form action="index.php?module=admin&act=proses_tambah_tendik" method="POST">
        
        <!-- CARD 1: INFORMASI PROFIL -->
        <div class="card mb-4">
            <div class="card-header bg-teal text-white">1. Informasi Profil Tendik</div>
            <div class="card-body">
                <div class="row gx-3 mb-3">
                    <div class="col-md-6">
                        <label class="small mb-1" for="nip_nik">NIP / NIK</label>
                        <input class="form-control" id="nip_nik" name="nip_nik" type="text" placeholder="Masukkan NIP/NIK" />
                    </div>
                    <div class="col-md-6">
                        <label class="small mb-1" for="nama_lengkap">Nama Lengkap *</label>
                        <input class="form-control" id="nama_lengkap" name="nama_lengkap" type="text" required />
                    </div>
                </div>

                <div class="row gx-3 mb-3">
                    <div class="col-md-6">
                        <label class="small mb-1" for="jenis_kelamin">Jenis Kelamin</label>
                        <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="small mb-1" for="jabatan_struktural">Jabatan Struktural</label>
                        <input class="form-control" id="jabatan_struktural" name="jabatan_struktural" type="text" />
                    </div>
                </div>

                <div class="row gx-3 mb-3">
                    <div class="col-md-6">
                        <label class="small mb-1" for="no_hp">No. Handphone</label>
                        <input class="form-control" id="no_hp" name="no_hp" type="text" />
                    </div>
                    <div class="col-md-6">
                        <label class="small mb-1" for="status_kepegawaian">Status Kepegawaian</label>
                        <select class="form-control" id="status_kepegawaian" name="status_kepegawaian">
                            <option value="Aktif">Aktif</option>
                            <option value="Non-Aktif">Non-Aktif</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <!-- CARD 2: INFORMASI AKUN -->
        <div class="card mb-4">
            <div class="card-header bg-dark text-white">2. Informasi Akun Login</div>
            <div class="card-body">
                
                <div class="row gx-3 mb-3">
                    <div class="col-md-4">
                        <label class="small mb-1" for="username">Username *</label>
                        <input class="form-control" id="username" name="username" type="text" required />
                    </div>
                    <div class="col-md-4">
                        <label class="small mb-1" for="email">Email *</label>
                        <input class="form-control" id="email" name="email" type="email" required />
                    </div>
                    <div class="col-md-4">
                        <label class="small mb-1" for="role_id">Role Akses *</label>
                        <select class="form-control" id="role_id" name="role_id" required>
                            <option value="">-- Pilih Role --</option>
                            <?php
                            $roles = $koneksi->query("SELECT * FROM roles WHERE role_name NOT LIKE '%dosen%' AND role_name != 'admin' ORDER BY role_name ASC");
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

        <div class="mb-4">
            <button class="btn btn-primary" type="submit">Simpan Data & Buat Akun</button>
            <a href="index.php?module=admin&act=data_pegawai" class="btn btn-light">Batal</a>
        </div>

    </form>
</div>