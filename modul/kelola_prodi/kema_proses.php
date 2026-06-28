<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");

// Fungsi kompresi gambar (Sama seperti galeri visual)
function compressToWebP($source_file, $destination_file, $quality = 80) {
    $info = @getimagesize($source_file);
    if ($info === false) return false;
    $image = ($info['mime'] == 'image/jpeg') ? @imagecreatefromjpeg($source_file) : (($info['mime'] == 'image/png') ? @imagecreatefrompng($source_file) : false);
    if ($image) {
        imagewebp($image, $destination_file, $quality); 
        imagedestroy($image);
        return true;
    }
    return false;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $prodi = $_POST['prodi'];
    $act_redir = $_POST['act_redir'];
    $redirect_url = "index.php?module=" . $_GET['module'] . "&act=" . $act_redir;

    // Pastikan folder tersedia
    if (!is_dir('uploads/kemahasiswaan/')) mkdir('uploads/kemahasiswaan/', 0777, true);

    // 1. PROSES HMPS
    if ($act_redir == 'hmps') {
        $deskripsi = $koneksi->real_escape_string($_POST['deskripsi']);
        $fokus = $koneksi->real_escape_string($_POST['fokus_program']);
        $file_lama = $_POST['file_lama'];
        $nama_file = $file_lama;

        if (isset($_FILES['file_struktur']) && $_FILES['file_struktur']['error'] == 0) {
            $ext = pathinfo($_FILES['file_struktur']['name'], PATHINFO_EXTENSION);
            $nama_file = 'struktur_hmps_' . $prodi . '_' . time() . '.' . $ext;
            move_uploaded_file($_FILES['file_struktur']['tmp_name'], 'uploads/kemahasiswaan/' . $nama_file);
        }

        $cek = $koneksi->query("SELECT id FROM kema_hmps WHERE prodi='$prodi'");
        if ($cek->num_rows > 0) {
            $sql = "UPDATE kema_hmps SET deskripsi='$deskripsi', fokus_program='$fokus', file_struktur='$nama_file' WHERE prodi='$prodi'";
        } else {
            $sql = "INSERT INTO kema_hmps (prodi, deskripsi, fokus_program, file_struktur) VALUES ('$prodi', '$deskripsi', '$fokus', '$nama_file')";
        }
        $koneksi->query($sql);
    }

    // 2. PROSES PRESTASI
    elseif ($act_redir == 'prestasi') {
        $prestasi = $koneksi->real_escape_string($_POST['prestasi']);
        $deskripsi = $koneksi->real_escape_string($_POST['deskripsi']);
        $tingkat = $_POST['tingkat'];
        $tahun = (int)$_POST['tahun'];

        $koneksi->query("INSERT INTO kema_prestasi (prodi, prestasi, deskripsi, tingkat, tahun) VALUES ('$prodi', '$prestasi', '$deskripsi', '$tingkat', '$tahun')");
    }

    // 3. PROSES KEGIATAN MAHASISWA
    elseif ($act_redir == 'kegiatan_mahasiswa') {
        $judul = $koneksi->real_escape_string($_POST['judul_kegiatan']);
        $kategori = $_POST['kategori_kegiatan'];
        $deskripsi = $koneksi->real_escape_string($_POST['deskripsi']);
        
        if (isset($_FILES['file_gambar']) && $_FILES['file_gambar']['error'] == 0) {
            $nama_webp = 'kegiatan_' . $prodi . '_' . time() . '.webp';
            $sukses = compressToWebP($_FILES['file_gambar']['tmp_name'], 'uploads/kemahasiswaan/' . $nama_webp);
            if ($sukses) {
                $koneksi->query("INSERT INTO kema_kegiatan (prodi, kategori_kegiatan, nama_kegiatan, deskripsi, file_gambar_webp, tanggal) VALUES ('$prodi', '$kategori', '$judul', '$deskripsi', '$nama_webp', CURDATE())");
            }
        }
    }

    // 4. PROSES TRACER STUDY LINKS
    elseif ($act_redir == 'tracer_study') {
        $l1 = $koneksi->real_escape_string($_POST['link_kuesioner_alumni']);
        $l2 = $koneksi->real_escape_string($_POST['link_laporan_statistik']);
        $l3 = $koneksi->real_escape_string($_POST['link_forum_komunitas']);
        $l4 = $koneksi->real_escape_string($_POST['link_kuesioner_user']);

        $cek = $koneksi->query("SELECT id FROM kema_tracer WHERE prodi='$prodi'");
        if ($cek->num_rows > 0) {
            $sql = "UPDATE kema_tracer SET link_kuesioner_alumni='$l1', link_laporan_statistik='$l2', link_forum_komunitas='$l3', link_kuesioner_user='$l4' WHERE prodi='$prodi'";
        } else {
            $sql = "INSERT INTO kema_tracer (prodi, link_kuesioner_alumni, link_laporan_statistik, link_forum_komunitas, link_kuesioner_user) VALUES ('$prodi', '$l1', '$l2', '$l3', '$l4')";
        }
        $koneksi->query($sql);
    }

    echo "<script>alert('Data berhasil disimpan!'); window.location='$redirect_url';</script>";
}
?>