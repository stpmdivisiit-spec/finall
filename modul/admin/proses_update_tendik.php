<?php
// CEK KEAMANAN
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Tangkap data
    $id                 = (int)$_POST['id'];
    $nip_nik            = $koneksi->real_escape_string($_POST['nip_nik']);
    $nama_lengkap       = $koneksi->real_escape_string($_POST['nama_lengkap']);
    $jenis_kelamin      = $koneksi->real_escape_string($_POST['jenis_kelamin']);
    $jabatan_struktural = $koneksi->real_escape_string($_POST['jabatan_struktural']);
    $no_hp              = $koneksi->real_escape_string($_POST['no_hp']);
    $status_kepegawaian = $koneksi->real_escape_string($_POST['status_kepegawaian']);

    // Query Update
    $query = "UPDATE tendik SET 
                nip_nik = '$nip_nik',
                nama_lengkap = '$nama_lengkap',
                jenis_kelamin = '$jenis_kelamin',
                jabatan_struktural = '$jabatan_struktural',
                no_hp = '$no_hp',
                status_kepegawaian = '$status_kepegawaian'
              WHERE id = '$id'";

    if ($koneksi->query($query)) {
        echo "<script>alert('Data Tendik berhasil diupdate!'); window.location='index.php?module=admin&act=data_pegawai';</script>";
    } else {
        echo "<script>alert('Gagal mengupdate data: " . $koneksi->error . "'); window.history.back();</script>";
    }
}
?>