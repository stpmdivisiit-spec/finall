<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");
// C:\xampp\htdocs\FINAL\modul\admin\proses_update_dosen.php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // ==========================================
    // PASANG DI SINI: SNIPPET 1 (CEK CSRF TOKEN)
    // ==========================================
    $token_dikirim = $_POST['csrf_token'] ?? '';
    if (!verifyCSRFToken($token_dikirim)) {
        setFlashMessage('danger', 'Sesi Anda kadaluarsa. Silakan muat ulang halaman.');
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit;
    }

    // CEK ID PENGGUNA
    $user_id = (int)$_POST['user_id'];
    if ($user_id === 0) {
        setFlashMessage('danger', 'Gagal: ID Dosen tidak ditemukan!');
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit;
    }
    
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

    // MULAI TRANSAKSI
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
        
        if (!$stmt1) throw new Exception("Error Struktur Tabel Users: " . $koneksi->error);
        if (!$stmt1->execute()) throw new Exception("Gagal update data login: " . $stmt1->error);
        $stmt1->close();

        // B. Update Hak Akses
        $koneksi->query("DELETE FROM user_roles WHERE user_id = '$user_id'");
        $stmt2 = $koneksi->prepare("INSERT INTO user_roles (user_id, role_id) VALUES (?, ?)");
        $stmt2->bind_param("ii", $user_id, $role_id);
        
        if (!$stmt2) throw new Exception("Error Struktur Tabel Roles: " . $koneksi->error);
        if (!$stmt2->execute()) throw new Exception("Gagal update hak akses: " . $stmt2->error);
        $stmt2->close();

        // C. Update Biodata Dosen 
        $query_dosen = "UPDATE dosen SET nidn=?, nip=?, gelar_depan=?, nama_lengkap=?, gelar_belakang=?, jabatan_fungsional=?, status_dosen=?, no_hp=? WHERE user_id=?";
        $stmt3 = $koneksi->prepare($query_dosen);
        
        if (!$stmt3) throw new Exception("Error Struktur Tabel Dosen: " . $koneksi->error);
        
        $stmt3->bind_param("ssssssssi", $nidn, $nip, $gelar_depan, $nama_lengkap, $gelar_belakang, $jabatan_fungsional, $status_dosen, $no_hp, $user_id);
        
        if (!$stmt3->execute()) throw new Exception("Gagal mengeksekusi update profil dosen: " . $stmt3->error);
        $stmt3->close();

        // ==========================================
        // PASANG DI SINI: SNIPPET 2 (SUKSES SIMPAN)
        // ==========================================
        mysqli_commit($koneksi);
        
        setFlashMessage('success', 'Perubahan data Dosen berhasil disimpan!');
        header("Location: index.php?module=admin&act=data_pegawai");
        exit;

    } catch (Exception $e) {
        // ==========================================
        // JIKA GAGAL (ERROR) - TOAST DANGER
        // ==========================================
        mysqli_rollback($koneksi);
        
        setFlashMessage('danger', 'Gagal Memperbarui Data: ' . $e->getMessage());
        header("Location: " . $_SERVER['HTTP_REFERER']); 
        exit;
    }
}
?>