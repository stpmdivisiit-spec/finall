<?php
// C:\xampp\htdocs\FINAL\modul\perpustakaan\index.php
$act = $_GET['act'] ?? 'dashboard';
$kat = $_GET['kat'] ?? '';

switch ($act) {
    case 'dashboard':
        if (file_exists('modul/perpustakaan/dashboard.php')) include 'modul/perpustakaan/dashboard.php';
        break;

    // --- 1. ROUTER PROFIL PERPUSTAKAAN ---
    case 'profil':
        if (file_exists('modul/perpustakaan/profil_data.php')) include 'modul/perpustakaan/profil_data.php';
        break;
    case 'proses_profil':
        if (file_exists('modul/perpustakaan/profil_proses.php')) include 'modul/perpustakaan/profil_proses.php';
        break;

    // --- 2. ROUTER LAYANAN ---
    case 'layanan':
        if (file_exists('modul/perpustakaan/layanan_data.php')) include 'modul/perpustakaan/layanan_data.php';
        break;
    case 'proses_layanan':
        if (file_exists('modul/perpustakaan/layanan_proses.php')) include 'modul/perpustakaan/layanan_proses.php';
        break;
    case 'hapus_layanan':
            $id = (int)$_GET['id'];
            $kat = $_GET['kat'];
            
            if ($kat == 'bebas') {
                $cek = $koneksi->query("SELECT file_surat FROM perpus_layanan_bebas WHERE id = '$id'")->fetch_assoc();
                if ($cek && !empty($cek['file_surat']) && file_exists('uploads/perpustakaan/layanan/' . $cek['file_surat'])) {
                    unlink('uploads/perpustakaan/layanan/' . $cek['file_surat']);
                }
                $koneksi->query("DELETE FROM perpus_layanan_bebas WHERE id = '$id'");
                echo "<script>alert('Data Surat Bebas Pustaka berhasil dihapus!'); window.location='index.php?module=perpustakaan&act=layanan&kat=bebas';</script>";
            } elseif ($kat == 'referensi') {
                            // Logika hapus referensi
                            $stmt = $koneksi->prepare("DELETE FROM perpus_layanan_referensi WHERE id = ?");
                            $stmt->bind_param("i", $id);
                            if ($stmt->execute()) {
                                echo "<script>alert('Data Referensi berhasil dihapus!'); window.location='index.php?module=perpustakaan&act=layanan&kat=referensi';</script>";
                            } else {
                                echo "<script>alert('Gagal menghapus data.'); window.history.back();</script>";
                            }
                        }
            elseif ($kat == 'usulan') {
            $stmt = $koneksi->prepare("DELETE FROM perpus_layanan_usulan WHERE id = ?");
            $stmt->bind_param("i", $id);
            if ($stmt->execute()) {
                echo "<script>alert('Data Usulan berhasil dihapus!'); window.location='index.php?module=perpustakaan&act=layanan&kat=usulan';</script>";
            } else {
                echo "<script>alert('Gagal menghapus data.'); window.history.back();</script>";
            }
        }


            break;

    case 'hapus_informasi':
        $id = (int)$_GET['id'];
        $kat = $_GET['kat'];
        
        if ($kat == 'acara') {
            $cek = $koneksi->query("SELECT gambar_poster FROM perpus_info_acara WHERE id = '$id'")->fetch_assoc();
            if ($cek && !empty($cek['gambar_poster']) && file_exists('uploads/perpustakaan/informasi/' . $cek['gambar_poster'])) {
                unlink('uploads/perpustakaan/informasi/' . $cek['gambar_poster']);
            }
            $koneksi->query("DELETE FROM perpus_info_acara WHERE id = '$id'");
            echo "<script>alert('Data Acara berhasil dihapus!'); window.location='index.php?module=perpustakaan&act=informasi&kat=acara';</script>";
        
        } elseif ($kat == 'galeri') {
            $cek = $koneksi->query("SELECT file_foto FROM perpus_info_galeri WHERE id = '$id'")->fetch_assoc();
            if ($cek && !empty($cek['file_foto']) && file_exists('uploads/perpustakaan/informasi/' . $cek['file_foto'])) {
                unlink('uploads/perpustakaan/informasi/' . $cek['file_foto']);
            }
            $koneksi->query("DELETE FROM perpus_info_galeri WHERE id = '$id'");
            echo "<script>alert('Foto Galeri berhasil dihapus!'); window.location='index.php?module=perpustakaan&act=informasi&kat=galeri';</script>";
        }
        break;

    case 'hapus_profil':
        $id = (int)$_GET['id'];
        $kat = $_GET['kat'];
        
        if ($kat == 'fasilitas') {
            $cek = $koneksi->query("SELECT foto FROM perpus_fasilitas WHERE id = '$id'")->fetch_assoc();
            if ($cek && !empty($cek['foto']) && file_exists('uploads/perpustakaan/profil/' . $cek['foto'])) {
                unlink('uploads/perpustakaan/profil/' . $cek['foto']);
            }
            $koneksi->query("DELETE FROM perpus_fasilitas WHERE id = '$id'");
            echo "<script>alert('Data Fasilitas berhasil dihapus!'); window.location='index.php?module=perpustakaan&act=profil&kat=fasilitas';</script>";
        }
        break;
    // --- 3. ROUTER KOLEKSI ---
    case 'koleksi':
        if (file_exists('modul/perpustakaan/koleksi_data.php')) include 'modul/perpustakaan/koleksi_data.php';
        break;
    case 'proses_koleksi':
        if (file_exists('modul/perpustakaan/koleksi_proses.php')) include 'modul/perpustakaan/koleksi_proses.php';
        break;
    case 'hapus_koleksi':
        $id = (int)$_GET['id'];
        $kat = $_GET['kat']; 
        
        $data = $koneksi->query("SELECT cover_gambar, file_lampiran FROM perpus_koleksi WHERE id = '$id'")->fetch_assoc();
        if ($data) {
            if (!empty($data['cover_gambar']) && file_exists('uploads/perpustakaan/cover/' . $data['cover_gambar'])) unlink('uploads/perpustakaan/cover/' . $data['cover_gambar']);
            if (!empty($data['file_lampiran']) && file_exists('uploads/perpustakaan/koleksi/' . $data['file_lampiran'])) unlink('uploads/perpustakaan/koleksi/' . $data['file_lampiran']);
        }
        $koneksi->query("DELETE FROM perpus_koleksi WHERE id = '$id'");
        echo "<script>alert('Data Koleksi berhasil dihapus!'); window.location='index.php?module=perpustakaan&act=koleksi&kat=$kat';</script>";
        break;

    // --- 4. ROUTER KEANGGOTAAN ---
    case 'keanggotaan':
        if (file_exists('modul/perpustakaan/keanggotaan_data.php')) include 'modul/perpustakaan/keanggotaan_data.php';
        break;
    case 'proses_keanggotaan':
        if (file_exists('modul/perpustakaan/keanggotaan_proses.php')) include 'modul/perpustakaan/keanggotaan_proses.php';
        break;
    case 'hapus_keanggotaan':
        // Logika hapus anggota
        break;

    // --- 5. ROUTER INFORMASI PUBLIK (Berita, Acara, Galeri) ---
    case 'informasi':
        if (file_exists('modul/perpustakaan/informasi_data.php')) include 'modul/perpustakaan/informasi_data.php';
        break;
    case 'proses_informasi':
        if (file_exists('modul/perpustakaan/informasi_proses.php')) include 'modul/perpustakaan/informasi_proses.php';
        break;
    case 'hapus_informasi':
        // Logika hapus informasi
        break;

    // --- DEFAULT ERROR HANDLER ---
    default:
        if (file_exists('modul/perpustakaan/dashboard.php')) {
            include 'modul/perpustakaan/dashboard.php';
        } else {
            echo "<div class='alert alert-danger mt-4'>Error 404: Modul Perpustakaan tidak ditemukan.</div>";
        }
        break;
}
?>