<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $kategori   = $_POST['kategori_koleksi'];
    $is_digital = $_POST['is_digital'];
    
    $judul      = $koneksi->real_escape_string($_POST['judul']);
    $penulis    = $koneksi->real_escape_string($_POST['penulis']);
    $penerbit   = $koneksi->real_escape_string($_POST['penerbit_kampus']);
    $tahun      = (int)$_POST['tahun_terbit'];
    $stok       = isset($_POST['stok_fisik']) ? (int)$_POST['stok_fisik'] : 0;

    $nama_cover = "";
    $nama_pdf = "";

    // 1. Upload Cover Gambar
    if (isset($_FILES['cover_gambar']) && $_FILES['cover_gambar']['error'] == 0) {
        $ext = strtolower(pathinfo($_FILES['cover_gambar']['name'], PATHINFO_EXTENSION));
        $nama_cover = 'cover_' . time() . '.' . $ext;
        move_uploaded_file($_FILES['cover_gambar']['tmp_name'], 'uploads/perpustakaan/cover/' . $nama_cover);
    }

    // 2. Upload File PDF (Khusus E-Book/Skripsi)
    if ($is_digital == 1 && isset($_FILES['file_lampiran']) && $_FILES['file_lampiran']['error'] == 0) {
        $ext = strtolower(pathinfo($_FILES['file_lampiran']['name'], PATHINFO_EXTENSION));
        if ($ext === 'pdf') {
            $nama_pdf = 'digital_' . $kategori . '_' . time() . '.' . $ext;
            move_uploaded_file($_FILES['file_lampiran']['tmp_name'], 'uploads/perpustakaan/koleksi/' . $nama_pdf);
        } else {
            echo "<script>alert('Gagal! Buku Digital/Skripsi harus format PDF.'); window.history.back();</script>"; exit;
        }
    }

    $sql = "INSERT INTO perpus_koleksi (kategori_koleksi, judul, penulis, penerbit_kampus, tahun_terbit, cover_gambar, file_lampiran, stok_fisik) 
            VALUES ('$kategori', '$judul', '$penulis', '$penerbit', '$tahun', '$nama_cover', '$nama_pdf', '$stok')";
    
    $koneksi->query($sql);
    echo "<script>alert('Data Katalog berhasil disimpan!'); window.location='index.php?module=perpustakaan&act=koleksi&kat=$kategori';</script>";
}
?>