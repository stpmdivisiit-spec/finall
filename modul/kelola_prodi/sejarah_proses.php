<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id             = (int)$_POST['id'];
    $prodi          = $koneksi->real_escape_string($_POST['prodi']);
    // Jangan hapus tag HTML karena dibutuhkan untuk timeline
    $konten_sejarah = $koneksi->real_escape_string($_POST['konten_sejarah']);
    $redirect_mod   = $_POST['redirect_module'];

    // 1. SIMPAN NASKAH SEJARAH UTAMA
    if ($id > 0) {
        $sql = "UPDATE prodi_sejarah SET konten_sejarah = '$konten_sejarah', updated_at = NOW() WHERE id = '$id'";
    } else {
        $sql = "INSERT INTO prodi_sejarah (prodi, konten_sejarah) VALUES ('$prodi', '$konten_sejarah')";
    }

    if ($koneksi->query($sql)) {
        
        $sejarah_id = ($id > 0) ? $id : $koneksi->insert_id;

        // 2. PROSES UPLOAD MULTI-FOTO
        if (isset($_FILES['foto_baru']) && !empty($_FILES['foto_baru']['name'][0])) {
            $total_files = count($_FILES['foto_baru']['name']);
            
            for ($i = 0; $i < $total_files; $i++) {
                if ($_FILES['foto_baru']['error'][$i] == 0) {
                    $ext = strtolower(pathinfo($_FILES['foto_baru']['name'][$i], PATHINFO_EXTENSION));
                    
                    if (in_array($ext, ['jpg', 'jpeg', 'png', 'webp'])) {
                        // Nama file unik untuk setiap iterasi
                        $nama_file_baru = 'sejarah_' . $prodi . '_' . time() . '_' . $i . '.' . $ext;
                        $path_upload = 'uploads/profil/' . $nama_file_baru;
                        
                        if (move_uploaded_file($_FILES['foto_baru']['tmp_name'][$i], $path_upload)) {
                            $koneksi->query("INSERT INTO prodi_sejarah_galeri (sejarah_id, file_gambar) VALUES ('$sejarah_id', '$nama_file_baru')");
                        }
                    }
                }
            }
        }

        echo "<script>alert('Naskah Sejarah dan Galeri berhasil disimpan!'); window.location='index.php?module=$redirect_mod&act=sejarah';</script>";
    } else {
        echo "<script>alert('Gagal menyimpan: " . $koneksi->error . "'); window.history.back();</script>";
    }
}
?>