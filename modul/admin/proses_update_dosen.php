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
    
    // Data Dosen
    $nidn               = trim($_POST['nidn'] ?? '');
    $nip                = trim($_POST['nip'] ?? '');
    $gelar_depan        = trim($_POST['gelar_depan'] ?? '');
    $nama_lengkap       = trim($_POST['nama_lengkap'] ?? '');
    $gelar_belakang     = trim($_POST['gelar_belakang'] ?? '');
    $jabatan_fungsional = trim($_POST['jabatan_fungsional'] ?? '');
    $status_dosen       = trim($_POST['status_dosen'] ?? '');
    $no_hp              = trim($_POST['no_hp'] ?? '');

    mysqli_begin_transaction($koneksi);

    try {
        // A. Cek Password Baru
        if (!empty($_POST['password'])) {
            $hashed = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $stmt1 = $koneksi->prepare("UPDATE users SET nama_lengkap=?, username=?, email=?, password=?, status_aktif=? WHERE id=?");
            $stmt1->bind_param("ssssii", $nama_lengkap, $username, $email, $hashed, $status_aktif, $user_id);
        } else {
            // Jika dikosongkan, JANGAN update kolom password
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

        // C. Update Biodata Dosen
        $stmt3 = $koneksi->prepare("UPDATE dosen SET nidn=?, nip=?, gelar_depan=?, nama_lengkap=?, gelar_belakang=?, jabatan_fungsional=?, status_dosen=?, email=?, no_hp=? WHERE user_id=?");
        $stmt3->bind_param("sssssssssi", $nidn, $nip, $gelar_depan, $nama_lengkap, $gelar_belakang, $jabatan_fungsional, $status_dosen, $email, $no_hp, $user_id);
        if (!$stmt3->execute()) throw new Exception("Gagal update profil dosen: " . $stmt3->error);
        $stmt3->close();

        // JIKA SEMUA MULUS, SIMPAN PERMANEN
        mysqli_commit($koneksi);
        echo "<script>alert('Perubahan data Dosen berhasil disimpan!'); window.location='index.php?module=admin&act=data_pegawai';</script>";

    } catch (Exception $e) {
        // JIKA GAGAL, KEMBALIKAN KE KONDISI AWAL
        mysqli_rollback($koneksi);
        echo "<script>alert('Gagal Memperbarui Data: " . $e->getMessage() . "'); window.history.back();</script>";
    }
}
?>