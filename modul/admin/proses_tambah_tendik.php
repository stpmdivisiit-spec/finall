<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // 1. Validasi Keamanan Token CSRF
    verifyCSRFToken($_POST['csrf_token'] ?? '');

    // 2. Validasi Password
    $password = $_POST['password'];
    $confirm  = $_POST['confirm_password'];

    if ($password !== $confirm) {
        echo "<script>alert('Error: Password dan Konfirmasi Password tidak sama!'); window.history.back();</script>"; exit;
    }

    // 3. Tangkap Data Akun
    $username      = trim($_POST['username']);
    $email         = trim($_POST['email']);
    $role_id       = (int)$_POST['role_id'];
    $hashed        = password_hash($password, PASSWORD_DEFAULT);
    $jenis_pegawai = 'Tendik'; // Otomatis diset sebagai Tendik
    $status_aktif  = 1;

    // 4. Tangkap Data Biodata Tendik (Berdasarkan struktur database Anda)
    $nip_nik            = trim($_POST['nip_nik'] ?? '');
    $nama_lengkap       = trim($_POST['nama_lengkap'] ?? '');
    $jenis_kelamin      = trim($_POST['jenis_kelamin'] ?? '');
    $tempat_lahir       = trim($_POST['tempat_lahir'] ?? '');
    $tanggal_lahir      = trim($_POST['tanggal_lahir'] ?? null);
    $alamat             = trim($_POST['alamat'] ?? '');
    $no_hp              = trim($_POST['no_hp'] ?? '');
    $jabatan_struktural = trim($_POST['jabatan_struktural'] ?? '');
    $unit_kerja         = trim($_POST['unit_kerja'] ?? '');
    $status_kepegawaian = trim($_POST['status_kepegawaian'] ?? '');

    // 5. Cek Duplikasi Username/Email
    $stmt_cek = $koneksi->prepare("SELECT id FROM users WHERE username = ? OR email = ?");
    $stmt_cek->bind_param("ss", $username, $email);
    $stmt_cek->execute();
    if ($stmt_cek->get_result()->num_rows > 0) {
        echo "<script>alert('Error: Username atau Email sudah terdaftar!'); window.history.back();</script>"; exit;
    }
    $stmt_cek->close();

    // ==========================================
    // 6. MULAI TRANSAKSI DATABASE (Aman dari data terpotong)
    // ==========================================
    mysqli_begin_transaction($koneksi);

    try {
        // A. Insert ke tabel USERS
        $stmt1 = $koneksi->prepare("INSERT INTO users (nama_lengkap, username, password, email, jenis_pegawai, status_aktif) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt1->bind_param("sssssi", $nama_lengkap, $username, $hashed, $email, $jenis_pegawai, $status_aktif);
        if (!$stmt1->execute()) throw new Exception("Gagal membuat akun login: " . $stmt1->error);
        $user_id = $stmt1->insert_id;
        $stmt1->close();

        // B. Insert ke tabel USER_ROLES
        $stmt2 = $koneksi->prepare("INSERT INTO user_roles (user_id, role_id) VALUES (?, ?)");
        $stmt2->bind_param("ii", $user_id, $role_id);
        if (!$stmt2->execute()) throw new Exception("Gagal menetapkan hak akses: " . $stmt2->error);
        $stmt2->close();

        // C. Insert ke tabel TENDIK
        $stmt3 = $koneksi->prepare("INSERT INTO tendik (user_id, nip_nik, nama_lengkap, jenis_kelamin, tempat_lahir, tanggal_lahir, alamat, no_hp, email, jabatan_struktural, unit_kerja, status_kepegawaian) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt3->bind_param("isssssssssss", $user_id, $nip_nik, $nama_lengkap, $jenis_kelamin, $tempat_lahir, $tanggal_lahir, $alamat, $no_hp, $email, $jabatan_struktural, $unit_kerja, $status_kepegawaian);
        if (!$stmt3->execute()) throw new Exception("Gagal menyimpan profil tendik: " . $stmt3->error);
        $stmt3->close();

        // COMMIT: Simpan permanen jika semua proses di atas berhasil
        mysqli_commit($koneksi);
        echo "<script>alert('Sukses! Akun dan Biodata Tendik berhasil ditambahkan.'); window.location='index.php?module=admin&act=data_pegawai';</script>";

    } catch (Exception $e) {
        // ROLLBACK: Batalkan semua jika ada satu saja query yang gagal
        mysqli_rollback($koneksi);
        echo "<script>alert('Terjadi Kesalahan Server: " . $e->getMessage() . "'); window.history.back();</script>";
    }
}
?>