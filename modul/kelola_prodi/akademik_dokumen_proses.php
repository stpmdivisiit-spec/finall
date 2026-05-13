<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // 1. Validasi Keamanan Token CSRF
    verifyCSRFToken($_POST['csrf_token'] ?? '');

    $id            = (int)$_POST['id'];
    $kategori      = trim($_POST['kategori']);
    $judul_dokumen = trim($_POST['judul_dokumen']);
    $keterangan    = trim($_POST['keterangan']);
    $file_lama     = trim($_POST['file_lama'] ?? '');
    
    $nama_file = $file_lama;

    // 2. Proses Upload Dokumen (Maks 5MB, hanya PDF/Word)
    if (isset($_FILES['file_dokumen']) && $_FILES['file_dokumen']['error'] == 0) {
        $allowed_exts  = ['pdf', 'doc', 'docx'];
        $allowed_mimes = ['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'];
        
        // Memanggil fungsi dari config/functions.php (Maksimal 5MB = 5242880 bytes)
        $hasil_upload = uploadFileAman($_FILES['file_dokumen'], 'uploads/prodi/dokumen/', $allowed_exts, $allowed_mimes, 5242880);
        
        if ($hasil_upload === "ERROR_SIZE") {
            echo "<script>alert('Gagal! Ukuran dokumen maksimal 5 MB.'); window.history.back();</script>"; exit;
        } elseif ($hasil_upload === "ERROR_MIME") {
            echo "<script>alert('Gagal! Format file harus PDF atau Word.'); window.history.back();</script>"; exit;
        } elseif ($hasil_upload !== false) {
            $nama_file = $hasil_upload;
            // Hapus file lama di server
            if (!empty($file_lama) && file_exists('uploads/prodi/dokumen/' . $file_lama)) {
                unlink('uploads/prodi/dokumen/' . $file_lama);
            }
        }
    }

    // 3. Eksekusi Database dengan Prepared Statements
    if ($id > 0) {
        $stmt = $koneksi->prepare("UPDATE prodi_dokumen_akademik SET kategori=?, judul_dokumen=?, keterangan=?, file_dokumen=? WHERE id=?");
        $stmt->bind_param("ssssi", $kategori, $judul_dokumen, $keterangan, $nama_file, $id);
        $pesan = "Dokumen berhasil diperbarui!";
    } else {
        $stmt = $koneksi->prepare("INSERT INTO prodi_dokumen_akademik (prodi, kategori, judul_dokumen, keterangan, file_dokumen) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $module_url, $kategori, $judul_dokumen, $keterangan, $nama_file);
        $pesan = "Dokumen baru berhasil ditambahkan!";
    }
    
    if ($stmt->execute()) {
        $stmt->close();
        echo "<script>alert('$pesan'); window.location='index.php?module=$module_url&act=dok_akademik';</script>";
    } else {
        echo "<script>alert('GAGAL MENYIMPAN: " . $stmt->error . "'); window.history.back();</script>";
    }
}
?>