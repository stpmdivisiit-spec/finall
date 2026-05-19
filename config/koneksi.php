<?php
// config/koneksi.php
// HAPUS session_start() DARI SINI

$DB_HOST = "127.0.0.1"; // atau "localhost"
$DB_USER = "root";
$DB_PASS = ""; // Kosongkan jika tidak ada password (default XAMPP)
$DB_NAME = "dbestpm"; // Sesuai nama database Anda

// Ini adalah variabel yang PENTING!
$koneksi = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

// Cek koneksi
if ($koneksi->connect_error) {
    die("Connection failed: " . $koneksi->connect_error);
}



// Opsional: Set charset
$koneksi->set_charset("utf8mb4");

// INCLUDE FUNGSI GLOBAL & KEAMANAN
require_once 'functions.php';
?>