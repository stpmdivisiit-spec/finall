<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $id          = (int)$_POST['id'];
    $judul       = $koneksi->real_escape_string($_POST['judul']);
    $isi_berita  = $koneksi->real_escape_string($_POST['isi_berita']);
    $penulis     = $koneksi->real_escape_string($_POST['penulis']);
    $gambar_lama = $_POST['gambar_lama'];
    $tanggal     = date('Y-m-d');
    
    // Keamanan Backend
// Keamanan Mutlak: Cegah eksploitasi URL
    $allowed_admin = ['admin', 'staf_it_admin', 'operator_sistem'];
    $is_admin = !empty(array_intersect($allowed_admin, $_SESSION['roles'] ?? []));
    
    if ($id > 0 && !$is_admin) {
        die("Hacking Attempt Detected! Akses ditolak. Hanya Admin/IT yang bisa mengupdate data.");
    }

    $gambar_lama = $_POST['gambar_lama'];
// Sistem baru menangkap dari inputan Form kalender
$tanggal     = $koneksi->real_escape_string($_POST['tanggal_publikasi']);

    // Proses upload gambar
    if (isset($_FILES['file_gambar']) && $_FILES['file_gambar']['error'] == 0) {
        $ext = strtolower(pathinfo($_FILES['file_gambar']['name'], PATHINFO_EXTENSION));
        if (in_array($ext, ['jpg', 'jpeg', 'png'])) {
            $nama_file = 'berita_' . $module_url . '_' . time() . '.' . $ext;
            
            if (!is_dir('uploads/prodi/berita')) {
                mkdir('uploads/prodi/berita', 0777, true);
            }

            if (move_uploaded_file($_FILES['file_gambar']['tmp_name'], 'uploads/prodi/berita/' . $nama_file)) {
                if (!empty($gambar_lama) && file_exists('uploads/prodi/berita/' . $gambar_lama)) {
                    unlink('uploads/prodi/berita/' . $gambar_lama);
                }
            }
        } else {
            echo "<script>alert('Gagal! Format gambar harus JPG/PNG.'); window.history.back();</script>"; exit;
        }
    }

    if ($id > 0) {
        // UPDATE (Sesuai nama kolom DB Anda)
        $sql = "UPDATE prodi_berita SET judul='$judul', konten='$isi_berita', gambar_thumbnail='$nama_file' WHERE id='$id'";
        $pesan = "Berita berhasil diperbarui!";
    } else {
        // INSERT (Sesuai nama kolom DB Anda)
        $sql = "INSERT INTO prodi_berita (prodi, judul, konten, penulis, gambar_thumbnail, tanggal_publikasi) 
                VALUES ('$module_url', '$judul', '$isi_berita', '$penulis', '$nama_file', '$tanggal')";
        $pesan = "Berita baru berhasil dipublikasikan!";
    }
    
    // EKSEKUSI & CEK ERROR
    if ($koneksi->query($sql)) {
        echo "<script>alert('$pesan'); window.location='index.php?module=$module_url&act=berita';</script>";
    } else {
        echo "<script>alert('GAGAL MENYIMPAN KE DATABASE: " . $koneksi->error . "'); window.history.back();</script>";
    }
}
?>