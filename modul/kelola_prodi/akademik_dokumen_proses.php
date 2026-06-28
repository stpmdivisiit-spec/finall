<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $prodi          = $koneksi->real_escape_string($_POST['prodi']);
    $kategori       = $koneksi->real_escape_string($_POST['kategori']);
    $judul_dokumen  = $koneksi->real_escape_string($_POST['judul_dokumen']);
    $keterangan     = $koneksi->real_escape_string($_POST['keterangan']);
    
    $redirect_module = $_POST['redirect_module'];
    $redirect_act    = $_POST['redirect_act'];

    // Proses Upload Dokumen
    $nama_file = "";
    if (isset($_FILES['file_dokumen']) && $_FILES['file_dokumen']['error'] == 0) {
        $ext = strtolower(pathinfo($_FILES['file_dokumen']['name'], PATHINFO_EXTENSION));
        
        // Validasi Ekstensi
        if (in_array($ext, ['pdf', 'doc', 'docx'])) {
            // Validasi Ukuran (Maks 5 MB)
            if($_FILES['file_dokumen']['size'] <= 5242880) {
                $nama_file = $prodi . '_' . $kategori . '_' . time() . '.' . $ext;
                $path = 'uploads/akademik/' . $nama_file;
                
                // PENTING: Pastikan folder uploads/akademik/ sudah dibuat!
                move_uploaded_file($_FILES['file_dokumen']['tmp_name'], $path);
            } else {
                echo "<script>alert('Gagal! Ukuran dokumen maksimal 5 MB.'); window.history.back();</script>"; exit;
            }
        } else {
            echo "<script>alert('Gagal! Format file harus PDF, DOC, atau DOCX.'); window.history.back();</script>"; exit;
        }
    }

    if (!empty($nama_file)) {
        $sql = "INSERT INTO prodi_dokumen_akademik (prodi, kategori, judul_dokumen, keterangan, file_dokumen) 
                VALUES ('$prodi', '$kategori', '$judul_dokumen', '$keterangan', '$nama_file')";
                
        if ($koneksi->query($sql)) {
            echo "<script>alert('Dokumen berhasil diunggah!'); window.location='index.php?module=$redirect_module&act=$redirect_act';</script>";
        } else {
            echo "<script>alert('Gagal menyimpan: " . $koneksi->error . "'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('File dokumen gagal diunggah atau tidak ditemukan.'); window.history.back();</script>";
    }
}
?>