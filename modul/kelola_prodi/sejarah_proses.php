<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = (int)$_POST['id'];
    $prodi = $koneksi->real_escape_string($_POST['prodi']);
    $konten = $koneksi->real_escape_string($_POST['konten_sejarah']);
    $redir = $_POST['redirect_module'];

    if ($id > 0) {
        $sql = "UPDATE prodi_sejarah SET konten_sejarah = '$konten', updated_at = NOW() WHERE id = '$id'";
    } else {
        $sql = "INSERT INTO prodi_sejarah (prodi, konten_sejarah) VALUES ('$prodi', '$konten')";
    }

    if ($koneksi->query($sql)) {
        echo "<script>alert('Sejarah berhasil disimpan!'); window.location='index.php?module=$redir&act=sejarah';</script>";
    }
}
?>