<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    verifyCSRFToken($_POST['csrf_token'] ?? '');

    $id             = (int)$_POST['id'];
    $prodi          = trim($_POST['prodi']);
    $nama_kegiatan  = trim($_POST['nama_kegiatan']);
    $tanggal        = trim($_POST['tanggal']);
    $tempat         = trim($_POST['tempat']);
    $deskripsi      = trim($_POST['deskripsi']);
    $gambar_lama    = trim($_POST['gambar_lama'] ?? '');
    
    $nama_file = $gambar_lama;

    // Upload Foto Dokumentasi (Khusus Gambar, Maks 2MB)
    if (isset($_FILES['file_dokumentasi']) && $_FILES['file_dokumentasi']['error'] == 0) {
        $allowed_exts  = ['jpg', 'jpeg', 'png', 'webp'];
        $allowed_mimes = ['image/jpeg', 'image/png', 'image/webp'];
        
        $hasil_upload = uploadFileAman($_FILES['file_dokumentasi'], 'uploads/kemahasiswaan/kegiatan/', $allowed_exts, $allowed_mimes, 2097152);
        
        if ($hasil_upload === "ERROR_SIZE" || $hasil_upload === "ERROR_MIME") {
            echo "<script>alert('Gagal! Pastikan file adalah gambar JPG/PNG maksimal 2MB.'); window.history.back();</script>"; exit;
        } elseif ($hasil_upload !== false) {
            $nama_file = $hasil_upload;
            if (!empty($gambar_lama) && file_exists('uploads/kemahasiswaan/kegiatan/' . $gambar_lama)) unlink('uploads/kemahasiswaan/kegiatan/' . $gambar_lama);
        }
    }

    if ($id > 0) {
        $stmt = $koneksi->prepare("UPDATE kema_kegiatan SET prodi=?, nama_kegiatan=?, tanggal=?, tempat=?, deskripsi=?, file_dokumentasi=? WHERE id=?");
        $stmt->bind_param("ssssssi", $prodi, $nama_kegiatan, $tanggal, $tempat, $deskripsi, $nama_file, $id);
        $pesan = "Data kegiatan diperbarui!";
    } else {
        $stmt = $koneksi->prepare("INSERT INTO kema_kegiatan (prodi, nama_kegiatan, tanggal, tempat, deskripsi, file_dokumentasi) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $prodi, $nama_kegiatan, $tanggal, $tempat, $deskripsi, $nama_file);
        $pesan = "Data kegiatan baru ditambahkan!";
    }
    
    if ($stmt->execute()) {
        $stmt->close();
        echo "<script>alert('$pesan'); window.location='index.php?module=kemahasiswaan&act=kegiatan';</script>";
    } else {
        echo "<script>alert('GAGAL MENYIMPAN: " . $stmt->error . "'); window.history.back();</script>";
    }
}
?>