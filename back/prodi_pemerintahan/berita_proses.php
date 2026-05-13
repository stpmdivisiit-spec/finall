<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $id                = (int)$_POST['id'];
    $prodi             = $_POST['prodi'];
    $judul             = $koneksi->real_escape_string($_POST['judul']);
    $konten            = $koneksi->real_escape_string($_POST['konten']); 
    $penulis           = $koneksi->real_escape_string($_POST['penulis']);
    $tanggal_publikasi = $_POST['tanggal_publikasi'];
    $status            = $_POST['status'];
    $gambar_lama       = $_POST['gambar_lama'];

    $nama_file = $gambar_lama; // Secara default, gunakan foto lama

    // Proses jika ada upload foto baru
    if (isset($_FILES['gambar_thumbnail']) && $_FILES['gambar_thumbnail']['error'] == 0) {
        $ext = strtolower(pathinfo($_FILES['gambar_thumbnail']['name'], PATHINFO_EXTENSION));
        $nama_file = $prodi . '_berita_' . time() . '.' . $ext;
        $tujuan = 'uploads/berita/' . $nama_file;
        
        if (move_uploaded_file($_FILES['gambar_thumbnail']['tmp_name'], $tujuan)) {
            // Jika berhasil upload foto baru, hapus foto fisik lama dari folder
            if (!empty($gambar_lama) && file_exists('uploads/berita/' . $gambar_lama)) {
                unlink('uploads/berita/' . $gambar_lama);
            }
        }
    }

    // Tentukan Query (UPDATE jika ID ada, INSERT jika tidak)
    if ($id > 0) {
        $sql = "UPDATE prodi_berita SET 
                    judul = '$judul', 
                    konten = '$konten', 
                    penulis = '$penulis', 
                    tanggal_publikasi = '$tanggal_publikasi', 
                    status = '$status', 
                    gambar_thumbnail = '$nama_file' 
                WHERE id = '$id'";
        $pesan = "Perubahan artikel berhasil disimpan!";
    } else {
        $sql = "INSERT INTO prodi_berita (prodi, judul, konten, penulis, tanggal_publikasi, gambar_thumbnail, status) 
                VALUES ('$prodi', '$judul', '$konten', '$penulis', '$tanggal_publikasi', '$nama_file', '$status')";
        $pesan = "Artikel Berita sukses dipublish!";
    }
    
    if ($koneksi->query($sql)) {
        echo "<script>alert('$pesan'); window.location='index.php?module=prodi_pemerintahan&act=berita';</script>";
    } else {
        echo "<script>alert('Gagal! Kesalahan database: " . $koneksi->error . "'); window.history.back();</script>";
    }
}
?>