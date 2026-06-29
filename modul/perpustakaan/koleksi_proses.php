<?php if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!"); 
// C:\xampp\htdocs\FINAL\modul\perpustakaan\koleksi_proses.php

$aksi = $_POST['aksi'] ?? '';

if ($aksi == 'tambah_koleksi' || $aksi == 'edit_koleksi') {
    $kat = $_POST['kategori_koleksi'];
    $judul = trim($_POST['judul']);
    $penulis = trim($_POST['penulis_pengarang'] ?? '');
    $penerbit = trim($_POST['penerbit'] ?? '');
    $tahun = trim($_POST['tahun_terbit'] ?? '');
    $isbn = trim($_POST['isbn_issn'] ?? '');
    $edisi = trim($_POST['edisi_volume'] ?? '');
    $prodi = trim($_POST['program_studi'] ?? '');
    $stok = (int)($_POST['stok_fisik'] ?? 0);
    $abstrak = trim($_POST['abstrak_deskripsi'] ?? '');
    $tautan = trim($_POST['tautan_luar'] ?? '');

    $cover_final = ($aksi == 'edit_koleksi') ? $_POST['cover_lama'] : NULL;
    $file_final = ($aksi == 'edit_koleksi') ? $_POST['file_lama'] : NULL;

    // --- UPLOAD COVER GAMBAR ---
    if (isset($_FILES['cover_gambar']['name']) && $_FILES['cover_gambar']['name'] != '') {
        $nama_file = $_FILES['cover_gambar']['name'];
        $tmp_file = $_FILES['cover_gambar']['tmp_name'];
        $ext = strtolower(pathinfo($nama_file, PATHINFO_EXTENSION));
        if (in_array($ext, ['png','jpg','jpeg','webp'])) {
            $dir_cover = 'uploads/perpustakaan/cover/';
            if (!is_dir($dir_cover)) mkdir($dir_cover, 0777, true);
            $cover_baru = 'Cover_' . $kat . '_' . time() . '.' . $ext;
            move_uploaded_file($tmp_file, $dir_cover . $cover_baru);
            if ($aksi == 'edit_koleksi' && !empty($cover_final) && file_exists($dir_cover . $cover_final)) unlink($dir_cover . $cover_final);
            $cover_final = $cover_baru;
        }
    }

    // --- UPLOAD DOKUMEN PDF ---
    if (isset($_FILES['file_lampiran']['name']) && $_FILES['file_lampiran']['name'] != '') {
        $nama_file = $_FILES['file_lampiran']['name'];
        $tmp_file = $_FILES['file_lampiran']['tmp_name'];
        $ext = strtolower(pathinfo($nama_file, PATHINFO_EXTENSION));
        if ($ext == 'pdf') {
            $dir_file = 'uploads/perpustakaan/koleksi/';
            if (!is_dir($dir_file)) mkdir($dir_file, 0777, true);
            $file_baru = 'File_' . $kat . '_' . time() . '.pdf';
            move_uploaded_file($tmp_file, $dir_file . $file_baru);
            if ($aksi == 'edit_koleksi' && !empty($file_final) && file_exists($dir_file . $file_final)) unlink($dir_file . $file_final);
            $file_final = $file_baru;
        }
    }

    // --- EKSEKUSI DATABASE DENGAN ERROR HANDLING ---
    if ($aksi == 'tambah_koleksi') {
        $query = "INSERT INTO perpus_koleksi (kategori_koleksi, judul, penulis_pengarang, penerbit, tahun_terbit, isbn_issn, edisi_volume, program_studi, stok_fisik, abstrak_deskripsi, cover_gambar, file_lampiran, tautan_luar) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $koneksi->prepare($query);
        
        // Pengecekan Error jika kolom tidak ada / query salah
        if (!$stmt) {
            die("<div class='alert alert-danger'><strong>Error Database (Insert):</strong> " . $koneksi->error . "</div>");
        }
        
        $stmt->bind_param("ssssssssissss", $kat, $judul, $penulis, $penerbit, $tahun, $isbn, $edisi, $prodi, $stok, $abstrak, $cover_final, $file_final, $tautan);
    
    } else {
        $id = (int)$_POST['id'];
        $query = "UPDATE perpus_koleksi SET judul=?, penulis_pengarang=?, penerbit=?, tahun_terbit=?, isbn_issn=?, edisi_volume=?, program_studi=?, stok_fisik=?, abstrak_deskripsi=?, cover_gambar=?, file_lampiran=?, tautan_luar=? WHERE id=?";
        $stmt = $koneksi->prepare($query);
        
        // Pengecekan Error jika kolom tidak ada / query salah
        if (!$stmt) {
            die("<div class='alert alert-danger'><strong>Error Database (Update):</strong> " . $koneksi->error . "</div>");
        }
        
        $stmt->bind_param("sssssssissssi", $judul, $penulis, $penerbit, $tahun, $isbn, $edisi, $prodi, $stok, $abstrak, $cover_final, $file_final, $tautan, $id);
    }

    if ($stmt->execute()) {
        echo "<script>alert('Data Koleksi berhasil disimpan!'); window.location='index.php?module=perpustakaan&act=koleksi&kat=$kat';</script>";
    } else {
        echo "<script>alert('Terjadi kesalahan eksekusi: " . $stmt->error . "'); window.history.back();</script>";
    }
}
?>