<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // Tangkap data dari Form
    $prodi               = $_POST['prodi'];
    $kategori            = $_POST['kategori'];
    $act_redir           = $_POST['act_redir']; // Untuk mengembalikan ke URL asal
    
    $judul               = $koneksi->real_escape_string($_POST['judul']);
    $personil_utama      = $koneksi->real_escape_string($_POST['personil_utama']);
    $personil_pendamping = $koneksi->real_escape_string($_POST['personil_pendamping']);
    $keterangan_lokasi   = $koneksi->real_escape_string($_POST['keterangan_lokasi']);
    $tahun               = (int)$_POST['tahun'];

    // Validasi dan Proses Upload PDF
    $nama_file = "";
    if (isset($_FILES['file_dokumen']) && $_FILES['file_dokumen']['error'] == 0) {
        $ext = strtolower(pathinfo($_FILES['file_dokumen']['name'], PATHINFO_EXTENSION));
        
        // Pastikan file yang diunggah hanya PDF
        if ($ext !== 'pdf') {
            echo "<script>alert('Gagal! File laporan harus berformat PDF.'); window.history.back();</script>";
            exit;
        }

        // Format nama unik: pemerintahan_penelitian_dosen_1680001234.pdf
        $nama_file = $prodi . '_' . $kategori . '_' . time() . '.' . $ext;
        $tujuan_upload = 'uploads/riset_abdimas/' . $nama_file;
        
        // Upload File
        if (!move_uploaded_file($_FILES['file_dokumen']['tmp_name'], $tujuan_upload)) {
            echo "<script>alert('Gagal mengunggah file! Pastikan folder uploads/riset_abdimas/ sudah dibuat.'); window.history.back();</script>";
            exit;
        }
    } else {
        echo "<script>alert('Harap masukkan file laporan PDF!'); window.history.back();</script>";
        exit;
    }

    // Insert ke Database
    $sql = "INSERT INTO prodi_riset_abdimas 
            (prodi, kategori, judul, personil_utama, personil_pendamping, keterangan_lokasi, tahun, file_dokumen) 
            VALUES 
            ('$prodi', '$kategori', '$judul', '$personil_utama', '$personil_pendamping', '$keterangan_lokasi', '$tahun', '$nama_file')";
    
    if ($koneksi->query($sql)) {
        echo "<script>alert('Data berhasil disimpan!'); window.location='index.php?module=prodi_pemerintahan&act=$act_redir';</script>";
    } else {
        echo "<script>alert('Terjadi kesalahan Database: " . $koneksi->error . "'); window.history.back();</script>";
    }
}
?>