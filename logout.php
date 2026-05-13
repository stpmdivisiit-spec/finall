<?php
// logout.php

// 1. Mulai/Lanjutkan sesi untuk mengakses data yang ada saat ini
session_start();

// 2. Kosongkan semua variabel session array
$_SESSION = [];

// 3. Hapus cookie sesi dari browser (Langkah Keamanan Tambahan)
// Ini memastikan ID sesi lama tidak bisa digunakan lagi
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// 4. Hancurkan sesi di server
session_destroy();

// 5. Arahkan kembali ke halaman utama
// Karena session sudah hilang, index.php & content.php otomatis akan 
// menganggap user sebagai tamu dan menampilkan modul/publik/beranda.php
header("Location: index.php?module=beranda");
exit;
?>