<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $id_user       = (int)$_POST['id'];
    $nama_lengkap  = $koneksi->real_escape_string($_POST['nama_lengkap']);
    $username      = $koneksi->real_escape_string($_POST['username']);
    $email         = $koneksi->real_escape_string($_POST['email']);
    $jenis_pegawai = $_POST['jenis_pegawai'];
    $status_aktif  = (int)$_POST['status_aktif'];
    
    $password_raw  = $_POST['password'];
    
    // Array dari checkbox role yang dicentang (bisa lebih dari satu)
    $roles_terpilih = isset($_POST['role_id']) ? $_POST['role_id'] : [];

    if ($id_user > 0) {
        // PROSES UPDATE DATA LAMA
        if (!empty($password_raw)) {
            // Jika password diisi, update password
            $password_hash = password_hash($password_raw, PASSWORD_DEFAULT);
            $sql_user = "UPDATE users SET nama_lengkap='$nama_lengkap', email='$email', jenis_pegawai='$jenis_pegawai', status_aktif='$status_aktif', password='$password_hash' WHERE id='$id_user'";
        } else {
            // Jika kosong, jangan sentuh password
            $sql_user = "UPDATE users SET nama_lengkap='$nama_lengkap', email='$email', jenis_pegawai='$jenis_pegawai', status_aktif='$status_aktif' WHERE id='$id_user'";
        }
        $koneksi->query($sql_user);
        $user_yang_diproses = $id_user;
        $pesan = "Data dan Hak Akses Pengguna berhasil di-update!";
        
    } else {
        // PROSES INSERT USER BARU
        // Cek username bentrok
        $cek_username = $koneksi->query("SELECT id FROM users WHERE username='$username'");
        if ($cek_username->num_rows > 0) {
            echo "<script>alert('Gagal! Username $username sudah dipakai orang lain.'); window.history.back();</script>";
            exit;
        }

        $password_hash = password_hash($password_raw, PASSWORD_DEFAULT);
        $sql_user = "INSERT INTO users (nama_lengkap, username, password, email, jenis_pegawai, status_aktif) 
                     VALUES ('$nama_lengkap', '$username', '$password_hash', '$email', '$jenis_pegawai', '$status_aktif')";
        
        $koneksi->query($sql_user);
        $user_yang_diproses = $koneksi->insert_id; // Ambil ID yang baru saja tercipta
        $pesan = "Akun Pengguna Baru berhasil dibuat!";
    }

    // --- PROSES INTI: SINKRONISASI MULTI-ROLE ---
    
    // 1. Hapus semua role lama dari user ini (Reset)
    $koneksi->query("DELETE FROM user_roles WHERE user_id = '$user_yang_diproses'");
    
    // 2. Insert role baru yang dicentang
    if (!empty($roles_terpilih)) {
        foreach ($roles_terpilih as $id_role_centang) {
            $id_role_clean = (int)$id_role_centang;
            $koneksi->query("INSERT INTO user_roles (user_id, role_id) VALUES ('$user_yang_diproses', '$id_role_clean')");
        }
    }

    echo "<script>alert('$pesan'); window.location='index.php?module=admin&act=kelola_pengguna';</script>";
}
?>