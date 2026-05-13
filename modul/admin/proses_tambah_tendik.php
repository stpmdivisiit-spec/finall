<?php
// CEK KEAMANAN
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // 1. Validasi Password
    $password = $_POST['password'];
    $confirm  = $_POST['confirm_password'];

    if ($password !== $confirm) {
        echo "<script>alert('Error: Password dan Konfirmasi tidak sama!'); window.history.back();</script>";
        exit;
    }

    // 2. Tangkap Data
    $username           = $koneksi->real_escape_string($_POST['username']);
    $email              = $koneksi->real_escape_string($_POST['email']);
    $role_id            = (int)$_POST['role_id'];
    $hashed             = password_hash($password, PASSWORD_DEFAULT);
    $tipe               = 'tendik';

    $nip_nik            = $koneksi->real_escape_string($_POST['nip_nik']);
    $nama_lengkap       = $koneksi->real_escape_string($_POST['nama_lengkap']);
    $jenis_kelamin      = $koneksi->real_escape_string($_POST['jenis_kelamin']);
    $jabatan_struktural = $koneksi->real_escape_string($_POST['jabatan_struktural']);
    $no_hp              = $koneksi->real_escape_string($_POST['no_hp']);
    $status_kepegawaian = $koneksi->real_escape_string($_POST['status_kepegawaian']);

    // ==========================================
    // 3. CEK DUPLIKASI DATA (VALIDASI)
    // ==========================================
    
    // Cek Username atau Email di tabel users
    $cek_user = $koneksi->query("SELECT id FROM users WHERE username = '$username' OR email = '$email'");
    if ($cek_user->num_rows > 0) {
        echo "<script>alert('Error: Username atau Email sudah terdaftar! Silakan gunakan yang lain.'); window.history.back();</script>";
        exit;
    }

    // Cek NIP/NIK di tabel tendik (jika diisi)
    if (!empty($nip_nik)) {
        $cek_tendik = $koneksi->query("SELECT id FROM tendik WHERE nip_nik = '$nip_nik'");
        if ($cek_tendik->num_rows > 0) {
            echo "<script>alert('Error: NIP/NIK tersebut sudah terdaftar pada data tendik lain!'); window.history.back();</script>";
            exit;
        }
    }

    // ==========================================
    // 4. MULAI TRANSAKSI DATABASE
    // ==========================================
    mysqli_begin_transaction($koneksi);

    try {
        // A. Insert ke tabel USERS
        $sql_user = "INSERT INTO users (username, password, email, tipe) VALUES ('$username', '$hashed', '$email', '$tipe')";
        if (!$koneksi->query($sql_user)) throw new Exception("Gagal membuat akun: " . $koneksi->error);
        
        $user_id = $koneksi->insert_id;

        // B. Insert ke tabel USER_ROLES
        $sql_role = "INSERT INTO user_roles (user_id, role_id) VALUES ('$user_id', '$role_id')";
        if (!$koneksi->query($sql_role)) throw new Exception("Gagal menetapkan role: " . $koneksi->error);

        // C. Insert ke tabel TENDIK
        $sql_tendik = "INSERT INTO tendik (
                        user_id, nip_nik, nama_lengkap, jenis_kelamin, jabatan_struktural, no_hp, status_kepegawaian
                      ) VALUES (
                        '$user_id', '$nip_nik', '$nama_lengkap', '$jenis_kelamin', '$jabatan_struktural', '$no_hp', '$status_kepegawaian'
                      )";
        if (!$koneksi->query($sql_tendik)) throw new Exception("Gagal menyimpan profil tendik: " . $koneksi->error);

        // COMMIT
        mysqli_commit($koneksi);
        echo "<script>alert('Sukses! Akun dan Biodata Tendik berhasil dibuat.'); window.location='index.php?module=admin&act=data_pegawai';</script>";

    } catch (Exception $e) {
        // ROLLBACK
        mysqli_rollback($koneksi);
        echo "<script>alert('Terjadi Kesalahan: " . $e->getMessage() . "'); window.history.back();</script>";
    }
}
?>