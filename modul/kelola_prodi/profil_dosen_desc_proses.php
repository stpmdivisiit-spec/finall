<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id          = (int)$_POST['id'];
    $prodi       = $koneksi->real_escape_string($_POST['prodi']);
    $deskripsi   = $koneksi->real_escape_string($_POST['deskripsi_singkat']);
    $gambar_lama = $_POST['gambar_lama'];
    
    $nama_file_baru = $gambar_lama;

    // Proses Upload
    if (isset($_FILES['file_gambar_bersama']) && $_FILES['file_gambar_bersama']['error'] == 0) {
        $ext = pathinfo($_FILES['file_gambar_bersama']['name'], PATHINFO_EXTENSION);
        $nama_file_baru = $prodi . '_dosen_banner_' . time() . '.' . $ext;
        move_uploaded_file($_FILES['file_gambar_bersama']['tmp_name'], 'uploads/profil/' . $nama_file_baru);
    }

    if ($id > 0) {
        $sql = "UPDATE prodi_profil_dosen_desc SET deskripsi_singkat = '$deskripsi', file_gambar_bersama = '$nama_file_baru' WHERE id = '$id'";
    } else {
        $sql = "INSERT INTO prodi_profil_dosen_desc (prodi, deskripsi_singkat, file_gambar_bersama) VALUES ('$prodi', '$deskripsi', '$nama_file_baru')";
    }

    if ($koneksi->query($sql)) {
        echo "<script>alert('Profil Dosen berhasil disimpan!'); window.location='index.php?module=prodi_pemerintahan&act=profil_dosen_desc';</script>";
    } else {
        echo "<script>alert('Gagal menyimpan: " . $koneksi->error . "'); window.history.back();</script>";
    }
}
?>