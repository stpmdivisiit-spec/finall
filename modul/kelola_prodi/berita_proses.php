<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // 1. Tangkap dan bersihkan inputan form
    $id          = (int)$_POST['id'];
    $judul       = trim($_POST['judul']);
    $isi_berita  = trim($_POST['isi_berita']);
    $penulis     = trim($_POST['penulis']);
    $tanggal     = trim($_POST['tanggal_publikasi']);
    $gambar_lama = trim($_POST['gambar_lama']);
    
    // 2. Keamanan Mutlak: Cegah eksploitasi URL
    $allowed_admin = ['admin', 'staf_it_admin', 'operator_sistem'];
    $is_admin = !empty(array_intersect($allowed_admin, $_SESSION['roles'] ?? []));
    
    if ($id > 0 && !$is_admin) {
        die("Hacking Attempt Detected! Akses ditolak. Hanya Admin/IT yang bisa mengupdate data.");
    }

    $nama_file = $gambar_lama;

    // 3. Proses Upload Gambar dengan Keamanan Berlapis
    if (isset($_FILES['file_gambar']) && $_FILES['file_gambar']['error'] == 0) {
        
        $file_tmp  = $_FILES['file_gambar']['tmp_name'];
        $file_size = $_FILES['file_gambar']['size'];
        $file_ext  = strtolower(pathinfo($_FILES['file_gambar']['name'], PATHINFO_EXTENSION));
        
        // Validasi 1: Ukuran File Maksimal 2 MB
        if ($file_size > 2097152) {
            echo "<script>alert('Gagal! Ukuran gambar maksimal 2 MB.'); window.history.back();</script>"; 
            exit;
        }

        // Validasi 2: Pengecekan MIME Type Asli (Mencegah Bypass Ekstensi)
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mime_type = finfo_file($finfo, $file_tmp);
        finfo_close($finfo);

        $allowed_mimes = ['image/jpeg', 'image/png', 'image/webp'];
        $allowed_exts  = ['jpg', 'jpeg', 'png', 'webp'];

        // Cek apakah ekstensi dan MIME type-nya benar-benar gambar
        if (in_array($mime_type, $allowed_mimes) && in_array($file_ext, $allowed_exts)) {
            
            $nama_file = 'berita_' . $module_url . '_' . time() . '.' . $file_ext;
            $upload_path = 'uploads/prodi/berita/';
            
            // Buat folder jika belum ada
            if (!is_dir($upload_path)) {
                mkdir($upload_path, 0777, true);
            }

            if (move_uploaded_file($file_tmp, $upload_path . $nama_file)) {
                // Hapus gambar lama agar server tidak penuh
                if (!empty($gambar_lama) && file_exists($upload_path . $gambar_lama)) {
                    unlink($upload_path . $gambar_lama);
                }
            }
        } else {
            echo "<script>alert('Gagal! File terdeteksi berbahaya atau format tidak didukung (Hanya JPG/PNG/WEBP).'); window.history.back();</script>"; 
            exit;
        }
    }

    // 4. Eksekusi Database menggunakan PREPARED STATEMENTS (Mencegah SQL Injection)
    if ($id > 0) {
        // Mode UPDATE (Edit Berita)
        $stmt = $koneksi->prepare("UPDATE prodi_berita SET judul=?, konten=?, gambar_thumbnail=?, tanggal_publikasi=? WHERE id=?");
        
        if ($stmt) {
            // ssssi = string, string, string, string, integer
            $stmt->bind_param("ssssi", $judul, $isi_berita, $nama_file, $tanggal, $id);
            $pesan = "Data berita berhasil diperbarui!";
        } else {
            die("Query Update Error: " . $koneksi->error);
        }
        
    } else {
        // Mode INSERT (Tambah Berita Baru)
        $stmt = $koneksi->prepare("INSERT INTO prodi_berita (prodi, judul, konten, penulis, gambar_thumbnail, tanggal_publikasi) VALUES (?, ?, ?, ?, ?, ?)");
        
        if ($stmt) {
            // ssssss = 6 string
            $stmt->bind_param("ssssss", $module_url, $judul, $isi_berita, $penulis, $nama_file, $tanggal);
            $pesan = "Berita baru berhasil dipublikasikan!";
        } else {
            die("Query Insert Error: " . $koneksi->error);
        }
    }
    
    // 5. Eksekusi Query dan Lempar Alert
    if ($stmt->execute()) {
        $stmt->close();
        echo "<script>alert('$pesan'); window.location='index.php?module=$module_url&act=berita';</script>";
    } else {
        echo "<script>alert('GAGAL MENYIMPAN KE DATABASE: " . $stmt->error . "'); window.history.back();</script>";
    }
}
?>