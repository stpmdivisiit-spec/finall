<?php
// FILE: login.php
session_start();

// 1. Masukkan file koneksi
include 'config/koneksi.php';

// 2. Periksa Koneksi Database
if (!isset($koneksi) || !$koneksi instanceof mysqli) {
    die("Koneksi Database Gagal. Cek file config/koneksi.php");
}

// ==========================================
// BAGIAN 1: LOGIKA PROSES LOGIN (BACKEND)
// ==========================================
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Ambil data dari form
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');

    // Validasi input kosong (Kembalikan ke halaman beranda tempat form berada)
    if (empty($email) || empty($password)) {
        header("Location: index.php?module=beranda&error=empty");
        exit();
    }

    // Cek User di Database (PERBAIKAN: 'tipe' diganti 'jenis_pegawai', tambah 'status_aktif')
    $stmt = $koneksi->prepare("SELECT id, username, nama_lengkap, password, jenis_pegawai, status_aktif FROM users WHERE email = ?");
    
    // Keamanan ekstra untuk melacak error query
    if (!$stmt) {
        die("Query Error: " . $koneksi->error); 
    }

    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        // Cek apakah akun dinonaktifkan oleh Admin
        if ($user['status_aktif'] != 1) {
            header("Location: index.php?module=beranda&error=banned");
            exit();
        }

        // Verifikasi Password
        if (password_verify($password, $user['password'])) {
            
            // Ambil SEMUA Hak Akses (Multi-Role)
            $stmt_roles = $koneksi->prepare("SELECT r.role_name FROM user_roles ur JOIN roles r ON ur.role_id = r.id WHERE ur.user_id = ?");
            $stmt_roles->bind_param("i", $user['id']);
            $stmt_roles->execute();
            $res_roles = $stmt_roles->get_result();

            $roles = [];
            while ($row = $res_roles->fetch_assoc()) {
                $roles[] = $row['role_name'];
            }

            // Tolak jika tidak punya role sama sekali
            if (empty($roles)) {
                header("Location: index.php?module=beranda&error=no_roles");
                exit();
            }

            // Password Benar & Punya Role: Daftarkan semua ke Session
            $_SESSION['user_id']       = $user['id'];
            $_SESSION['username']      = $user['username'];
            $_SESSION['nama_lengkap']  = $user['nama_lengkap']; // Berguna untuk ditampilkan di pojok kanan atas
            $_SESSION['jenis_pegawai'] = $user['jenis_pegawai'];
            $_SESSION['roles']         = $roles; // Simpan dalam bentuk Array!

            // === REDIRECT LOGIC ===
            // Kita cukup melemparnya ke index.php utama.
            // File content.php yang sudah kita buat pintar sebelumnya akan otomatis
            // mendeteksi $roles array ini dan memasukkannya ke folder default yang paling tepat!
            header("Location: index.php");
            exit();

        } else {
            // Password Salah
            header("Location: index.php?module=beranda&error=pass");
            exit();
        }
    } else {
        // Email Tidak Ditemukan
        header("Location: index.php?module=beranda&error=user");
        exit();
    }
}
?>