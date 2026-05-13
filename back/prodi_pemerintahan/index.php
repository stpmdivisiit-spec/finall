<?php
// File: modul/prodi_pemerintahan/index.php

// Ambil parameter 'act' (action), default-nya adalah 'dashboard'
$act = $_GET['act'] ?? 'dashboard';

// Logika Sub-Router
switch ($act) {
    
    // ==========================================
    // 1. DASHBOARD UTAMA
    // ==========================================
    case 'dashboard':
        if (file_exists('modul/prodi_pemerintahan/dashboard.php')) {
            include 'modul/prodi_pemerintahan/dashboard.php';
        } else {
            echo "<div class='alert alert-info mt-4'>Halaman Dashboard prodi_pemerintahan belum dibuat.</div>";
        }
        break;

    // ==========================================
    // 2. MANAJEMEN PROFIL PRODI
    // ==========================================
    // --- Visi & Misi ---
    case 'visi_misi':
        if (file_exists('modul/prodi_pemerintahan/profil_visi_misi.php')) include 'modul/prodi_pemerintahan/profil_visi_misi.php';
        break;
    case 'proses_profil': // Proses untuk Visi Misi
        if (file_exists('modul/prodi_pemerintahan/proses_profil.php')) include 'modul/prodi_pemerintahan/proses_profil.php';
        break;

    // --- Tujuan & CPL ---
    case 'tujuan_cpl':
        if (file_exists('modul/prodi_pemerintahan/tujuan_cpl_form.php')) include 'modul/prodi_pemerintahan/tujuan_cpl_form.php';
        break;
    case 'proses_tujuan_cpl':
        if (file_exists('modul/prodi_pemerintahan/tujuan_cpl_proses.php')) include 'modul/prodi_pemerintahan/tujuan_cpl_proses.php';
        break;

    // --- Sejarah Prodi ---
    case 'sejarah':
        if (file_exists('modul/prodi_pemerintahan/sejarah_form.php')) include 'modul/prodi_pemerintahan/sejarah_form.php';
        break;
    case 'proses_sejarah':
        if (file_exists('modul/prodi_pemerintahan/sejarah_proses.php')) include 'modul/prodi_pemerintahan/sejarah_proses.php';
        break;

    // --- Struktur Organisasi ---
    case 'struktur':
        if (file_exists('modul/prodi_pemerintahan/struktur_form.php')) include 'modul/prodi_pemerintahan/struktur_form.php';
        break;
    case 'proses_struktur':
        if (file_exists('modul/prodi_pemerintahan/struktur_proses.php')) include 'modul/prodi_pemerintahan/struktur_proses.php';
        break;

    // --- Profil Dosen (Deskripsi Pengantar Halaman) ---
    case 'profil_dosen_desc': 
        if (file_exists('modul/prodi_pemerintahan/profil_dosen_desc_form.php')) include 'modul/prodi_pemerintahan/profil_dosen_desc_form.php';
        break;
    case 'proses_profil_dosen_desc':
        if (file_exists('modul/prodi_pemerintahan/profil_dosen_desc_proses.php')) include 'modul/prodi_pemerintahan/profil_dosen_desc_proses.php';
        break;

    // --- Akreditasi Prodi ---
    case 'akreditasi':
        if (file_exists('modul/prodi_pemerintahan/akreditasi_data.php')) include 'modul/prodi_pemerintahan/akreditasi_data.php';
        break;


    // ==========================================
    // 3. MANAJEMEN AKADEMIK
    // ==========================================
    // --- Kurikulum ---
    case 'kurikulum':
        if (file_exists('modul/prodi_pemerintahan/akademik_kurikulum.php')) include 'modul/prodi_pemerintahan/akademik_kurikulum.php';
        break;
    case 'proses_kurikulum':
        if (file_exists('modul/prodi_pemerintahan/akademik_kurikulum_proses.php')) include 'modul/prodi_pemerintahan/akademik_kurikulum_proses.php';
        break;
    case 'hapus_kurikulum':
        $id = (int)$_GET['id'];
        $koneksi->query("DELETE FROM prodi_kurikulum WHERE id = '$id'");
        echo "<script>alert('Mata kuliah dihapus!'); window.location='index.php?module=prodi_pemerintahan&act=kurikulum';</script>";
        break;

    // --- Dokumen Akademik (Jadwal, Buku, Panduan) ---
    case 'jadwal_kuliah':
    case 'buku_akademik':
    case 'panduan_skripsi':
        if (file_exists('modul/prodi_pemerintahan/akademik_dokumen.php')) include 'modul/prodi_pemerintahan/akademik_dokumen.php';
        break;
    case 'proses_dokumen':
        if (file_exists('modul/prodi_pemerintahan/akademik_dokumen_proses.php')) include 'modul/prodi_pemerintahan/akademik_dokumen_proses.php';
        break;
    case 'hapus_dokumen':
        $id = (int)$_GET['id'];
        $kategori_redir = $_GET['kat_redir'];

        $data = $koneksi->query("SELECT file_dokumen FROM prodi_dokumen_akademik WHERE id = '$id'")->fetch_assoc();
        if ($data) {
            $target_file = 'uploads/akademik/' . $data['file_dokumen'];
            if (file_exists($target_file)) unlink($target_file);
            $koneksi->query("DELETE FROM prodi_dokumen_akademik WHERE id = '$id'");
        }
        
        echo "<script>alert('Dokumen dan file fisik berhasil dihapus!'); window.location='index.php?module=prodi_pemerintahan&act=$kategori_redir';</script>";
        break;


    // ==========================================
    // 4. MANAJEMEN PENGABDIAN & RISET (FILE PDF)
    // ==========================================
    case 'penelitian_dosen':
    case 'riset_mahasiswa':
    case 'abdimas':
        if (file_exists('modul/prodi_pemerintahan/riset_abdimas_data.php')) include 'modul/prodi_pemerintahan/riset_abdimas_data.php';
        break;
    case 'proses_riset_abdimas':
        if (file_exists('modul/prodi_pemerintahan/riset_abdimas_proses.php')) include 'modul/prodi_pemerintahan/riset_abdimas_proses.php';
        break;
    case 'hapus_riset_abdimas':
        $id = (int)$_GET['id'];
        $redir = $_GET['redir'];

        $data = $koneksi->query("SELECT file_dokumen FROM prodi_riset_abdimas WHERE id = '$id'")->fetch_assoc();
        if ($data) {
            $target_file = 'uploads/riset_abdimas/' . $data['file_dokumen'];
            if (!empty($data['file_dokumen']) && file_exists($target_file)) unlink($target_file);
            $koneksi->query("DELETE FROM prodi_riset_abdimas WHERE id = '$id'");
        }
        
        echo "<script>alert('Data Riset/Abdimas terhapus sepenuhnya!'); window.location='index.php?module=prodi_pemerintahan&act=$redir';</script>";
        break;


    // ==========================================
    // 5. MANAJEMEN JURNAL & GALERI (KONVERSI WEBP)
    // ==========================================
    case 'jurnal':
    case 'galeri':
        if (file_exists('modul/prodi_pemerintahan/publikasi_visual_data.php')) include 'modul/prodi_pemerintahan/publikasi_visual_data.php';
        break;
    case 'proses_publikasi_visual':
        if (file_exists('modul/prodi_pemerintahan/publikasi_visual_proses.php')) include 'modul/prodi_pemerintahan/publikasi_visual_proses.php';
        break;
    case 'hapus_publikasi_visual':
        $id = (int)$_GET['id'];
        $redir = $_GET['redir'];

        $data = $koneksi->query("SELECT file_gambar_webp FROM prodi_publikasi_visual WHERE id = '$id'")->fetch_assoc();
        if ($data) {
            $target_file = 'uploads/visual/' . $data['file_gambar_webp'];
            if (!empty($data['file_gambar_webp']) && file_exists($target_file)) unlink($target_file);
            $koneksi->query("DELETE FROM prodi_publikasi_visual WHERE id = '$id'");
        }
        
        echo "<script>alert('Data Visual (WebP) terhapus sepenuhnya!'); window.location='index.php?module=prodi_pemerintahan&act=$redir';</script>";
        break;


    // ==========================================
    // 6. CRUD USER (Master Data Pegawai/Dosen)
    // ==========================================
    case 'user_data':
        if (file_exists('modul/prodi_pemerintahan/user_data.php')) include 'modul/prodi_pemerintahan/user_data.php';
        else echo "<div class='alert alert-warning mt-4'>File user_data.php tidak ditemukan</div>";
        break;
    case 'user_tambah':
        if (file_exists('modul/prodi_pemerintahan/user_form.php')) include 'modul/prodi_pemerintahan/user_form.php';
        break;
    case 'user_edit':
        if (file_exists('modul/prodi_pemerintahan/user_form.php')) include 'modul/prodi_pemerintahan/user_form.php';
        break;
    case 'user_proses':
        if (file_exists('modul/prodi_pemerintahan/user_proses.php')) include 'modul/prodi_pemerintahan/user_proses.php';
        break;



// ==========================================
    // 7. MANAJEMEN KEMAHASISWAAN
    // ==========================================
    case 'hmps':
    case 'prestasi':
    case 'kegiatan_mahasiswa':
    case 'tracer_study':
        if (file_exists('modul/prodi_pemerintahan/kema_data.php')) include 'modul/prodi_pemerintahan/kema_data.php';
        break;
    
    case 'proses_kema':
        if (file_exists('modul/prodi_pemerintahan/kema_proses.php')) include 'modul/prodi_pemerintahan/kema_proses.php';
        break;

    case 'hapus_kema':
        $id = (int)$_GET['id'];
        $redir = $_GET['redir'];
        $tabel = $_GET['tabel'];
        $kolom_file = $_GET['kolom_file'];

        // Hapus file fisik PDF/Gambar
        $data = $koneksi->query("SELECT $kolom_file FROM $tabel WHERE id = '$id'")->fetch_assoc();
        if ($data) {
            $target_file = 'uploads/kemahasiswaan/' . $data[$kolom_file];
            if (!empty($data[$kolom_file]) && file_exists($target_file)) unlink($target_file);
            $koneksi->query("DELETE FROM $tabel WHERE id = '$id'");
        }
        
        echo "<script>alert('Data Kemahasiswaan terhapus!'); window.location='index.php?module=prodi_pemerintahan&act=$redir';</script>";
        break;




// ==========================================
    // 8. MANAJEMEN KERJA SAMA & MITRA
    // ==========================================
    case 'mitra_pemerintah':
    case 'mitra_sosial':
    case 'mitra_mbkm':
    case 'mitra_penelitian':
        if (file_exists('modul/prodi_pemerintahan/kerjasama_data.php')) include 'modul/prodi_pemerintahan/kerjasama_data.php';
        break;
        
    case 'proses_kerjasama':
        if (file_exists('modul/prodi_pemerintahan/kerjasama_proses.php')) include 'modul/prodi_pemerintahan/kerjasama_proses.php';
        break;

    case 'hapus_kerjasama':
        $id = (int)$_GET['id'];
        $redir = $_GET['redir'];

        // Hapus file fisik (PDF) sebelum menghapus data di database
        $data = $koneksi->query("SELECT file_dokumen FROM prodi_kerjasama WHERE id = '$id'")->fetch_assoc();
        if ($data) {
            $target_file = 'uploads/kerjasama/' . $data['file_dokumen'];
            if (!empty($data['file_dokumen']) && file_exists($target_file)) {
                unlink($target_file); // Hapus file fisik
            }
            $koneksi->query("DELETE FROM prodi_kerjasama WHERE id = '$id'");
        }
        
        echo "<script>alert('Data Kerja Sama berhasil dihapus!'); window.location='index.php?module=prodi_pemerintahan&act=$redir';</script>";
        break;




// ==========================================
    // 9. MANAJEMEN BERITA (WYSIWYG EDITOR)
    // ==========================================
    case 'berita':
        if (file_exists('modul/prodi_pemerintahan/berita_data.php')) include 'modul/prodi_pemerintahan/berita_data.php';
        break;
// Cari bagian ini di router Anda:
    case 'edit_berita':
    case 'tambah_berita':
        if (file_exists('modul/prodi_pemerintahan/berita_form.php')) include 'modul/prodi_pemerintahan/berita_form.php';
        break;
    case 'proses_berita':
        if (file_exists('modul/prodi_pemerintahan/berita_proses.php')) include 'modul/prodi_pemerintahan/berita_proses.php';
        break;
    case 'hapus_berita':
        $id = (int)$_GET['id'];
        $data = $koneksi->query("SELECT gambar_thumbnail FROM prodi_berita WHERE id = '$id'")->fetch_assoc();
        if ($data && !empty($data['gambar_thumbnail'])) {
            $target = 'uploads/berita/' . $data['gambar_thumbnail'];
            if (file_exists($target)) unlink($target);
        }
        $koneksi->query("DELETE FROM prodi_berita WHERE id = '$id'");
        echo "<script>alert('Berita dihapus!'); window.location='index.php?module=prodi_pemerintahan&act=berita';</script>";
        break;

    // ==========================================
    // 10. MANAJEMEN SEMINAR, PENGUMUMAN & AGENDA
    // ==========================================
    case 'seminar':
    case 'pengumuman':
    case 'agenda':
        if (file_exists('modul/prodi_pemerintahan/info_agenda_data.php')) include 'modul/prodi_pemerintahan/info_agenda_data.php';
        break;
    case 'proses_info':
        if (file_exists('modul/prodi_pemerintahan/info_agenda_proses.php')) include 'modul/prodi_pemerintahan/info_agenda_proses.php';
        break;
    case 'hapus_info':
        $id = (int)$_GET['id'];
        $redir = $_GET['redir'];
        $data = $koneksi->query("SELECT file_lampiran FROM prodi_info_agenda WHERE id = '$id'")->fetch_assoc();
        if ($data && !empty($data['file_lampiran'])) {
            $target = 'uploads/informasi/' . $data['file_lampiran'];
            if (file_exists($target)) unlink($target);
        }
        $koneksi->query("DELETE FROM prodi_info_agenda WHERE id = '$id'");
        echo "<script>alert('Data berhasil dihapus!'); window.location='index.php?module=prodi_pemerintahan&act=$redir';</script>";
        break;


// ==========================================
    // 11. MANAJEMEN DOKUMEN (SOP, PANDUAN, LAPORAN)
    // ==========================================
    case 'dok_pedoman':
    case 'dok_panduan':
    case 'dok_laporan':
    case 'dok_sop':
        if (file_exists('modul/prodi_pemerintahan/dokumen_data.php')) include 'modul/prodi_pemerintahan/dokumen_data.php';
        break;
        
    case 'proses_dok_resmi':
        if (file_exists('modul/prodi_pemerintahan/dokumen_proses.php')) include 'modul/prodi_pemerintahan/dokumen_proses.php';
        break;

    case 'hapus_dok_resmi':
        $id = (int)$_GET['id'];
        $redir = $_GET['redir'];

        // Ambil nama file & Hapus file fisik PDF
        $data = $koneksi->query("SELECT file_dokumen FROM prodi_dokumen_resmi WHERE id = '$id'")->fetch_assoc();
        if ($data) {
            $target_file = 'uploads/dokumen_resmi/' . $data['file_dokumen'];
            if (!empty($data['file_dokumen']) && file_exists($target_file)) {
                unlink($target_file);
            }
            // Hapus dari database
            $koneksi->query("DELETE FROM prodi_dokumen_resmi WHERE id = '$id'");
        }
        
        echo "<script>alert('Dokumen resmi berhasil dihapus!'); window.location='index.php?module=prodi_pemerintahan&act=$redir';</script>";
        break;




    // ==========================================
    // DEFAULT (Jika parameter 'act' tidak dikenali)
    // ==========================================
    default:
        if (file_exists('modul/prodi_pemerintahan/dashboard.php')) {
            include 'modul/prodi_pemerintahan/dashboard.php';
        } else {
            echo "<div class='alert alert-danger mt-4'>Halaman tidak ditemukan (404).</div>";
        }
        break;
}
?>