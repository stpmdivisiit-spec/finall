<?php if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!"); 
// C:\xampp\htdocs\FINAL\modul\perpustakaan\layanan_proses.php

$aksi = $_POST['aksi'] ?? '';

if ($aksi == 'tambah_bebas' || $aksi == 'edit_bebas') {
    $nim = trim($_POST['nim']);
    $nama = trim($_POST['nama_mahasiswa']);
    $prodi = $_POST['program_studi'];
    $tanggal = $_POST['tanggal_terbit'];
    
    $file_final = ($aksi == 'edit_bebas') ? $_POST['file_lama'] : NULL;
    $direktori = 'uploads/perpustakaan/layanan/';
    
    // Logika Upload File
    if (isset($_FILES['file_surat']['name']) && $_FILES['file_surat']['name'] != '') {
        $nama_file = $_FILES['file_surat']['name'];
        $tmp_file = $_FILES['file_surat']['tmp_name'];
        $ukuran = $_FILES['file_surat']['size'];
        $ext_valid = ['pdf', 'jpg', 'jpeg', 'png'];
        $ext = strtolower(pathinfo($nama_file, PATHINFO_EXTENSION));
        
        if (in_array($ext, $ext_valid)) {
            if ($ukuran <= 2097152) { // Max 2MB
                if (!is_dir($direktori)) mkdir($direktori, 0777, true);
                
                $file_baru = 'BebasPustaka_' . $nim . '_' . time() . '.' . $ext;
                move_uploaded_file($tmp_file, $direktori . $file_baru);
                
                // Hapus file lama jika sedang dalam mode edit
                if ($aksi == 'edit_bebas' && !empty($file_final) && file_exists($direktori . $file_final)) {
                    unlink($direktori . $file_final);
                }
                $file_final = $file_baru;
            } else {
                echo "<script>alert('Gagal: Ukuran file melebihi 2MB.'); window.history.back();</script>"; exit;
            }
        } else {
            echo "<script>alert('Gagal: Ekstensi file tidak valid.'); window.history.back();</script>"; exit;
        }
    }

    if ($aksi == 'tambah_bebas') {
        $stmt = $koneksi->prepare("INSERT INTO perpus_layanan_bebas (nim, nama_mahasiswa, program_studi, tanggal_terbit, file_surat) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $nim, $nama, $prodi, $tanggal, $file_final);
    } else {
        $id = (int)$_POST['id'];
        $stmt = $koneksi->prepare("UPDATE perpus_layanan_bebas SET nim=?, nama_mahasiswa=?, program_studi=?, tanggal_terbit=?, file_surat=? WHERE id=?");
        $stmt->bind_param("sssssi", $nim, $nama, $prodi, $tanggal, $file_final, $id);
    }

    

    if ($stmt->execute()) {
        echo "<script>alert('Berhasil menyimpan data Surat Bebas Pustaka!'); window.location='index.php?module=perpustakaan&act=layanan&kat=bebas';</script>";
    } else {
        echo "<script>alert('Terjadi kesalahan database: " . $stmt->error . "'); window.history.back();</script>";
    }




    
}


elseif ($aksi == 'tambah_referensi' || $aksi == 'edit_referensi') {
    $jenis = trim($_POST['jenis_referensi']);
    $judul = trim($_POST['judul_referensi']);
    $deskripsi = trim($_POST['deskripsi']);
    $link = trim($_POST['link_tautan']);

    if ($aksi == 'tambah_referensi') {
        $stmt = $koneksi->prepare("INSERT INTO perpus_layanan_referensi (jenis_referensi, judul_referensi, deskripsi, link_tautan) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $jenis, $judul, $deskripsi, $link);
    } else {
        $id = (int)$_POST['id'];
        $stmt = $koneksi->prepare("UPDATE perpus_layanan_referensi SET jenis_referensi=?, judul_referensi=?, deskripsi=?, link_tautan=? WHERE id=?");
        $stmt->bind_param("ssssi", $jenis, $judul, $deskripsi, $link, $id);
    }

    if ($stmt->execute()) {
        echo "<script>alert('Berhasil menyimpan data Referensi!'); window.location='index.php?module=perpustakaan&act=layanan&kat=referensi';</script>";
    } else {
        echo "<script>alert('Terjadi kesalahan database: " . $stmt->error . "'); window.history.back();</script>";
    }
}


elseif ($aksi == 'tambah_usulan' || $aksi == 'edit_usulan') {
    $nama = trim($_POST['nama_pengusul']);
    $prodi = $_POST['program_studi'];
    $judul = trim($_POST['judul_buku']);
    $pengarang = trim($_POST['pengarang']);
    $penerbit = trim($_POST['penerbit_tahun']);
    $alasan = trim($_POST['alasan']);
    $status = $_POST['status_usulan'] ?? 'Menunggu Review';

    if ($aksi == 'tambah_usulan') {
        $stmt = $koneksi->prepare("INSERT INTO perpus_layanan_usulan (nama_pengusul, program_studi, judul_buku, pengarang, penerbit_tahun, alasan, status_usulan) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss", $nama, $prodi, $judul, $pengarang, $penerbit, $alasan, $status);
    } else {
        $id = (int)$_POST['id'];
        $stmt = $koneksi->prepare("UPDATE perpus_layanan_usulan SET nama_pengusul=?, program_studi=?, judul_buku=?, pengarang=?, penerbit_tahun=?, alasan=?, status_usulan=? WHERE id=?");
        $stmt->bind_param("sssssssi", $nama, $prodi, $judul, $pengarang, $penerbit, $alasan, $status, $id);
    }

    if ($stmt->execute()) {
        echo "<script>alert('Berhasil menyimpan data Usulan Pengadaan!'); window.location='index.php?module=perpustakaan&act=layanan&kat=usulan';</script>";
    } else {
        echo "<script>alert('Terjadi kesalahan database: " . $stmt->error . "'); window.history.back();</script>";
    }
}
?>

