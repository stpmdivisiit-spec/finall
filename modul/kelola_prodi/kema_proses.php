<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $aksi  = $_POST['aksi'];
    $prodi = $_POST['prodi'];

    // --- Mesin Upload Global Kemahasiswaan ---
    $nama_file = "";
    if (isset($_FILES['file_upload']) && $_FILES['file_upload']['error'] == 0) {
        $ext = strtolower(pathinfo($_FILES['file_upload']['name'], PATHINFO_EXTENSION));
        // Bisa upload PDF atau Gambar Web/Sertifikat
        $nama_file = $prodi . '_kema_' . time() . '.' . $ext;
        move_uploaded_file($_FILES['file_upload']['tmp_name'], 'uploads/kemahasiswaan/' . $nama_file);
    }

    // --- Switch Logic berdasarkan Tombol Submit ---
    if ($aksi == 'tambah_prestasi') {
        
        $nama_mahasiswa = $koneksi->real_escape_string($_POST['nama_mahasiswa']);
        $nama_kegiatan  = $koneksi->real_escape_string($_POST['nama_kegiatan']);
        $prestasi       = $koneksi->real_escape_string($_POST['prestasi']);
        $tingkat        = $_POST['tingkat'];
        $tahun          = (int)$_POST['tahun'];

        $sql = "INSERT INTO kema_prestasi (prodi, nama_mahasiswa, nama_kegiatan, prestasi, tingkat, tahun, file_sertifikat) 
                VALUES ('$prodi', '$nama_mahasiswa', '$nama_kegiatan', '$prestasi', '$tingkat', '$tahun', '$nama_file')";
        $koneksi->query($sql);
        
        echo "<script>alert('Data Prestasi tersimpan!'); window.location='index.php?module=prodi_pemerintahan&act=prestasi';</script>";
        
    } elseif ($aksi == 'tambah_tracer') {
        
        $posisi      = $koneksi->real_escape_string($_POST['posisi']);
        $perusahaan  = $koneksi->real_escape_string($_POST['perusahaan']);
        $link_sumber = $koneksi->real_escape_string($_POST['link_sumber']);
        $batas_waktu = $_POST['batas_waktu'];

        $sql = "INSERT INTO kema_tracer_loker (prodi, posisi, perusahaan, link_sumber, batas_waktu, file_brosur) 
                VALUES ('$prodi', '$posisi', '$perusahaan', '$link_sumber', '$batas_waktu', '$nama_file')";
        $koneksi->query($sql);
        
        echo "<script>alert('Lowongan Kerja (Tracer) berhasil dipublikasi!'); window.location='index.php?module=prodi_pemerintahan&act=tracer_study';</script>";
    }
}
?>