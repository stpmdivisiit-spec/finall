<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $prodi    = $koneksi->real_escape_string($_POST['prodi']);
    $semester = (int)$_POST['semester'];
    $kode_mk  = $koneksi->real_escape_string($_POST['kode_mk']);
    $nama_mk  = $koneksi->real_escape_string($_POST['nama_mk']);
    $sks      = (int)$_POST['sks'];
    $jenis_mk = $koneksi->real_escape_string($_POST['jenis_mk']);
    
    $redirect_module = $_POST['redirect_module'];

    $sql = "INSERT INTO prodi_kurikulum (prodi, semester, kode_mk, nama_mk, sks, jenis_mk) 
            VALUES ('$prodi', '$semester', '$kode_mk', '$nama_mk', '$sks', '$jenis_mk')";
    
    if($koneksi->query($sql)){
        echo "<script>window.location='index.php?module=$redirect_module&act=kurikulum';</script>";
    } else {
        echo "<script>alert('Gagal menyimpan: " . $koneksi->error . "'); window.history.back();</script>";
    }
}
?>