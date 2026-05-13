<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $prodi      = $_POST['prodi'];
    $kategori   = $_POST['kategori'];
    $act_redir  = $_POST['act_redir'];
    $judul      = $koneksi->real_escape_string($_POST['judul_dokumen']);
    $keterangan = $koneksi->real_escape_string($_POST['keterangan']);

    // Proses Upload
    $nama_file = "";
    if (isset($_FILES['file_dokumen']) && $_FILES['file_dokumen']['error'] == 0) {
        $ext = pathinfo($_FILES['file_dokumen']['name'], PATHINFO_EXTENSION);
        $nama_file = $prodi . '_' . $kategori . '_' . time() . '.' . $ext;
        
        // PASTIKAN FOLDER INI ADA: uploads/akademik/
        move_uploaded_file($_FILES['file_dokumen']['tmp_name'], 'uploads/akademik/' . $nama_file);
    }

    $sql = "INSERT INTO prodi_dokumen_akademik (prodi, kategori, judul_dokumen, keterangan, file_dokumen) 
            VALUES ('$prodi', '$kategori', '$judul', '$keterangan', '$nama_file')";
    
    $koneksi->query($sql);
    
    echo "<script>alert('Dokumen berhasil diupload!'); window.location='index.php?module=prodi_pemerintahan&act=$act_redir';</script>";
}
?>