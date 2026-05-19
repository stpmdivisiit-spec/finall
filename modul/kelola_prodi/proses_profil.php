<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id       = (int)$_POST['id'];
    
    // Ini akan berisi 'sosiatri' atau 'pemerintahan'
    $prodi    = $koneksi->real_escape_string($_POST['prodi']); 
    $kategori = $koneksi->real_escape_string($_POST['kategori']);
    $konten_1 = $koneksi->real_escape_string($_POST['konten_1']);
    $konten_2 = $koneksi->real_escape_string($_POST['konten_2'] ?? '');
    
    // Tangkap data rute kembali
    $redirect_module = $_POST['redirect_module'];
    $redirect_act    = $_POST['redirect_act'];

    if ($id > 0) {
        // Jika data sudah ada, lakukan UPDATE
        $sql = "UPDATE prodi_profil SET 
                    konten_1 = '$konten_1', 
                    konten_2 = '$konten_2',
                    updated_at = NOW()
                WHERE id = '$id'";
    } else {
        // Jika data belum ada, lakukan INSERT
        $sql = "INSERT INTO prodi_profil (prodi, kategori, konten_1, konten_2) 
                VALUES ('$prodi', '$kategori', '$konten_1', '$konten_2')";
    }

    if ($koneksi->query($sql)) {
        // Redirect kembali ke modul spesifik yang tadi diedit (Misal: prodi_sosiatri)
        echo "<script>alert('Data profil berhasil diperbarui!'); window.location='index.php?module=$redirect_module&act=$redirect_act';</script>";
    } else {
        echo "<script>alert('Terjadi kesalahan: " . $koneksi->error . "'); window.history.back();</script>";
    }
}
?>