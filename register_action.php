<?php
include "koneksi.php";

$nama = $_POST['nama_lengkap'];
$username = $_POST['username'];
$email = $_POST['email'];
$role_id = $_POST['role_id'];
$tipe = $_POST['tipe'];
$password = $_POST['password'];
$confirm = $_POST['confirm_password'];

if ($password !== $confirm) {
    echo "<script>alert('Password tidak sama!');history.back();</script>";
    exit;
}

// Hash password
$hashed = password_hash($password, PASSWORD_DEFAULT);

// Insert ke tabel users
mysqli_query($conn, "INSERT INTO users (username, password, email, tipe)
                     VALUES ('$username', '$hashed', '$email', '$tipe')");

$user_id = mysqli_insert_id($conn);

// Insert role
mysqli_query($conn, "INSERT INTO user_roles (user_id, role_id)
                     VALUES ($user_id, $role_id)");

// Insert ke biodata sesuai tipe
if ($tipe == "dosen") {
    mysqli_query($conn, "INSERT INTO dosen (user_id, nama_lengkap) 
                         VALUES ($user_id, '$nama')");
}

if ($tipe == "tendik") {
    mysqli_query($conn, "INSERT INTO tendik (user_id, nama_lengkap)
                         VALUES ($user_id, '$nama')");
}

echo "<script>alert('Akun berhasil dibuat!');window.location='auth-login-basic.html';</script>";
?>
