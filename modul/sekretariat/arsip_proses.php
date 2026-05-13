<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $kategori   = $_POST['kategori_arsip'];
    $judul      = $koneksi->real_escape_string($_POST['judul_arsip']);
    $keterangan = $koneksi->real_escape_string($_POST['keterangan']);
    $tanggal    = $_POST['tanggal'];

    $nama_file = "";
    if (isset($_FILES['file_lampiran']) && $_FILES['file_lampiran']['error'] == 0) {
        $ext = strtolower(pathinfo($_FILES['file_lampiran']['name'], PATHINFO_EXTENSION));
        
        // Boleh upload PDF, Gambar, atau Excel (untuk Anggaran)
        $allowed = ['pdf', 'jpg', 'jpeg', 'png', 'xls', 'xlsx'];
        
        if (in_array($ext, $allowed)) {
            $nama_file = 'sekretariat_' . $kategori . '_' . time() . '.' . $ext;
            move_uploaded_file($_FILES['file_lampiran']['tmp_name'], 'uploads/sekretariat/dokumen/' . $nama_file);
        } else {
            echo "<script>alert('Gagal! Format file tidak didukung.'); window.history.back();</script>"; exit;
        }
    }

    $sql = "INSERT INTO sekretariat_arsip (kategori_arsip, judul_arsip, keterangan, file_lampiran, tanggal) 
            VALUES ('$kategori', '$judul', '$keterangan', '$nama_file', '$tanggal')";
    
    $koneksi->query($sql);
    echo "<script>alert('Arsip berhasil disimpan!'); window.location='index.php?module=sekretariat&act=arsip&kat=$kategori';</script>";
}
?>