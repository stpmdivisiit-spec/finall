<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id    = (int)$_POST['id'];
    $prodi = $koneksi->real_escape_string($_POST['prodi']);
    
    // Ambil inputan teks
    $ketua_prodi = $koneksi->real_escape_string($_POST['ketua_prodi_nama']);
    $sekretaris_prodi = $koneksi->real_escape_string($_POST['sekretaris_prodi_nama']);
    $kepala_lab = $koneksi->real_escape_string($_POST['kepala_lab_nama']);
    $tugas_lab = $koneksi->real_escape_string($_POST['kepala_lab_tugas']);
    $staf_admin = $koneksi->real_escape_string($_POST['staf_admin_nama']);
    $tugas_admin = $koneksi->real_escape_string($_POST['staf_admin_tugas']);
    
    $redirect_module = $_POST['redirect_module'];

    if ($id > 0) {
        $sql = "UPDATE prodi_struktur_organisasi SET 
                    ketua_prodi_nama = '$ketua_prodi',
                    sekretaris_prodi_nama = '$sekretaris_prodi',
                    kepala_lab_nama = '$kepala_lab',
                    kepala_lab_tugas = '$tugas_lab',
                    staf_admin_nama = '$staf_admin',
                    staf_admin_tugas = '$tugas_admin',
                    updated_at = NOW() 
                WHERE id = '$id'";
    } else {
        $sql = "INSERT INTO prodi_struktur_organisasi (prodi, ketua_prodi_nama, sekretaris_prodi_nama, kepala_lab_nama, kepala_lab_tugas, staf_admin_nama, staf_admin_tugas) 
                VALUES ('$prodi', '$ketua_prodi', '$sekretaris_prodi', '$kepala_lab', '$tugas_lab', '$staf_admin', '$tugas_admin')";
    }

    if ($koneksi->query($sql)) {
        echo "<script>alert('Struktur Organisasi berhasil diperbarui!'); window.location='index.php?module=$redirect_module&act=struktur';</script>";
    } else {
        echo "<script>alert('Gagal menyimpan: " . $koneksi->error . "'); window.history.back();</script>";
    }
}
?>