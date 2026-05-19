<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // 1. Verifikasi Token Anti-Pembajakan
    verifyCSRFToken($_POST['csrf_token'] ?? '');

    $user_id_target = (int)$_POST['user_id'];
    $admin_id_sekarang = (int)$_SESSION['user_id']; // ID Admin yang sedang login

    // 2. Keamanan Logika: Cegah Admin menghapus dirinya sendiri
    if ($user_id_target === $admin_id_sekarang) {
        echo "<script>alert('Akses Ditolak! Anda tidak diizinkan menghapus akun Anda sendiri.'); window.history.back();</script>";
        exit;
    }

    // 3. Keamanan Tambahan: Pastikan yang menghapus benar-benar Admin (Jika perlu)
    $allowed_admin = ['admin', 'staf_it_admin'];
    $is_admin = !empty(array_intersect($allowed_admin, $_SESSION['roles'] ?? []));
    if (!$is_admin) {
        die("Hacking Attempt Detected! Akses ditolak.");
    }

    // 4. Eksekusi Hapus dengan Prepared Statements
    // (Berkat ON DELETE CASCADE di database Anda, menghapus dari tabel 'users' otomatis akan menghapus data di tabel 'dosen', 'tendik', dan 'user_roles')
    $stmt = $koneksi->prepare("DELETE FROM users WHERE id = ?");
    
    if ($stmt) {
        $stmt->bind_param("i", $user_id_target);
        
        if ($stmt->execute()) {
            $stmt->close();
            echo "<script>alert('Sukses! Data Pegawai beserta seluruh hak akses dan biodatanya telah dihapus permanen.'); window.location='index.php?module=admin&act=data_pegawai';</script>";
        } else {
            echo "<script>alert('Gagal menghapus data dari database: " . $stmt->error . "'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('Query Error: " . $koneksi->error . "'); window.history.back();</script>";
    }
} else {
    // Jika ada yang mencoba mengakses file ini langsung dari URL (metode GET)
    die("Akses Ditolak! Gunakan tombol yang tersedia.");
}
?>