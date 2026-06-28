<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");

// Proses Pengajuan Surat dari Mahasiswa (TANPA UPLOAD FILE SPP)
if (isset($_POST['kirim_permohonan'])) {
    $jenis_surat          = $koneksi->real_escape_string($_POST['jenis_surat']);
    $nim                  = $koneksi->real_escape_string($_POST['nim']);
    $nama_lengkap         = $koneksi->real_escape_string($_POST['nama_lengkap']);
    $keperluan            = $koneksi->real_escape_string($_POST['keperluan']);
    
    // Tangkap data kondisional (Jika disembunyikan JS, nilainya akan kosong)
    $program_studi        = isset($_POST['program_studi']) ? $koneksi->real_escape_string($_POST['program_studi']) : '';
    $semester             = isset($_POST['semester']) ? $koneksi->real_escape_string($_POST['semester']) : '';
    $tempat_tanggal_lahir = isset($_POST['tempat_tanggal_lahir']) ? $koneksi->real_escape_string($_POST['tempat_tanggal_lahir']) : '';
    $lokasi_pelaksanaan   = isset($_POST['lokasi_pelaksanaan']) ? $koneksi->real_escape_string($_POST['lokasi_pelaksanaan']) : '';
    $judul_penelitian     = isset($_POST['judul_penelitian']) ? $koneksi->real_escape_string($_POST['judul_penelitian']) : '';
    $nama_dpa             = isset($_POST['nama_dpa']) ? $koneksi->real_escape_string($_POST['nama_dpa']) : '';
    $waktu_pelaksanaan    = isset($_POST['waktu_pelaksanaan']) ? $koneksi->real_escape_string($_POST['waktu_pelaksanaan']) : '';
    $peserta              = isset($_POST['peserta']) ? $koneksi->real_escape_string($_POST['peserta']) : '';

    $sql = "INSERT INTO sekretariat_permohonan_surat (
                jenis_surat, nim, nama_lengkap, keperluan, 
                program_studi, semester, tempat_tanggal_lahir, 
                lokasi_pelaksanaan, judul_penelitian, nama_dpa, waktu_pelaksanaan, peserta
            ) VALUES (
                '$jenis_surat', '$nim', '$nama_lengkap', '$keperluan', 
                '$program_studi', '$semester', '$tempat_tanggal_lahir', 
                '$lokasi_pelaksanaan', '$judul_penelitian', '$nama_dpa', '$waktu_pelaksanaan', '$peserta'
            )";

    if ($koneksi->query($sql)) {
        $_SESSION['flash_type'] = 'success';
        $_SESSION['flash_message'] = 'Permohonan surat berhasil dikirim! Silakan cek status pengajuan secara berkala.';
    } else {
        $_SESSION['flash_type'] = 'danger';
        $_SESSION['flash_message'] = 'Gagal menyimpan data ke server: ' . $koneksi->error;
    }
    header("Location: index.php?module=sekre_layanan_surat"); exit;
}
?>

<main>
    <header class="page-header page-header-dark bg-secondary pb-10">
        <div class="container-xl px-4">
            <div class="page-header-content pt-4" data-aos="fade-down">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title text-white fw-bold">
                            <div class="page-header-icon text-white"><i data-feather="file-text"></i></div>
                            Pengajuan Surat Keterangan Online
                        </h1>
                        <div class="page-header-subtitle text-white-50">Layanan permohonan surat administrasi akademik untuk mahasiswa aktif STPM Santa Ursula.</div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container-xl px-4 mt-n10 mb-5">
        <div class="row gx-4">
            <div class="col-lg-8 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="card shadow-sm border-0 h-100 rounded-4">
                    <div class="card-header bg-white border-bottom p-4">
                        <h5 class="fw-bold text-dark mb-0"><i class="fas fa-edit text-secondary me-2"></i> Lengkapi Formulir Pengajuan</h5>
                    </div>
                    <div class="card-body p-4 p-md-5">
                        
                        <form action="" method="POST">
                            <div class="mb-4">
                                <label class="form-label small fw-bold text-muted">Jenis Surat yang Diajukan <span class="text-danger">*</span></label>
                                <select class="form-select bg-light fw-bold text-dark" name="jenis_surat" id="pilihan_surat" onchange="kendaliForm()" required style="cursor:pointer;">
                                    <option value="">-- Pilih Jenis Surat --</option>
                                    <option value="Surat Keterangan Aktif Kuliah">Surat Keterangan Aktif Kuliah (Untuk Tunjangan Anak/Gaji)</option>
                                    <option value="Surat Keterangan Berkelakuan Baik">Surat Keterangan Berkelakuan Baik</option>
                                    <option value="Surat Pengambilan Data Awal Skripsi">Surat Pengambilan Data Awal Skripsi</option>
                                    <option value="Surat Pengantar Izin Penelitian Skripsi">Surat Pengantar Izin Penelitian (Skripsi)</option>
                                    <option value="Surat Keterangan Selesai Penelitian Skripsi">Surat Keterangan Selesai Penelitian (Skripsi)</option>
                                    <option value="Surat Permohonan Magang">Surat Permohonan Magang</option>
                                    <option value="Surat Izin Proyek Mata Kuliah">Surat Izin Melakukan Proyek Mata Kuliah</option>
                                    <option value="Surat Rekomendasi Beasiswa Eksternal">Surat Rekomendasi Beasiswa Eksternal</option>
                                    <option value="Surat Izin Survei Wawancara Proyek MK">Surat Permohonan Izin Melakukan Survei/Wawancara Proyek MK</option>
                                    <option value="Surat Pernyataan Peminjaman Barang">Surat Pernyataan Tanggung Jawab Peminjaman Barang</option>
                                    <option value="Surat Izin Survei Abdimas Kelas">Surat Permohonan Izin Survei Abdimas Kelas</option>
                                    <option value="Surat Permohonan Abdimas Kelas">Surat Permohonan Abdimas Kelas</option>
                                    <option value="Surat Pemberitahuan Pelaksanaan Abdimas">Surat Pemberitahuan Pelaksanaan Abdimas Kelas</option>
                                </select>
                            </div>

                            <div class="row gx-3">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label small fw-bold text-muted">Nomor Induk Mahasiswa (NIM) <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control bg-light" name="nim" placeholder="Contoh: 0098131" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label small fw-bold text-muted">Nama Lengkap Mahasiswa <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control bg-light" name="nama_lengkap" placeholder="Sesuai KTP/Ijazah" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label small fw-bold text-muted">Tujuan Surat / Keperluan <span class="text-danger">*</span></label>
                                <textarea class="form-control bg-light" name="keperluan" rows="2" placeholder="Cth: Ditujukan kepada Kepala Bappeda Kab. Ende di Tempat..." required></textarea>
                            </div>

                            <div class="row gx-3" id="blok_akademik" style="display: none;">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label small fw-bold text-muted">Program Studi <span class="text-danger">*</span></label>
                                    <select class="form-select bg-light" name="program_studi" id="in_prodi">
                                        <option value="">-- Pilih Prodi --</option>
                                        <option value="Pembangunan Sosial">Pembangunan Sosial</option>
                                        <option value="Ilmu Pemerintahan">Ilmu Pemerintahan</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label small fw-bold text-muted">Semester <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control bg-light" name="semester" id="in_semester" placeholder="Cth: IV (Empat)">
                                </div>
                            </div>

                            <div class="mb-3" id="blok_ttl" style="display: none;">
                                <label class="form-label small fw-bold text-muted">Tempat & Tanggal Lahir <span class="text-danger">*</span></label>
                                <input type="text" class="form-control bg-light" name="tempat_tanggal_lahir" id="in_ttl" placeholder="Cth: Ende, 12 November 1998">
                            </div>

                            <div class="mb-3" id="blok_lokasi" style="display: none;">
                                <label class="form-label small fw-bold text-muted">Lokasi Pelaksanaan / Penelitian <span class="text-danger">*</span></label>
                                <input type="text" class="form-control bg-light" name="lokasi_pelaksanaan" id="in_lokasi" placeholder="Cth: Desa Wewaria, Kec. Wewaria">
                            </div>

                            <div class="row gx-3" id="blok_abdimas" style="display: none;">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label small fw-bold text-muted">Nama Lengkap DPA <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control bg-light" name="nama_dpa" id="in_dpa" placeholder="Cth: Yuliana L. B. Kumanireng, S.Sos">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label small fw-bold text-muted">Waktu Pelaksanaan <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control bg-light" name="waktu_pelaksanaan" id="in_waktu" placeholder="Cth: 20-25 Juli 2026">
                                </div>
                                <div class="col-12 mb-3">
                                    <label class="form-label small fw-bold text-muted">Daftar Nama Peserta <span class="text-danger">*</span></label>
                                    <textarea class="form-control bg-light" name="peserta" id="in_peserta" rows="3" placeholder="Sebutkan nama-nama anggota kelompok..."></textarea>
                                </div>
                            </div>

                            <div class="mb-4" id="blok_skripsi" style="display: none;">
                                <label class="form-label small fw-bold text-muted">Judul Penelitian Skripsi <span class="text-danger">*</span></label>
                                <textarea class="form-control bg-light" name="judul_penelitian" id="in_judul" rows="2" placeholder="Tuliskan judul secara lengkap..."></textarea>
                            </div>

                            <button type="submit" name="kirim_permohonan" class="btn btn-secondary px-5 rounded-pill shadow-sm fw-bold mt-2">
                                <i class="fas fa-paper-plane me-2"></i>Kirim Berkas Permohonan
                            </button>
                        </form>

                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 mb-4" data-aos="fade-left" data-aos-delay="200">
                <div class="card shadow-sm border-0 h-100 bg-light text-center py-5 rounded-4">
                    <div class="card-body d-flex flex-column justify-content-center align-items-center">
                        <i class="fas fa-shield-alt fa-4x text-secondary mb-4 opacity-50"></i>
                        <h5 class="fw-bold text-dark mb-3">Bebas Retribusi & SPP</h5>
                        <p class="small text-muted mb-4" style="line-height: 1.6;">Sistem saat ini terintegrasi langsung dengan SIAKAD. Proses validasi tidak lagi memerlukan lampiran berkas bukti SPP mahasiswa.</p>
                        <button type="button" class="btn btn-outline-secondary btn-sm rounded-pill px-4 fw-bold shadow-sm" data-bs-toggle="modal" data-bs-target="#modalCekStatus">
                            <i class="fas fa-search me-1"></i> Lacak Status Permohonan
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php 
$jenis_modal = 'frontend_cek_status';
include 'modul/sekretariat/komponen_modal.php'; 
?>

<script>
function kendaliForm() {
    var jenis = document.getElementById("pilihan_surat").value;

    // Ambil semua elemen kontainer (blok)
    var bAkademik = document.getElementById("blok_akademik");
    var bTTL      = document.getElementById("blok_ttl");
    var bLokasi   = document.getElementById("blok_lokasi");
    var bAbdimas  = document.getElementById("blok_abdimas");
    var bSkripsi  = document.getElementById("blok_skripsi");

    // Ambil semua input untuk set required
    var iProdi = document.getElementById("in_prodi"), iSem = document.getElementById("in_semester");
    var iTTL = document.getElementById("in_ttl"), iLok = document.getElementById("in_lokasi");
    var iDpa = document.getElementById("in_dpa"), iWak = document.getElementById("in_waktu"), iPes = document.getElementById("in_peserta");
    var iJud = document.getElementById("in_judul");

    // 1. RESET: Sembunyikan Semua & Hapus Required
    bAkademik.style.display = "none"; iProdi.required = false; iSem.required = false;
    bTTL.style.display      = "none"; iTTL.required = false;
    bLokasi.style.display   = "none"; iLok.required = false;
    bAbdimas.style.display  = "none"; iDpa.required = false; iWak.required = false; iPes.required = false;
    bSkripsi.style.display  = "none"; iJud.required = false;

    // 2. KONDISI: Surat Keterangan Aktif Kuliah
    if (jenis === "Surat Keterangan Aktif Kuliah") {
        bAkademik.style.display = "flex"; iProdi.required = true; iSem.required = true;
        bTTL.style.display      = "block"; iTTL.required = true;
    }
    // 3. KONDISI: Abdimas Kelas (Izin Survei, Permohonan, Pemberitahuan)
    else if (jenis.includes("Abdimas")) {
        bAkademik.style.display = "flex"; iProdi.required = true; // Semester tidak wajib di sini
        bAbdimas.style.display  = "flex"; iDpa.required = true; iWak.required = true; iPes.required = true;
        bLokasi.style.display   = "block"; iLok.required = true;
    }
    // 4. KONDISI: Skripsi (Data Awal, Izin Penelitian)
    else if (jenis.includes("Skripsi") && !jenis.includes("Selesai Penelitian")) {
        bAkademik.style.display = "flex"; iProdi.required = true; iSem.required = true;
        bLokasi.style.display   = "block"; iLok.required = true;
        bSkripsi.style.display  = "block"; iJud.required = true;
    }
    // 5. KONDISI UMUM: (Opsional, memunculkan prodi & semester sebagai dasar)
    else if (jenis !== "") {
        bAkademik.style.display = "flex"; iProdi.required = true; iSem.required = true;
    }
}
</script>