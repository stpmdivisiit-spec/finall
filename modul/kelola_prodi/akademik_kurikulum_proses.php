<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $prodi    = $_POST['prodi'];
    $semester = (int)$_POST['semester'];
    $kode_mk  = $koneksi->real_escape_string($_POST['kode_mk']);
    $nama_mk  = $koneksi->real_escape_string($_POST['nama_mk']);
    $sks      = (int)$_POST['sks'];
    $jenis_mk = $_POST['jenis_mk'];

    $sql = "INSERT INTO prodi_kurikulum (prodi, semester, kode_mk, nama_mk, sks, jenis_mk) 
            VALUES ('$prodi', '$semester', '$kode_mk', '$nama_mk', '$sks', '$jenis_mk')";
    
    $koneksi->query($sql);
    header("Location: index.php?module=prodi_pemerintahan&act=kurikulum");
}
?>