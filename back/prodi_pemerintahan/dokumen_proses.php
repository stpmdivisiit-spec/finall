<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $prodi         = $_POST['prodi'];
    $kategori      = $_POST['kategori'];
    $act_redir     = $_POST['act_redir'];
    
    $judul_dokumen = $koneksi->real_escape_string($_POST['judul_dokumen']);
    $keterangan    = $koneksi->real_escape_string($_POST['keterangan']);

    // PROSES UPLOAD PDF
    $nama_file = "";
    if (isset($_FILES['file_dokumen']) && $_FILES['file_dokumen']['error'] == 0) {
        $ext = strtolower(pathinfo($_FILES['file_dokumen']['name'], PATHINFO_EXTENSION));
        
        // Pengamanan Khusus PDF
        if ($ext === 'pdf') {
            $nama_file = $prodi . '_' . $kategori . '_' . time() . '.' . $ext;
            $tujuan = 'uploads/dokumen_resmi/' . $nama_file;
            
            if (!move_uploaded_file($_FILES['file_dokumen']['tmp_name'], $tujuan)) {
                echo "<script>alert('Gagal mengupload! Pastikan folder uploads/dokumen_resmi/ sudah ada.'); window.history.back();</script>";
                exit;
            }
        } else {
            echo "<script>alert('Ditolak! Format dokumen WAJIB PDF.'); window.history.back();</script>";
            exit;
        }
    } else {
        echo "<script>alert('Anda belum memilih file dokumen!'); window.history.back();</script>";
        exit;
    }

    // SIMPAN KE DATABASE
    $sql = "INSERT INTO prodi_dokumen_resmi 
            (prodi, kategori, judul_dokumen, keterangan, file_dokumen) 
            VALUES 
            ('$prodi', '$kategori', '$judul_dokumen', '$keterangan', '$nama_file')";
    
    if ($koneksi->query($sql)) {
        echo "<script>alert('Dokumen resmi berhasil diarsipkan!'); window.location='index.php?module=prodi_pemerintahan&act=$act_redir';</script>";
    } else {
        echo "<script>alert('Gagal menyimpan ke database!'); window.history.back();</script>";
    }
}
?>