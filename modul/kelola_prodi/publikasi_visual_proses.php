<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");

// Fungsi Engine Konversi PNG/JPG ke WEBP
function konversiKeWebP($source_file, $destination_file, $quality = 80) {
    $info = @getimagesize($source_file);
    if ($info === false) return false;

    if ($info['mime'] == 'image/jpeg') {
        $image = @imagecreatefromjpeg($source_file);
    } elseif ($info['mime'] == 'image/png') {
        $image = @imagecreatefrompng($source_file);
        imagepalettetotruecolor($image);
        imagealphablending($image, true);
        imagesavealpha($image, true);
    } else {
        return false;
    }

    if ($image) {
        imagewebp($image, $destination_file, $quality); 
        imagedestroy($image);
        return true;
    }
    return false;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $prodi       = $koneksi->real_escape_string($_POST['prodi']);
    $kategori    = $koneksi->real_escape_string($_POST['kategori']);
    $redir       = $_POST['redirect_module']; // Menangkap modul dinamis
    
    $judul       = $koneksi->real_escape_string($_POST['judul']);
    $deskripsi   = $koneksi->real_escape_string($_POST['deskripsi_issn']);
    
    $tautan_link = isset($_POST['tautan_link']) ? $koneksi->real_escape_string($_POST['tautan_link']) : NULL;
    $tanggal     = isset($_POST['tanggal_kegiatan']) ? $_POST['tanggal_kegiatan'] : NULL;

    // Pastikan folder tersedia
    if (!is_dir('uploads/visual/')) {
        mkdir('uploads/visual/', 0777, true);
    }

    $nama_file_webp = "";
    if (isset($_FILES['file_gambar']) && $_FILES['file_gambar']['error'] == 0) {
        $file_tmp = $_FILES['file_gambar']['tmp_name'];
        $nama_file_webp = $prodi . '_' . $kategori . '_' . time() . '.webp';
        $destination = 'uploads/visual/' . $nama_file_webp;

        $sukses = konversiKeWebP($file_tmp, $destination, 80);

        if (!$sukses) {
            echo "<script>alert('Gagal! Pastikan file adalah gambar JPG atau PNG yang valid.'); window.history.back();</script>";
            exit;
        }
    }

    $sql = "INSERT INTO prodi_publikasi_visual (prodi, kategori, judul, deskripsi_issn, tautan_link, tanggal_kegiatan, file_gambar_webp) 
            VALUES ('$prodi', '$kategori', '$judul', '$deskripsi', '$tautan_link', '$tanggal', '$nama_file_webp')";
    
    if($koneksi->query($sql)) {
        echo "<script>alert('Data berhasil disimpan (Gambar dikompres ke WebP)!'); window.location='index.php?module=$redir&act=$kategori';</script>";
    } else {
        echo "<script>alert('Gagal menyimpan ke database: " . $koneksi->error . "'); window.history.back();</script>";
    }
}
?>