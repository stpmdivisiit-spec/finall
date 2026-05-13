<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $judul       = $koneksi->real_escape_string($_POST['judul']);
    $konten      = $koneksi->real_escape_string($_POST['konten']);
    $gambar_lama = $_POST['gambar_lama'];
    
    $nama_file = $gambar_lama;

    // Proses upload gambar baru
    if (isset($_FILES['file_struktur']) && $_FILES['file_struktur']['error'] == 0) {
        $ext = strtolower(pathinfo($_FILES['file_struktur']['name'], PATHINFO_EXTENSION));
        $nama_file = 'struktur_kema_' . time() . '.' . $ext;
        
        if (move_uploaded_file($_FILES['file_struktur']['tmp_name'], 'uploads/kemahasiswaan_pusat/' . $nama_file)) {
            if (!empty($gambar_lama) && file_exists('uploads/kemahasiswaan_pusat/' . $gambar_lama)) {
                unlink('uploads/kemahasiswaan_pusat/' . $gambar_lama);
            }
        }
    }

    // Cek apakah data sudah ada
    $cek = $koneksi->query("SELECT id FROM kema_profil LIMIT 1")->fetch_assoc();
    
    if ($cek) {
        $sql = "UPDATE kema_profil SET judul='$judul', konten_profil='$konten', file_struktur='$nama_file'";
    } else {
        $sql = "INSERT INTO kema_profil (judul, konten_profil, file_struktur) VALUES ('$judul', '$konten', '$nama_file')";
    }
    
    $koneksi->query($sql);
    echo "<script>alert('Profil berhasil diperbarui!'); window.location='index.php?module=kemahasiswaan&act=profil';</script>";
}
?>