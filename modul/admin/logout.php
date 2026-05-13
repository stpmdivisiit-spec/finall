<?php
session_start();

// 1. Kosongkan semua array sesi
$_SESSION = array();

// 2. Hancurkan cookie sesi di browser pengguna secara paksa
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// 3. Hancurkan sesi di server
session_destroy();

// 4. Arahkan kembali ke halaman login
header("Location: login.php");
exit;
?>