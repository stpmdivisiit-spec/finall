<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    verifyCSRFToken($_POST['csrf_token'] ?? '');

    $user_id = (int)$_POST['user_id'];
    
    // Data Akun Utama
    $username     = trim($_POST['username']);
    $email        = trim($_POST['email']);
    $role_id      = (int)$_POST['role_id'];
    $status_aktif = (int)$_POST['status_aktif'];
    
    // Data Tendik
    $nip_nik            = trim($_POST['nip_nik'] ?? '');
    $nama_lengkap       = trim($_POST['nama_lengkap'] ?? '');
    $jenis_kelamin      = trim($_POST['jenis_kelamin'] ?? '');
    $tempat_lahir       = trim($_POST['tempat_lahir'] ?? '');
    
    // PERBAIKAN: Ubah string kosong menjadi null agar MySQL tidak error
    $tanggal_lahir      = !empty($_POST['tanggal_lahir']) ? trim($_POST['tanggal_lahir']) : null;
    
    $alamat             = trim($_POST['alamat'] ?? '');
    $no_hp              = trim($_POST['no_hp'] ?? '');
    $jabatan_struktural = trim($_POST['jabatan_struktural'] ?? '');
    $unit_kerja         = trim($_POST['unit_kerja'] ?? '');
    $status_kepegawaian = trim($_POST['status_kepegawaian'] ?? '');

    mysqli_begin_transaction($koneksi);

    try {
        // A. Cek Password Baru
        if (!empty($_POST['password'])) {
            $hashed = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $stmt1 = $koneksi->prepare("UPDATE users SET nama_lengkap=?, username=?, email=?, password=?, status_aktif=? WHERE id=?");
            $stmt1->bind_param("ssssii", $nama_lengkap, $username, $email, $hashed, $status_aktif, $user_id);
        } else {
            $stmt1 = $koneksi->prepare("UPDATE users SET nama_lengkap=?, username=?, email=?, status_aktif=? WHERE id=?");
            $stmt1->bind_param("sssii", $nama_lengkap, $username, $email, $status_aktif, $user_id);
        }
        if (!$stmt1->execute()) throw new Exception("Gagal update data login: " . $stmt1->error);
        $stmt1->close();

        // B. Update Hak Akses
        $koneksi->query("DELETE FROM user_roles WHERE user_id = '$user_id'");
        $stmt2 = $koneksi->prepare("INSERT INTO user_roles (user_id, role_id) VALUES (?, ?)");
        $stmt2->bind_param("ii", $user_id, $role_id);
        if (!$stmt2->execute()) throw new Exception("Gagal update hak akses: " . $stmt2->error);
        $stmt2->close();

        // C. Update Biodata Tendik
        $stmt3 = $koneksi->prepare("UPDATE tendik SET nip_nik=?, nama_lengkap=?, jenis_kelamin=?, tempat_lahir=?, tanggal_lahir=?, alamat=?, no_hp=?, email=?, jabatan_struktural=?, unit_kerja=?, status_kepegawaian=? WHERE user_id=?");
        $stmt3->bind_param("sssssssssssi", $nip_nik, $nama_lengkap, $jenis_kelamin, $tempat_lahir, $tanggal_lahir, $alamat, $no_hp, $email, $jabatan_struktural, $unit_kerja, $status_kepegawaian, $user_id);
        if (!$stmt3->execute()) throw new Exception("Gagal update profil tendik: " . $stmt3->error);
        $stmt3->close();

        mysqli_commit($koneksi);
        echo "<script>alert('Perubahan data Tendik berhasil disimpan!'); window.location='index.php?module=admin&act=data_pegawai';</script>";

    } catch (Exception $e) {
        mysqli_rollback($koneksi);
        echo "<script>alert('Gagal Memperbarui Data: " . $e->getMessage() . "'); window.history.back();</script>";
    }
}
?>