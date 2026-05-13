<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id          = (int)$_POST['id'];
    $prodi       = $koneksi->real_escape_string($_POST['prodi']);
    $deskripsi   = $koneksi->real_escape_string($_POST['deskripsi']);
    $gambar_lama = $_POST['gambar_lama'];
    
    $nama_file_baru = $gambar_lama; // Default gunakan file lama

    // Cek apakah ada file yang diupload
    if (isset($_FILES['file_gambar']) && $_FILES['file_gambar']['error'] == 0) {
        $ext = pathinfo($_FILES['file_gambar']['name'], PATHINFO_EXTENSION);
        $nama_file_baru = $prodi . '_struktur_' . time() . '.' . $ext;
        $path_upload = 'uploads/struktur/' . $nama_file_baru;

        // Pastikan folder uploads/struktur/ sudah dibuat di dalam proyek Anda
        move_uploaded_file($_FILES['file_gambar']['tmp_name'], $path_upload);
    }

    if ($id > 0) {
        $sql = "UPDATE prodi_struktur_organisasi SET deskripsi = '$deskripsi', file_gambar = '$nama_file_baru' WHERE id = '$id'";
    } else {
        $sql = "INSERT INTO prodi_struktur_organisasi (prodi, deskripsi, file_gambar) VALUES ('$prodi', '$deskripsi', '$nama_file_baru')";
    }

    if ($koneksi->query($sql)) {
        echo "<script>alert('Struktur Organisasi berhasil disimpan!'); window.location='index.php?module=prodi_pemerintahan&act=struktur';</script>";
    } else {
        echo "<script>alert('Gagal menyimpan: " . $koneksi->error . "'); window.history.back();</script>";
    }
}
?>