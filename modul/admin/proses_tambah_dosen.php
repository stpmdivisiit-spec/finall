<?php
// CEK KEAMANAN
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // 1. Validasi Password
    $password = $_POST['password'];
    $confirm  = $_POST['confirm_password'];

    if ($password !== $confirm) {
        echo "<script>alert('Error: Password dan Konfirmasi Password tidak sama!'); window.history.back();</script>";
        exit;
    }

    // 2. Tangkap Data
    $username           = $koneksi->real_escape_string($_POST['username']);
    $email              = $koneksi->real_escape_string($_POST['email']);
    $role_id            = (int)$_POST['role_id'];
    $hashed             = password_hash($password, PASSWORD_DEFAULT);
    
    // PERBAIKAN: Gunakan format Enum yang benar sesuai database
    $jenis_pegawai      = 'Dosen';

    $nidn               = $koneksi->real_escape_string($_POST['nidn']);
    $nip                = $koneksi->real_escape_string($_POST['nip']);
    $gelar_depan        = $koneksi->real_escape_string($_POST['gelar_depan']);
    $nama_lengkap       = $koneksi->real_escape_string($_POST['nama_lengkap']);
    $gelar_belakang     = $koneksi->real_escape_string($_POST['gelar_belakang']);
    $jabatan_fungsional = $koneksi->real_escape_string($_POST['jabatan_fungsional']);
    $status_dosen       = $koneksi->real_escape_string($_POST['status_dosen']);
    $no_hp              = $koneksi->real_escape_string($_POST['no_hp']);

    // ==========================================
    // 3. CEK DUPLIKASI DATA (VALIDASI)
    // ==========================================
    
    // Cek Username atau Email di tabel users
    $cek_user = $koneksi->query("SELECT id FROM users WHERE username = '$username' OR email = '$email'");
    if ($cek_user->num_rows > 0) {
        echo "<script>alert('Error: Username atau Email sudah terdaftar! Silakan gunakan yang lain.'); window.history.back();</script>";
        exit;
    }

    // Cek NIDN atau NIP di tabel dosen (jika diisi)
    if (!empty($nidn) || !empty($nip)) {
        $kondisi = [];
        if (!empty($nidn)) $kondisi[] = "nidn = '$nidn'";
        if (!empty($nip)) $kondisi[]  = "nip = '$nip'";
        $sql_kondisi = implode(" OR ", $kondisi);

        $cek_dosen = $koneksi->query("SELECT id FROM dosen WHERE $sql_kondisi");
        if ($cek_dosen->num_rows > 0) {
            echo "<script>alert('Error: NIDN atau NIP tersebut sudah terdaftar pada data dosen lain!'); window.history.back();</script>";
            exit;
        }
    }

    // ==========================================
    // 4. MULAI TRANSAKSI DATABASE
    // ==========================================
    mysqli_begin_transaction($koneksi);

    try {
        // A. Insert ke tabel USERS (PERBAIKAN: Tambah nama_lengkap, jenis_pegawai, dan status_aktif)
        $sql_user = "INSERT INTO users (nama_lengkap, username, password, email, jenis_pegawai, status_aktif) 
                     VALUES ('$nama_lengkap', '$username', '$hashed', '$email', '$jenis_pegawai', 1)";
        
        if (!$koneksi->query($sql_user)) {
            throw new Exception("Gagal membuat akun: " . $koneksi->error);
        }
        
        $user_id = $koneksi->insert_id;

        // B. Insert ke tabel USER_ROLES
        $sql_role = "INSERT INTO user_roles (user_id, role_id) VALUES ('$user_id', '$role_id')";
        if (!$koneksi->query($sql_role)) {
            throw new Exception("Gagal menetapkan role: " . $koneksi->error);
        }

        // C. Insert ke tabel DOSEN
        $sql_dosen = "INSERT INTO dosen (
                        user_id, nidn, nip, gelar_depan, nama_lengkap, gelar_belakang, 
                        jabatan_fungsional, status_dosen, email, no_hp
                      ) VALUES (
                        '$user_id', '$nidn', '$nip', '$gelar_depan', '$nama_lengkap', '$gelar_belakang',
                        '$jabatan_fungsional', '$status_dosen', '$email', '$no_hp'
                      )";
                      
        if (!$koneksi->query($sql_dosen)) {
            throw new Exception("Gagal menyimpan profil dosen: " . $koneksi->error);
        }

        // COMMIT: Semua berhasil disimpan
        mysqli_commit($koneksi);
        echo "<script>alert('Sukses! Akun dan Biodata Dosen berhasil dibuat.'); window.location='index.php?module=admin&act=data_pegawai';</script>";

    } catch (Exception $e) {
        // ROLLBACK: Jika ada satu saja yang gagal, batalkan semua simpanan agar data tidak berantakan
        mysqli_rollback($koneksi);
        echo "<script>alert('Terjadi Kesalahan: " . $e->getMessage() . "'); window.history.back();</script>";
    }
}
?>