<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");

// Fungsi Engine Konversi PNG/JPG ke WEBP
function konversiKeWebP($source_file, $destination_file, $quality = 80) {
    $info = getimagesize($source_file);
    if ($info === false) return false;

    if ($info['mime'] == 'image/jpeg') {
        $image = imagecreatefromjpeg($source_file);
    } elseif ($info['mime'] == 'image/png') {
        $image = imagecreatefrompng($source_file);
        imagepalettetotruecolor($image);
        imagealphablending($image, true);
        imagesavealpha($image, true);
    } else {
        return false; // Bukan JPG/PNG
    }

    if ($image) {
        imagewebp($image, $destination_file, $quality); // Kompres!
        imagedestroy($image);
        return true;
    }
    return false;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $prodi       = $_POST['prodi'];
    $kategori    = $_POST['kategori'];
    $judul       = $koneksi->real_escape_string($_POST['judul']);
    $deskripsi   = $koneksi->real_escape_string($_POST['deskripsi_issn']);
    
    // Variabel Optional tergantung kategori
    $tautan_link = isset($_POST['tautan_link']) ? $koneksi->real_escape_string($_POST['tautan_link']) : NULL;
    $tanggal     = isset($_POST['tanggal_kegiatan']) ? $_POST['tanggal_kegiatan'] : NULL;

    // PROSES UPLOAD & KONVERSI WEBP
    $nama_file_webp = "";
    if (isset($_FILES['file_gambar']) && $_FILES['file_gambar']['error'] == 0) {
        $file_tmp = $_FILES['file_gambar']['tmp_name'];
        
        // Buat nama unik untuk file webp
        $nama_file_webp = $prodi . '_' . $kategori . '_' . time() . '.webp';
        $destination = 'uploads/visual/' . $nama_file_webp;

        // Panggil fungsi konversi
        $sukses = konversiKeWebP($file_tmp, $destination, 80);

        if (!$sukses) {
            echo "<script>alert('Gagal! Pastikan file adalah gambar JPG atau PNG.'); window.history.back();</script>";
            exit;
        }
    }

    // SIMPAN KE DATABASE
    $sql = "INSERT INTO prodi_publikasi_visual (prodi, kategori, judul, deskripsi_issn, tautan_link, tanggal_kegiatan, file_gambar_webp) 
            VALUES ('$prodi', '$kategori', '$judul', '$deskripsi', '$tautan_link', '$tanggal', '$nama_file_webp')";
    
    $koneksi->query($sql);
    echo "<script>alert('Data berhasil disimpan dan gambar dikompres ke WebP!'); window.location='index.php?module=prodi_pemerintahan&act=$kategori';</script>";
}
?>