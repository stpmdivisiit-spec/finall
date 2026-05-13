<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $prodi     = $_POST['prodi'];
    $kategori  = $_POST['kategori'];
    
    $judul     = $koneksi->real_escape_string($_POST['judul']);
    $deskripsi = $koneksi->real_escape_string($_POST['deskripsi']);
    $tgl_mulai = $_POST['tanggal_mulai'];
    $tgl_sel   = !empty($_POST['tanggal_selesai']) ? "'".$_POST['tanggal_selesai']."'" : "NULL";
    $lokasi    = isset($_POST['lokasi']) ? $koneksi->real_escape_string($_POST['lokasi']) : "";

    $nama_file = "";
    if (isset($_FILES['file_lampiran']) && $_FILES['file_lampiran']['error'] == 0) {
        $ext = strtolower(pathinfo($_FILES['file_lampiran']['name'], PATHINFO_EXTENSION));
        $nama_file = $prodi . '_info_' . time() . '.' . $ext;
        move_uploaded_file($_FILES['file_lampiran']['tmp_name'], 'uploads/informasi/' . $nama_file);
    }

    $sql = "INSERT INTO prodi_info_agenda (prodi, kategori, judul, deskripsi, tanggal_mulai, tanggal_selesai, lokasi, file_lampiran) 
            VALUES ('$prodi', '$kategori', '$judul', '$deskripsi', '$tgl_mulai', $tgl_sel, '$lokasi', '$nama_file')";
    
    $koneksi->query($sql);
    echo "<script>alert('Data berhasil disimpan!'); window.location='index.php?module=prodi_pemerintahan&act=$kategori';</script>";
}
?>