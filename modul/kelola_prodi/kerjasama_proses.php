<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $prodi    = $_POST['prodi'];
    $kategori = $_POST['kategori'];
    $redirect_url = "index.php?module=" . $_GET['module'] . "&act=" . $kategori;

    // Tangkap Semua Data Teks (Gunakan Null Coalescing agar aman jika field tidak ada)
    $k_utama = $koneksi->real_escape_string($_POST['konten_utama'] ?? '');
    $k_tamb1 = $koneksi->real_escape_string($_POST['konten_tambahan_1'] ?? '');
    $k_tamb2 = $koneksi->real_escape_string($_POST['konten_tambahan_2'] ?? '');
    $tautan  = $koneksi->real_escape_string($_POST['link_tautan'] ?? '');

    // Penanganan Upload File
    if (!is_dir('uploads/mitra/')) mkdir('uploads/mitra/', 0777, true);
    
    $file_1 = $_POST['file_lama_1'] ?? '';
    if (isset($_FILES['file_lampiran_1']) && $_FILES['file_lampiran_1']['error'] == 0) {
        $ext = pathinfo($_FILES['file_lampiran_1']['name'], PATHINFO_EXTENSION);
        $file_1 = 'mitra1_' . $prodi . '_' . $kategori . '_' . time() . '.' . $ext;
        move_uploaded_file($_FILES['file_lampiran_1']['tmp_name'], 'uploads/mitra/' . $file_1);
    }

    $file_2 = $_POST['file_lama_2'] ?? '';
    if (isset($_FILES['file_lampiran_2']) && $_FILES['file_lampiran_2']['error'] == 0) {
        $ext = pathinfo($_FILES['file_lampiran_2']['name'], PATHINFO_EXTENSION);
        $file_2 = 'mitra2_' . $prodi . '_' . $kategori . '_' . time() . '.' . $ext;
        move_uploaded_file($_FILES['file_lampiran_2']['tmp_name'], 'uploads/mitra/' . $file_2);
    }

    // Eksekusi Insert / Update
    $cek = $koneksi->query("SELECT id FROM prodi_mitra_informasi WHERE prodi='$prodi' AND kategori='$kategori'");
    
    if ($cek->num_rows > 0) {
        $sql = "UPDATE prodi_mitra_informasi SET 
                konten_utama='$k_utama', konten_tambahan_1='$k_tamb1', konten_tambahan_2='$k_tamb2', 
                file_lampiran_1='$file_1', file_lampiran_2='$file_2', link_tautan='$tautan' 
                WHERE prodi='$prodi' AND kategori='$kategori'";
    } else {
        $sql = "INSERT INTO prodi_mitra_informasi (prodi, kategori, konten_utama, konten_tambahan_1, konten_tambahan_2, file_lampiran_1, file_lampiran_2, link_tautan) 
                VALUES ('$prodi', '$kategori', '$k_utama', '$k_tamb1', '$k_tamb2', '$file_1', '$file_2', '$tautan')";
    }

    if ($koneksi->query($sql)) {
        echo "<script>alert('Konfigurasi Kemitraan berhasil disimpan!'); window.location='$redirect_url';</script>";
    } else {
        echo "<script>alert('Gagal: " . $koneksi->error . "'); window.history.back();</script>";
    }
}
?>