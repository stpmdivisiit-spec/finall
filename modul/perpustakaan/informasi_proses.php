<?php if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!"); 
// C:\xampp\htdocs\FINAL\modul\perpustakaan\informasi_proses.php

$aksi = $_POST['aksi'] ?? '';

// ==========================================
// 1. PROSES ACARA / AGENDA
// ==========================================
if ($aksi == 'tambah_acara' || $aksi == 'edit_acara') {
    $judul = htmlspecialchars(strip_tags(trim($_POST['judul_acara'])));
    $tanggal = $_POST['tanggal_acara'];
    $waktu = htmlspecialchars(strip_tags(trim($_POST['waktu_acara'])));
    $lokasi = htmlspecialchars(strip_tags(trim($_POST['lokasi'])));
    $deskripsi = htmlspecialchars(trim($_POST['deskripsi'])); // Mengizinkan line break tapi aman dari tag HTML
    
    $gambar_final = ($aksi == 'edit_acara') ? $_POST['gambar_lama'] : NULL;
    $direktori = 'uploads/perpustakaan/informasi/';

    if (isset($_FILES['gambar_poster']['name']) && $_FILES['gambar_poster']['name'] != '') {
        $nama_file = $_FILES['gambar_poster']['name'];
        $tmp_file = $_FILES['gambar_poster']['tmp_name'];
        $ext = strtolower(pathinfo($nama_file, PATHINFO_EXTENSION));
        
        if (in_array($ext, ['png','jpg','jpeg','webp'])) {
            if (!is_dir($direktori)) mkdir($direktori, 0777, true);
            $gambar_baru = 'Acara_' . time() . '.' . $ext;
            move_uploaded_file($tmp_file, $direktori . $gambar_baru);
            if ($aksi == 'edit_acara' && !empty($gambar_final) && file_exists($direktori . $gambar_final)) unlink($direktori . $gambar_final);
            $gambar_final = $gambar_baru;
        }
    }

    if ($aksi == 'tambah_acara') {
        $stmt = $koneksi->prepare("INSERT INTO perpus_info_acara (judul_acara, deskripsi, tanggal_acara, waktu_acara, lokasi, gambar_poster) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $judul, $deskripsi, $tanggal, $waktu, $lokasi, $gambar_final);
    } else {
        $id = (int)$_POST['id'];
        $stmt = $koneksi->prepare("UPDATE perpus_info_acara SET judul_acara=?, deskripsi=?, tanggal_acara=?, waktu_acara=?, lokasi=?, gambar_poster=? WHERE id=?");
        $stmt->bind_param("ssssssi", $judul, $deskripsi, $tanggal, $waktu, $lokasi, $gambar_final, $id);
    }
    
    $stmt->execute();
    echo "<script>alert('Data Acara berhasil disimpan!'); window.location='index.php?module=perpustakaan&act=informasi&kat=acara';</script>";
}

// ==========================================
// 2. PROSES GALERI
// ==========================================
elseif ($aksi == 'tambah_galeri' || $aksi == 'edit_galeri') {
    $judul_foto = htmlspecialchars(strip_tags(trim($_POST['judul_foto'])));
    
    $foto_final = ($aksi == 'edit_galeri') ? $_POST['foto_lama'] : NULL;
    $direktori = 'uploads/perpustakaan/informasi/';

    if (isset($_FILES['file_foto']['name']) && $_FILES['file_foto']['name'] != '') {
        $nama_file = $_FILES['file_foto']['name'];
        $tmp_file = $_FILES['file_foto']['tmp_name'];
        $ext = strtolower(pathinfo($nama_file, PATHINFO_EXTENSION));
        
        if (in_array($ext, ['png','jpg','jpeg','webp'])) {
            if (!is_dir($direktori)) mkdir($direktori, 0777, true);
            $foto_baru = 'Galeri_' . time() . '.' . $ext;
            move_uploaded_file($tmp_file, $direktori . $foto_baru);
            if ($aksi == 'edit_galeri' && !empty($foto_final) && file_exists($direktori . $foto_final)) unlink($direktori . $foto_final);
            $foto_final = $foto_baru;
        }
    } else if ($aksi == 'tambah_galeri') {
        echo "<script>alert('Gagal: Foto wajib diunggah untuk Galeri.'); window.history.back();</script>"; exit;
    }

    if ($aksi == 'tambah_galeri') {
        $stmt = $koneksi->prepare("INSERT INTO perpus_info_galeri (judul_foto, file_foto) VALUES (?, ?)");
        $stmt->bind_param("ss", $judul_foto, $foto_final);
    } else {
        $id = (int)$_POST['id'];
        $stmt = $koneksi->prepare("UPDATE perpus_info_galeri SET judul_foto=?, file_foto=? WHERE id=?");
        $stmt->bind_param("ssi", $judul_foto, $foto_final, $id);
    }

    $stmt->execute();
    echo "<script>alert('Foto Galeri berhasil disimpan!'); window.location='index.php?module=perpustakaan&act=informasi&kat=galeri';</script>";
}
?>