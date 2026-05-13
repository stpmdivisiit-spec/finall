<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    verifyCSRFToken($_POST['csrf_token'] ?? '');

    // Validasi Password
    $password = $_POST['password'];
    $confirm  = $_POST['confirm_password'];

    if ($password !== $confirm) {
        echo "<script>alert('Error: Password dan Konfirmasi Password tidak sama!'); window.history.back();</script>"; exit;
    }

    // Tangkap Data Akun
    $username      = trim($_POST['username']);
    $email         = trim($_POST['email']);
    $role_id       = (int)$_POST['role_id'];
    $hashed        = password_hash($password, PASSWORD_DEFAULT);
    $jenis_pegawai = 'Dosen';
    $status_aktif  = 1;

    // Tangkap Data Biodata Dosen
    $nidn               = trim($_POST['nidn']);
    $nip                = trim($_POST['nip']);
    $gelar_depan        = trim($_POST['gelar_depan']);
    $nama_lengkap       = trim($_POST['nama_lengkap']);
    $gelar_belakang     = trim($_POST['gelar_belakang']);
    $jabatan_fungsional = trim($_POST['jabatan_fungsional']);
    $status_dosen       = trim($_POST['status_dosen']);
    $no_hp              = trim($_POST['no_hp']);

    // Cek Duplikasi Username/Email (Mencegah Error Duplicate Entry)
    $stmt_cek = $koneksi->prepare("SELECT id FROM users WHERE username = ? OR email = ?");
    $stmt_cek->bind_param("ss", $username, $email);
    $stmt_cek->execute();
    if ($stmt_cek->get_result()->num_rows > 0) {
        echo "<script>alert('Error: Username atau Email sudah terdaftar!'); window.history.back();</script>"; exit;
    }
    $stmt_cek->close();

    // MULAI TRANSAKSI
    mysqli_begin_transaction($koneksi);

    try {
        // 1. Insert ke tabel USERS
        $stmt1 = $koneksi->prepare("INSERT INTO users (nama_lengkap, username, password, email, jenis_pegawai, status_aktif) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt1->bind_param("sssssi", $nama_lengkap, $username, $hashed, $email, $jenis_pegawai, $status_aktif);
        if (!$stmt1->execute()) throw new Exception("Gagal membuat akun: " . $stmt1->error);
        $user_id = $stmt1->insert_id;
        $stmt1->close();

        // 2. Insert ke tabel USER_ROLES
        $stmt2 = $koneksi->prepare("INSERT INTO user_roles (user_id, role_id) VALUES (?, ?)");
        $stmt2->bind_param("ii", $user_id, $role_id);
        if (!$stmt2->execute()) throw new Exception("Gagal menetapkan hak akses: " . $stmt2->error);
        $stmt2->close();

        // 3. Insert ke tabel DOSEN
        $stmt3 = $koneksi->prepare("INSERT INTO dosen (user_id, nidn, nip, gelar_depan, nama_lengkap, gelar_belakang, jabatan_fungsional, status_dosen, email, no_hp) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt3->bind_param("isssssssss", $user_id, $nidn, $nip, $gelar_depan, $nama_lengkap, $gelar_belakang, $jabatan_fungsional, $status_dosen, $email, $no_hp);
        if (!$stmt3->execute()) throw new Exception("Gagal menyimpan biodata dosen: " . $stmt3->error);
        $stmt3->close();

        // COMMIT JIKA SEMUA SUKSES
        mysqli_commit($koneksi);
        echo "<script>alert('Sukses! Akun dan Biodata Dosen berhasil dibuat.'); window.location='index.php?module=admin&act=data_pegawai';</script>";

    } catch (Exception $e) {
        // ROLLBACK JIKA ADA 1 SAJA YANG GAGAL
        mysqli_rollback($koneksi);
        echo "<script>alert('Terjadi Kesalahan Server: " . $e->getMessage() . "'); window.history.back();</script>";
    }
}
?>