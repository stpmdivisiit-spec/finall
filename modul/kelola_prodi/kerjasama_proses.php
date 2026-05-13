<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $prodi           = $_POST['prodi'];
    $kategori        = $_POST['kategori'];
    $act_redir       = $_POST['act_redir']; // Untuk mengarahkan kembali ke menu yg tepat
    
    $nama_mitra      = $koneksi->real_escape_string($_POST['nama_mitra']);
    $judul_kerjasama = $koneksi->real_escape_string($_POST['judul_kerjasama']);
    $tanggal_mulai   = $_POST['tanggal_mulai'];
    $tanggal_selesai = $_POST['tanggal_selesai'];

    // PROSES UPLOAD PDF (Jika ada)
    $nama_file = "";
    if (isset($_FILES['file_dokumen']) && $_FILES['file_dokumen']['error'] == 0) {
        $ext = strtolower(pathinfo($_FILES['file_dokumen']['name'], PATHINFO_EXTENSION));
        
        if ($ext === 'pdf') {
            // Contoh format: pemerintahan_mbkm_170000000.pdf
            $nama_file = $prodi . '_' . $kategori . '_' . time() . '.' . $ext;
            $tujuan = 'uploads/kerjasama/' . $nama_file;
            move_uploaded_file($_FILES['file_dokumen']['tmp_name'], $tujuan);
        } else {
            echo "<script>alert('Gagal! Format dokumen harus PDF.'); window.history.back();</script>";
            exit;
        }
    }

    // SIMPAN KE DATABASE
    $sql = "INSERT INTO prodi_kerjasama 
            (prodi, kategori, nama_mitra, judul_kerjasama, tanggal_mulai, tanggal_selesai, file_dokumen) 
            VALUES 
            ('$prodi', '$kategori', '$nama_mitra', '$judul_kerjasama', '$tanggal_mulai', '$tanggal_selesai', '$nama_file')";
    
    if ($koneksi->query($sql)) {
        echo "<script>alert('Kerja Sama Kemitraan berhasil ditambahkan!'); window.location='index.php?module=prodi_pemerintahan&act=$act_redir';</script>";
    } else {
        echo "<script>alert('Gagal menyimpan ke database!'); window.history.back();</script>";
    }
}
?>