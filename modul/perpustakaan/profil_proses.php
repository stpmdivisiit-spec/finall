<?php if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!"); 
// C:\xampp\htdocs\FINAL\modul\perpustakaan\profil_proses.php

$aksi = $_POST['aksi'] ?? '';

// ==========================================
// 1. LOGIKA PROSES MULTI-ROW (FASILITAS)
// ==========================================
if ($aksi == 'tambah_fasilitas' || $aksi == 'edit_fasilitas') {
    $nama = trim($_POST['nama_fasilitas']);
    $deskripsi = trim($_POST['deskripsi']);
    $icon = $_POST['icon'] ?? 'fa-check-circle'; // Tangkap Icon
    $foto_final = ($aksi == 'edit_fasilitas') ? $_POST['foto_lama'] : NULL;
    $direktori = 'uploads/perpustakaan/profil/';
    
    // (Kode Upload Foto Tetap Sama...)
    if (isset($_FILES['foto']['name']) && $_FILES['foto']['name'] != '') {
        $nama_file = $_FILES['foto']['name'];
        $tmp_file = $_FILES['foto']['tmp_name'];
        $ext = strtolower(pathinfo($nama_file, PATHINFO_EXTENSION));
        if (in_array($ext, ['png','jpg','jpeg','webp'])) {
            if (!is_dir($direktori)) mkdir($direktori, 0777, true);
            $foto_baru = 'Fasilitas_' . time() . '.' . $ext;
            move_uploaded_file($tmp_file, $direktori . $foto_baru);
            if ($aksi == 'edit_fasilitas' && !empty($foto_final) && file_exists($direktori . $foto_final)) { unlink($direktori . $foto_final); }
            $foto_final = $foto_baru;
        }
    }

    if ($aksi == 'tambah_fasilitas') {
        $stmt = $koneksi->prepare("INSERT INTO perpus_fasilitas (nama_fasilitas, deskripsi, icon, foto) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $nama, $deskripsi, $icon, $foto_final);
    } else {
        $id = (int)$_POST['id'];
        $stmt = $koneksi->prepare("UPDATE perpus_fasilitas SET nama_fasilitas=?, deskripsi=?, icon=?, foto=? WHERE id=?");
        $stmt->bind_param("ssssi", $nama, $deskripsi, $icon, $foto_final, $id);
    }
    $stmt->execute();
    echo "<script>alert('Data Fasilitas berhasil disimpan!'); window.location='index.php?module=perpustakaan&act=profil&kat=fasilitas';</script>";
}

// ... (Blok 2 VMT Tetap Sama) ...

// ==========================================
// 3. LOGIKA PROSES KHUSUS LAYANAN
// ==========================================
elseif (isset($_POST['simpan_layanan'])) {
    $tata_tertib = array_values(array_filter(array_map('trim', $_POST['tata_tertib'] ?? [])));
    $ket_pinjam = array_values(array_filter(array_map('trim', $_POST['ketentuan_pinjam'] ?? [])));
    
    $jam_operasional = [];
    if (isset($_POST['jam_hari'])) {
        foreach ($_POST['jam_hari'] as $index => $hari) {
            if (trim($hari) !== '') {
                $jam_operasional[] = [
                    'hari' => trim($hari),
                    'jam' => trim($_POST['jam_waktu'][$index] ?? '')
                ];
            }
        }
    }

    $json_data = json_encode([
        'tata_tertib' => $tata_tertib,
        'jam_operasional' => $jam_operasional,
        'ketentuan_pinjam' => $ket_pinjam
    ], JSON_UNESCAPED_UNICODE);

    $stmt = $koneksi->prepare("UPDATE perpus_profil SET konten = ? WHERE kategori = 'layanan'");
    $stmt->bind_param("s", $json_data);
    $stmt->execute();
    
    echo "<script>alert('Jam Layanan & Tata Tertib berhasil diperbarui!'); window.location='index.php?module=perpustakaan&act=profil&kat=layanan';</script>";
}
// ... (Kode Editor 'Tentang' dan 'else' biarkan seperti sebelumnya) ...

// ==========================================
// 2. LOGIKA PROSES KHUSUS VMT (VISI, MISI, TUJUAN)
// ==========================================
elseif (isset($_POST['simpan_vmt'])) {
    $visi = trim($_POST['visi']);
    
    // Membersihkan array misi dari input yang kosong
    $misi = [];
    if (isset($_POST['misi'])) {
        foreach ($_POST['misi'] as $m) {
            if (trim($m) !== '') $misi[] = trim($m);
        }
    }

    // Membangun array tujuan (judul & deskripsi)
    $tujuan = [];
    if (isset($_POST['tujuan_judul'])) {
        foreach ($_POST['tujuan_judul'] as $index => $judul) {
            $judul = trim($judul);
            $desc = trim($_POST['tujuan_desc'][$index] ?? '');
            if ($judul !== '') {
                $tujuan[] = [
                    'judul' => $judul,
                    'deskripsi' => $desc
                ];
            }
        }
    }

    // Gabungkan menjadi satu format JSON
    $json_data = json_encode([
        'visi' => $visi,
        'misi' => $misi,
        'tujuan' => $tujuan
    ], JSON_UNESCAPED_UNICODE);

    // Update ke database
    $stmt = $koneksi->prepare("UPDATE perpus_profil SET konten = ? WHERE kategori = 'vmt'");
    $stmt->bind_param("s", $json_data);
    
    if ($stmt->execute()) {
        echo "<script>alert('Visi, Misi & Tujuan berhasil diperbarui!'); window.location='index.php?module=perpustakaan&act=profil&kat=vmt';</script>";
    } else {
        echo "<script>alert('Gagal menyimpan data VMT.'); window.history.back();</script>";
    }
}

// ==========================================
// 3. LOGIKA PROSES SINGLE-PAGE (Layanan, Tentang)
// ==========================================
elseif (isset($_POST['simpan_profil'])) {
    $kat = $_POST['kategori'];
    $judul = $_POST['judul'];
    $konten = $_POST['konten'];
    $gambar_lama = $_POST['gambar_lama'];
    $gambar_baru = $gambar_lama;
    
    // Logika Upload Gambar Cover
    if (isset($_FILES['gambar']['name']) && $_FILES['gambar']['name'] != '') {
        $nama_file = $_FILES['gambar']['name'];
        $tmp_file = $_FILES['gambar']['tmp_name'];
        $ext = strtolower(pathinfo($nama_file, PATHINFO_EXTENSION));
        
        if (in_array($ext, ['png','jpg','jpeg','webp'])) {
            $direktori = 'uploads/perpustakaan/profil/';
            if (!is_dir($direktori)) mkdir($direktori, 0777, true);
            
            $gambar_baru = $kat . '_' . time() . '.' . $ext;
            move_uploaded_file($tmp_file, $direktori . $gambar_baru);
            
            if (!empty($gambar_lama) && file_exists($direktori . $gambar_lama)) unlink($direktori . $gambar_lama);
        }
    }

    $stmt = $koneksi->prepare("UPDATE perpus_profil SET judul = ?, konten = ?, gambar = ? WHERE kategori = ?");
    $stmt->bind_param("ssss", $judul, $konten, $gambar_baru, $kat);
    
    if ($stmt->execute()) {
        echo "<script>alert('Data Profil berhasil diperbarui!'); window.location='index.php?module=perpustakaan&act=profil&kat=$kat';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui data.'); window.history.back();</script>";
    }
}

// ==========================================
// KONDISI DEFAULT JIKA TIDAK ADA AKSI
// ==========================================
else {
    header("Location: index.php?module=perpustakaan");
}
?>