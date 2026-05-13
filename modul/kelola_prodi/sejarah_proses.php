<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id             = (int)$_POST['id'];
    $prodi          = $koneksi->real_escape_string($_POST['prodi']);
    $konten_sejarah = $koneksi->real_escape_string($_POST['konten_sejarah']);
    $gambar_lama    = $_POST['gambar_lama'];
    
    $nama_file_baru = $gambar_lama;

    // Proses Upload
    if (isset($_FILES['file_gambar']) && $_FILES['file_gambar']['error'] == 0) {
        $ext = pathinfo($_FILES['file_gambar']['name'], PATHINFO_EXTENSION);
        $nama_file_baru = $prodi . '_sejarah_' . time() . '.' . $ext;
        move_uploaded_file($_FILES['file_gambar']['tmp_name'], 'uploads/profil/' . $nama_file_baru);
    }

    if ($id > 0) {
        $sql = "UPDATE prodi_sejarah SET konten_sejarah = '$konten_sejarah', file_gambar = '$nama_file_baru' WHERE id = '$id'";
    } else {
        $sql = "INSERT INTO prodi_sejarah (prodi, konten_sejarah, file_gambar) VALUES ('$prodi', '$konten_sejarah', '$nama_file_baru')";
    }

    if ($koneksi->query($sql)) {
        echo "<script>alert('Sejarah Prodi berhasil disimpan!'); window.location='index.php?module=prodi_pemerintahan&act=sejarah';</script>";
    } else {
        echo "<script>alert('Gagal menyimpan: " . $koneksi->error . "'); window.history.back();</script>";
    }
}
?>