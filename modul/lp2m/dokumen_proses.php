<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    verifyCSRFToken($_POST['csrf_token'] ?? '');

    $id               = (int)$_POST['id'];
    $kategori_dokumen = trim($_POST['kategori_dokumen']);
    $judul            = trim($_POST['judul']);
    $deskripsi        = trim($_POST['deskripsi']);
    $tanggal_upload   = date('Y-m-d');
    $file_lama        = trim($_POST['file_lama'] ?? '');
    
    $nama_file = $file_lama;

    // Upload Dokumen (Maks 10MB khusus LP2M)
    if (isset($_FILES['file_dokumen']) && $_FILES['file_dokumen']['error'] == 0) {
        $allowed_exts  = ['pdf', 'doc', 'docx', 'xls', 'xlsx'];
        $allowed_mimes = ['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'application/vnd.ms-excel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
        
        $hasil_upload = uploadFileAman($_FILES['file_dokumen'], 'uploads/lp2m/dokumen/', $allowed_exts, $allowed_mimes, 10485760);
        
        if ($hasil_upload === "ERROR_SIZE" || $hasil_upload === "ERROR_MIME") {
            echo "<script>alert('Gagal! File tidak sesuai kriteria ukuran/format.'); window.history.back();</script>"; exit;
        } elseif ($hasil_upload !== false) {
            $nama_file = $hasil_upload;
            if (!empty($file_lama) && file_exists('uploads/lp2m/dokumen/' . $file_lama)) unlink('uploads/lp2m/dokumen/' . $file_lama);
        }
    }

    if ($id > 0) {
        $stmt = $koneksi->prepare("UPDATE lp2m_dokumen SET kategori_dokumen=?, judul=?, deskripsi=?, file_dokumen=? WHERE id=?");
        $stmt->bind_param("ssssi", $kategori_dokumen, $judul, $deskripsi, $nama_file, $id);
        $pesan = "Dokumen LP2M diperbarui!";
    } else {
        $stmt = $koneksi->prepare("INSERT INTO lp2m_dokumen (kategori_dokumen, judul, deskripsi, file_dokumen, tanggal_upload) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $kategori_dokumen, $judul, $deskripsi, $nama_file, $tanggal_upload);
        $pesan = "Dokumen LP2M baru ditambahkan!";
    }
    
    if ($stmt->execute()) {
        $stmt->close();
        echo "<script>alert('$pesan'); window.location='index.php?module=lp2m&act=dokumen';</script>";
    } else {
        echo "<script>alert('GAGAL MENYIMPAN: " . $stmt->error . "'); window.history.back();</script>";
    }
}
?>