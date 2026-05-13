<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $kategori  = $_POST['kategori_dokumen'];
    $judul     = $koneksi->real_escape_string($_POST['judul']);
    $deskripsi = $koneksi->real_escape_string($_POST['deskripsi']);
    $tanggal   = date('Y-m-d');

    $nama_file = "";
    if (isset($_FILES['file_dokumen']) && $_FILES['file_dokumen']['error'] == 0) {
        $ext = strtolower(pathinfo($_FILES['file_dokumen']['name'], PATHINFO_EXTENSION));
        
        // LPM mungkin butuh upload selain PDF (seperti Excel borang akreditasi)
        $allowed_ext = ['pdf', 'doc', 'docx', 'xls', 'xlsx'];
        
        if (in_array($ext, $allowed_ext)) {
            $nama_file = 'lpm_' . $kategori . '_' . time() . '.' . $ext;
            move_uploaded_file($_FILES['file_dokumen']['tmp_name'], 'uploads/lpm/dokumen/' . $nama_file);
        } else {
            echo "<script>alert('Gagal! Format file tidak didukung.'); window.history.back();</script>"; exit;
        }
    }

    $sql = "INSERT INTO lpm_dokumen (kategori_dokumen, judul, deskripsi, file_dokumen, tanggal_upload) 
            VALUES ('$kategori', '$judul', '$deskripsi', '$nama_file', '$tanggal')";
    
    $koneksi->query($sql);
    echo "<script>alert('Dokumen Mutu berhasil disimpan!'); window.location='index.php?module=lpm&act=dokumen&kat=$kategori';</script>";
}
?>