<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id       = (int)$_POST['id'];
    $prodi    = $koneksi->real_escape_string($_POST['prodi']);
    $kategori = $koneksi->real_escape_string($_POST['kategori']);
    $konten_1 = $koneksi->real_escape_string($_POST['konten_1']);
    $konten_2 = $koneksi->real_escape_string($_POST['konten_2'] ?? '');
    $redirect = $_POST['redirect'];

    if ($id > 0) {
        // Jika data sudah ada, lakukan UPDATE
        $sql = "UPDATE prodi_profil SET 
                    konten_1 = '$konten_1', 
                    konten_2 = '$konten_2' 
                WHERE id = '$id'";
    } else {
        // Jika data belum ada, lakukan INSERT
        $sql = "INSERT INTO prodi_profil (prodi, kategori, konten_1, konten_2) 
                VALUES ('$prodi', '$kategori', '$konten_1', '$konten_2')";
    }

    if ($koneksi->query($sql)) {
        echo "<script>alert('Data profil berhasil diperbarui!'); window.location='index.php?module=prodi_pemerintahan&act=$redirect';</script>";
    } else {
        echo "<script>alert('Terjadi kesalahan: " . $koneksi->error . "'); window.history.back();</script>";
    }
}
?>