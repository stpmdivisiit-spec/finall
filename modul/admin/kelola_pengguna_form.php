<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");

$id_user = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$judul_form = $id_user > 0 ? "Edit Pengguna & Hak Akses" : "Tambah Pengguna Baru";

// Nilai Default
$nama = ''; $username = ''; $email = ''; $tipe = 'Dosen'; $status = 1;
$user_roles_aktif = [];

if ($id_user > 0) {
    // Ambil data user yang sedang di-edit
    $data_user = $koneksi->query("SELECT * FROM users WHERE id = '$id_user'")->fetch_assoc();
    if ($data_user) {
        $nama     = $data_user['nama_lengkap'];
        $username = $data_user['username'];
        $email    = $data_user['email'];
        $tipe     = $data_user['jenis_pegawai'];
        $status   = $data_user['status_aktif'];
    }
    
    // Ambil hak akses (role) yang sudah dimiliki
    $q_roles = $koneksi->query("SELECT role_id FROM user_roles WHERE user_id = '$id_user'");
    while($r = $q_roles->fetch_assoc()) {
        $user_roles_aktif[] = $r['role_id'];
    }
}
?>

<div class="container-xl px-4 mt-4">
    <div class="card shadow-sm border-top-lg border-top-primary">
        <div class="card-header bg-white fw-bold text-primary">
            <i class="fas fa-user-cog me-1"></i> <?= $judul_form ?>
        </div>
        <div class="card-body">
            <form action="index.php?module=admin&act=pengguna_proses" method="POST">
                <input type="hidden" name="id" value="<?= $id_user ?>">
                
                <div class="row">
                    <div class="col-md-6 border-end pe-4">
                        <h6 class="fw-bold mb-3 text-dark border-bottom pb-2">Informasi Akun Login</h6>
                        
                        <?php if($id_user == 0): ?>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Pilih Pegawai (Dosen / Tendik)</label>
                                <select class="form-select border-primary" name="nama_lengkap" id="pilihPegawai" onchange="autoFillAkun()" required>
                                    <option value="">-- Klik untuk Pilih Nama Pegawai --</option>
                                    
                                    <optgroup label="Daftar Dosen Akademik">
                                        <?php
                                        // Tarik nama dosen, hilangkan gelar untuk bikin username
                                        $q_dosen = $koneksi->query("SELECT nama_lengkap FROM dosen ORDER BY nama_lengkap ASC");
                                        while($d = $q_dosen->fetch_assoc()) {
                                            $nama_bersih = preg_replace('/[^a-zA-Z\s]/', '', $d['nama_lengkap']);
                                            $nama_depan = strtolower(strtok(trim($nama_bersih), ' '));
                                            $auto_username = $nama_depan . rand(10,99); // Ditambah angka random agar tidak kembar
                                            $auto_email = $auto_username . '@stpm.ac.id';
                                            
                                            echo "<option value='{$d['nama_lengkap']}' data-user='{$auto_username}' data-email='{$auto_email}' data-tipe='Dosen'>{$d['nama_lengkap']}</option>";
                                        }
                                        ?>
                                    </optgroup>

                                    <optgroup label="Daftar Tenaga Kependidikan (Tendik)">
                                        <?php
                                        // Tarik nama Tendik
                                        $q_tendik = $koneksi->query("SELECT nama_lengkap FROM tendik ORDER BY nama_lengkap ASC");
                                        while($t = $q_tendik->fetch_assoc()) {
                                            $nama_bersih = preg_replace('/[^a-zA-Z\s]/', '', $t['nama_lengkap']);
                                            $nama_depan = strtolower(strtok(trim($nama_bersih), ' '));
                                            $auto_username = $nama_depan . rand(10,99);
                                            $auto_email = $auto_username . '@stpm.ac.id';
                                            
                                            echo "<option value='{$t['nama_lengkap']}' data-user='{$auto_username}' data-email='{$auto_email}' data-tipe='Tendik'>{$t['nama_lengkap']}</option>";
                                        }
                                        ?>
                                    </optgroup>
                                </select>
                            </div>
                        <?php else: ?>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Nama Lengkap (Sesuai Gelar)</label>
                                <input type="text" class="form-control bg-light" name="nama_lengkap" value="<?= htmlspecialchars($nama) ?>" readonly>
                            </div>
                        <?php endif; ?>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Username</label>
                            <input type="text" class="form-control <?= $id_user > 0 ? 'bg-light' : '' ?>" id="inputUsername" name="username" value="<?= htmlspecialchars($username) ?>" required <?= $id_user > 0 ? 'readonly' : '' ?> placeholder="Otomatis terisi setelah memilih nama...">
                            <?php if($id_user > 0): ?><small class="text-muted">Username tidak bisa diubah.</small><?php endif; ?>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Password Login</label>
                            <input type="password" class="form-control" id="inputPassword" name="password" <?= $id_user == 0 ? 'readonly placeholder="Otomatis diset oleh sistem"' : '' ?>>
                            <?php if($id_user > 0): ?>
                                <small class="text-muted text-danger">*Kosongkan jika tidak ingin mengubah password lama.</small>
                            <?php else: ?>
                                <small class="text-success fw-bold" id="infoPassword" style="display:none;">
                                    <i class="fas fa-check-circle"></i> Password default: <u>stpm2026</u>
                                </small>
                            <?php endif; ?>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Email</label>
                            <input type="email" class="form-control" id="inputEmail" name="email" value="<?= htmlspecialchars($email) ?>" <?= $id_user == 0 ? 'readonly' : '' ?>>
                        </div>
                        
                        <div class="row">
                            <div class="col-6 mb-3">
                                <label class="form-label fw-bold">Jenis Pegawai</label>
                                <select name="jenis_pegawai" id="selectTipe" class="form-select" <?= $id_user == 0 ? 'style="pointer-events: none; background-color: #e9ecef;" tabindex="-1"' : '' ?>>
                                    <option value="Dosen" <?= $tipe == 'Dosen' ? 'selected' : '' ?>>Dosen Akademik</option>
                                    <option value="Tendik" <?= $tipe == 'Tendik' ? 'selected' : '' ?>>Tenaga Kependidikan</option>
                                </select>
                            </div>
                            <div class="col-6 mb-3">
                                <label class="form-label fw-bold">Status Akun</label>
                                <select name="status_aktif" class="form-select">
                                    <option value="1" <?= $status == 1 ? 'selected' : '' ?>>Aktif (Bisa Login)</option>
                                    <option value="0" <?= $status == 0 ? 'selected' : '' ?>>Non-Aktif (Diblokir)</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 ps-4">
                        <h6 class="fw-bold mb-3 text-dark border-bottom pb-2">Penugasan & Hak Akses Modul</h6>
                        <div class="alert alert-info border-0 shadow-none small mb-4 py-2">
                            <i class="fas fa-info-circle me-1"></i> 
                            Anda dapat mencentang lebih dari satu jabatan. Sistem secara otomatis akan menggabungkan semua menu unit ke dalam satu Dashboard milik pengguna ini.
                        </div>
                        
                        <div class="row">
                            <?php
                            $semua_roles = $koneksi->query("SELECT * FROM roles ORDER BY id ASC");
                            while ($role = $semua_roles->fetch_assoc()) {
                                $is_checked = in_array($role['id'], $user_roles_aktif) ? 'checked' : '';
                                $text_color = ($role['role_name'] == 'admin') ? 'text-danger fw-bold' : 'text-dark';
                                
                                echo "
                                <div class='col-md-6 mb-3'>
                                    <div class='form-check form-switch'>
                                        <input class='form-check-input' type='checkbox' name='role_id[]' value='{$role['id']}' id='role_{$role['id']}' $is_checked>
                                        <label class='form-check-label $text_color' for='role_{$role['id']}'>
                                            {$role['keterangan']}
                                        </label>
                                    </div>
                                </div>";
                            }
                            ?>
                        </div>
                    </div>
                </div>

                <hr>
                <div class="text-end">
                    <a href="index.php?module=admin&act=kelola_pengguna" class="btn btn-light border me-2">Kembali</a>
                    <button type="submit" class="btn btn-primary px-4"><i class="fas fa-save me-1"></i> Simpan Konfigurasi</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function autoFillAkun() {
    var select = document.getElementById("pilihPegawai");
    var option = select.options[select.selectedIndex];

    if(option.value !== "") {
        // Ambil atribut dari option yang dipilih
        var username = option.getAttribute("data-user");
        var email = option.getAttribute("data-email");
        var tipe = option.getAttribute("data-tipe");

        // Kunci kolom dan isi dengan data (Gunakan bg-light agar terlihat digembok)
        document.getElementById("inputUsername").value = username;
        document.getElementById("inputUsername").classList.add("bg-light");
        document.getElementById("inputUsername").readOnly = true;

        document.getElementById("inputPassword").value = "stpm2026"; // Default Password
        document.getElementById("inputPassword").classList.add("bg-light");
        document.getElementById("inputPassword").readOnly = true;
        document.getElementById("infoPassword").style.display = "block";

        document.getElementById("inputEmail").value = email;
        document.getElementById("inputEmail").classList.add("bg-light");
        document.getElementById("inputEmail").readOnly = true;

        document.getElementById("selectTipe").value = tipe;
    } else {
        // Reset jika admin memilih "-- Klik untuk Pilih Nama --"
        document.getElementById("inputUsername").value = "";
        document.getElementById("inputUsername").classList.remove("bg-light");
        document.getElementById("inputUsername").readOnly = false;

        document.getElementById("inputPassword").value = "";
        document.getElementById("inputPassword").classList.remove("bg-light");
        document.getElementById("inputPassword").readOnly = false;
        document.getElementById("infoPassword").style.display = "none";

        document.getElementById("inputEmail").value = "";
        document.getElementById("inputEmail").classList.remove("bg-light");
        document.getElementById("inputEmail").readOnly = false;
    }
}
</script>