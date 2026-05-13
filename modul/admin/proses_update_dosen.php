<?php
// CEK KEAMANAN
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Tangkap data
    $id                 = (int)$_POST['id'];
    $nidn               = $koneksi->real_escape_string($_POST['nidn']);
    $nip                = $koneksi->real_escape_string($_POST['nip']);
    $gelar_depan        = $koneksi->real_escape_string($_POST['gelar_depan']);
    $nama_lengkap       = $koneksi->real_escape_string($_POST['nama_lengkap']);
    $gelar_belakang     = $koneksi->real_escape_string($_POST['gelar_belakang']);
    $jabatan_fungsional = $koneksi->real_escape_string($_POST['jabatan_fungsional']);
    $status_dosen       = $koneksi->real_escape_string($_POST['status_dosen']);
    $email              = $koneksi->real_escape_string($_POST['email']);
    $no_hp              = $koneksi->real_escape_string($_POST['no_hp']);

    // Query Update
    $query = "UPDATE dosen SET 
                nidn = '$nidn',
                nip = '$nip',
                gelar_depan = '$gelar_depan',
                nama_lengkap = '$nama_lengkap',
                gelar_belakang = '$gelar_belakang',
                jabatan_fungsional = '$jabatan_fungsional',
                status_dosen = '$status_dosen',
                email = '$email',
                no_hp = '$no_hp'
              WHERE id = '$id'";

    if ($koneksi->query($query)) {
        echo "<script>alert('Data Dosen berhasil diupdate!'); window.location='index.php?module=admin&act=data_pegawai';</script>";
    } else {
        echo "<script>alert('Gagal mengupdate data: " . $koneksi->error . "'); window.history.back();</script>";
    }
}
?>