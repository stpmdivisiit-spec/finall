<?php
// C:\xampp\htdocs\FINAL\index.php
define('AKSES_DIIZINKAN', true);
error_reporting(E_ALL);          
ini_set('display_errors', 1);    
ob_start();
session_start();
include "config/koneksi.php";
include "config/fungsi_alert.php";

// Cek status login (Apakah Admin/Prodi/Dosen/dll)
$is_logged_in = (isset($_SESSION['username']) && isset($_SESSION['roles']));

// Tangkap request module dari URL
$module = isset($_GET['module']) ? $_GET['module'] : 'beranda';
// =========================================================================
// 1. ROUTING FRONT-END / HALAMAN PUBLIK (JIKA USER BELUM LOGIN)
// =========================================================================
// =========================================================================
// 1. ROUTING FRONT-END / HALAMAN PUBLIK (JIKA USER BELUM LOGIN)
// =========================================================================
if (!$is_logged_in) {
    
    // Switch case ini akan merangkai 3 file (Header + Content + Footer)
    switch ($module) {
        case 'sejarah':
            include "header.php"; 
            if (file_exists("modul/publik/content_sejarah.php")) include "modul/publik/content_sejarah.php";
            include "footer.php";
            break;

        case 'visi_misi':
            include "header.php"; 
            if (file_exists("modul/publik/content_visi_misi.php")) include "modul/publik/content_visi_misi.php";
            include "footer.php";
            break;

        case 'struktur_organisasi':
            include "header.php"; 
            if (file_exists("modul/publik/content_struktur.php")) include "modul/publik/content_struktur.php";
            include "footer.php";
            break;

// ROUTE KALENDER AKADEMIK
        case 'kalender':
            include "header.php"; 
            if (file_exists("modul/publik/content_kalender.php")) include "modul/publik/content_kalender.php";
            else echo "<main class='container py-5 text-center mt-5'><h3>Halaman Kalender Belum Tersedia</h3></main>";
            include "footer.php";
            break;


        case 'pemerintahan':
        case 'ip':
            if (file_exists("header_ip.php")) include "header_ip.php"; else include "header.php";
            if (file_exists("modul/publik/content_ip.php")) include "modul/publik/content_ip.php"; 
            else echo "<main class='container py-5 text-center mt-5'><h3>Halaman Ilmu Pemerintahan Belum Tersedia</h3></main>";
            include "footer.php";
            break;

        case 'sosiatri':
        case 'sos':
            if (file_exists("header_sos.php")) include "header_sos.php"; else include "header.php";
            if (file_exists("modul/publik/content_sos.php")) include "modul/publik/content_sos.php";
            else echo "<main class='container py-5 text-center mt-5'><h3>Halaman Pembangunan Sosial Belum Tersedia</h3></main>";
            include "footer.php";
            break;

        case 'kemahasiswaan':
        case 'kema':
            if (file_exists("header_kemahasiswaan.php")) include "header_kemahasiswaan.php"; else include "header.php";
            if (file_exists("modul/publik/content_kemahasiswaan.php")) include "modul/publik/content_kemahasiswaan.php";
            else echo "<main class='container py-5 text-center mt-5'><h3>Halaman Kemahasiswaan Belum Tersedia</h3></main>";
            include "footer.php";
            break;

        case 'lp2m':
            if (file_exists("header_lp2m.php")) include "header_lp2m.php"; else include "header.php";
            if (file_exists("modul/publik/content_lp2m.php")) include "modul/publik/content_lp2m.php";
            else echo "<main class='container py-5 text-center mt-5'><h3>Halaman LP2M Belum Tersedia</h3></main>";
            include "footer.php";
            break;

        case 'lpm':
            if (file_exists("header_lpm.php")) include "header_lpm.php"; else include "header.php";
            if (file_exists("modul/publik/content_lpm.php")) include "modul/publik/content_lpm.php";
            else echo "<main class='container py-5 text-center mt-5'><h3>Halaman LPM Belum Tersedia</h3></main>";
            include "footer.php";
            break;

        case 'perpus':
            if (file_exists("header_perpus.php")) include "header_perpus.php"; else include "header.php";
            if (file_exists("modul/publik/content_perpus.php")) include "modul/publik/content_perpus.php";
            else echo "<main class='container py-5 text-center mt-5'><h3>Halaman Perpustakaan Belum Tersedia</h3></main>";
            include "footer.php";
            break;

// ROUTE PROFIL PRODI ILMU SOSIATRI (PEMBANGUNAN SOSIAL)
        case 'sos_visi_misi':
            if (file_exists("header_sos.php")) include "header_sos.php"; else include "header.php";
            if (file_exists("modul/publik/content_sos_visi_misi.php")) include "modul/publik/content_sos_visi_misi.php";
            include "footer.php"; break;
            
        case 'sos_tujuan_cpl':
            if (file_exists("header_sos.php")) include "header_sos.php"; else include "header.php";
            if (file_exists("modul/publik/content_sos_tujuan_cpl.php")) include "modul/publik/content_sos_tujuan_cpl.php";
            include "footer.php"; break;
            
        case 'sos_struktur':
            if (file_exists("header_sos.php")) include "header_sos.php"; else include "header.php";
            if (file_exists("modul/publik/content_sos_struktur.php")) include "modul/publik/content_sos_struktur.php";
            include "footer.php"; break;
            
        case 'sos_dosen':
            if (file_exists("header_sos.php")) include "header_sos.php"; else include "header.php";
            if (file_exists("modul/publik/content_sos_dosen.php")) include "modul/publik/content_sos_dosen.php";
            include "footer.php"; break;
            
        case 'sos_akreditasi':
            if (file_exists("header_sos.php")) include "header_sos.php"; else include "header.php";
            if (file_exists("modul/publik/content_sos_akreditasi.php")) include "modul/publik/content_sos_akreditasi.php";
            include "footer.php"; break;
            
        case 'sos_sejarah':
            if (file_exists("header_sos.php")) include "header_sos.php"; else include "header.php";
            if (file_exists("modul/publik/content_sos_sejarah.php")) include "modul/publik/content_sos_sejarah.php";
            include "footer.php"; break;


// ROUTE AKADEMIK PRODI ILMU SOSIATRI (PEMBANGUNAN SOSIAL)
        case 'sos_kurikulum':
            if (file_exists("header_sos.php")) include "header_sos.php"; else include "header.php";
            if (file_exists("modul/publik/content_sos_kurikulum.php")) include "modul/publik/content_sos_kurikulum.php";
            include "footer.php"; break;
            
        case 'sos_jadwal':
            if (file_exists("header_sos.php")) include "header_sos.php"; else include "header.php";
            if (file_exists("modul/publik/content_sos_jadwal.php")) include "modul/publik/content_sos_jadwal.php";
            include "footer.php"; break;
            
        case 'sos_buku_akademik':
            if (file_exists("header_sos.php")) include "header_sos.php"; else include "header.php";
            if (file_exists("modul/publik/content_sos_buku_akademik.php")) include "modul/publik/content_sos_buku_akademik.php";
            include "footer.php"; break;
            
        case 'sos_panduan_skripsi':
            if (file_exists("header_sos.php")) include "header_sos.php"; else include "header.php";
            if (file_exists("modul/publik/content_sos_panduan_skripsi.php")) include "modul/publik/content_sos_panduan_skripsi.php";
            include "footer.php"; break;


// ROUTE RISET & ABDIMAS PRODI ILMU SOSIATRI
        case 'sos_penelitian_dosen':
            if (file_exists("header_sos.php")) include "header_sos.php"; else include "header.php";
            if (file_exists("modul/publik/content_sos_penelitian_dosen.php")) include "modul/publik/content_sos_penelitian_dosen.php";
            include "footer.php"; break;
            
        case 'sos_riset_mahasiswa':
            if (file_exists("header_sos.php")) include "header_sos.php"; else include "header.php";
            if (file_exists("modul/publik/content_sos_riset_mahasiswa.php")) include "modul/publik/content_sos_riset_mahasiswa.php";
            include "footer.php"; break;
            
        case 'sos_abdimas':
            if (file_exists("header_sos.php")) include "header_sos.php"; else include "header.php";
            if (file_exists("modul/publik/content_sos_abdimas.php")) include "modul/publik/content_sos_abdimas.php";
            include "footer.php"; break;
            
        case 'sos_jurnal':
            if (file_exists("header_sos.php")) include "header_sos.php"; else include "header.php";
            if (file_exists("modul/publik/content_sos_jurnal.php")) include "modul/publik/content_sos_jurnal.php";
            include "footer.php"; break;
            
        case 'sos_galeri':
            if (file_exists("header_sos.php")) include "header_sos.php"; else include "header.php";
            if (file_exists("modul/publik/content_sos_galeri.php")) include "modul/publik/content_sos_galeri.php";
            include "footer.php"; break;


// ROUTE MAHASISWA PRODI ILMU SOSIATRI
        case 'sos_hmps':
            if (file_exists("header_sos.php")) include "header_sos.php"; else include "header.php";
            if (file_exists("modul/publik/content_sos_hmps.php")) include "modul/publik/content_sos_hmps.php";
            include "footer.php"; break;
            
        case 'sos_prestasi':
            if (file_exists("header_sos.php")) include "header_sos.php"; else include "header.php";
            if (file_exists("modul/publik/content_sos_prestasi.php")) include "modul/publik/content_sos_prestasi.php";
            include "footer.php"; break;
            
        case 'sos_kegiatan':
            if (file_exists("header_sos.php")) include "header_sos.php"; else include "header.php";
            if (file_exists("modul/publik/content_sos_kegiatan.php")) include "modul/publik/content_sos_kegiatan.php";
            include "footer.php"; break;
            
        case 'sos_tracer':
            if (file_exists("header_sos.php")) include "header_sos.php"; else include "header.php";
            if (file_exists("modul/publik/content_sos_tracer.php")) include "modul/publik/content_sos_tracer.php";
            include "footer.php"; break;

// ROUTE MITRA PRODI ILMU SOSIATRI
        case 'sos_mitra_pemdesa':
            if (file_exists("header_sos.php")) include "header_sos.php"; else include "header.php";
            if (file_exists("modul/publik/content_sos_mitra_pemdesa.php")) include "modul/publik/content_sos_mitra_pemdesa.php";
            include "footer.php"; break;
            
        case 'sos_mitra_sosial':
            if (file_exists("header_sos.php")) include "header_sos.php"; else include "header.php";
            if (file_exists("modul/publik/content_sos_mitra_sosial.php")) include "modul/publik/content_sos_mitra_sosial.php";
            include "footer.php"; break;
            
        case 'sos_mitra_mbkm':
            if (file_exists("header_sos.php")) include "header_sos.php"; else include "header.php";
            if (file_exists("modul/publik/content_sos_mitra_mbkm.php")) include "modul/publik/content_sos_mitra_mbkm.php";
            include "footer.php"; break;
            
        case 'sos_mitra_riset':
            if (file_exists("header_sos.php")) include "header_sos.php"; else include "header.php";
            if (file_exists("modul/publik/content_sos_mitra_riset.php")) include "modul/publik/content_sos_mitra_riset.php";
            include "footer.php"; break;


// ROUTE BERITA PRODI ILMU SOSIATRI (PEMBANGUNAN SOSIAL)
        case 'sos_berita_artikel':
            if (file_exists("header_sos.php")) include "header_sos.php"; else include "header.php";
            if (file_exists("modul/publik/content_sos_berita_artikel.php")) include "modul/publik/content_sos_berita_artikel.php";
            include "footer.php"; break;
            
        case 'sos_berita_seminar':
            if (file_exists("header_sos.php")) include "header_sos.php"; else include "header.php";
            if (file_exists("modul/publik/content_sos_berita_seminar.php")) include "modul/publik/content_sos_berita_seminar.php";
            include "footer.php"; break;
            
        case 'sos_berita_pengumuman':
            if (file_exists("header_sos.php")) include "header_sos.php"; else include "header.php";
            if (file_exists("modul/publik/content_sos_berita_pengumuman.php")) include "modul/publik/content_sos_berita_pengumuman.php";
            include "footer.php"; break;
            
        case 'sos_berita_agenda':
            if (file_exists("header_sos.php")) include "header_sos.php"; else include "header.php";
            if (file_exists("modul/publik/content_sos_berita_agenda.php")) include "modul/publik/content_sos_berita_agenda.php";
            include "footer.php"; break;
// ROUTE DOKUMEN PUBLIK PRODI ILMU SOSIATRI
        case 'sos_dok_skripsi':
            if (file_exists("header_sos.php")) include "header_sos.php"; else include "header.php";
            if (file_exists("modul/publik/content_sos_dok_skripsi.php")) include "modul/publik/content_sos_dok_skripsi.php";
            include "footer.php"; break;
            
        case 'sos_dok_panduan':
            if (file_exists("header_sos.php")) include "header_sos.php"; else include "header.php";
            if (file_exists("modul/publik/content_sos_dok_panduan.php")) include "modul/publik/content_sos_dok_panduan.php";
            include "footer.php"; break;
            
        case 'sos_dok_laporan':
            if (file_exists("header_sos.php")) include "header_sos.php"; else include "header.php";
            if (file_exists("modul/publik/content_sos_dok_laporan.php")) include "modul/publik/content_sos_dok_laporan.php";
            include "footer.php"; break;
            
        case 'sos_dok_sop':
            if (file_exists("header_sos.php")) include "header_sos.php"; else include "header.php";
            if (file_exists("modul/publik/content_sos_dok_sop.php")) include "modul/publik/content_sos_dok_sop.php";
            include "footer.php"; break;


// ROUTE PROFIL PRODI ILMU PEMERINTAHAN
        case 'ip_visi_misi':
            if (file_exists("header_ip.php")) include "header_ip.php"; else include "header.php";
            if (file_exists("modul/publik/content_ip_visi_misi.php")) include "modul/publik/content_ip_visi_misi.php";
            include "footer.php"; break;
            
        case 'ip_tujuan_cpl':
            if (file_exists("header_ip.php")) include "header_ip.php"; else include "header.php";
            if (file_exists("modul/publik/content_ip_tujuan_cpl.php")) include "modul/publik/content_ip_tujuan_cpl.php";
            include "footer.php"; break;
            
        case 'ip_struktur':
            if (file_exists("header_ip.php")) include "header_ip.php"; else include "header.php";
            if (file_exists("modul/publik/content_ip_struktur.php")) include "modul/publik/content_ip_struktur.php";
            include "footer.php"; break;
            
        case 'ip_dosen':
            if (file_exists("header_ip.php")) include "header_ip.php"; else include "header.php";
            if (file_exists("modul/publik/content_ip_dosen.php")) include "modul/publik/content_ip_dosen.php";
            include "footer.php"; break;
            
        case 'ip_akreditasi':
            if (file_exists("header_ip.php")) include "header_ip.php"; else include "header.php";
            if (file_exists("modul/publik/content_ip_akreditasi.php")) include "modul/publik/content_ip_akreditasi.php";
            include "footer.php"; break;
            
        case 'ip_sejarah':
            if (file_exists("header_ip.php")) include "header_ip.php"; else include "header.php";
            if (file_exists("modul/publik/content_ip_sejarah.php")) include "modul/publik/content_ip_sejarah.php";
            include "footer.php"; break;

// ROUTE AKADEMIK PRODI ILMU PEMERINTAHAN
        case 'ip_kurikulum':
            if (file_exists("header_ip.php")) include "header_ip.php"; else include "header.php";
            if (file_exists("modul/publik/content_ip_kurikulum.php")) include "modul/publik/content_ip_kurikulum.php";
            include "footer.php"; break;
        case 'ip_jadwal':
            if (file_exists("header_ip.php")) include "header_ip.php"; else include "header.php";
            if (file_exists("modul/publik/content_ip_jadwal.php")) include "modul/publik/content_ip_jadwal.php";
            include "footer.php"; break;
        case 'ip_buku_akademik':
            if (file_exists("header_ip.php")) include "header_ip.php"; else include "header.php";
            if (file_exists("modul/publik/content_ip_buku_akademik.php")) include "modul/publik/content_ip_buku_akademik.php";
            include "footer.php"; break;
        case 'ip_panduan_skripsi':
            if (file_exists("header_ip.php")) include "header_ip.php"; else include "header.php";
            if (file_exists("modul/publik/content_ip_panduan_skripsi.php")) include "modul/publik/content_ip_panduan_skripsi.php";
            include "footer.php"; break;

        // ROUTE RISET & ABDIMAS PRODI ILMU PEMERINTAHAN
        case 'ip_penelitian_dosen':
            if (file_exists("header_ip.php")) include "header_ip.php"; else include "header.php";
            if (file_exists("modul/publik/content_ip_penelitian_dosen.php")) include "modul/publik/content_ip_penelitian_dosen.php";
            include "footer.php"; break;
        case 'ip_riset_mahasiswa':
            if (file_exists("header_ip.php")) include "header_ip.php"; else include "header.php";
            if (file_exists("modul/publik/content_ip_riset_mahasiswa.php")) include "modul/publik/content_ip_riset_mahasiswa.php";
            include "footer.php"; break;
        case 'ip_abdimas':
            if (file_exists("header_ip.php")) include "header_ip.php"; else include "header.php";
            if (file_exists("modul/publik/content_ip_abdimas.php")) include "modul/publik/content_ip_abdimas.php";
            include "footer.php"; break;
        case 'ip_jurnal':
            if (file_exists("header_ip.php")) include "header_ip.php"; else include "header.php";
            if (file_exists("modul/publik/content_ip_jurnal.php")) include "modul/publik/content_ip_jurnal.php";
            include "footer.php"; break;
        case 'ip_galeri':
            if (file_exists("header_ip.php")) include "header_ip.php"; else include "header.php";
            if (file_exists("modul/publik/content_ip_galeri.php")) include "modul/publik/content_ip_galeri.php";
            include "footer.php"; break;

// ROUTE MAHASISWA PRODI ILMU PEMERINTAHAN
        case 'ip_hmps':
            if (file_exists("header_ip.php")) include "header_ip.php"; else include "header.php";
            if (file_exists("modul/publik/content_ip_hmps.php")) include "modul/publik/content_ip_hmps.php";
            include "footer.php"; break;
            
        case 'ip_prestasi':
            if (file_exists("header_ip.php")) include "header_ip.php"; else include "header.php";
            if (file_exists("modul/publik/content_ip_prestasi.php")) include "modul/publik/content_ip_prestasi.php";
            include "footer.php"; break;
            
        case 'ip_kegiatan':
            if (file_exists("header_ip.php")) include "header_ip.php"; else include "header.php";
            if (file_exists("modul/publik/content_ip_kegiatan.php")) include "modul/publik/content_ip_kegiatan.php";
            include "footer.php"; break;
            
        case 'ip_tracer':
            if (file_exists("header_ip.php")) include "header_ip.php"; else include "header.php";
            if (file_exists("modul/publik/content_ip_tracer.php")) include "modul/publik/content_ip_tracer.php";
            include "footer.php"; break;
// ROUTE MITRA PRODI ILMU PEMERINTAHAN
        case 'ip_mitra_pemdesa':
            if (file_exists("header_ip.php")) include "header_ip.php"; else include "header.php";
            if (file_exists("modul/publik/content_ip_mitra_pemdesa.php")) include "modul/publik/content_ip_mitra_pemdesa.php";
            include "footer.php"; break;
            
        case 'ip_mitra_sosial':
            if (file_exists("header_ip.php")) include "header_ip.php"; else include "header.php";
            if (file_exists("modul/publik/content_ip_mitra_sosial.php")) include "modul/publik/content_ip_mitra_sosial.php";
            include "footer.php"; break;
            
        case 'ip_mitra_mbkm':
            if (file_exists("header_ip.php")) include "header_ip.php"; else include "header.php";
            if (file_exists("modul/publik/content_ip_mitra_mbkm.php")) include "modul/publik/content_ip_mitra_mbkm.php";
            include "footer.php"; break;
            
        case 'ip_mitra_riset':
            if (file_exists("header_ip.php")) include "header_ip.php"; else include "header.php";
            if (file_exists("modul/publik/content_ip_mitra_riset.php")) include "modul/publik/content_ip_mitra_riset.php";
            include "footer.php"; break;

// ROUTE BERITA PRODI ILMU PEMERINTAHAN
        case 'ip_berita_artikel':
            if (file_exists("header_ip.php")) include "header_ip.php"; else include "header.php";
            if (file_exists("modul/publik/content_ip_berita_artikel.php")) include "modul/publik/content_ip_berita_artikel.php";
            include "footer.php"; break;
            
        case 'ip_berita_seminar':
            if (file_exists("header_ip.php")) include "header_ip.php"; else include "header.php";
            if (file_exists("modul/publik/content_ip_berita_seminar.php")) include "modul/publik/content_ip_berita_seminar.php";
            include "footer.php"; break;
            
        case 'ip_berita_pengumuman':
            if (file_exists("header_ip.php")) include "header_ip.php"; else include "header.php";
            if (file_exists("modul/publik/content_ip_berita_pengumuman.php")) include "modul/publik/content_ip_berita_pengumuman.php";
            include "footer.php"; break;
            
        case 'ip_berita_agenda':
            if (file_exists("header_ip.php")) include "header_ip.php"; else include "header.php";
            if (file_exists("modul/publik/content_ip_berita_agenda.php")) include "modul/publik/content_ip_berita_agenda.php";
            include "footer.php"; break;
// ROUTE DOKUMEN PUBLIK PRODI ILMU PEMERINTAHAN
        case 'ip_dok_skripsi':
            if (file_exists("header_ip.php")) include "header_ip.php"; else include "header.php";
            if (file_exists("modul/publik/content_ip_dok_skripsi.php")) include "modul/publik/content_ip_dok_skripsi.php";
            include "footer.php"; break;
            
        case 'ip_dok_panduan':
            if (file_exists("header_ip.php")) include "header_ip.php"; else include "header.php";
            if (file_exists("modul/publik/content_ip_dok_panduan.php")) include "modul/publik/content_ip_dok_panduan.php";
            include "footer.php"; break;
            
        case 'ip_dok_laporan':
            if (file_exists("header_ip.php")) include "header_ip.php"; else include "header.php";
            if (file_exists("modul/publik/content_ip_dok_laporan.php")) include "modul/publik/content_ip_dok_laporan.php";
            include "footer.php"; break;
            
        case 'ip_dok_sop':
            if (file_exists("header_ip.php")) include "header_ip.php"; else include "header.php";
            if (file_exists("modul/publik/content_ip_dok_sop.php")) include "modul/publik/content_ip_dok_sop.php";
            include "footer.php"; break;
// ROUTE LAYANAN KEMAHASISWAAN
        case 'kema_beasiswa':
            if (file_exists("header_kemahasiswaan.php")) include "header_kemahasiswaan.php"; else include "header.php";
            if (file_exists("modul/publik/content_kema_beasiswa.php")) include "modul/publik/content_kema_beasiswa.php";
            include "footer.php"; break;
            
        case 'kema_konseling':
            if (file_exists("header_kemahasiswaan.php")) include "header_kemahasiswaan.php"; else include "header.php";
            if (file_exists("modul/publik/content_kema_konseling.php")) include "modul/publik/content_kema_konseling.php";
            include "footer.php"; break;
            
        case 'kema_kesehatan':
            if (file_exists("header_kemahasiswaan.php")) include "header_kemahasiswaan.php"; else include "header.php";
            if (file_exists("modul/publik/content_kema_kesehatan.php")) include "modul/publik/content_kema_kesehatan.php";
            include "footer.php"; break;
            
        case 'kema_karir':
            if (file_exists("header_kemahasiswaan.php")) include "header_kemahasiswaan.php"; else include "header.php";
            if (file_exists("modul/publik/content_kema_karir.php")) include "modul/publik/content_kema_karir.php";
            include "footer.php"; break;
            
        case 'kema_pengaduan':
            if (file_exists("header_kemahasiswaan.php")) include "header_kemahasiswaan.php"; else include "header.php";
            if (file_exists("modul/publik/content_kema_pengaduan.php")) include "modul/publik/content_kema_pengaduan.php";
            include "footer.php"; break;

// ROUTE PELATIKAN KEMAHASISWAAN
        case 'kema_pelatihan_karakter':
            if (file_exists("header_kemahasiswaan.php")) include "header_kemahasiswaan.php"; else include "header.php";
            if (file_exists("modul/publik/content_kema_pelatihan_karakter.php")) include "modul/publik/content_kema_pelatihan_karakter.php";
            include "footer.php"; break;
            
        case 'kema_pelatihan_karier':
            if (file_exists("header_kemahasiswaan.php")) include "header_kemahasiswaan.php"; else include "header.php";
            if (file_exists("modul/publik/content_kema_pelatihan_karier.php")) include "modul/publik/content_kema_pelatihan_karier.php";
            include "footer.php"; break;
            
        case 'kema_pelatihan_digital':
            if (file_exists("header_kemahasiswaan.php")) include "header_kemahasiswaan.php"; else include "header.php";
            if (file_exists("modul/publik/content_kema_pelatihan_digital.php")) include "modul/publik/content_kema_pelatihan_digital.php";
            include "footer.php"; break;

// ROUTE PENGABDIAN KEMAHASISWAAN
        case 'kema_pengabdian_baksos':
            if (file_exists("header_kemahasiswaan.php")) include "header_kemahasiswaan.php"; else include "header.php";
            if (file_exists("modul/publik/content_kema_pengabdian_baksos.php")) include "modul/publik/content_kema_pengabdian_baksos.php";
            include "footer.php"; break;
            
        case 'kema_pengabdian_desa':
            if (file_exists("header_kemahasiswaan.php")) include "header_kemahasiswaan.php"; else include "header.php";
            if (file_exists("modul/publik/content_kema_pengabdian_desa.php")) include "modul/publik/content_kema_pengabdian_desa.php";
            include "footer.php"; break;
            
        case 'kema_pengabdian_relawan':
            if (file_exists("header_kemahasiswaan.php")) include "header_kemahasiswaan.php"; else include "header.php";
            if (file_exists("modul/publik/content_kema_pengabdian_relawan.php")) include "modul/publik/content_kema_pengabdian_relawan.php";
            include "footer.php"; break;

// ROUTE ORMAWA KEMAHASISWAAN
        case 'kema_bem':
            if (file_exists("header_kemahasiswaan.php")) include "header_kemahasiswaan.php"; else include "header.php";
            if (file_exists("modul/publik/content_kema_bem.php")) include "modul/publik/content_kema_bem.php";
            include "footer.php"; break;
            
        case 'kema_hima':
            if (file_exists("header_kemahasiswaan.php")) include "header_kemahasiswaan.php"; else include "header.php";
            if (file_exists("modul/publik/content_kema_hima.php")) include "modul/publik/content_kema_hima.php";
            include "footer.php"; break;
            
        case 'kema_ukm':
            if (file_exists("header_kemahasiswaan.php")) include "header_kemahasiswaan.php"; else include "header.php";
            if (file_exists("modul/publik/content_kema_ukm.php")) include "modul/publik/content_kema_ukm.php";
            include "footer.php"; break;
            
        case 'kema_lkmm':
            if (file_exists("header_kemahasiswaan.php")) include "header_kemahasiswaan.php"; else include "header.php";
            if (file_exists("modul/publik/content_kema_lkmm.php")) include "modul/publik/content_kema_lkmm.php";
            include "footer.php"; break;
            
        case 'kema_agenda':
            if (file_exists("header_kemahasiswaan.php")) include "header_kemahasiswaan.php"; else include "header.php";
            if (file_exists("modul/publik/content_kema_agenda.php")) include "modul/publik/content_kema_agenda.php";
            include "footer.php"; break;

// ROUTE UNIT KEMAHASISWAAN
        case 'kema_profil':
            if (file_exists("header_kemahasiswaan.php")) include "header_kemahasiswaan.php"; else include "header.php";
            if (file_exists("modul/publik/content_kema_profil.php")) include "modul/publik/content_kema_profil.php";
            include "footer.php"; break;

// ROUTE PRESTASI KEMAHASISWAAN
        case 'kema_pres_akademik':
            if (file_exists("header_kemahasiswaan.php")) include "header_kemahasiswaan.php"; else include "header.php";
            if (file_exists("modul/publik/content_kema_pres_akademik.php")) include "modul/publik/content_kema_pres_akademik.php";
            include "footer.php"; break;
            
        case 'kema_pres_nonakademik':
            if (file_exists("header_kemahasiswaan.php")) include "header_kemahasiswaan.php"; else include "header.php";
            if (file_exists("modul/publik/content_kema_pres_nonakademik.php")) include "modul/publik/content_kema_pres_nonakademik.php";
            include "footer.php"; break;
            
        case 'kema_pres_penghargaan':
            if (file_exists("header_kemahasiswaan.php")) include "header_kemahasiswaan.php"; else include "header.php";
            if (file_exists("modul/publik/content_kema_pres_penghargaan.php")) include "modul/publik/content_kema_pres_penghargaan.php";
            include "footer.php"; break;

// ROUTE ALUMNI KEMAHASISWAAN
        case 'kema_alumni_profil':
            if (file_exists("header_kemahasiswaan.php")) include "header_kemahasiswaan.php"; else include "header.php";
            if (file_exists("modul/publik/content_kema_alumni_profil.php")) include "modul/publik/content_kema_alumni_profil.php";
            include "footer.php"; break;
            
        case 'kema_alumni_testimoni':
            if (file_exists("header_kemahasiswaan.php")) include "header_kemahasiswaan.php"; else include "header.php";
            if (file_exists("modul/publik/content_kema_alumni_testimoni.php")) include "modul/publik/content_kema_alumni_testimoni.php";
            include "footer.php"; break;
            
        case 'kema_alumni_tracer':
            if (file_exists("header_kemahasiswaan.php")) include "header_kemahasiswaan.php"; else include "header.php";
            if (file_exists("modul/publik/content_kema_alumni_tracer.php")) include "modul/publik/content_kema_alumni_tracer.php";
            include "footer.php"; break;
            
        case 'kema_alumni_forum':
            if (file_exists("header_kemahasiswaan.php")) include "header_kemahasiswaan.php"; else include "header.php";
            if (file_exists("modul/publik/content_kema_alumni_forum.php")) include "modul/publik/content_kema_alumni_forum.php";
            include "footer.php"; break;
// ROUTE WIRAUSAHA KEMAHASISWAAN
        case 'kema_wirausaha_program':
            if (file_exists("header_kemahasiswaan.php")) include "header_kemahasiswaan.php"; else include "header.php";
            if (file_exists("modul/publik/content_kema_wirausaha_program.php")) include "modul/publik/content_kema_wirausaha_program.php";
            include "footer.php"; break;
            
        case 'kema_wirausaha_inovasi':
            if (file_exists("header_kemahasiswaan.php")) include "header_kemahasiswaan.php"; else include "header.php";
            if (file_exists("modul/publik/content_kema_wirausaha_inovasi.php")) include "modul/publik/content_kema_wirausaha_inovasi.php";
            include "footer.php"; break;
            
        case 'kema_wirausaha_bisnis':
            if (file_exists("header_kemahasiswaan.php")) include "header_kemahasiswaan.php"; else include "header.php";
            if (file_exists("modul/publik/content_kema_wirausaha_bisnis.php")) include "modul/publik/content_kema_wirausaha_bisnis.php";
            include "footer.php"; break;

// ROUTE DOKUMEN BIRO KEMAHASISWAAN
        case 'kema_dok_pedoman':
            if (file_exists("header_kemahasiswaan.php")) include "header_kemahasiswaan.php"; else include "header.php";
            if (file_exists("modul/publik/content_kema_dok_pedoman.php")) include "modul/publik/content_kema_dok_pedoman.php";
            include "footer.php"; break;
            
        case 'kema_dok_ormawa':
            if (file_exists("header_kemahasiswaan.php")) include "header_kemahasiswaan.php"; else include "header.php";
            if (file_exists("modul/publik/content_kema_dok_ormawa.php")) include "modul/publik/content_kema_dok_ormawa.php";
            include "footer.php"; break;
            
        case 'kema_dok_laporan':
            if (file_exists("header_kemahasiswaan.php")) include "header_kemahasiswaan.php"; else include "header.php";
            if (file_exists("modul/publik/content_kema_dok_laporan.php")) include "modul/publik/content_kema_dok_laporan.php";
            include "footer.php"; break;
            
        case 'kema_dok_sop':
            if (file_exists("header_kemahasiswaan.php")) include "header_kemahasiswaan.php"; else include "header.php";
            if (file_exists("modul/publik/content_kema_dok_sop.php")) include "modul/publik/content_kema_dok_sop.php";
            include "footer.php"; break;



// ROUTE LEMBAGA PENJAMINAN MUTU (LPM)
        case 'lpm_kebijakan':
            if (file_exists("header_lpm.php")) include "header_lpm.php"; else include "header.php";
            if (file_exists("modul/publik/content_lpm_kebijakan.php")) include "modul/publik/content_lpm_kebijakan.php";
            include "footer.php"; break;
            
        case 'lpm_manual':
            if (file_exists("header_lpm.php")) include "header_lpm.php"; else include "header.php";
            if (file_exists("modul/publik/content_lpm_manual.php")) include "modul/publik/content_lpm_manual.php";
            include "footer.php"; break;
            
        case 'lpm_standar':
            if (file_exists("header_lpm.php")) include "header_lpm.php"; else include "header.php";
            if (file_exists("modul/publik/content_lpm_standar.php")) include "modul/publik/content_lpm_standar.php";
            include "footer.php"; break;
            
        case 'lpm_formulir':
            if (file_exists("header_lpm.php")) include "header_lpm.php"; else include "header.php";
            if (file_exists("modul/publik/content_lpm_formulir.php")) include "modul/publik/content_lpm_formulir.php";
            include "footer.php"; break;
// ROUTE AUDIT MUTU INTERNAL (AMI) - LPM
        case 'lpm_ami_panduan':
            if (file_exists("header_lpm.php")) include "header_lpm.php"; else include "header.php";
            if (file_exists("modul/publik/content_lpm_ami_panduan.php")) include "modul/publik/content_lpm_ami_panduan.php";
            include "footer.php"; break;
            
        case 'lpm_ami_instrumen':
            if (file_exists("header_lpm.php")) include "header_lpm.php"; else include "header.php";
            if (file_exists("modul/publik/content_lpm_ami_instrumen.php")) include "modul/publik/content_lpm_ami_instrumen.php";
            include "footer.php"; break;
            
        case 'lpm_ami_laporan':
            if (file_exists("header_lpm.php")) include "header_lpm.php"; else include "header.php";
            if (file_exists("modul/publik/content_lpm_ami_laporan.php")) include "modul/publik/content_lpm_ami_laporan.php";
            include "footer.php"; break;
            
        case 'lpm_ami_tindaklanjut':
            if (file_exists("header_lpm.php")) include "header_lpm.php"; else include "header.php";
            if (file_exists("modul/publik/content_lpm_ami_tindaklanjut.php")) include "modul/publik/content_lpm_ami_tindaklanjut.php";
            include "footer.php"; break;
// ROUTE MUTU AKADEMIK - LPM
        case 'lpm_mutu_pembelajaran':
            if (file_exists("header_lpm.php")) include "header_lpm.php"; else include "header.php";
            if (file_exists("modul/publik/content_lpm_mutu_pembelajaran.php")) include "modul/publik/content_lpm_mutu_pembelajaran.php";
            include "footer.php"; break;
            
        case 'lpm_mutu_tracer':
            if (file_exists("header_lpm.php")) include "header_lpm.php"; else include "header.php";
            if (file_exists("modul/publik/content_lpm_mutu_tracer.php")) include "modul/publik/content_lpm_mutu_tracer.php";
            include "footer.php"; break;
            
        case 'lpm_mutu_mhs':
            if (file_exists("header_lpm.php")) include "header_lpm.php"; else include "header.php";
            if (file_exists("modul/publik/content_lpm_mutu_mhs.php")) include "modul/publik/content_lpm_mutu_mhs.php";
            include "footer.php"; break;
            
        case 'lpm_mutu_dosen':
            if (file_exists("header_lpm.php")) include "header_lpm.php"; else include "header.php";
            if (file_exists("modul/publik/content_lpm_mutu_dosen.php")) include "modul/publik/content_lpm_mutu_dosen.php";
            include "footer.php"; break;

// ROUTE AKREDITASI - LPM
        case 'lpm_akre_lembaga':
            if (file_exists("header_lpm.php")) include "header_lpm.php"; else include "header.php";
            if (file_exists("modul/publik/content_lpm_akre_lembaga.php")) include "modul/publik/content_lpm_akre_lembaga.php";
            include "footer.php"; break;
            
        case 'lpm_akre_instrumen':
            if (file_exists("header_lpm.php")) include "header_lpm.php"; else include "header.php";
            if (file_exists("modul/publik/content_lpm_akre_instrumen.php")) include "modul/publik/content_lpm_akre_instrumen.php";
            include "footer.php"; break;
            
        case 'lpm_akre_borang':
            if (file_exists("header_lpm.php")) include "header_lpm.php"; else include "header.php";
            if (file_exists("modul/publik/content_lpm_akre_borang.php")) include "modul/publik/content_lpm_akre_borang.php";
            include "footer.php"; break;
            
        case 'lpm_akre_laporan':
            if (file_exists("header_lpm.php")) include "header_lpm.php"; else include "header.php";
            if (file_exists("modul/publik/content_lpm_akre_laporan.php")) include "modul/publik/content_lpm_akre_laporan.php";
            include "footer.php"; break;
// ROUTE PROFIL LEMBAGA PENELITIAN & PENGABDIAN (LP2M)
        case 'lp2m_profil_fungsi':
            if (file_exists("header_lp2m.php")) include "header_lp2m.php"; else include "header.php";
            if (file_exists("modul/publik/content_lp2m_profil_fungsi.php")) include "modul/publik/content_lp2m_profil_fungsi.php";
            include "footer.php"; break;
            
        case 'lp2m_struktur':
            if (file_exists("header_lp2m.php")) include "header_lp2m.php"; else include "header.php";
            if (file_exists("modul/publik/content_lp2m_struktur.php")) include "modul/publik/content_lp2m_struktur.php";
            include "footer.php"; break;
            
        case 'lp2m_vmt':
            if (file_exists("header_lp2m.php")) include "header_lp2m.php"; else include "header.php";
            if (file_exists("modul/publik/content_lp2m_vmt.php")) include "modul/publik/content_lp2m_vmt.php";
            include "footer.php"; break;

// ROUTE PENELITIAN - LP2M
        case 'lp2m_riset_roadmap':
            if (file_exists("header_lp2m.php")) include "header_lp2m.php"; else include "header.php";
            if (file_exists("modul/publik/content_lp2m_riset_roadmap.php")) include "modul/publik/content_lp2m_riset_roadmap.php";
            include "footer.php"; break;
            
        case 'lp2m_riset_agenda':
            if (file_exists("header_lp2m.php")) include "header_lp2m.php"; else include "header.php";
            if (file_exists("modul/publik/content_lp2m_riset_agenda.php")) include "modul/publik/content_lp2m_riset_agenda.php";
            include "footer.php"; break;
            
        case 'lp2m_riset_panduan':
            if (file_exists("header_lp2m.php")) include "header_lp2m.php"; else include "header.php";
            if (file_exists("modul/publik/content_lp2m_riset_panduan.php")) include "modul/publik/content_lp2m_riset_panduan.php";
            include "footer.php"; break;
            
        case 'lp2m_riset_hasil':
            if (file_exists("header_lp2m.php")) include "header_lp2m.php"; else include "header.php";
            if (file_exists("modul/publik/content_lp2m_riset_hasil.php")) include "modul/publik/content_lp2m_riset_hasil.php";
            include "footer.php"; break;
            
        case 'lp2m_riset_hki':
            if (file_exists("header_lp2m.php")) include "header_lp2m.php"; else include "header.php";
            if (file_exists("modul/publik/content_lp2m_riset_hki.php")) include "modul/publik/content_lp2m_riset_hki.php";
            include "footer.php"; break;
            
        case 'lp2m_riset_hibah':
            if (file_exists("header_lp2m.php")) include "header_lp2m.php"; else include "header.php";
            if (file_exists("modul/publik/content_lp2m_riset_hibah.php")) include "modul/publik/content_lp2m_riset_hibah.php";
            include "footer.php"; break;

            // ROUTE ABDIMAS - LP2M
        case 'lp2m_abdimas_roadmap':
            if (file_exists("header_lp2m.php")) include "header_lp2m.php"; else include "header.php";
            if (file_exists("modul/publik/content_lp2m_abdimas_roadmap.php")) include "modul/publik/content_lp2m_abdimas_roadmap.php";
            include "footer.php"; break;
            
        case 'lp2m_abdimas_program':
            if (file_exists("header_lp2m.php")) include "header_lp2m.php"; else include "header.php";
            if (file_exists("modul/publik/content_lp2m_abdimas_program.php")) include "modul/publik/content_lp2m_abdimas_program.php";
            include "footer.php"; break;
            
        case 'lp2m_abdimas_panduan':
            if (file_exists("header_lp2m.php")) include "header_lp2m.php"; else include "header.php";
            if (file_exists("modul/publik/content_lp2m_abdimas_panduan.php")) include "modul/publik/content_lp2m_abdimas_panduan.php";
            include "footer.php"; break;
            
        case 'lp2m_abdimas_kkn':
            if (file_exists("header_lp2m.php")) include "header_lp2m.php"; else include "header.php";
            if (file_exists("modul/publik/content_lp2m_abdimas_kkn.php")) include "modul/publik/content_lp2m_abdimas_kkn.php";
            include "footer.php"; break;
            
        case 'lp2m_abdimas_laporan':
            if (file_exists("header_lp2m.php")) include "header_lp2m.php"; else include "header.php";
            if (file_exists("modul/publik/content_lp2m_abdimas_laporan.php")) include "modul/publik/content_lp2m_abdimas_laporan.php";
            include "footer.php"; break;
// ROUTE KERJASAMA - LP2M
        case 'lp2m_kerja_penelitian':
            if (file_exists("header_lp2m.php")) include "header_lp2m.php"; else include "header.php";
            if (file_exists("modul/publik/content_lp2m_kerja_penelitian.php")) include "modul/publik/content_lp2m_kerja_penelitian.php";
            include "footer.php"; break;
        case 'lp2m_kerja_abdimas':
            if (file_exists("header_lp2m.php")) include "header_lp2m.php"; else include "header.php";
            if (file_exists("modul/publik/content_lp2m_kerja_abdimas.php")) include "modul/publik/content_lp2m_kerja_abdimas.php";
            include "footer.php"; break;
        case 'lp2m_kerja_mou':
            if (file_exists("header_lp2m.php")) include "header_lp2m.php"; else include "header.php";
            if (file_exists("modul/publik/content_lp2m_kerja_mou.php")) include "modul/publik/content_lp2m_kerja_mou.php";
            include "footer.php"; break;

// ROUTE INFORMASI - LP2M
        case 'lp2m_info_berita':
            if (file_exists("header_lp2m.php")) include "header_lp2m.php"; else include "header.php";
            if (file_exists("modul/publik/content_lp2m_info_berita.php")) include "modul/publik/content_lp2m_info_berita.php";
            include "footer.php"; break;
            
        case 'lp2m_info_agenda':
            if (file_exists("header_lp2m.php")) include "header_lp2m.php"; else include "header.php";
            if (file_exists("modul/publik/content_lp2m_info_agenda.php")) include "modul/publik/content_lp2m_info_agenda.php";
            include "footer.php"; break;
            
        case 'lp2m_info_galeri':
            if (file_exists("header_lp2m.php")) include "header_lp2m.php"; else include "header.php";
            if (file_exists("modul/publik/content_lp2m_info_galeri.php")) include "modul/publik/content_lp2m_info_galeri.php";
            include "footer.php"; break;

        // ROUTE DOKUMEN - LP2M
        case 'lp2m_dok_laporan':
            if (file_exists("header_lp2m.php")) include "header_lp2m.php"; else include "header.php";
            if (file_exists("modul/publik/content_lp2m_dok_laporan.php")) include "modul/publik/content_lp2m_dok_laporan.php";
            include "footer.php"; break;
        case 'lp2m_dok_kebijakan':
            if (file_exists("header_lp2m.php")) include "header_lp2m.php"; else include "header.php";
            if (file_exists("modul/publik/content_lp2m_dok_kebijakan.php")) include "modul/publik/content_lp2m_dok_kebijakan.php";
            include "footer.php"; break;
        case 'lp2m_dok_sop':
            if (file_exists("header_lp2m.php")) include "header_lp2m.php"; else include "header.php";
            if (file_exists("modul/publik/content_lp2m_dok_sop.php")) include "modul/publik/content_lp2m_dok_sop.php";
            include "footer.php"; break;
        case 'lp2m_dok_formulir':
            if (file_exists("header_lp2m.php")) include "header_lp2m.php"; else include "header.php";
            if (file_exists("modul/publik/content_lp2m_dok_formulir.php")) include "modul/publik/content_lp2m_dok_formulir.php";
            include "footer.php"; break;


// ROUTE PUBLIKASI - LP2M
        case 'lp2m_pub_jurnal':
            if (file_exists("header_lp2m.php")) include "header_lp2m.php"; else include "header.php";
            if (file_exists("modul/publik/content_lp2m_pub_jurnal.php")) include "modul/publik/content_lp2m_pub_jurnal.php";
            include "footer.php"; break;
            
        case 'lp2m_pub_prosiding':
            if (file_exists("header_lp2m.php")) include "header_lp2m.php"; else include "header.php";
            if (file_exists("modul/publik/content_lp2m_pub_prosiding.php")) include "modul/publik/content_lp2m_pub_prosiding.php";
            include "footer.php"; break;
            
        case 'lp2m_pub_repo':
            if (file_exists("header_lp2m.php")) include "header_lp2m.php"; else include "header.php";
            if (file_exists("modul/publik/content_lp2m_pub_repo.php")) include "modul/publik/content_lp2m_pub_repo.php";
            include "footer.php"; break;
            
        case 'lp2m_pub_cfp':
            if (file_exists("header_lp2m.php")) include "header_lp2m.php"; else include "header.php";
            if (file_exists("modul/publik/content_lp2m_pub_cfp.php")) include "modul/publik/content_lp2m_pub_cfp.php";
            include "footer.php"; break;


        // TAMBAHAN: ROUTE UNTUK SEKRETARIAT
        case 'sekretariat':
        case 'sekre':
            if (file_exists("header_sekre.php")) include "header_sekre.php"; else include "header.php";
            if (file_exists("modul/publik/content_sekre.php")) include "modul/publik/content_sekre.php";
            else echo "<main class='container py-5 text-center mt-5'><h3>Halaman Sekretariat Belum Tersedia</h3></main>";
            include "footer.php";
            break;

        case 'baca_berita':
            include "header.php"; 
            if (file_exists("modul/publik/baca_berita.php")) include "modul/publik/baca_berita.php";
            include "footer.php";
            break;

        case 'beranda':
        default:
            include "header.php"; 
            if (file_exists("modul/publik/beranda.php")) include "modul/publik/beranda.php";
            else echo "File modul/publik/beranda.php tidak ditemukan!";
            include "footer.php";
            break;


// =========================================================================
        // ROUTE PROFIL SEKRETARIAT KAMPUS (MANUAL METHOD)
        // =========================================================================
        case 'sekre_profil_tupoksi':
            if (file_exists("header_sekre.php")) include "header_sekre.php"; else include "header.php";
            if (file_exists("modul/publik/content_sekre_profil_tupoksi.php")) include "modul/publik/content_sekre_profil_tupoksi.php";
            include "footer.php"; break;
            
        case 'sekre_profil_struktur':
            if (file_exists("header_sekre.php")) include "header_sekre.php"; else include "header.php";
            if (file_exists("modul/publik/content_sekre_profil_struktur.php")) include "modul/publik/content_sekre_profil_struktur.php";
            include "footer.php"; break;
            
        case 'sekre_profil_layanan':
            if (file_exists("header_sekre.php")) include "header_sekre.php"; else include "header.php";
            if (file_exists("modul/publik/content_sekre_profil_layanan.php")) include "modul/publik/content_sekre_profil_layanan.php";
            include "footer.php"; break;

// ROUTE LAYANAN SEKRETARIAT
        case 'sekre_layanan_surat':
            if (file_exists("header_sekre.php")) include "header_sekre.php"; else include "header.php";
            if (file_exists("modul/publik/content_sekre_layanan_surat.php")) include "modul/publik/content_sekre_layanan_surat.php";
            include "footer.php"; break;
            
        case 'sekre_layanan_legalisir':
            if (file_exists("header_sekre.php")) include "header_sekre.php"; else include "header.php";
            if (file_exists("modul/publik/content_sekre_layanan_legalisir.php")) include "modul/publik/content_sekre_layanan_legalisir.php";
            include "footer.php"; break;
            
        case 'sekre_layanan_fasilitas':
            if (file_exists("header_sekre.php")) include "header_sekre.php"; else include "header.php";
            if (file_exists("modul/publik/content_sekre_layanan_fasilitas.php")) include "modul/publik/content_sekre_layanan_fasilitas.php";
            include "footer.php"; break;
            
        case 'sekre_layanan_status':
            if (file_exists("header_sekre.php")) include "header_sekre.php"; else include "header.php";
            if (file_exists("modul/publik/content_sekre_layanan_status.php")) include "modul/publik/content_sekre_layanan_status.php";
            include "footer.php"; break;
// ROUTE INFORMASI SEKRETARIAT
        case 'sekre_info_pengumuman':
            if (file_exists("header_sekre.php")) include "header_sekre.php"; else include "header.php";
            if (file_exists("modul/publik/content_sekre_info_pengumuman.php")) include "modul/publik/content_sekre_info_pengumuman.php";
            include "footer.php"; break;
            
        case 'sekre_info_agenda_pimpinan':
            if (file_exists("header_sekre.php")) include "header_sekre.php"; else include "header.php";
            if (file_exists("modul/publik/content_sekre_info_agenda_pimpinan.php")) include "modul/publik/content_sekre_info_agenda_pimpinan.php";
            include "footer.php"; break;
            
        case 'sekre_info_kalender':
            if (file_exists("header_sekre.php")) include "header_sekre.php"; else include "header.php";
            if (file_exists("modul/publik/content_sekre_info_kalender.php")) include "modul/publik/content_sekre_info_kalender.php";
            include "footer.php"; break;
            
        case 'sekre_info_berita':
            if (file_exists("header_sekre.php")) include "header_sekre.php"; else include "header.php";
            if (file_exists("modul/publik/content_sekre_info_berita.php")) include "modul/publik/content_sekre_info_berita.php";
            include "footer.php"; break;
// ROUTE INFORMASI SEKRETARIAT
        case 'sekre_info_pengumuman':
            if (file_exists("header_sekre.php")) include "header_sekre.php"; else include "header.php";
            if (file_exists("modul/publik/content_sekre_info_pengumuman.php")) include "modul/publik/content_sekre_info_pengumuman.php";
            include "footer.php"; break;
            
        case 'sekre_info_agenda_pimpinan':
            if (file_exists("header_sekre.php")) include "header_sekre.php"; else include "header.php";
            if (file_exists("modul/publik/content_sekre_info_agenda_pimpinan.php")) include "modul/publik/content_sekre_info_agenda_pimpinan.php";
            include "footer.php"; break;
            
        case 'sekre_info_kalender':
            if (file_exists("header_sekre.php")) include "header_sekre.php"; else include "header.php";
            if (file_exists("modul/publik/content_sekre_info_kalender.php")) include "modul/publik/content_sekre_info_kalender.php";
            include "footer.php"; break;
            
        case 'sekre_info_berita':
            if (file_exists("header_sekre.php")) include "header_sekre.php"; else include "header.php";
            if (file_exists("modul/publik/content_sekre_info_berita.php")) include "modul/publik/content_sekre_info_berita.php";
            include "footer.php"; break;
// ROUTE DOKUMEN & REGULASI SEKRETARIAT
        case 'sekre_dok_sk':
            if (file_exists("header_sekre.php")) include "header_sekre.php"; else include "header.php";
            if (file_exists("modul/publik/content_sekre_dok_sk.php")) include "modul/publik/content_sekre_dok_sk.php";
            include "footer.php"; break;
            
        case 'sekre_dok_peraturan':
            if (file_exists("header_sekre.php")) include "header_sekre.php"; else include "header.php";
            if (file_exists("modul/publik/content_sekre_dok_peraturan.php")) include "modul/publik/content_sekre_dok_peraturan.php";
            include "footer.php"; break;
            
        case 'sekre_dok_pedoman':
            if (file_exists("header_sekre.php")) include "header_sekre.php"; else include "header.php";
            if (file_exists("modul/publik/content_sekre_dok_pedoman.php")) include "modul/publik/content_sekre_dok_pedoman.php";
            include "footer.php"; break;
            
        case 'sekre_dok_formulir':
            if (file_exists("header_sekre.php")) include "header_sekre.php"; else include "header.php";
            if (file_exists("modul/publik/content_sekre_dok_formulir.php")) include "modul/publik/content_sekre_dok_formulir.php";
            include "footer.php"; break;
// ROUTE PROFIL UPT PERPUSTAKAAN
        case 'perpus_profil_tentang':
            if (file_exists("header_perpus.php")) include "header_perpus.php"; else include "header.php";
            if (file_exists("modul/publik/content_perpus_profil_tentang.php")) include "modul/publik/content_perpus_profil_tentang.php";
            include "footer.php"; break;
            
        case 'perpus_profil_vmt':
            if (file_exists("header_perpus.php")) include "header_perpus.php"; else include "header.php";
            if (file_exists("modul/publik/content_perpus_profil_vmt.php")) include "modul/publik/content_perpus_profil_vmt.php";
            include "footer.php"; break;
            
        case 'perpus_profil_layanan':
            if (file_exists("header_perpus.php")) include "header_perpus.php"; else include "header.php";
            if (file_exists("modul/publik/content_perpus_profil_layanan.php")) include "modul/publik/content_perpus_profil_layanan.php";
            include "footer.php"; break;
            
        case 'perpus_profil_fasilitas':
            if (file_exists("header_perpus.php")) include "header_perpus.php"; else include "header.php";
            if (file_exists("modul/publik/content_perpus_profil_fasilitas.php")) include "modul/publik/content_perpus_profil_fasilitas.php";
            include "footer.php"; break;
// ROUTE LAYANAN PERPUSTAKAAN
        case 'perpus_layanan_sirkulasi':
            if (file_exists("header_perpus.php")) include "header_perpus.php"; else include "header.php";
            if (file_exists("modul/publik/content_perpus_layanan_sirkulasi.php")) include "modul/publik/content_perpus_layanan_sirkulasi.php";
            include "footer.php"; break;
            
        case 'perpus_layanan_bebas':
            if (file_exists("header_perpus.php")) include "header_perpus.php"; else include "header.php";
            if (file_exists("modul/publik/content_perpus_layanan_bebas.php")) include "modul/publik/content_perpus_layanan_bebas.php";
            include "footer.php"; break;
            
        case 'perpus_layanan_referensi':
            if (file_exists("header_perpus.php")) include "header_perpus.php"; else include "header.php";
            if (file_exists("modul/publik/content_perpus_layanan_referensi.php")) include "modul/publik/content_perpus_layanan_referensi.php";
            include "footer.php"; break;
            
        case 'perpus_layanan_usulan':
            if (file_exists("header_perpus.php")) include "header_perpus.php"; else include "header.php";
            if (file_exists("modul/publik/content_perpus_layanan_usulan.php")) include "modul/publik/content_perpus_layanan_usulan.php";
            include "footer.php"; break;
// ROUTE KOLEKSI PERPUSTAKAAN
        case 'perpus_koleksi_opac':
            if (file_exists("header_perpus.php")) include "header_perpus.php"; else include "header.php";
            if (file_exists("modul/publik/content_perpus_koleksi_opac.php")) include "modul/publik/content_perpus_koleksi_opac.php";
            include "footer.php"; break;
            
        case 'perpus_koleksi_ebook':
            if (file_exists("header_perpus.php")) include "header_perpus.php"; else include "header.php";
            if (file_exists("modul/publik/content_perpus_koleksi_ebook.php")) include "modul/publik/content_perpus_koleksi_ebook.php";
            include "footer.php"; break;
            
        case 'perpus_koleksi_repo':
            if (file_exists("header_perpus.php")) include "header_perpus.php"; else include "header.php";
            if (file_exists("modul/publik/content_perpus_koleksi_repo.php")) include "modul/publik/content_perpus_koleksi_repo.php";
            include "footer.php"; break;
            
        case 'perpus_koleksi_berkala':
            if (file_exists("header_perpus.php")) include "header_perpus.php"; else include "header.php";
            if (file_exists("modul/publik/content_perpus_koleksi_berkala.php")) include "modul/publik/content_perpus_koleksi_berkala.php";
            include "footer.php"; break;
            // ROUTE KEANGGOTAAN PERPUSTAKAAN
        case 'perpus_anggota_daftar':
            if (file_exists("header_perpus.php")) include "header_perpus.php"; else include "header.php";
            if (file_exists("modul/publik/content_perpus_anggota_daftar.php")) include "modul/publik/content_perpus_anggota_daftar.php";
            include "footer.php"; break;
            
        case 'perpus_anggota_panduan':
            if (file_exists("header_perpus.php")) include "header_perpus.php"; else include "header.php";
            if (file_exists("modul/publik/content_perpus_anggota_panduan.php")) include "modul/publik/content_perpus_anggota_panduan.php";
            include "footer.php"; break;
            
        case 'perpus_anggota_status':
            if (file_exists("header_perpus.php")) include "header_perpus.php"; else include "header.php";
            if (file_exists("modul/publik/content_perpus_anggota_status.php")) include "modul/publik/content_perpus_anggota_status.php";
            include "footer.php"; break;
// ROUTE INFORMASI PERPUSTAKAAN
        case 'perpus_info_berita':
            if (file_exists("header_perpus.php")) include "header_perpus.php"; else include "header.php";
            if (file_exists("modul/publik/content_perpus_info_berita.php")) include "modul/publik/content_perpus_info_berita.php";
            include "footer.php"; break;
            
        case 'perpus_info_acara':
            if (file_exists("header_perpus.php")) include "header_perpus.php"; else include "header.php";
            if (file_exists("modul/publik/content_perpus_info_acara.php")) include "modul/publik/content_perpus_info_acara.php";
            include "footer.php"; break;
            
        case 'perpus_info_galeri':
            if (file_exists("header_perpus.php")) include "header_perpus.php"; else include "header.php";
            if (file_exists("modul/publik/content_perpus_info_galeri.php")) include "modul/publik/content_perpus_info_galeri.php";
            include "footer.php"; break;

    }

    // WAJIB: Hentikan eksekusi script di sini agar HTML Admin di bawahnya TIDAK ter-load oleh publik
    exit; 
}
// =========================================================================
// 2. ROUTING BACK-END / DASHBOARD ADMIN (JIKA USER SUDAH LOGIN)
// =========================================================================
// Semua kode HTML di bawah ini otomatis menjadi Dashboard Backend sistem Anda.
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Sistem Informasi Kampus - STPM Santa Ursula</title>
    
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="/FINAL/css/style2.css" rel="stylesheet" /> 
    <link rel="icon" type="image/x-icon" href="/FINAL/assets/img/favicon.png" />
    
    <script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.bootstrap5.min.css">
</head>

<body class="nav-fixed bg-light">
    <style>
        @media all and (min-width: 992px) {
            .dropdown-menu li { position: relative; }
            .dropdown-menu .submenu { display: none; position: absolute; left: 100%; top: 0; right: auto; margin-top: -8px; background-color: #fff; border-radius: 0.375rem; box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15); border: 1px solid rgba(0, 0, 0, 0.15); min-width: 12rem; }
            .dropdown-menu .submenu.show { display: block; }
        }
        @media (max-width: 991px) {
            .dropdown-menu .submenu { display: none; position: static; width: auto; margin-top: 0; background-color: transparent; border: 0; box-shadow: none; padding-left: 20px; border-left: 2px solid #eee; }
            .dropdown-menu .submenu.show { display: block; }
        }
    </style>

    <nav class="topnav navbar navbar-expand-lg navbar-light bg-light shadow-sm" id="sidenavAccordion">
        <div class="container-fluid px-4 bg-light mb-1">
            <button class="btn btn-icon btn-transparent-dark order-1 order-lg-0 me-2 ms-lg-2 me-lg-0" id="sidebarToggle">
                <i data-feather="menu"></i>
            </button>
            <a class="navbar-brand pe-3 ps-4 ps-lg-2" href="index.php">STPM Santa Ursula</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="main_nav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item dropdown no-caret d-none d-sm-block me-3 dropdown-notifications">
                        <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownAlerts" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
                            <i data-feather="bell"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end border-0 shadow animated--fade-in-up" aria-labelledby="navbarDropdownAlerts">
                            <h6 class="dropdown-header dropdown-notifications-header">
                                <i class="me-2" data-feather="bell"></i> Pusat Notifikasi
                            </h6>
                            <a class="dropdown-item dropdown-notifications-item" href="#!">
                                <div class="dropdown-notifications-item-icon bg-warning"><i data-feather="activity"></i></div>
                                <div class="dropdown-notifications-item-content">
                                    <div class="dropdown-notifications-item-content-details">Info Sistem</div>
                                    <div class="dropdown-notifications-item-content-text">Selamat datang kembali di Dashboard!</div>
                                </div>
                            </a>
                        </div>
                    </li>

                    <li class="nav-item dropdown no-caret dropdown-user me-3 me-lg-4">
                        <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownUserImage" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
                            <img class="img-fluid" src="/FINAL/assets/img/illustrations/profiles/profile-1.png" alt="User" />
                        </a>
                        <div class="dropdown-menu dropdown-menu-end border-0 shadow animated--fade-in-up" aria-labelledby="navbarDropdownUserImage">
                            <h6 class="dropdown-header d-flex align-items-center">
                                <div class="dropdown-user-details">
                                    <div class="dropdown-user-details-name"><?php echo ucfirst($_SESSION['username']); ?></div>
                                    <div class="dropdown-user-details-email">Role: <?php echo implode(', ', $_SESSION['roles'] ?? []); ?></div>
                                </div>
                            </h6>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="logout.php">
                                <div class="dropdown-item-icon"><i data-feather="log-out"></i></div>
                                Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sidenav shadow-right sidenav-light"> 
                <div class="sidenav-menu">
                    <?php include "menu.php"; ?>
                </div>
                <div class="sidenav-footer">
                    <div class="sidenav-footer-content">
                        <div class="sidenav-footer-subtitle">Logged in as:</div>
                        <div class="sidenav-footer-title"><?php echo ucfirst($_SESSION['username']); ?></div>
                    </div>
                </div>
            </nav>
        </div>

        <div id="layoutSidenav_content">
            <main>
                <?php include "content.php"; ?>
            </main>

            <footer class="footer-admin mt-auto footer-light">
                <div class="container-xl px-4">
                    <div class="row">
                        <div class="col-md-6 small">Copyright &copy; STPM Santa Ursula <?php echo date('Y'); ?></div>
                        <div class="col-md-6 text-md-end small">
                            <a href="#!">Privacy Policy</a> &middot; <a href="#!">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <script src="/FINAL/js/scripts2.js"></script> 
    
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="/FINAL/js/datatables/datatables-simple-demo.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>

    <script>
        $(document).ready(function() {
            var table = $('#datatablesDosen').DataTable({
                "pageLength": 5,
                "lengthMenu": [ [5, 10, 25, 50, -1], [5, 10, 25, 50, "Semua"] ],
                "language": {
                    "lengthMenu": "Tampilkan _MENU_ data",
                    "zeroRecords": "Data tidak ditemukan",
                    "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                    "infoEmpty": "Tidak ada data",
                    "infoFiltered": "(disaring dari _MAX_ total data)",
                    "search": "Cari:",
                    "paginate": { "first": "Awal", "last": "Akhir", "next": "Lanjut", "previous": "Kembali" }
                },
                dom: "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
                     "<'row'<'col-sm-12'tr>>" +
                     "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                buttons: [
                    { extend: 'copy', className: 'btn btn-secondary btn-sm', text: '<i class="fas fa-copy"></i>' },
                    { extend: 'excel', className: 'btn btn-success btn-sm', text: '<i class="fas fa-file-excel"></i>' },
                    { extend: 'pdf', className: 'btn btn-danger btn-sm', text: '<i class="fas fa-file-pdf"></i>' },
                    { extend: 'print', className: 'btn btn-info btn-sm', text: '<i class="fas fa-print"></i>' }
                ]
            });
            if($('#datatablesSimple_wrapper .col-md-6:eq(0)').length) {
                table.buttons().container().appendTo( '#datatablesSimple_wrapper .col-md-6:eq(0)' );
            }
        });

        // Script Submenu Dropdown Admin
        document.addEventListener("DOMContentLoaded", function () {
            document.querySelectorAll(".dropdown-menu .dropdown-toggle").forEach(function (element) {
                element.addEventListener("click", function (e) {
                    let nextEl = this.nextElementSibling;
                    if (nextEl && nextEl.classList.contains("submenu")) {
                        e.preventDefault();
                        e.stopPropagation();
                        if (nextEl.classList.contains("show")) {
                            nextEl.classList.remove("show");
                        } else {
                            let parent = this.closest(".dropdown-menu");
                            if (parent) {
                                parent.querySelectorAll(".submenu.show").forEach(function (submenu) {
                                    submenu.classList.remove("show");
                                });
                            }
                            nextEl.classList.add("show");
                        }
                    }
                });
            });
        });
    </script>
</body>
</html>