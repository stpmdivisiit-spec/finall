<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $dosen_id = (int)$_POST['dosen_id'];
    $prodi = $koneksi->real_escape_string($_POST['prodi']);
    $redirect_module = $_POST['redirect_module'];
    
    if ($dosen_id === 0) {
        echo "<script>alert('Gagal: Pilih nama dosen!'); window.history.back();</script>"; exit;
    }

    $jabatan = $koneksi->real_escape_string($_POST['jabatan_web']);
    $keahlian = $koneksi->real_escape_string($_POST['keahlian_web']);

    // Cek apakah dosen ini sudah pernah ditambahkan ke tabel tampil
    $cek = $koneksi->query("SELECT id, foto_web FROM prodi_dosen_tampil WHERE dosen_id = '$dosen_id' AND prodi = '$prodi'");
    $data_lama = $cek->fetch_assoc();
    $is_update = ($cek->num_rows > 0);
    
    $nama_file_baru = $is_update ? $data_lama['foto_web'] : '';

    // Proses Upload Foto Baru
    if (isset($_FILES['foto_web']) && $_FILES['foto_web']['error'] == 0) {
        $ext = strtolower(pathinfo($_FILES['foto_web']['name'], PATHINFO_EXTENSION));
        if (in_array($ext, ['jpg', 'jpeg', 'png', 'webp'])) {
            $nama_file_baru = 'web_dosen_' . $dosen_id . '_' . time() . '.' . $ext;
            move_uploaded_file($_FILES['foto_web']['tmp_name'], 'uploads/profil/' . $nama_file_baru);
        }
    }

    // Eksekusi INSERT atau UPDATE
    if ($is_update) {
        $sql = "UPDATE prodi_dosen_tampil SET 
                jabatan_web = '$jabatan', 
                keahlian_web = '$keahlian', 
                foto_web = '$nama_file_baru' 
                WHERE dosen_id = '$dosen_id' AND prodi = '$prodi'";
    } else {
        $sql = "INSERT INTO prodi_dosen_tampil (prodi, dosen_id, jabatan_web, keahlian_web, foto_web) 
                VALUES ('$prodi', '$dosen_id', '$jabatan', '$keahlian', '$nama_file_baru')";
    }

    if ($koneksi->query($sql)) {
        echo "<script>alert('Berhasil! Data dosen telah diterbitkan ke website.'); window.location='index.php?module=$redirect_module&act=profil_dosen_desc';</script>";
    } else {
        echo "<script>alert('Gagal: " . $koneksi->error . "'); window.history.back();</script>";
    }
}
?>