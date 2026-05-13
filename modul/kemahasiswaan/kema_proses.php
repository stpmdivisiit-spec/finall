<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $kategori  = $_POST['kategori_data'];
    $judul     = $koneksi->real_escape_string($_POST['judul']);
    $deskripsi = $koneksi->real_escape_string($_POST['deskripsi']);
    $tanggal   = date('Y-m-d');

    $nama_file = "";
    if (isset($_FILES['file_lampiran']) && $_FILES['file_lampiran']['error'] == 0) {
        $ext = strtolower(pathinfo($_FILES['file_lampiran']['name'], PATHINFO_EXTENSION));
        $allowed = ['pdf', 'jpg', 'jpeg', 'png'];
        
        if (in_array($ext, $allowed)) {
            $nama_file = 'kema_' . $kategori . '_' . time() . '.' . $ext;
            move_uploaded_file($_FILES['file_lampiran']['tmp_name'], 'uploads/kemahasiswaan_pusat/' . $nama_file);
        } else {
            echo "<script>alert('Gagal! Format file harus PDF atau Gambar.'); window.history.back();</script>"; exit;
        }
    }

    $sql = "INSERT INTO kemahasiswaan_pusat_data (kategori_data, judul, deskripsi, file_lampiran, tanggal) 
            VALUES ('$kategori', '$judul', '$deskripsi', '$nama_file', '$tanggal')";
    
    $koneksi->query($sql);
    echo "<script>alert('Data berhasil disimpan!'); window.location='index.php?module=kemahasiswaan&act=data_kema&kat=$kategori';</script>";
}
?>