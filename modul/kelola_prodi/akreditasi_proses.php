<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = (int)$_POST['id'];
    $prodi = $koneksi->real_escape_string($_POST['prodi']);
    $redirect_module = $_POST['redirect_module'];
    
    $nilai = $koneksi->real_escape_string($_POST['nilai_akreditasi']);
    $no_sk = $koneksi->real_escape_string($_POST['no_sk']);
    $tahun = (int)$_POST['tahun_sk'];
    $masa_berlaku = $koneksi->real_escape_string($_POST['masa_berlaku']);
    $file_lama = $_POST['file_lama'];
    
    $nama_file_baru = $file_lama;

    // Proses Upload Sertifikat
    if (isset($_FILES['file_sertifikat']) && $_FILES['file_sertifikat']['error'] == 0) {
        $ext = strtolower(pathinfo($_FILES['file_sertifikat']['name'], PATHINFO_EXTENSION));
        if (in_array($ext, ['pdf', 'jpg', 'jpeg', 'png'])) {
            $nama_file_baru = 'Sertifikat_Akreditasi_'.$prodi.'_'.$tahun.'_'.time().'.'.$ext;
            // Pastikan folder uploads/dokumen/ sudah ada
            move_uploaded_file($_FILES['file_sertifikat']['tmp_name'], 'uploads/dokumen/' . $nama_file_baru);
        }
    }

    if ($id > 0) {
        $sql = "UPDATE prodi_akreditasi SET 
                nilai_akreditasi = '$nilai', no_sk = '$no_sk', tahun_sk = '$tahun', 
                masa_berlaku = '$masa_berlaku', file_sertifikat = '$nama_file_baru', updated_at = NOW() 
                WHERE id = '$id'";
    } else {
        $sql = "INSERT INTO prodi_akreditasi (prodi, nilai_akreditasi, no_sk, tahun_sk, masa_berlaku, file_sertifikat) 
                VALUES ('$prodi', '$nilai', '$no_sk', '$tahun', '$masa_berlaku', '$nama_file_baru')";
    }

    if ($koneksi->query($sql)) {
        echo "<script>alert('Data Akreditasi berhasil disimpan!'); window.location='index.php?module=$redirect_module&act=akreditasi';</script>";
    } else {
        echo "<script>alert('Gagal menyimpan: " . $koneksi->error . "'); window.history.back();</script>";
    }
}
?>